<?php
add_action('admin_head', 'wptap_admin_head');
add_action('admin_menu', 'wptap_menu');

function wptap_admin_head()
{
	global $wptap_option_name;

	$file = plugin_basename(__FILE__);
	$fileurl = plugin_dir_url(__FILE__);
	$current_mobile_theme = wptap_option_value($wptap_option_name, 'mobiletheme');

	if(isset($_GET['page']) && ($_GET['page']==$file || $_GET['page']==$current_mobile_theme)) {
		echo '<link rel="stylesheet" href="'.$fileurl.'css/admin.css" type="text/css" media="screen" />';
		echo '<script type="text/javascript" src="'.$fileurl.'js/global.js"></script>';
	}
}

function wptap_menu()
{
	global $wptap_option_name, $pluginname;

	$current_mobile_theme = wptap_option_value($wptap_option_name, 'mobiletheme');

	$parentfile = __FILE__;

	add_menu_page(__($pluginname, 'WPtap'), __($pluginname, 'WPtap'), 9, __FILE__, 'wptap_menu_page');
	add_submenu_page(  __FILE__, __('Mobile Devices', 'WPtap'), __('Mobile Devices', 'WPtap'), 9, __FILE__, 'wptap_menu_page' );

	if(file_exists(WPTAP_ABSPATH . 'themes/' . $current_mobile_theme . '/admin.php')) {
		require_once(WPTAP_ABSPATH . 'themes/' . $current_mobile_theme . '/admin.php');
	}
}

function wptap_menu_page()
{
	global $wpdb, $table_prefix, $wptap_option_name, $pluginname;

	$pluginversion = wptap_version(false);

	$title = __($pluginname . ' ('.$pluginversion.')');
	$actionurl = get_bloginfo('home').'/wp-admin/admin.php?page='.plugin_basename(__FILE__);

	add_filter('theme_root', create_function($stylesheet_or_template, "return dirname(dirname(__FILE__)).'/themes';"));

	$mobile_themes = get_themes();

	$action = isset($_GET['action']) ? $_GET['action'] : '';

	if($_POST && $action) {
		unset($_POST['submit']);
		$data = $wpdb->escape($_POST);
		unset($_POST);

		switch($action) {
			case 'save':
				update_option($wptap_option_name, $data);
				echo '<div id="message" class="updated fade"><p><strong>Settings saved.</strong></p></div>';
			break;

			case 'adddevice':
				$mobiledata['mobile_name'] = $data['mobile_name'];
				$mobiledata['mobile_agent'] = $data['mobile_agent'];
				$mobiledata['is_system_mobile'] = 0;
	
				$wpdb->insert($table_prefix."wptap_mobiles", $mobiledata);
				echo '<div id="message" class="updated fade"><p><strong>Mobile device added.</strong></p></div>';

				unset($mobiledata);
			break;

			case 'delete':
				$mobile_id = isset($_GET['mobileid']) ? intval($_GET['mobileid']) : 0;

				if($mobile_id) {
					$mobile = $wpdb->get_row("SELECT `is_system_mobile` FROM `".$table_prefix."wptap_mobiles` WHERE `mobile_id`=$mobile_id");

					if($mobile->is_system_mobile == '0') {
						$wpdb->query("DELETE FROM `".$table_prefix."wptap_mobiles` WHERE `mobile_id`=$mobile_id");

						echo '<div id="message" class="updated fade"><p><strong>Device delected.</strong></p></div>';
					}

					unset($mobile);
				}

				unset($mobile_id);
			break;
		}

		unset($data);
	}

	$wptap_pages_options = wptap_get_settings($wptap_option_name);
	$mobiles = wptap_get_mobiles();

	extract($wptap_pages_options,  EXTR_OVERWRITE);
?>
<div class="wrap">
	<?php screen_icon('options-general'); ?>
	<h2><?php echo esc_html( $title ); ?></h2>

	<form method="post" action="<?php echo $actionurl; ?>" id="wptapform">
	<div class="metabox-holder">
		<div class="postbox">
			<h3><?php _e('Mobile Devices:') ?></h3>
			
			<div class="wptap-admin-container">
				<?php _e('Current Mobile Theme:'); ?> 
				<select name="mobiletheme">
					<option>Select Mobile Theme</option>
				<?php foreach($mobile_themes as $mobile_theme): ?>
					<option value="<?php echo $mobile_theme['Stylesheet']; ?>" <?php if($mobiletheme==$mobile_theme['Stylesheet']) echo ' selected="selected"'; ?>><?php echo $mobile_theme['Name']; ?></option>
				<?php endforeach; ?>
				</select>
				<input type="checkbox" id="alwayson" name="alwayson" value="1" <?php checked('1', $alwayson); ?>> <?php _e('Always On (Both PC and mobile devices)'); ?> 
			</div>

			<div class="wptap-admin-container">
				<table class="widefat post fixed" cellspacing="0">
					<thead>
						<tr>
							<th class="manage-column" scope="col" width="160">Devices</th>
							<th class="manage-column" scope="col" width="150">Mobile Themes</th>
							<th class="manage-column" scope="col">Operation</th>
						</tr>
					</thead>

					<tfoot>
						<tr>
							<th class="manage-column" scope="col">Devices</th>
							<th class="manage-column" scope="col">Mobile Themes</th>
							<th class="manage-column" scope="col">Operation</th>
						</tr>
					</tfoot>
				
				<?php $rowclass=null; foreach($mobiles as $mobile): ?>
					<tr valign="top" class="<?php echo $rowclass; ?> author-self status-publish iedit">
						<th scope="row"><?php _e($mobile->mobile_name); ?></th>
						<td><input type="checkbox" name="mobiledevices[<?php echo $mobile->mobile_name; ?>]" value="1" <?php checked('1', $mobiledevices[$mobile->mobile_name]); ?> class="mobiledevice-checkbox" /> On</td>
						<td>
						<?php if(!$mobile->is_system_mobile): ?>
							<input type="submit" name="submit" class="button delete" value="<?php esc_attr_e('Delete') ?>" onclick="if(confirm('The mobile device will be permanently deleted from the list. Are you sure?')){jQuery('#wptapform').attr('action', '<?php echo $actionurl; ?>&action=delete&mobileid=<?php echo $mobile->mobile_id; ?>');}else{return false;}" />
						<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</table>
			</div>
		</div>
		<input type="submit" name="submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" onclick="jQuery('#wptapform').attr('action', '<?php echo $actionurl; ?>&action=save');" />
	</div>
	<div class="metabox-holder">
		<div class="postbox">
			<h3><?php _e('Add Devices:') ?></h3>
			
			<div class="wptap-admin-container">
				<p>Device Name: <input type="text" name="mobile_name" id="mobile_name" class="regular-text" /></p>
				<p>Device Agent: <input type="text" name="mobile_agent" id="mobile_agent" class="regular-text" /></p>
			</div>
		</div>
		<input type="submit" name="submit" class="button-primary" value="<?php esc_attr_e('Add Device') ?>" onclick="jQuery('#wptapform').attr('action', '<?php echo $actionurl; ?>&action=adddevice');" />
	</div>
	</form>
</div>
<?php
}
?>