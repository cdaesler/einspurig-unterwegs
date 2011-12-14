<?php	if (   ! is_active_sidebar( 'first-top-widget-area'  )
		&& ! is_active_sidebar( 'second-top-widget-area' )
	)
		return;
?>

			<div id="top-widget-area" role="complementary">

<?php if ( is_active_sidebar( 'first-top-widget-area' ) ) : ?>
				<div id="first" class="widget-area">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'first-top-widget-area' ); ?>
					</ul>
				</div><!-- #first .widget-area -->
<?php endif; ?>

<?php if ( is_active_sidebar( 'second-top-widget-area' ) ) : ?>
				<div id="second" class="widget-area">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'second-top-widget-area' ); ?>
					</ul>
				</div><!-- #second .widget-area -->
<?php endif; ?>
			</div><!-- #top-widget-area -->
