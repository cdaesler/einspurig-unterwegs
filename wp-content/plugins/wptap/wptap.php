<?php
/*
Plugin Name: WPtap News Press
Plugin URI: http://www.wptap.com/index.php/wptap-news-press/
Description: Video Tube theme is specifically designed for video blogging and content sharing on your mobile site. It fully supports iPhone/iPod Touch, Android, and touch-based Blackberry devices.With all WordPress features and customized insertion functions, it makes adding Youtube and MP4 videos to your mobile site exetremely easy!
Author: WPtap Development Team
Version: 2.0
Author URI: http://www.wptap.com/
*/

$pluginname = 'News Press';
$is_mobile_device = false;
$wptap_option_name = 'wptap_options';

if(function_exists('plugin_dir_path'))
	define('WPTAP_ABSPATH', plugin_dir_path(__FILE__));
else
	define('WPTAP_ABSPATH', dirname(__FILE__) . '/');

if(function_exists('plugin_dir_url'))
	define('WPTAP_URI', plugin_dir_url(__FILE__));
else
	define('WPTAP_URI', plugins_url('', __FILE__));

if(version_compare($wp_version, '2.9.0', '>='))
	add_theme_support( 'post-thumbnails' );

include_once(WPTAP_ABSPATH . 'include/function.php');

require_once(WPTAP_ABSPATH . 'include/wptap_theme.php');

add_action('wptap_plugin_init', 'wptap_theme_init');

// Activation of plugin
if(function_exists('register_activation_hook')) {
	register_activation_hook( __FILE__, 'wptap_install' );
}

// Uninstallation of plugin
if(function_exists('register_deactivation_hook')) {
	register_deactivation_hook(plugin_basename(__FILE__), 'wptap_uninstall');
}

require_once(WPTAP_ABSPATH . 'admin/admin.php');

$current_mobile = wptap_option_value($wptap_option_name, 'mobiletheme');
if(file_exists(WPTAP_ABSPATH . 'themes/' . $current_mobile . '/pluginextend.php')) {
	include(WPTAP_ABSPATH . 'themes/' . $current_mobile . '/pluginextend.php');
}
?>