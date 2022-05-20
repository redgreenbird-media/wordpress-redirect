<?php

namespace RGB;

/**
 * Plugin Name:       Plugin Name
 * Plugin URI:        https://github.com/redgreenbird-media/[pluginname]
 * Description:       Description
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            redgreenbird GmbH
 * Author URI:        https://redgreenbird.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/redgreenbird-media/wordpress-team-members
 * Text Domain:       [pluginname]
 * Domain Path:       /languages
 */


// Define File Path
define('PLUGIN_PATH', dirname(__FILE__) . "/");
define('PLUGIN_HTTP_PATH', plugin_dir_url(__FILE__));

// Import all classes
foreach (glob(PLUGIN_PATH . "classes/*.php") as $filename) {
    include($filename);
}

// Include Dependencies
include_dependencies();

// Initialize the Plugin


function include_dependencies()
{
    // Bootstrap CSS
    wp_register_style(
        'prefix_bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'
    );
    wp_enqueue_style('prefix_bootstrap');

    // Bootstrap JS
    wp_register_script(
        'prefix_bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'
    );
    wp_enqueue_script('prefix_bootstrap');

    // Own CSS
    wp_register_style(
        'team-member',
        \PLUGIN_HTTP_PATH . 'public/css/team-member.css'
    );
    wp_enqueue_style('team-member');
}
