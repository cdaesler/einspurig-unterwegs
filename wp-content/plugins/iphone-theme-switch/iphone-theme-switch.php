<?php
/*
Plugin Name: iPhone theme switch
Plugin URI: http://wordpress.org/extend/plugins/iphone-theme-switch/
Description: This plugin detects if your site is being viewed by iPhone (or iPod) and switches to an selected iPhone theme.
Version: 0.54
Author: Jonas Vorwerk
Author URI: http://www.jonasvorwerk.com/
*/
session_start();

if($_GET['mobile'] == "off"){
	$_SESSION[$JVmobile] = "off"; 
} else if($_GET['mobile'] == "on"){
	unset( $_SESSION[$JVmobile] ); 
}

if ((strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPod')) &&  !isset($_SESSION[$sessVar]) ){ 
	add_filter('stylesheet', 'getTemplateStyle');
	add_filter('template', 'getTemplateStyle');
} 

function getTemplateStyle(){
	$iphonetheme =  get_option('iphonetheme');
    $themes = get_themes();
	foreach ($themes as $theme_data) {
	  if ($theme_data['Name'] == $iphonetheme) {
	      return $theme_data['Stylesheet'];
	  }
	}	
}

function its_admin_actions() { 
	if (current_user_can('manage_options'))  {
		add_theme_page("iPhone theme switch", "iPhone theme switch", 'manage_options', "iPhone-theme-switch", "its_show_admin");
	}
} 

function its_show_admin(){
	include('iphone-theme-switch_admin.php'); 
}

add_action('admin_menu', 'its_admin_actions'); 

?>