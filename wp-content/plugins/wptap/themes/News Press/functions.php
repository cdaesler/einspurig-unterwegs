<?php
/**
 * WPtap.
 */
$theme_option_name = 'newspres_options';

if(!defined('THEME_URL')) {
	define('THEME_URL', WP_CONTENT_URL .'/'. $wptap_plugin_dir_name .'/'. 'WPtap/themes/Text%20Theme/');
}

/**
 *  intercepting discription at 20 words
 *
 */
// Changing excerpt length
function new_excerpt_length($length) {
return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');

// Changing excerpt more
function new_excerpt_more($more) {
return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*********************** Begin home post meta  Post Setting(home)************************/

/**
 * Weather display author in home post list.
 *
 * @return boolean
 */
function np_if_show_homeauthor()
{
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')) {
		return true;
	}
	return wptap_check_option_value($theme_option_name, 'h_postdisplayauthor', '1');
}

/**
 *  Weather display category in home post list.
 *
 * @return boolean
 */
function np_if_show_homecategory(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'h_postdisplaycategory','1');
}
/**
 * Weather display tags in home post list.
 *
 * @return boolean
 */
function np_if_show_hometags(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'h_postdispalytags','1');
}
/**
 * Weather display date in home post list.
 *
 * @return boolean
 */ 
function np_if_show_homedate(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'h_postdisplaydate','1');
}
/*********************** End home post meta ************************/






/*********************** Begin home menu function ***********************/
/**
 *  Weather display navigation in home
 *	
 *	@return boolean
 */
function np_hom_nav_home(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'menudisplayhome','1');
}
/**
 *  Weather display login in home
 *	
 *	@return boolean
 */
function np_hom_nav_login(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'menudisplaylogin','1');
}
/**
 *  Weather display category in home
 *	
 *	@return boolean
 */
function np_hom_nav_category(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'menudisplaycategory','1');
}
/**
 *  Weather display pages in home
 *	
 *	@return boolean
 */
function np_hom_nav_page(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'menudisplaypage','1');
}
/**
 *  Weather display search in home
 *	
 *	@return boolean
 */
function np_hom_nav_search(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'menudisplaysearch','1');
}
/*********************** End menu function *************************/










/*********************** Begin Pages display    Page Setting *************************/
/** complete **/
 
/**
 * Weather display author on page 
 */
function np_page_author(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'pagedisplayauthor','1');
}

/**
 * Weather display date on page
 */
function np_page_date(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'pagedisplaydate','1');
}

/**
 * Weather display category on page 
 * 
 *@ return boolean 
 */
 function np_page_category(){
	 global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'pagedisplaycategory','1');
 }


/**
 * Weather display Tags on page
 *	
 * @return boolean 
 */
 function np_page_tags(){
	 global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'pagedisplaytags','1');
 }







 /**
  * Weather display adv 
  */
 function page_show_adv(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'adcode','1');
 }
/*********************** End Page Setting *****************************/










/*********************** Begin Post  Setting   	 Post Entry Setting *****************************/
/**  四个方法 **/
/**
* Weather display author in post 
*/
function np_post_author(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'p_postdisplayauthor','1');
}

/**
* Weather display Date in post 
*/
function np_post_date(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'p_postdisplaydate','1');
}

/**
* Weather display date in post 
*/
function np_post_category(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'p_postdisplaydate','1');
}
/**
* Weather display author in post 
*/
function np_post_tag(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'p_postdisplaytags','1');
}

/*********************** End Post  Setting  *****************************/











/******************** Begin Book mark ****************************/
/**
 *	Show face book in home  nv
 *	@return boolean 
 */
function nv_hom_bookmarkfacebook(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'bookmarkfacebook','1');
}

/**
 *	Show  mark witter  in home nv
 *	@return boolean 
 */
function nv_hom_bookmarktwitter(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'bookmarktwitter','1');
}

/**
 *	Show  book mark myspace  in home nv
 *	@return boolean 
 */
function nv_hom_bookmarkmyspace(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'bookmarkmyspace','1');
}

/**
 *	Show  email  in home nv
 *	@return boolean 
 */
function nv_hom_email(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'bookmarktwitter','1');
}

/**
 *	Show  email  in home nv
 *	@return boolean 
 */
function nv_hom_rss(){
	global $theme_option_name;

	if(!function_exists('wptap_check_option_value')){
		return true;
	}

	return wptap_check_option_value($theme_option_name,'bookmarktwitter','1');
}

//#######################################
function wptap_theme_options_page($current_theme) {
	$content = __('No extra Settings available for selected theme.');
	$title = __('Manage ' .$current_theme);

	$html = '<div class="wrap">';
	$html .= '<h2>'.esc_html( $title ).'</h2>';
	$html .= '</div>';
	$html .= '<div style="border:1px #c3c3c3 solid; padding:5px;">';
	$html .=	'<h4>'.$content.'</h4>';
	$html .=	'<p>'.__(' For more infomation, please visit <a href="http://www.iphonemofo.net/index.php/wptap" target="_blank">http://www.iphonemofo.net/index.php/wptap</a>.').'</p>';
	$html .= '</div>';

	echo $html;
}
/**
 *  Get home title color
 *	@return string 
 */
function titlecolors(){
	global $theme_option_name;
	$newspres_setting = wptap_get_settings($theme_option_name);

	if(isset($newspres_setting['titlecolors']) && !empty($newspres_setting['titlecolors'])){
		echo $newspres_setting['titlecolors'];
	}
}
/**
 *  Get home title img
 *	@return string 
 */
function icon_name(){
	global $theme_option_name;
	$newspres_setting = wptap_get_settings($theme_option_name);

	if(isset($newspres_setting['pages_icon']) && !empty($newspres_setting['pages_icon'])){
		echo $newspres_setting['pages_icon'].".png";
	}
}


/**template_url
 *  display advertising on home 
 *
 */
function home_adv(){
	global $theme_option_name;
	$newspres_setting = wptap_get_settings($theme_option_name);
	if(isset($newspres_setting['adcode']) && !empty($newspres_setting['adcode'])){
		echo '<div id="ad_code">';
		echo stripslashes($newspres_setting['adcode']);
		echo '</div>';
	}
}
add_action('home_adv','home_adv');
?>