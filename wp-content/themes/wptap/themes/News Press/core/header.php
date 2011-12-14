<?php global $is_IE, $is_iphone, $is_apache, $is_IIS, $is_iis7,$theme_option_name ; ?>
<?php
global $theme_option_name;
$newspres_settings = wptap_get_settings($theme_option_name); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php if(wptap_option_value($theme_option_name, 'homepagetitle')) {echo wptap_option_value($theme_option_name, 'homepagetitle');} else {bloginfo('name'); } ?></title>

<?php if($is_iphone): ?>
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel="apple-touch-icon" href="<?php bloginfo('siteurl')?>/apple-touch-icon.png" />
<?php endif; ?>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<link href="<?php bloginfo('template_url')?>/style.css" media="screen,projection,tv" rel="stylesheet" type="text/css" />

	<script src="<?php bloginfo('template_url')?>/scripts/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url')?>/scripts/global.js" type="text/javascript"></script>

<?php if(is_home() && wptap_check_option_value('wptap_pages_options', 'slideshow', 'on')): ?>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/coda-slider.css" type="text/css" media="screen" title="no title" charset="utf-8" />
	<script src="<?php bloginfo('template_url'); ?>/scripts/jquery.scrollto.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/scripts/jquery.localscroll.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php bloginfo('template_url'); ?>/scripts/jquery.serialscroll.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php bloginfo('template_url'); ?>/scripts/coda.slider.js" type="text/javascript" charset="utf-8"></script>
<?php endif; ?>

<!--  style choice -->
<?php
	$themestyle = 'Black';
	if(wptap_option_value($theme_option_name, 'themestyle')) $themestyle = wptap_option_value($theme_option_name, 'themestyle');
?>
	<link href="<?php bloginfo('template_url')?>/style/<?php echo $themestyle ?>.css" media="screen,projection,tv" rel="stylesheet" type="text/css" />

<?php if($is_IE): ?>
	<link href="<?php bloginfo('template_url')?>/ie.css" media="screen,projection,tv" rel="stylesheet" type="text/css" />
<?php endif; ?>


<?php if($is_iphone): ?>
	<script type="text/javascript">
		addEventListener("load", function() { 
			setTimeout(hideURLbar, 0); }, false);
			function hideURLbar(){
			window.scrollTo(0,1);
		}
	</script>
<?php endif; ?>
</head>