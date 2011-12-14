<?php

/*
$Id: baap-mobile-version.php 320618 2010-12-08 19:25:40Z BAAP $

$URL: http://plugins.svn.wordpress.org/baap-mobile-version/trunk/baap-mobile-version.php $

Copyright (c) 2009 BAAP, portions mTLD Top Level Domain Limited, BAAP, Forum Nokia

Online support: http://wordpress.org/extend/plugins/baap-mobile-version/

This file is part of the BAAP Mobile Version.

The BAAP Mobile Version is Licensed under the Apache License, Version 2.0
(the "License"); you may not use this file except in compliance with the
License.

You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software distributed
under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR
CONDITIONS OF ANY KIND, either express or implied. See the License for the
specific language governing permissions and limitations under the License.
*/

/*
Plugin Name: BAAP Mobile Version
Plugin URI: http://wordpress.org/extend/plugins/baap-mobile-version/
Description: <strong>The BAAP Mobile Version is a complete toolkit to help mobilize your WordPress site and blog.</strong> It includes a <a href='themes.php?page=wpmp_switcher_admin'>mobile switcher</a>, <a href='themes.php?page=wpmp_theme_widget_admin'>filtered widgets</a>, and content adaptation for mobile device characteristics. Activating this plugin will also install a selection of mobile <a href='themes.php?page=wpmp_theme_theme_admin'>themes</a> by <a href='http://BAAP.co.uk'>BAAP</a>, a top UK mobile design team, and Forum Nokia. These adapt to different families of devices, such as Nokia and WebKit browsers (including Android, iPhone and Palm). If <a href='options-general.php?page=wpmp_mpexo_admin'>enabled</a>, your site will be listed on <a href='http://www.mpexo.com'>mpexo</a>, a directory of mobile-friendly blogs. Also check out <a href='http://wordpress.org/extend/plugins/baap-mobile-version/' target='_blank'>the documentation</a> and <a href='http://www.wordpress.org/tags/baap-mobile-version' target='_blank'>the forums</a>. If you like the plugin, please rate us on the <a href='http://wordpress.org/extend/plugins/baap-mobile-version/'>WordPress directory</a>. And if you don't, let us know how we can improve it!
Version: 2.0
Author: BAAP
Author URI: http://http://howtoinstallwordpressplugin.com/wpmobile_plugin
*/

define('WPMP_VERSION', '2.0');

// you could disable sub-plugins here
global $wpmp_plugins;
$wpmp_plugins = array(
  "wpmp_switcher",
  "wpmp_barcode",
  "wpmp_ads",
  "wpmp_deviceatlas",
  "wpmp_transcoder",
  "wpmp_analytics",
  "wpmp_mpexo",
);

// Pre-2.6 compatibility
if (!defined('WP_CONTENT_URL')) {
  define('WP_CONTENT_URL', get_option('siteurl' . '/wp-content'));
}
if (!defined('WP_CONTENT_DIR')) {
  define('WP_CONTENT_DIR', ABSPATH . 'wp-content');
}
if (!defined('WP_PLUGIN_URL')) {
  define('WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins');
}
if (!defined('WP_PLUGIN_DIR')) {
  define('WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins');
}

if(!$warning=get_option('wpmp_warning')) {
  foreach($wpmp_plugins as $wpmp_plugin) {
    if (file_exists($wpmp_plugin_file = dirname(__FILE__) . "/plugins/$wpmp_plugin/$wpmp_plugin.php")) {
      include_once($wpmp_plugin_file);
    }
  }
}

register_activation_hook('baap-mobile-version/baap-mobile-version.php', 'baap_mobile_version_activate');
register_deactivation_hook('baap-mobile-version/baap-mobile-version.php', 'baap_mobile_version_deactivate');

add_action('init', 'baap_mobile_version_init');
add_action('admin_notices', 'baap_mobile_version_admin_notices');
add_action('admin_menu', 'baap_mobile_version_admin_menu');
add_action('send_headers', 'baap_mobile_version_send_headers');
add_filter('get_the_generator_xhtml', 'baap_mobile_version_generator');
add_filter('get_the_generator_html', 'baap_mobile_version_generator');

add_filter('plugin_action_links', 'baap_mobile_version_plugin_action_links', 10, 3);


