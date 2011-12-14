<?php
function wptap_current_theme()
{
	global $wptap_option_name;

	return wptap_option_value($wptap_option_name, 'mobiletheme');
}

function wptap_current_stylesheet()
{
	global $wptap_option_name;

	return wptap_option_value($wptap_option_name, 'mobiletheme');
}

function wptap_theme_root()
{
	return WPTAP_ABSPATH . 'themes';
}

function wptap_theme_root_uri()
{
	return WPTAP_URI . 'themes';
}

?>