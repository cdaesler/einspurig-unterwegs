<?php	if (   ! is_active_sidebar( 'primary-widget-area'  )
	)
		return;
?>

			<div id="sideleft" class="left" role="complementary">

<?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
				<div id="first" class="widget-area">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'primary-widget-area' ); ?>
					</ul>
				</div><!-- #first .widget-area -->
<?php endif; ?>
			</div><!-- #footer-widget-area -->
