<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" <?php language_attributes(); ?>>
	
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<!-- Google Hosted jQuery Core -->
	<script src="http://www.google.com/jsapi"></script>
	<script>google.load("jquery", "1");</script>
	<script src="<?php bloginfo('wpurl'); ?>/wp-includes/js/jquery.ez-bg-resize.js" type="text/javascript" charset="utf-8"></script>
		<script>
		$(document).ready(function() {
			
			var BGImageArray = ["bg.jpg","bg2.jpg","bg3.jpg","bg4.jpg"];
			var BGImage = BGImageArray[Math.floor(Math.random()*BGImageArray.length)];
			var BGImagePath = "<?php bloginfo('wpurl'); ?>/images/";

			$("body").ezBgResize({
				img     : BGImagePath + BGImage, // Relative path example.  You could also use an absolute url (http://...).
				opacity : 1, // Opacity. 1 = 100%.  This is optional.
				center  : true // Boolean (true or false). This is optional. Default is true.
			});
		});
	</script>
	
	
<?php wp_head(); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/de_DE/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<meta property="og:title" content="<?php wp_title('&laquo;', true, 'right');  bloginfo('name');?>" />
<meta property="og:type" content="blog" />
<meta property="og:url" content="<?php bloginfo('wpurl'); ?>" />
<meta property="og:image" content="<?php echo catch_that_image(); ?>" />
<meta property="og:site_name" content="<?php bloginfo('wpurl'); ?>" />
<meta property="fb:admins" content="1802712556" />

</head>
<body <?php body_class(); ?>>
<div id="page">

<div id="header" role="banner">
	<div id="headerimg">
		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<div class="description"><?php bloginfo('description'); ?></div>
	</div>
</div>
