# Montfort Elementor Widgets

## Overview
WordPress plugin providing 16 custom Elementor widgets for the Montfort Group website.

## Stack
- WordPress (latest) with PHP 8.2 on Apache
- MySQL 8.0
- Elementor (free, installed automatically on first boot)

## Running
```bash
docker compose -f docker-compose.base44.yml up -d
```
The first boot auto-installs WordPress, Elementor, and creates a Home page with all 16 widgets.

## WordPress Admin
- URL: `/wp-admin`
- Username: `admin` / Password: `admin`

## Development
- Plugin source is bind-mounted; PHP changes appear on page reload (no build step).
- CSS: `montfort-elementor-widgets/assets/css/montfort-styles.css`
- Widgets: `montfort-elementor-widgets/widgets/*.php` (each extends `\Elementor\Widget_Base`)
- Main plugin file: `montfort-elementor-widgets/montfort-elements.php`

## Setup Details
The WordPress container entrypoint (`.base44/setup-wp.sh`) handles:
1. WordPress installation
2. Elementor download + activation
3. Plugin activation
4. Home page creation with all 16 widgets (via `.base44/setup-page.php`)
5. Pretty permalinks

A flag file (`.montfort_setup_done` in the wp_data volume) prevents re-running setup on restart.
The site URL is updated on every boot to match the current sandbox public host.
