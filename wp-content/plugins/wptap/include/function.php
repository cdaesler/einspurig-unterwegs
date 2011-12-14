<?php
/**
 * Return options.
 *
 * @param string $option option name
 * @return array
 */
function wptap_get_settings($option_name)
{
	$v = get_option($option_name);

	if (!$v) {
		$v = array();
	}
		
	if (!is_array($v)) {
		$v = unserialize($v);
	}

	return $v;
}

/**
 * Returns a single value options.
 *
 * @param string $option_name option name
 * @param string $key option key
 * @return mixed
 */
function wptap_option_value($option_name, $key)
{
	$options = wptap_get_settings($option_name);

	if(isset($options[$key]))
		return $options[$key];

	return 0;
}

/**
 * Get post custom field value.
 *
 * @param string $name custom field name
 * @return string
 */
function wptap_custom_field($name)
{
	global $post;

	return get_post_meta($post->ID, $name, true);
}

/**
 * Parse request
 */
function wptap_parse_requrest()
{
	if(isset($_GET['wptap'])) {
		switch($_GET['wptap']) {
			case 'upload':
				include(WPTAP_ABSPATH . 'admin/file_upload.php');
			break;
		}
		exit;
	}
}

/**
 * Get plugin version.
 *
 * @param boolean
 * @return string
 */
function wptap_version($echo = true)
{
	if (!function_exists('get_plugin_data'))
	{
		if (file_exists(ABSPATH . 'wp-admin/includes/plugin.php')) {
			require_once(ABSPATH . 'wp-admin/includes/plugin.php');
		} else {
			return "Error!";
		}
	}
		
	$data = get_plugin_data(dirname(dirname(__FILE__)) . '/wptap.php');

	if($echo)
		echo $data['Version'];
	
	return $data['Version'];
}

/**
 * Check option value.
 *
 * @param string $option_name
 * @param string $key
 * @param mixed $value
 * @return boolean
 */
function wptap_check_option_value($option_name, $key, $value)
{
	return wptap_option_value($option_name, $key) === $value;
}

/**
 * Initialize the plugin.
 *
 * @since 1.0
 */
function wptap_install()
{
	global $table_prefix, $wpdb;

	$default_options = array(
		'mobiletheme' => 'News Press',
		'mobiledevices' => array(
			'iPhone/iPod' => '1',
			'Android' => '1',
			'Touch-based BlackBerry' => '1',
			'Nokia S60+' => '1',
			'Apple iPad' => '1',
			'Opera' => '1',
			'Palm' => '1',
			'Windows Smartphone' => '1'
		)
	);

	$table_mobiles = $table_prefix."wptap_mobiles";

	$sql1 = "

	CREATE TABLE IF NOT EXISTS `$table_mobiles` (
		`mobile_id` int(11) NOT NULL auto_increment,
		`mobile_name` varchar(255) NOT NULL default '',
		`mobile_agent` varchar(255) NOT NULL default '',
		`is_system_mobile` tinyint(1) NOT NULL default '0',
		PRIMARY KEY  (mobile_id)
	);";


	require_once(ABSPATH . 'wp-admin/upgrade-functions.php');

	dbDelta($sql1);

	$insert_mobile = "INSERT INTO `$table_mobiles` (`mobile_name`, `mobile_agent`, `is_system_mobile`) 
	VALUES('iPhone/iPod', 'iPhone|iPod|aspen|webmate', 1),('Android','android|dream|cupcake', 1),('Touch-based BlackBerry','blackberry9500|blackberry9530', 1),('Nokia S60+','series60|series40|nokia', 1),('Apple iPad', 'ipad|iPad', 0),	('Opera','opera mini|Opera',0),('Palm','pre\/|palm os|palm|hiptop|avantgo|plucker|xiino|blazer|elaine',0),('Windows Smartphone','iris|3g_t|windows ce|opera mobi|windows ce; smartphone;|windows ce; iemobile',0)";
		
	if(!$wpdb->get_results("SELECT * FROM `$table_mobiles`"))
		$wpdb->query($insert_mobile);

	update_option('wptap_options', $default_options);
}

/**
 * Uninstallation of plugin.
 *
 * @since 1.0
 */
function wptap_uninstall()
{
	global $table_prefix, $wpdb;

	$table_mobiles = $table_prefix."wptap_mobiles";

	$sql = "DROP TABLE `$table_mobiles`";

	$wpdb->query($sql);
}

/**
 * Get mobiles type.
 *
 * @return array
 */
function wptap_get_mobiles()
{
	global $table_prefix, $wpdb;

	$table_mobiles = $table_prefix."wptap_mobiles";

	$sql = "SELECT * FROM `".$table_mobiles."`";

	return $wpdb->get_results($sql);
}

function wptap_switch()
{
	global $is_mobile_device;

	if($is_mobile_device) {
		echo '<div id="now_iphone">';
		echo '<h3><a href="'.get_option('siteurl').'?wptap_view=normal" target="_self"></a></h3>';
		echo '</div>';
	} else {
		echo '<div id="now_pc">';
		echo '<h3><a href="'.get_option('siteurl').'?wptap_view=mobile" target="_self"></a></h3>';
		echo '</div>';
	}
}

/**
 * Include WPtap switch css file.
 */
function wptap_switch_css()
{
	echo '<link rel="stylesheet" href="'.WPTAP_URI.'css/switch-thems.css" type="text/css" media="screen" />';
}

function wptap()
{
	global $wpdb, $table_prefix, $is_mobile_device, $wptap_option_name;

	$key = 'wptap_mobile_' . md5(get_option('siteurl'));
	$alwayson = wptap_option_value($wptap_option_name, 'alwayson');

	if($alwayson) {
		$is_mobile_device = true;
	}

	if(isset($_GET['wptap_view'])) {
		if($_GET['wptap_view'] == 'mobile') {
			setcookie($key, 'mobile', 0);
		} elseif ($_GET['wptap_view'] == 'normal') {
			setcookie($key, 'normal', 0);
		}

		header('Location: ' . get_option('siteurl'));
		die;
	}
	
	$mobile_agents = array();
	$mobiledevices = wptap_option_value($wptap_option_name, 'mobiledevices');
	$container = $_SERVER['HTTP_USER_AGENT'];

	if($mobiledevices != 0 && is_array($mobiledevices)) {
		foreach($mobiledevices as $k => $v) {
			$pages_mobiles = $wpdb->get_row("SELECT `mobile_agent` FROM `".$table_prefix."wptap_mobiles` WHERE `mobile_name`='{$k}'");
			$agent = $pages_mobiles->mobile_agent;

			$mobile_agents = array_merge($mobile_agents, explode('|', $agent));
		}

		foreach($mobile_agents as $mobile_agent) {
			if($mobile_agent) {
				if (eregi($mobile_agent, $container)) {
					$is_mobile_device = true;
					break;
				}
			}
		}
	}

	if(!wptap_option_value($wptap_option_name, 'alwayson')) {
		add_action('wp_head', 'wptap_switch_css');
		add_action('wp_footer', 'wptap_switch');
	}

	if(isset($_COOKIE[$key])) {
		if($_COOKIE[$key] == 'mobile') {
			$is_mobile_device = true;
		} elseif($_COOKIE[$key] == 'normal') {
			$is_mobile_device = false;
		}
	}

	if($is_mobile_device && !is_admin()) {
		add_filter('theme_root', 'wptap_theme_root');
		add_filter('theme_root_uri', 'wptap_theme_root_uri');
		add_filter('stylesheet', "wptap_current_stylesheet");
		add_filter('template', "wptap_current_theme");
	}
}
?>