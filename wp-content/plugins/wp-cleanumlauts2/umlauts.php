<?php
/*
Plugin Name: WP-CleanUmlauts2
Plugin URI: http://1manfactory.com/umlauts
Description: Converts German umlauts for permalinks, post, comments, feeds automatically. Wandelt Umlaute automatisch für Permalinks, Posting, Kommentare, Feeds.
Version: 1.5.0
Author: J&uuml;rgen Schulze
Author URI: http://1manfactory.com
License: GPL2
*/

/*  Copyright 2011  Juergen Schulze  (email : 1manfactory@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<?php

// some definition we will use
define( 'UMLAUTS_PUGIN_NAME', 'WP-CleanUmlauts2');
define( 'UMLAUTS_PLUGIN_DIRECTORY', 'WP-CleanUmlauts2');
define( 'UMLAUTS_CURRENT_VERSION', '1.5.0' );
define( 'UMLAUTS_CURRENT_BUILD', '2' );
define( 'UMLAUTS_DEBUG', false);		# never use debug mode on productive systems
// i18n plugin domain for language files
define( 'UMLAUTS_I18N_DOMAIN', 'umlauts' );

require('umlauts_core.php');
require('umlauts_settings_page.php');

// load language files
function umlauts_set_lang_file() {
	# set the language file
	$currentLocale = get_locale();
	if(!empty($currentLocale)) {
		$moFile = dirname(__FILE__) . "/lang/" . $currentLocale . ".mo";
		if (@file_exists($moFile) && is_readable($moFile)) {
			load_textdomain(EMU2_I18N_DOMAIN, $moFile);
		}

	}
}
umlauts_set_lang_file();

// create custom plugin settings menu
add_action( 'admin_menu', 'umlauts_create_menu' );

//call register settings function
add_action( 'admin_init', 'umlauts_register_settings' );

register_activation_hook(__FILE__, 'umlauts_activate');
register_deactivation_hook(__FILE__, 'umlauts_deactivate');
register_uninstall_hook(__FILE__, 'umlauts_uninstall');

// activating the default values
function umlauts_activate() {
	# permalinks, feeds, posts, comments
	$new_options = array(
		'activate_permalinks' => true,
		'activate_feeds' => false,
		'activate_posts' => false,
		'activate_comments' => false
	);	
	add_option('umlauts_options', $new_options);
}

// deactivating
function umlauts_deactivate() {
	// needed for proper deletion of every option
	delete_option('umlauts_options');
}

// uninstalling
function umlauts_uninstall() {
	# delete all data stored
	delete_option('umlauts_options');
}

function umlauts_create_menu() {

	// create options menu page
	add_options_page(__("Umlauts", EMU2_I18N_DOMAIN), __("Umlauts", EMU2_I18N_DOMAIN), 'manage_options', UMLAUTS_PLUGIN_DIRECTORY, 'umlauts_options_page');

}

function umlauts_register_settings() {
	// register settings
	register_setting( 'umlauts_options', 'umlauts_options', 'umlauts_options_validate' );
	add_settings_section('umlauts_main', __('Main Settings', EMU2_I18N_DOMAIN), 'umlauts_section_text', 'plugin');
	// add input fields
	add_settings_field('umlauts_activate_permalinks',__('Convert Pemalinks', EMU2_I18N_DOMAIN).'<br />ä->ae ... ß->ss' , 'umlauts_permalinks_string', 'plugin', 'umlauts_main');
	add_settings_field('umlauts_activate_feeds',__('Convert Feeds', EMU2_I18N_DOMAIN).'<br />ä->&amp;auml; ... ß->&ampszlig;' , 'umlauts_feeds_string', 'plugin', 'umlauts_main');
	add_settings_field('umlauts_activate_posts', __('Convert Posts', EMU2_I18N_DOMAIN).'<br />ä->&amp;auml; ... ß->&ampszlig;', 'umlauts_posts_string', 'plugin', 'umlauts_main');
	add_settings_field('umlauts_activate_comments',__('Convert Comments', EMU2_I18N_DOMAIN).'<br />ä->&amp;auml; ... ß->&ampszlig;' , 'umlauts_comments_string', 'plugin', 'umlauts_main');
}

function umlauts_checked($check_value) {
	if (isset($check_value) && $check_value==true) return 'checked="checked"';
}

function umlauts_section_text() {
	print '<p>'.__('Choose where you want the German umlauts to be converted.', EMU2_I18N_DOMAIN).'</p>';
}

function umlauts_permalinks_string() {
	$options = get_option('umlauts_options');
	print '<br /><input id="umlauts_activate_permalinks" name="umlauts_options[activate_permalinks]" type="checkbox" '.umlauts_checked($options['activate_permalinks']).' />';
}

function umlauts_feeds_string() {
	$options = get_option('umlauts_options');
	print '<br /><input id="umlauts_activate_feeds" name="umlauts_options[activate_feeds]" type="checkbox" '.umlauts_checked($options['activate_feeds']).' />';
}

function umlauts_posts_string() {
	$options = get_option('umlauts_options');
	print '<br /><input id="umlauts_activate_posts" name="umlauts_options[activate_posts]" type="checkbox" '.umlauts_checked($options['activate_posts']).' />';
}

function umlauts_comments_string() {
	$options = get_option('umlauts_options');
	print '<br /><input id="umlauts_activate_comments" name="umlauts_options[activate_comments]" type="checkbox" '.umlauts_checked($options['activate_comments']).' />';
}

// validate our options
function umlauts_options_validate($input) {
	$newinput['error']=false;
	$newinput['message']='';
	$newinput['activate_permalinks'] = trim($input['activate_permalinks']);
	$newinput['activate_feeds'] = trim($input['activate_feeds']);
	$newinput['activate_posts'] = trim($input['activate_posts']);
	$newinput['activate_comments'] = trim($input['activate_comments']);
	if ( ($newinput['activate_permalinks'] && $newinput['activate_permalinks']!="on") ||
		 ($newinput['activate_feeds'] && $newinput['activate_feeds']!="on") ||
		 ($newinput['activate_posts'] && $newinput['activate_posts']!="on") ||
		 ($newinput['activate_comments'] && $newinput['activate_comments']!="on")
	) {
		$newinput['message']='Wrong values';
		$newinput['error']=true;
	}
	return $newinput;
}

// check if debug is activated
function umlauts_debug() {
	# only run debug on localhost
	if ($_SERVER["HTTP_HOST"]=="localhost" && defined('UMLAUTS_DEBUG') && UMLAUTS_DEBUG==true) return true;
}
?>