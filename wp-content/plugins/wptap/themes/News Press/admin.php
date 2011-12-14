<?php
add_submenu_page($parentfile, __('Theme Settings', 'WPtap'), __('Theme Settings', 'WPtap'), 10, sanitize_file_name($current_mobile_theme), 'press_theme');

add_action('admin_head','pages_admin_head');
function pages_admin_head(){
	if(isset($_GET['page'])&& $_GET['page'] == 'News-Press'){
		echo "<link rel='stylesheet' href='".plugins_url('', __FILE__)."/css/admin.css' type='text/css' media='all' />";
		echo "<link rel='stylesheet' id='colors-css'  href='".get_bloginfo('wpurl')."/wp-admin/css/farbtastic.css' type='text/css' media='all' />";
		echo '<script type="text/javascript" src="' . get_bloginfo('wpurl') . '/wp-admin/js/farbtastic.js"></script>';
		echo '<script type="text/javascript" src="' . plugins_url('', __FILE__) . '/scripts/ajax_upload_3.9.js"></script>';
		echo '<script type="text/javascript" src="' . plugins_url('', __FILE__) . '/scripts/admin.js"></script>';
	}
}
/**
 * get News Press Icon
 *
 *@ return Array 
 */
function press_get_icon(){
	$icon_root =  plugin_dir_path(__FILE__).'images/icons/';  // get icons folder
	$plugin_url = plugin_dir_url(__FILE__);	// get icons url
	$icons = array();
	if(is_dir($icon_root)){
		if($hh = opendir($icon_root)){
			while(false !== ($icon = readdir($hh))){
				if(substr($icon,-4) == '.png'){
					$icons[substr($icon,0,-4)] = $plugin_url.'images/icons/'.$icon;
				}
			}
		}
	}
	return $icons;
}

/**
 * get icons ---desk logo
 */
function press_icon(){
?>
<div class="icon-list"><p>
	<?php $resevi_icon = press_get_icon(); 
		$i=1; foreach($resevi_icon as $name=>$path ):
	?>
		<img id="icon-<?php echo $name; ?>" style="width:30px;height:30px;" src="<?php echo $path ;?>" alt="<?php echo $name; ?>"/>
		<?php if($i%7==0) echo "</p><p>"; ?>
	<?php 	$i++; endforeach;	?>
</p></div>
<?php 
}

/**
 *	Add admin manager theme 
 */
