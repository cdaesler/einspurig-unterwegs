<?php
if(file_exists(dirname(__FILE__) . '/configure.php')) {
	include_once (dirname(__FILE__) . '/configure.php');
}

if(!get_option($wptap_theme_option_name)) {
	do_action('wptap_plugin_init');
}

add_action( 'setup_theme', 'wptap_parse_requrest' );

// if not ie Browsers
wptap();

if(!$is_mobile_device) {
	function vt_filter_video_shortcode($content)
	{
		$content = preg_replace('/\[wptap_insert_video\t?(.*)?\]/', '', $content);

		return $content;
	}
	add_filter('the_content_rss', 'vt_filter_video_shortcode');
	add_filter('the_content', 'vt_filter_video_shortcode');
}
?>