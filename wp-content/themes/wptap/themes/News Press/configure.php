<?php
global $wptap_theme_option_name;
//$theme_option_name = 'newspres_options';

$wptap_theme_option_name = 'newspres_options';


function wptap_theme_init()
{
	global $wptap_theme_option_name;
	$press_default_options = array(
		'homepagetitle'	=> get_bloginfo('name'),
		'titlecolors' => '#FFFFFF',
		'themestyle' => 'black',
		'pages_icon' => 'default',

		'menudisplayhome' => '1',
		'menudisplaycategory' => '1',
		'menudisplaypage' => '1',
		'menudisplaysearch' => '1',
		'menudisplaylogin' => '1',
		
		'h_postdisplayauthor' => '1',
		'h_postdisplaycategory' => '1',
		'h_postdispalytags' => '1',
		'p_postdisplayauthor' => '1',
		'p_postdisplaydate' => '1',
		'p_postdiscategory' => '1',
		'p_postdisplaytags' => '1',
		'pagedisplayauthor' => '1',
		'pagedisplaydate' => '1',
		'pagedisplaycategory' => '1',
		'pagedisplaytags' => '1',

		'socialbookmark' => '1',
		'socialrss' => '1',
		'socialemail' => '1',

		'slideshow' => 'on',
		'slidenumber' => 5,

		'adonposts' => '1',
		'adposition' => 'top'
	);
	
	if(!get_option($wptap_theme_option_name))
		update_option($wptap_theme_option_name, $press_default_options);
	}
?>