function press_theme(){

	global $wpdb;
	$title = __("Theme Settings");
	if($_POST) {
		unset($_POST['submit']);		
		$adcode = $_POST['adcode'];
		$data = $wpdb->escape($_POST);
		$data['adcode'] = $adcode;
		unset($_POST, $adcode);
		update_option('newspres_options', $data);		
	}
	// this item save as db,and item name is this theme public name 
	$newspres_options = wptap_get_settings('newspres_options');
	//  circularly acquire the data of newspres_options and present it in the form of array
	extract($newspres_options,  EXTR_OVERWRITE);
?>	
<div class="wrap">
	<?php screen_icon('options-general'); ?>
	<h2><?php echo esc_html( $title); ?></h2>
	<form method="post" action="<?php echo $actionurl; ?>" id="newspresform">

	<div class="metabox-holder">
		<div class="postbox">
			<h3><?php _e('Global Settings') ?></h3>
			<div class="wptap-admin-container">
				<table class="form-table">
					<!--   title name, color & logo  -->
					<tr valign="top">
						<th scope="row"><label for="homepagetitle"><?php _e('Home Page Title:'); ?></label></th>
						<td><input type="text" class="regular-text" value="<?php echo $homepagetitle; ?>" id="homepagetitle" name="homepagetitle" /></td>
					</tr>
					<!--   End name ###-->
					<tr valign="top">
						<th scope="row"><label for="titlecolor"><?php _e('Title Text Color:'); ?></label></th>
						<td><input type="text" class="small-text" value="<?php echo $titlecolors; ?>" id="titlecolor" name="titlecolors" /><div id="colorpicker" name="titlecolor"></div></td>
					</tr>
					<!--   End title color ### -->
					<tr valign="top">
						<th scope="row"><label for="siteicon"><?php _e('Site Icon:'); ?><br><span style="color:#B83B3B;"><?php _e('(This must be a png file with size less than 256k)'); ?></span></label></th>
						<td>
							<div id="upload_pages_button" style="float:left;width:150px;"></div>
							<img src="<?php echo plugin_dir_url(__FILE__) ?>/images/icons/<?php echo $pages_icon.'.png'; ?>" id="current_logo_icon" style="vertical-align:middle;" />
							<input type="hidden" name="pages_icon" id="pages_icon" value="<?php echo $pages_icon; ?>">
							<?php press_icon(); ?>
						</td>
					</tr>
					<!--     other mobile  icons  response     -->
					<tr valign="top">
						<th scope="row"></th>
						<td>
							<div id="upload_pages_response"></div><div id="upload_pages_progress" style="display:none">
								<img src="<?php echo plugin_dir_url(__FILE__) . '/images/loading.gif'; ?>" alt="" />
							</div>
						</td>
					</tr>
					<!--     iPhone disk icons     -->
					<tr valign="top">
						<th scope="row"><label for="iphonedesktopicon"><?php _e('iPhone Desktop Icon:'); ?></label><br /><span style="color:#B83B3B;"><?php _e('(57*57 png file)'); ?></span></th>
						<td>
							<div id="upload_button" style="float:left;width:150px;"></div>
								<?php if(file_exists(ABSPATH . 'apple-touch-icon.png')) { echo '<img src="'.get_option('home').'/apple-touch-icon.png" alt="" />';} ?>
						</td>
					</tr>
					<!--     iPhone  icons  response     -->
					<tr valign="top">
						<th scope="row"></th>
						<td>
						<div id="upload_response"></div><div id="upload_progress" style="display:none">
							<img src="<?php echo plugin_dir_url(__FILE__) . '/images/loading.gif'; ?>" alt="" />
						</div>
						</td>
					</tr>
					
					<!--  Begin theme style -->
					<tr valign="top">
					    <th scope="row"><label for="themestyle"><?php _e('Theme Style:'); ?></label></th>
						<td>
							<?php $themestyles = array('Blooming Lavender', 'Miss Jade', 'Naughty Pumpkin', 'Persian Rose', 'Rocky Blue');?>
							<select name="themestyle" id="themestyle">
								<option value="Black">Black(Default)</option>
								<?php foreach($themestyles as $style): ?>
								<option value="<?php echo $style; ?>" <?php if($themestyle==$style) echo 'selected="selected"'; ?>><?php echo $style; ?></option>
								<?php endforeach; ?>
								
							</select>
						</td>
					</tr>		
					<!--# End theme style/ -->
				</table>
			</div>
		</div>
	</div>

	<!--  Begin Booker mark -->
	<div class="metabox-holder">
		<div class="postbox">
			<h3><?php _e('Bookmark Setting') ?></h3>
			
			<div class="wptap-admin-container">
				<table class="form-table" >
					<tr valign="top">
						<th scope="row" style="width:120px;">
						<label for="Twitter"><?php _e('Display \'Twitter\':'); ?></label></th>
						<td><input type="checkbox" value="1" id="bookmarktwitter" name="bookmarktwitter" <?php checked('1', $bookmarktwitter); ?>/></td>

						<th scope="row" style="width:120px;"><label for="Facebook"><?php _e('Display \'Facebook\':'); ?></label></th>
						<td><input type="checkbox" value="1" id="bookmarkfacebook" name="bookmarkfacebook" <?php checked('1', $bookmarkfacebook); ?>/></td>

						<th scope="row" style="width:120px;"><label for="MySpace"><?php _e('Display \'MySpace\':'); ?></label></th>
						<td><input type="checkbox" value="1" id="bookmarkmyspace" name="bookmarkmyspace" <?php checked('1', $bookmarkmyspace); ?>/></td>
					</tr>
					<tr valign="top">
						<th scope="row" style="width:120px;"><label for="Twitter ID"><?php _e('Twitter URL:'); ?></label></th>
						<td><input type="text" value="<?php echo $twitterurl; ?>" id="twitterurl" name="twitterurl" class="large-text"/></td>

						<th scope="row" style="width:120px;"><label for="Twitter ID"><?php _e('Facebook URL:'); ?></label></th>
						<td><input type="text" value="<?php echo $facebookurl; ?>" id="facebookurl" name="facebookurl" class="large-text"/></td>

						<th scope="row" style="width:120px;"><label for="Twitter ID"><?php _e('MySpace URL:'); ?></label></th>
						<td><input type="text" value="<?php echo $myspaceurl; ?>" id="myspaceurl" name="myspaceurl" class="large-text"/></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<!--###### End Book mark ##############-->

	<!-- display show settings post set ,post entry set and page set  -->
	<div class="metabox-holder">
		<div class="postbox">
			<table class="widefat post fixed" cellspacing="0">
				<thead>
					<tr>
						<th class="manage-column" scope="col">Post Setting(home)</th>
						<th class="manage-column" scope="col"> Post Entry Setting</th>
						<th class="manage-column" scope="col">Page Setting</th>						
					</tr>
				</thead>

				<tbody class="wptap-admin-container">
					<tr>
						<td><input type="checkbox" value="1" id="h_postdisplayauthor" name="h_postdisplayauthor" <?php checked('1', $h_postdisplayauthor); ?>/> <?php _e('Display \'Author\''); ?></td>
						<td><input type="checkbox" value="1" id="p_postdisplayauthor" name="p_postdisplayauthor" <?php checked('1', $p_postdisplayauthor); ?>/> <?php _e('Display \'Author\''); ?></td>

						<td><input type="checkbox" value="1" id="pagedisplayauthor" name="pagedisplayauthor" <?php checked('1', $pagedisplayauthor); ?>/> <?php _e('Display \'Author\''); ?></td>
					</tr>

					<tr class="alternate">
						<td><input type="checkbox" value="1" id="h_postdisplaycategory" name="h_postdisplaycategory" <?php checked('1', $h_postdisplaycategory); ?>/> <?php _e('Display \'Category\''); ?></td>
						
						<td><input type="checkbox" value="1" id="p_postdisplaydate" name="p_postdisplaydate" <?php checked('1', $p_postdisplaydate); ?>/> <?php _e('Display \'Date\''); ?></td>

						<td><input type="checkbox" value="1" id="pagedisplaydate" name="pagedisplaydate" <?php checked('1', $pagedisplaydate); ?>/> <?php _e('Display \'Date\''); ?></td>
					</tr>

					<tr>
						<td><input type="checkbox" value="1" id="h_postdisplaytags" name="h_postdispalytags" <?php checked('1', $h_postdispalytags); ?>/> <?php _e('Display \'Tags\''); ?></td>
						
						<td><input type="checkbox" value="1" id="p_postdiscategory" name="p_postdiscategory" <?php checked('1', $p_postdiscategory); ?>/> <?php _e('Display \'Category\''); ?></td>

						<td><input type="checkbox" value="1" id="pagedisplaycategory" name="pagedisplaycategory" <?php checked('1', $pagedisplaycategory); ?>/> <?php _e('Display \'Category\''); ?>
						</td>
					</tr>

					<tr class="alternate">
						<td></td>
						
						<td><input type="checkbox" value="1" id="p_postdisplaytags" name="p_postdisplaytags" <?php checked('1', $p_postdisplaytags); ?>/> <?php _e('Display \'Tags\''); ?></td>

						<td><input type="checkbox" value="1" id="pagedisplaytags" name="pagedisplaytags" <?php checked('1', $pagedisplaytags); ?>/> <?php _e('Display \'Tags\''); ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<!-- display show settings post set ,post entry set and page set ##################################  -->

		<!-- Begin Home Menu Settings -->
		<div class="metabox-holder">
			<div class="postbox">
				<h3><?php _e('Home Menu Settings') ?></h3>
				
				<div class="wptap-admin-container">
					<table class="form-table">
						<tr valign="top">
							<th scope="row"><label for="header menu"><?php _e('Header Menu Settings:'); ?></label></th>
							<td>
								<input type="checkbox" value="1" id="menudisplayhome" name="menudisplayhome" <?php checked('1', $menudisplayhome); ?>/> <?php _e('Display \'Home\' on menu '); ?><br />
								<input type="checkbox" value="1" id="menudisplaycategory" name="menudisplaycategory" <?php checked('1', $menudisplaycategory); ?>/> <?php _e('Display \'Category\' on menu '); ?><br />
								<input type="checkbox" value="1" id="menudisplaypage" name="menudisplaypage" <?php checked('1', $menudisplaypage); ?>/> <?php _e('Display \'Pages\' on menu '); ?><br />
								<input type="checkbox" value="1" id="menudisplaysearch" name="menudisplaysearch" <?php checked('1', $menudisplaysearch); ?>/> <?php _e('Display \'Search\' on menu '); ?><br />
								<input type="checkbox" value="1" id="menudisplaylogin" name="menudisplaylogin" <?php checked('1', $menudisplaylogin); ?>/> <?php _e('Display \'Login\' on menu '); ?>
							</td>
						</tr>
						<!-- Bengin Category  -->
						<tr valign="top">
							<th scope="row"><label for="Categories"><?php _e('Categories to Display:'); ?></label></th>
							<td>
								<fieldset>
								<?php
									$categories = get_categories('pad_counts=true');

									foreach($categories as $cat) {
										$checkeded = '';
										if(is_array($menucagegories) && in_array($cat->cat_ID, $menucagegories)) $checkeded = ' checked="checked"';

										echo ' <input type="checkbox" name="menucagegories[]" id="cat'.$cat->cat_ID.'" value="'.$cat->cat_ID.'" '.$checkeded.'> ' . $cat->cat_name . '(<span class="red">'.$cat->count.'</span>)';
									}
								?>
								</fieldset>
							</td>
						</tr>
						<!--#######    End Category  ######-->
						<!--    Begin   Pages  loop -->
						<tr valign="top">
							<th scope="row"><label for="Pages"><?php _e('Pages to Display:'); ?></label></th>
							<td>
								<fieldset>
								<?php
									$pages = get_pages();

									foreach($pages as $page) {
										$checkeded = '';
										if(is_array($menupagelist) && in_array($page->ID, $menupagelist)) $checkeded = ' checked="checked"';

										echo ' <input type="checkbox" name="menupagelist[]" id="page'.$page->ID.'" value="'.$page->ID.'" '.$checkeded.'> ' . $page->post_title;
									}
								?>
								</fieldset>
							</td>
						</tr>	
						<!--#######    End   Pages  #######-->
					</table>
				</div>
			</div>
		</div>
		<!--#### End Header Menu Settings ########-->
		<!-- Begin advertising setting /-->
		<div class="metabox-holder">
			<div class="postbox">
				<h3><?php _e('Ads Setting') ?></h3>
				<div class="wptap-admin-container">
					<table class="form-table">
						<tr valign="top">
							<th scope="row"><label for="adcode">AD Code:</label></th>
							<td><textarea id="adcode" name="adcode" class="large-text code" rows="6"><?php echo stripslashes($adcode); ?></textarea></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<!-- #####   End advertising setting ####-->
	</div>
		
	<input type="submit" name="submit" class="button-primary" value="<?php esc_attr_e('Save Change') ?>" />
	</form>
	
</div>
<?php
}		
?>