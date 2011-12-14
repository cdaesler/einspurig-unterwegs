<?php
get_header();
?>

	<div id="content" class="widecolumn">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <?php the_title(); ?></h2>
			<div class="entry">
				<p class="attachment"><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>
				<div class="caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?></div>

				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

				<div class="navigation">
					<div class="alignleft"><?php previous_image_link() ?></div>
					<div class="alignright"><?php next_image_link() ?></div>
				</div>
				<br class="clear" />

				<p class="postmetadata alt">
					<small>
						Dieser Eintrag wurde veröffentlicht am <?php the_time('l, j. F Y') ?> um <?php the_time() ?>
						unter <?php the_category(', ') ?>.
						<?php the_taxonomies(); ?>
						Du kannst alle Antworten auf diesen Eintrag durch den <?php post_comments_feed_link('RSS 2.0'); ?> Feed verfolgen.

						<?php if ( comments_open() && pings_open() ) {
							// Both Comments and Pings are open ?>
						Du kannst <a href="#respond">einen Kommentar</a>, oder einen <a href="<?php trackback_url(); ?>" rel="trackback">Trackback</a> von Deiner eigenen Seite hinterlassen.

						<?php } elseif ( !comments_open() && pings_open() ) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

						<?php } elseif ( comments_open() && !pings_open() ) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.

						<?php } elseif ( !comments_open() && !pings_open() ) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.

						<?php } edit_post_link('Edit this entry.','',''); ?>

					</small>
				</p>

			</div>

		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no attachments matched your criteria.</p>

<?php endif; ?>

	</div>

<?php get_footer(); ?>
