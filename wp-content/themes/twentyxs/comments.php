			<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'TwentyXS' ); ?></p>
			</div><!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php if ( have_comments() ) : ?>
			<h3 id="comments-title"><?php
			printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'TwentyXS' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'TwentyXS' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'TwentyXS' ) ); ?></div>
			</div> <!-- .navigation -->
<?php endif; // check for comment navigation ?>

			<ol class="commentlist">
				<?php
					/* Loop through and list the comments. Tell wp_list_comments()
					 * to use TwentyXS_comment() to format the comments.
					 * If you want to overload this in a child theme then you can
					 * define TwentyXS_comment() and that will be used instead.
					 * See TwentyXS_comment() in TwentyXS/functions.php for more.
					 */
					wp_list_comments( array( 'callback' => 'TwentyXS_comment' ) );
				?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'TwentyXS' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'TwentyXS' ) ); ?></div>
			</div><!-- .navigation -->
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:
	if (! comments_open() && ! is_page()) :
?>
	<p class="nocomments"><?php _e( 'Comments are closed.', 'TwentyXS' ); ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php comment_form(); ?>

</div><!-- #comments -->
