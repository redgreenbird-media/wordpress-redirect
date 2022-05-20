<?php

namespace redgreenbird;

use redgreenbird\Redirector;
use redgreenbird\SettingsManager;

/**
 * Plugin Name:       Redirector
 * Plugin URI:        https://github.com/redgreenbird-media/wordpress-redirect
 * Description:       Redirect non logged in user to specific page.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            redgreenbird GmbH
 * Author URI:        https://redgreenbird.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/redgreenbird-media/wordpress-redirect
 * Text Domain:       redirector
 * Domain Path:       /languages
 */


// Define File Path
if (!\defined('PLUGIN_PATH_REDIRECTOR'))
    define('PLUGIN_PATH_REDIRECTOR', dirname(__FILE__) . "/");
if (!\defined('PLUGIN_HTTP_PATH_REDIRECTOR'))
    define('PLUGIN_HTTP_PATH_REDIRECTOR', plugin_dir_url(__FILE__));

// Import all classes
foreach (glob(PLUGIN_PATH_REDIRECTOR . "classes/*.php") as $filename) {
    include($filename);
}

// Include Dependencies
include_dependencies();

// Initialize the Plugin
$redirector = new Redirector;
$settings = new SettingsManager;


function include_dependencies()
{
}
