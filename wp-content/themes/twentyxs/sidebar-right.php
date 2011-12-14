<?php	if (   ! is_active_sidebar( 'secondary-widget-area'  )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>

			<div id="sideright" class="right" role="complementary">

<?php if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>
				<div id="first" class="widget-area">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
					</ul>
				</div><!-- #first .widget-area -->
<?php endif; ?>

			</div><!-- #footer-widget-area -->
