#!/bin/bash
set -e

# Start the original WordPress entrypoint (creates wp-config.php, waits for DB, starts Apache)
docker-entrypoint.sh "$@" &
WP_PID=$!

# Wait for Apache to respond, then wait for the database to be ready
echo "Waiting for WordPress to start..."
for i in $(seq 1 60); do
    if curl -sf -o /dev/null http://localhost/ 2>/dev/null; then
        echo "Apache is responding."
        break
    fi
    sleep 2
done

echo "Waiting for database connection..."
for i in $(seq 1 60); do
    if wp db check --allow-root 2>/dev/null; then
        echo "Database is ready."
        break
    fi
    sleep 2
done

# Determine the public URL
if [ -n "$BASE44_PUBLIC_HOST_SUFFIX" ]; then
    SITE_URL="https://3000-${BASE44_PUBLIC_HOST_SUFFIX}"
else
    SITE_URL="http://localhost:3000"
fi

# Force HTTPS behind reverse proxy (mu-plugin, works on every boot)
mkdir -p /var/www/html/wp-content/mu-plugins
echo '<?php $_SERVER["HTTPS"] = "on";' > /var/www/html/wp-content/mu-plugins/force-https.php

# Run initial setup if not done yet
if [ ! -f /var/www/html/.montfort_setup_done ]; then
    echo "Running initial setup..."

    # Install WordPress
    wp core install \
        --url="$SITE_URL" \
        --title="Montfort" \
        --admin_user=admin \
        --admin_password=admin \
        --admin_email=admin@example.com \
        --allow-root

    # Install and activate Elementor
    wp plugin install elementor --activate --allow-root

    # Activate our plugin
    wp plugin activate montfort-elements --allow-root

    # Create page with all widgets
    wp eval-file /tmp/setup-page.php --allow-root

    # Set up permalinks
    wp rewrite structure '/%postname%/' --allow-root
    wp rewrite flush --allow-root

    # Mark setup as done
    touch /var/www/html/.montfort_setup_done
    echo "Initial setup complete."
else
    echo "Setup already done, ensuring plugins are active..."
    wp plugin activate elementor montfort-elements --allow-root || true
fi

# Update site URL (every boot, in case sandbox host changed)
wp option update home "$SITE_URL" --allow-root
wp option update siteurl "$SITE_URL" --allow-root

echo "WordPress is ready at $SITE_URL"

# Wait for Apache
wait $WP_PID
