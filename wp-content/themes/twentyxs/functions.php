<?php
/**
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'TwentyXS_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * Information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 500;

/** Tell WordPress to run TwentyXS_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'TwentyXS_setup' );

if ( ! function_exists( 'TwentyXS_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override TwentyXS_setup() in a child theme, add your own TwentyXS_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 */
function TwentyXS_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'TwentyXS', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'TwentyXS' ),
	) );

	// This theme allows users to set a custom background
	add_custom_background();

	// Your changeable header business starts here
	if ( ! defined( 'HEADER_TEXTCOLOR' ) )
		define( 'HEADER_TEXTCOLOR', '' );

	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	if ( ! defined( 'HEADER_IMAGE' ) )
		define( 'HEADER_IMAGE', '%s/images/headers/path.jpg' );

	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to TwentyXS_header_image_width and TwentyXS_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'TwentyXS_header_image_width', 500 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'TwentyXS_header_image_height', 105 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 198 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Don't support text inside the header image.
	if ( ! defined( 'NO_HEADER_TEXT' ) )
		define( 'NO_HEADER_TEXT', true );

	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See TwentyXS_admin_header_style(), below.
	add_custom_image_header( '', 'TwentyXS_admin_header_style' );

	// ... and thus ends the changeable header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'berries' => array(
			'url' => '%s/images/headers/berries.jpg',
			'thumbnail_url' => '%s/images/headers/berries-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Berries', 'TwentyXS' )
		),
		'cherryblossom' => array(
			'url' => '%s/images/headers/cherryblossoms.jpg',
			'thumbnail_url' => '%s/images/headers/cherryblossoms-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Cherry Blossoms', 'TwentyXS' )
		),
		'concave' => array(
			'url' => '%s/images/headers/concave.jpg',
			'thumbnail_url' => '%s/images/headers/concave-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Concave', 'TwentyXS' )
		),
		'fern' => array(
			'url' => '%s/images/headers/fern.jpg',
			'thumbnail_url' => '%s/images/headers/fern-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Fern', 'TwentyXS' )
		),
		'forestfloor' => array(
			'url' => '%s/images/headers/forestfloor.jpg',
			'thumbnail_url' => '%s/images/headers/forestfloor-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Forest Floor', 'TwentyXS' )
		),
		'inkwell' => array(
			'url' => '%s/images/headers/inkwell.jpg',
			'thumbnail_url' => '%s/images/headers/inkwell-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Inkwell', 'TwentyXS' )
		),
		'path' => array(
			'url' => '%s/images/headers/path.jpg',
			'thumbnail_url' => '%s/images/headers/path-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Path', 'TwentyXS' )
		),
		'sunset' => array(
			'url' => '%s/images/headers/sunset.jpg',
			'thumbnail_url' => '%s/images/headers/sunset-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Sunset', 'TwentyXS' )
		)
	) );
}
endif;

if ( ! function_exists( 'TwentyXS_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in TwentyXS_setup().
 */
function TwentyXS_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}
endif;

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 */
function TwentyXS_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'TwentyXS_page_menu_args' );

/**
 * Sets the post excerpt length to 40 words.
 */
remove_filter( 'excerpt_length', 'TwentyXS_excerpt_length' );
function TwentyXS_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'TwentyXS_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 * @return string "Continue Reading" link
 */