function baap_mobile_version_init() {
  $plugin_dir = basename(dirname(__FILE__));
  load_plugin_textdomain('wpmp', 'wp-content/plugins/baap-mobile-version', 'baap-mobile-version');
}


function baap_mobile_version_send_headers($wp) {
  @header("X-Mobilized-By: BAAP Mobile Version " . WPMP_VERSION);
}
function baap_mobile_version_generator($generator) {
  return '<meta name="generator" content="WordPress ' . get_bloginfo( 'version' ) . ', fitted with the BAAP Mobile Version ' . WPMP_VERSION . '" />';
}


function baap_mobile_version_plugin_action_links($action_links, $plugin_file, $plugin_info) {
  $this_file = basename(__FILE__);
  if(substr($plugin_file, -strlen($this_file))==$this_file) {
    $new_action_links = array(
      "<a href='themes.php?page=wpmp_switcher_admin'>Switcher</a>",
      "<a href='themes.php?page=wpmp_theme_theme_admin'>Themes</a> ",
      "<br /><a href='themes.php?page=wpmp_theme_widget_admin'>Widgets</a>",
      "<a href='edit.php?page=wpmp_analytics_admin'>Analytics</a> ",
      "<br /><a href='options-general.php?page=wpmp_mpexo_admin'>mpexo</a>",
    );
    foreach($action_links as $action_link) {
      if (stripos($action_link, '>Edit<')===false) {
        if (stripos($action_link, '>Deactivate<')!==false) {
          #$new_action_links[] = '<br />' . $action_link;
          $new_action_links[] = $action_link;
        } else {
          $new_action_links[] = $action_link;
        }
      }
    }
    return $new_action_links;
  }
  return $action_links;
}

function baap_mobile_version_admin_notices() {
  if($warning=get_option('wpmp_warning')) {
    print "<div class='error'><p><strong style='color:#770000'>";
    print __("Critical BAAP Mobile Version Issue", 'wpmp');
    print "</strong></p><p>$warning</p><p><small>(";
    print __('Deactivate and re-activate the BAAP Mobile Version once resolved.', 'wpmp');
    print ")</small></p></div>";
  }
  if($flash=get_option('wpmp_flash')) {
    print "<div class='error'><p><strong style='color:#770000'>";
    print __('Important BAAP Mobile Version Notice', 'wpmp');
    print "</strong></p><p>$flash</p></div>";
    update_option('wpmp_flash', '');
  }
}

function baap_mobile_version_admin_menu() {
  if (isset($_POST['baap_mobile_version_force_copy_theme'])){  //user has forced theme upgrade
    update_option('wpmp_warning', '');
    update_option('wpmp_flash', '');
    baap_mobile_version_directory_copy_themes(dirname(__FILE__) . "/themes", get_theme_root(), false);
    wp_redirect('plugins.php');
    #$redirect = explode("?", $_SERVER['REQUEST_URI']);
    #wp_redirect($redirect[0]);
  }
}

function baap_mobile_version_activate() {
  update_option('wpmp_warning', '');
  update_option('wpmp_flash', '');
  if (baap_mobile_version_readiness_audit()) {
    baap_mobile_version_directory_copy_themes(dirname(__FILE__) . "/themes", get_theme_root());
    baap_mobile_version_hook('activate');
  }
}

