<?php
error_reporting(E_ALL & ~E_NOTICE);  
/*
Plugin Name: Onbile
Plugin URI: http://www.onbile.com/
Description: you wordpress theme for mobile devices.
Version: 1.0
Author:  Daniel Perez, Onbile.com
Author URI: http://www.onbile.com/
*/



load_plugin_textdomain('onbile', false, 'onbile');
if (!class_exists(Services_JSON)){
    require_once("JSON.php");
}
require_once("functions.php");
$json = new Services_JSON();


add_action('admin_menu', 'create_onbile_option');
function create_onbile_option() {

  add_option("Onbile_code",__("Your Onbile code here", 'onbile'));
  add_option("Onbile_apikey",'xxxx');
  add_option("Onbile_categoriesIncludes", "");
  add_option("Onbile_wantComments", "true");
  add_option("Onbile_response", "Not connected");


}
if (!function_exists('add_action')) {
	$wp_root = '../../..';
	if (file_exists($wp_root.'/wp-load.php')) {
		require_once($wp_root.'/wp-load.php');
	} else {
		require_once($wp_root.'/wp-config.php');
	}
}

add_action('admin_menu', 'onbile_menu');
function onbile_menu() {
    if (function_exists('add_menu_page')) {
		add_menu_page(__('Onbile', 'onbile'), __('Onbile', 'onbile'), 'manage_onbile', 'onbile/configonbile.php', '', plugins_url('meenews/tv_newsletter.png'));
	}

    if (function_exists('add_submenu_page')) {
        add_submenu_page('onbile/configonbile.php', __('Configuration', 'onbile'), __('Configuration', 'onbile'), 'manage_onbile', 'onbile/generalconfiguration.php');

    }

    $role = get_role('administrator');
	if(!$role->has_cap('manage_onbile')) {
		$role->add_cap('manage_onbile');
    }
}
add_action('wp_head', 'addOnbileCode');
### Function: Load The meenews widget


function addOnbileCode(){
    $Onbilecode = get_option("Onbile_code");
    echo '<script language="javascript" type="text/javascript" src="http://www.onbile.com/websites/'.$Onbilecode.'"></script> ';
}
function Onbile_create_post_string($method, $params) {
    $params['method'] = $method;
    $params['call_id'] = microtime(true);

    $post_params = array();
    foreach ($params as $key => $val) {
      if (is_array($val)) $val = implode(',', $val);
      $post_params[] = $key.'='.urlencode($val);
    }

    return implode('&', $post_params);

}
function Onbile_post_request($method, $params) {
    $server_addr = "http://www.onbile.com/connection/index.php";
   
    $post_string = Onbile_create_post_string($method, $params);

    if (function_exists('curl_init')) {
      // Use CURL if installed...
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $server_addr);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_USERAGENT, 'Onbile Api v1.0 (curl) ' . phpversion());
      $result = curl_exec($ch);
      curl_close($ch);
    } else {
      // Non-CURL based version...
      $context =
        array('http' =>
              array('method' => 'POST',
                    'header' => 'Content-type: application/x-www-form-urlencoded'."\r\n".
                                'User-Agent: Onbile Api v1.0  (non-curl) '.phpversion()."\r\n".
                                'Content-length: ' . strlen($post_string),
                    'content' => $post_string));
      $contextid=stream_context_create($context);
      $sock=fopen($server_addr, 'r', false, $contextid);
      if ($sock) {
        $result='';
        while (!feof($sock))
          $result.=fgets($sock, 4096);

        fclose($sock);
      }
    }
    return $result;
  }