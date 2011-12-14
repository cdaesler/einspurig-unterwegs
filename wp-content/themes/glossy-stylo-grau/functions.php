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
 
 if ( ! function_exists( 'einspurig_oldposted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since Twenty Ten 1.0
 */
function einspurig__oldposted_on() {
	printf( __( '<span class="%1$s">Veröffentlicht am</span> %2$s <span class="meta-sep">by</span> %3$s', 'twentyten' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'twentyten' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'einspurig_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own twentyeleven_posted_on to override in a child theme
 *
 * @since Twenty Eleven 1.0
 */
function einspurig_posted_on() {
	printf( __( '<span class="sep">Veröffentlicht am </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a></span>', 'twentyeleven' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
}
endif;
 
?>