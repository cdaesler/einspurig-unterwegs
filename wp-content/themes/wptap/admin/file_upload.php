<?php
global $wptap_option_name;
$type = isset($_POST['type']) ? $_POST['type'] : 'logo';

if($type == 'logo') {
	$max_size = 128*2048; // 256k	
	$directory_list = array();

	if ( current_user_can( 'upload_files' ) ) {
		$upload_dir = WPTAP_ABSPATH . 'themes/' . wptap_option_value($wptap_option_name, 'mobiletheme') . '/images/icons/';
		$dir_paths = explode( '/', $upload_dir );
		$dir = '';
		foreach ( $dir_paths as $path ) {
			$dir = $dir . "/" . $path;
			if ( !file_exists( $dir ) ) {
				@mkdir( $dir, 0755 ); 
			}			
		}

		if ( isset( $_FILES['submitted_file'] ) ) {
			$f = $_FILES['submitted_file'];
			if ( $f['size'] <= $max_size) {
				if ( ($f['type'] == 'image/png') || ($f['type'] == 'image/x-png') ) {	
					@move_uploaded_file( $f['tmp_name'], $upload_dir . $f['name'] );
					
					echo  __( '<p class="green">File has been saved!</p>');					
					echo '<p>';			
					echo sprintf(__( "%sClick here to refresh the page%s and see your icon.", "wptap" ), '<a style="text-decoration:underline" href="#" onclick="location.reload(true); return false;">','</a>');
					echo '</p>';				
				} else {
					echo '<p class="orange">'.__( 'Sorry, only PNG images are supported.', 'wptap' ).'</p>';
				}
			} else echo '<p class="orange">'.__( 'Image too large. Try something less than 256k.', 'wptap' ).'</p>';
		}
	} else echo __( '<p style="color:orange">Insufficient priviledges.</p><p>You need to either be an admin or have more control over your server.</p>', 'wptap' );
} else if($type=='icon') {
	$max_size = 128*2048; // 256k	
	$directory_list = array();
	
	if ( current_user_can( 'upload_files' ) ) {
		$upload_dir = ABSPATH;

		if ( isset( $_FILES['submitted_file'] ) ) {
			$f = $_FILES['submitted_file'];
			if ( $f['size'] <= $max_size) {
				if ( ($f['type'] == 'image/png') || ($f['type'] == 'image/x-png') ) {	
					@move_uploaded_file( $f['tmp_name'], $upload_dir . "/apple-touch-icon.png" );

					list($width, $height) = getimagesize($upload_dir . "/apple-touch-icon.png");

					if($width == 57 || $height == 57) {
						if ( !file_exists( $upload_dir . "/apple-touch-icon.png" ) ) {
							echo __('<p class="red">There seems to have been an error.<p>Please try your upload again.</p>');
						} else {
							echo  __( '<p class="green">File has been saved!</p>');					
							echo '<p>';			
							echo sprintf(__( "%sClick here to refresh the page%s and see your icon.", "wptap" ), '<a style="text-decoration:underline" href="#" onclick="location.reload(true); return false;">','</a>');
							echo '</p>';					
						}
					} else {
						@unlink($upload_dir . "/apple-touch-icon.png");
						echo '<p class="red">'.'The image size must be 57 × 57 pixel. Please try again.'.'</p>';
					}
				} else {
					echo '<p class="orange">'.__( 'Sorry, only PNG images are supported.', 'wptap' ).'</p>';
				}
			} else echo '<p class="orange">'.__( 'Image too large. Try something less than 256k.', 'wptap' ).'</p>';
		}
	} else echo __( '<p class="orange">Insufficient priviledges.</p><p>You need to either be an admin or have more control over your server.</p>', 'wptap' );
}
?>