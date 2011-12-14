<?php if (TwentyXS_option('xs_random_posts_box')) : { ?>
<?php wp_reset_query(); ?>
<div id="randomfooter"><?php query_posts('orderby=rand&showposts=1&ignore_sticky_posts=1'); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="entry-meta"><?php TwentyXS_posted_on(); ?></div><br />
<div style="margin-bottom:5px;"><h1 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">>> <?php the_title(); ?></a></h1></div>
					<div class="entry-content"><?php the_excerpt(); ?></div>
<?php endwhile;?>
<?php wp_reset_query(); ?></div>
<?php } endif; ?>


	</div><!-- #main -->

	<div id="footer" role="contentinfo">

<?php if (TwentyXS_option('xs_search_form')) : { ?>
<?php get_search_form(); ?>
<?php } endif; ?>

<?php if (TwentyXS_option('xs_jumptotop')) : { ?>
<div id="jumptotop"><a class="blackthin" rel="nofollow" href="#totop">Back to top &uarr;</a></div>
<?php } endif; ?>

		<div id="colophon">

<?php
	get_sidebar( 'footer' );
?>

<?php if (! TwentyXS_option('xs_siteinfo')) : { ?>
			<div id="site-info">
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> || 'TwentyXS' by <a href="http://kevinw.de" title="TwentyXS by Kevin Weber">K. Weber</a>
			</div><!-- #site-info -->

			<div id="site-generator">
				<?php do_action( 'TwentyXS_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'TwentyXS' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'TwentyXS' ); ?>" rel="generator"><?php _e( 'CODE IS POETRY', 'TwentyXS' ); ?></a>
			</div><!-- #site-generator -->
<?php } endif; ?>

		</div><!-- #colophon -->
	</div><!-- #footer -->

</div><!-- #wrapper -->

<div id="sidewidthr"><?php get_sidebar( 'right' ); ?></div>
</div> 
<?php echo stripslashes(TwentyXS_option('xs_ga_code')); ?>
<?php wp_footer();?>
</body>
</html>