function TwentyXS_continue_reading_link() {
	return '<br> <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'TwentyXS' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and TwentyXS_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 * @return string An ellipsis
 */
function TwentyXS_auto_excerpt_more( $more ) {
	return ' &hellip;' . TwentyXS_continue_reading_link();
}
add_filter( 'excerpt_more', 'TwentyXS_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function TwentyXS_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= TwentyXS_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'TwentyXS_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in TwentyXS's style.css. This is just
 * a simple filter call that tells WordPress to not use the default styles.
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Deprecated way to remove inline styles printed when the gallery shortcode is used.
 *
 * This function is no longer needed or used. Use the use_default_gallery_style
 * filter instead, as seen above.
 * @deprecated Deprecated in TwentyXS 0.1 for WordPress 3.1
 *
 * @return string The gallery style filter, with the styles themselves removed.
 */
function TwentyXS_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
// Backwards compatibility with WordPress 3.0.
if ( version_compare( $GLOBALS['wp_version'], '3.1', '<' ) )
	add_filter( 'gallery_style', 'TwentyXS_remove_gallery_css' );

if ( ! function_exists( 'TwentyXS_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own TwentyXS_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function TwentyXS_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'TwentyXS' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'TwentyXS' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'TwentyXS' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'TwentyXS' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'TwentyXS' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'TwentyXS' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;
function TwentyXS_widgets_init() {
	// Area SideLeft. Empty by default.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'TwentyXS' ),
		'id' => 'primary-widget-area',
		'description' => __( 'Sidebar Left', 'TwentyXS' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	// Area SideRight. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'TwentyXS' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'Sidebar Right', 'TwentyXS' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	// Footer Sidebar 1, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'TwentyXS' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'TwentyXS' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Footer Sidebar 2, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'TwentyXS' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'TwentyXS' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Top Sidebar 1, located underneath the logo. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Top Widget Area', 'TwentyXS' ),
		'id' => 'first-top-widget-area',
		'description' => __( 'The first top widget area', 'TwentyXS' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Top Sidebar 2, located underneath the logo. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Top Widget Area', 'TwentyXS' ),
		'id' => 'second-top-widget-area',
		'description' => __( 'The second top widget area', 'TwentyXS' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'TwentyXS_widgets_init' );
function TwentyXS_remove_recent_comments_style() {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'TwentyXS_remove_recent_comments_style' );

if ( ! function_exists( 'TwentyXS_posted_on' ) ) :
function TwentyXS_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'TwentyXS' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'TwentyXS' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'TwentyXS_posted_in' ) ) :
function TwentyXS_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'TwentyXS' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'TwentyXS' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'TwentyXS' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

if ( file_exists( STYLESHEETPATH . '/twentyxs-options.css' ) ) {
	require_once( STYLESHEETPATH . '/class.twentyxs-options.php' );
}

/***** Link Colours via Settings Page *****/
function TwentyXS_linkcolour_css(){?>
<style type="text/css">p a:link,.page-title a:active,.page-title a:hover,.entry-title a:active,.entry-title a:hover,.page-link a:active,.page-link a:hover,.entry-meta a:hover,.entry-utility a:hover,.navigation a:active,.navigation a:hover,.comment-meta a:active,.comment-meta a:hover,.reply a:hover,a.comment-edit-link:hover,#respond .required,.widget_rss a.rsswidget:hover,#main .widget-area ul ul li a, #sideright a,#sideleft a,.entry-summary a,#entry-author-info a,#comments a.url,#footer-widget-area a:visited,.widget-area a:link {
	color:<?php echo stripslashes(TwentyXS_option('xs_linkcolour_hover_select')); ?>;
}
.entry-content a:hover {
	border-bottom:1px solid <?php echo stripslashes(TwentyXS_option('xs_linkcolour_hover_select')); ?>;
}
#article_metabox_comments {
	background-color:<?php echo stripslashes(TwentyXS_option('xs_linkcolour_hover_select')); ?>;
}
a.blackthin {color:#000;}</style><?php }
add_action( 'wp_head', 'TwentyXS_linkcolour_css' );
/***** // End Link Colours *****/


function TwentyXS_custom_css(){?>
	<style type="text/css"><?php echo stripslashes(TwentyXS_option('xs_custom_css')); ?>
	<?php if (! TwentyXS_option('xs_post_meta')) : { ?>.entry-meta, .entry-utility {display:none;}<?php } endif; ?></style>
<?php }
add_action( 'wp_head', 'TwentyXS_custom_css' );

if (TwentyXS_option('xs_snow_script')) : {
function TwentyXS_snow_script(){ ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/snow.js"></script>
<?php }
add_action( 'wp_head', 'TwentyXS_snow_script' );
} endif;

if (TwentyXS_option('xs_scroll_script')) : {
function TwentyXS_scroll_script(){ ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scroll.js"></script>
<?php }
add_action( 'wp_head', 'TwentyXS_scroll_script' );
if (! TwentyXS_option('xs_scroll_script_jquery')) : {
function xs_init_method() {
wp_enqueue_script( 'jquery' );
}
} endif;
add_action('init', 'xs_init_method');
} endif;

/*** Add TwentyXS-Admin-Bar-Button ***/
if (TwentyXS_option('xs_admin_bar_button')) : {
function add_xs_admin_bar_button() {
	global $wp_admin_bar;
	$wp_admin_bar->add_menu( array( 'id' => 'TwentyXS', 'title' => __('TwentyXS'), 'href' => admin_url('themes.php?page=TwentyXS-options')  ) );

/** Optional: Add additional links.
$wp_admin_bar->add_menu( array( 'parent' => 'TwentyXS', 'id' => 'links', 'title' => __('Links') ) );
$wp_admin_bar->add_menu( array( 'parent' => 'links', 'id' => 'link1', 'title' => __('kevinw.de'), 'href' => 'http://kevinw.de','meta' => array('target' => '_blank') ) );
 **/

} add_action( 'admin_bar_menu', 'add_xs_admin_bar_button', 113 );
} endif;
/*** || End || TwentyXS-Admin-Bar-Button || by Kevin Weber || kevinw.de ***/

?>