function baap_mobile_version_readiness_audit() {
  $ready = true;
  $why_not = array();

  if (version_compare(PHP_VERSION, '6.0.0', '>=')) {
    $ready = false;
    $why_not[] = '<strong>' . __('PHP version not supported.', 'wpmp') . '</strong> ' . sprintf(__('PHP versions 6 and greater are not yet supported by this plugin, and you have version %s', 'wpmp'), PHP_VERSION);
  }

  $cache_dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . 'wpmp_transcoder' . DIRECTORY_SEPARATOR . 'c';
  $cache_does = '';
  if (!file_exists($cache_dir)) {
  	$cache_does = __("That directory does not exist.", 'wpmp');
  } elseif (!is_writable($cache_dir)) {
  	$cache_does = __("That directory is not writable.", 'wpmp');
  } elseif (!is_executable($cache_dir) && DIRECTORY_SEPARATOR=='/') {
  	$cache_does = __("That directory is not executable.", 'wpmp');
  }
  if($cache_does!='') {
    $ready = false;
    $why_not[] = sprintf(__('<strong>Not able to cache images</strong> to %s.', 'wpmp'), $cache_dir) . ' ' . $cache_does . ' ' . __('Please ensure that the web server has write- and execute-access to it.', 'wpmp');
  }

  $theme_dir = str_replace('/', DIRECTORY_SEPARATOR, get_theme_root());
  $theme_does = '';
  if (!file_exists($theme_dir)) {
  	$theme_does = __("That directory does not exist.", 'wpmp');
  } elseif (!is_writable($theme_dir)) {
  	$theme_does = __("That directory is not writable.", 'wpmp');
  } elseif (!is_executable($theme_dir) && DIRECTORY_SEPARATOR=='/') {
  	$theme_does = __("That directory is not executable.", 'wpmp');
  }
  if($theme_does!='') {
    $ready = false;
    $why_not[] = sprintf(__('<strong>Not able to install theme files</strong> to %s.', 'wpmp'), $theme_dir) . ' ' . $theme_does . ' ' . __('Please ensure that the web server has write- and execute-access to it.', 'wpmp');
  }

  if (!$ready) {
    update_option('wpmp_warning', join("<hr />", $why_not));
  }
  return $ready;
}


function baap_mobile_version_directory_copy_themes($source_dir, $destination_dir, $benign=true) {
  if(file_exists($destination_dir)) {
  	$dir_does = '';
	  if (!is_writable($destination_dir)) {
	  	$dir_does = "That directory is not writable.";
	  } elseif (!is_executable($destination_dir) && DIRECTORY_SEPARATOR=='/') {
	  	$dir_does = "That directory is not executable.";
	  }
	  if($dir_does!='') {
      update_option('wpmp_warning', sprintf(__('<strong>Could not install theme files</strong> to ', 'wpmp'), $destination_dir) . ' ' . $dir_does . ' ' . __('Please ensure that the web server has write- and execute-access to it.', 'wpmp'));
      return;
    }
  } elseif (!is_dir($destination_dir)) {
    if ($destination_dir[0] != ".") {
	    mkdir($destination_dir);
	  }
  }

  $dir_handle = opendir($source_dir);
  while($source_file = readdir($dir_handle)) {
    if ($source_file[0] == ".") {
      continue;
    }
    if (file_exists($destination_child = "$destination_dir/$source_file") && $benign) {
      update_option('wpmp_flash',
                    __("<strong>Existing Mobile Pack theme files were found</strong>, but they were not overwritten by the plugin activation.", 'wpmp') .
                    "</p><p>" .
                    sprintf(__("You are advised to upgrade your Mobile Pack theme files to version %s", 'wpmp'), WPMP_VERSION) .
                    "</p><p>" .
                    __("(<strong>NB</strong>: take precautions if you have manually edited any existing Mobile Pack theme files - your changes will now need to be re-applied.)", 'wpmp') .
                    "</p><br /><form method='post' action='" . $_SERVER['REQUEST_URI'] . "'>".
                    "<input type='submit' name='baap_mobile_version_force_copy_theme' value='" .
                    __('Yes, please - upgrade all my themes for me (recommended)', 'wpmp') .
                    "' />&nbsp;&nbsp;".
                    "<input type='submit' value='" .
                    __('No, thanks - leave my themes as they are', 'wpmp') .
                    "' />".
                    "</form><p>");
      continue;
    }
    if (is_dir($source_child = "$source_dir/$source_file")) {
      baap_mobile_version_directory_copy_themes($source_child, $destination_child, $benign);
      continue;
    }

    if (file_exists($destination_child) && !is_writable($destination_child)) {
      update_option('wpmp_warning', sprintf(__('<strong>Could not install file</strong> to %s.', 'wpmp'), $destination_child) . ' ' . __('Please ensure that the web server has write- access to that file.', 'wpmp'));
      continue;
    }
    copy($source_child, $destination_child);
  }
  closedir($dir_handle);
}

function baap_mobile_version_deactivate() {
  baap_mobile_version_hook('deactivate');
}

function baap_mobile_version_hook($action) {
  global $wpmp_plugins;
  foreach($wpmp_plugins as $wpmp_plugin) {
    if (function_exists($function = $wpmp_plugin . "_" . $action)) {
      call_user_func($function);
    }
  }
}




?>
