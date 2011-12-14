<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="nav-above" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'TwentyXS' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'TwentyXS' ) . '</span>' ); ?></div>
				</div><!-- #nav-above -->

<?php if (TwentyXS_option('xs_article_comments_bubble')) : { ?>
<div id="article_metabox_comments">
<a class="nr_comm_spot" href="<?php get_permalink(); ?>#comments">
<span class="comments-link"><?php comments_popup_link( __( '0', 'TwentyXS' ), __( '1', 'TwentyXS' ), __( '%', 'TwentyXS' ), 'comments-link', 'Off' ); ?></span>
</a>
</div>
<?php } endif; ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title clear-none"><?php the_title(); ?></h1>

					<div class="entry-meta">
						<?php TwentyXS_posted_on(); ?>
					</div><!-- .entry-meta -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'TwentyXS' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

<?php if (TwentyXS_option('xs_article_enjoy_rss')) : // If a user has filled out their description, show a bio on their entries  ?>
					<div id="enjoy-article">
						<div id="enjoy-description">
							<h2>
								Enjoy this article?
							</h2>
							<a href="<?php bloginfo('rss2_url'); ?>">Consider subscribing to our rss feed!</a>
						</div>
					</div><!-- #enjoy-article -->
<?php endif; ?>

<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'TwentyXS_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description">
							<h2><?php printf( esc_attr__( 'About %s', 'TwentyXS' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'TwentyXS' ), get_the_author() ); ?>
								</a>
							</div><!-- #author-link	-->
						</div><!-- #author-description -->
					</div><!-- #entry-author-info -->
<?php endif; ?>

					<div class="entry-utility">
						<?php TwentyXS_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'TwentyXS' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility -->
				</div><!-- #post-## -->

				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'TwentyXS' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'TwentyXS' ) . '</span>' ); ?></div>
				</div><!-- #nav-below -->

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>