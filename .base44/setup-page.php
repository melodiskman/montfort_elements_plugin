<?php
/**
 * Creates a Home page with all Montfort Elementor widgets and sets it as the front page.
 * Run via: wp eval-file /tmp/setup-page.php --allow-root
 */

// Find or create the Home page
$home = get_page_by_path('home');
if ($home) {
    $page_id = $home->ID;
    WP_CLI::log("Home page already exists (ID: $page_id), updating widgets.");
} else {
    $page_id = wp_insert_post([
        'post_title'   => 'Home',
        'post_status'   => 'publish',
        'post_type'     => 'page',
        'post_content'  => '',
    ]);
    if (is_wp_error($page_id)) {
        WP_CLI::error('Failed to create page: ' . $page_id->get_error_message());
        return;
    }
    WP_CLI::log("Created Home page (ID: $page_id).");
}

// Widget types in display order
$widgets = [
    'montfort_cursor',
    'montfort_header',
    'montfort_menu',
    'montfort_canvas',
    'montfort_sound_scroll',
    'montfort_hero_transition',
    'montfort_hero_section',
    'montfort_who_we_are',
    'montfort_what_we_do',
    'montfort_global_connectivity',
    'montfort_sustainability',
    'montfort_solutions',
    'montfort_equality',
    'montfort_social',
    'montfort_chapters_navigation',
    'montfort_footer',
];

// Generate Elementor data — one section per widget
$elements = [];
foreach ($widgets as $i => $widget_type) {
    $n = sprintf('%04d', $i);
    $elements[] = [
        'id'       => 'sec' . $n,
        'elType'   => 'section',
        'settings' => [],
        'elements' => [
            [
                'id'       => 'col' . $n,
                'elType'   => 'column',
                'settings' => [],
                'elements' => [
                    [
                        'id'         => 'wid' . $n,
                        'elType'     => 'widget',
                        'widgetType' => $widget_type,
                        'settings'   => [],
                        'elements'   => [],
                    ],
                ],
            ],
        ],
    ];
}

// Set Elementor metadata
update_post_meta($page_id, '_elementor_data', wp_slash(json_encode($elements)));
update_post_meta($page_id, '_elementor_template_type', 'page');
update_post_meta($page_id, '_elementor_edit_mode', 'builder');
update_post_meta($page_id, '_wp_page_template', 'elementor_canvas');

// Set as front page
update_option('show_on_front', 'page');
update_option('page_on_front', $page_id);

WP_CLI::success("Home page (ID: $page_id) configured with " . count($widgets) . " Montfort widgets.");
