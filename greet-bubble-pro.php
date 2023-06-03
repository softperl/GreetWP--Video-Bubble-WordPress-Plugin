<?php
/*
Plugin Name:  Greet Bubble Pro
Plugin URI:   https://themeatelier.net/plugins/greet/
Description:  Professional video bubble plugin for putting videos on your website in a great and fun way.
Version:      1.4.0
Author:       ThemeAtelier
Author URI:   https://themeatelier.net/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  greet
Domain Path:  /languages
*/

// Block Direct access
if (!defined('ABSPATH')) {
    die('You should not access this file directly!.');
}

// Define Constants for direct access alert message.
if (!defined('GREET_ALERT_MSG'))
    define('GREET_ALERT_MSG', esc_html__('You should not access this file directly.!', 'greet'));


// Define constants for plugin directory path.
if (!defined('GREET_DIR_PATH'))
    define('GREET_DIR_PATH', plugin_dir_path(__FILE__));

// Define constants for plugin directory path.
if (!defined('GREET_DIR_URL'))
    define('GREET_DIR_URL', plugin_dir_url(__FILE__));

// Plugin settings in plugin list
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'apd_settings_link');
function apd_settings_link(array $links)
{
    $url = get_admin_url() . "admin.php?page=greet-options#tab=upload-video";
    $settings_link = '<a href="' . esc_url($url) . '">' . esc_html__('Settings', 'greet') . '</a>';
    $links[] = $settings_link;
    return $links;
}

// Require files


require_once dirname(__FILE__) . '/admin/csf/codestar-framework.php'; // CSF include
require_once dirname(__FILE__) . '/admin/greet-bubble-options.php'; // CSF options
require_once dirname(__FILE__) . '/admin/greet-metabox-options.php'; // Metabox options

require_once dirname(__FILE__) . '/frontend/greet-main.php';
