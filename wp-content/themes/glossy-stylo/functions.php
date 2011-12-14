<?php
/*
Template Name: Glossy Stylo
*/

/* Set the content width based on the theme's design and stylesheet.  */
if ( ! isset( $content_width ) )
	$content_width = 695;

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}

// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );

// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

// This theme allows users to set a custom background
add_custom_background();
 
?>