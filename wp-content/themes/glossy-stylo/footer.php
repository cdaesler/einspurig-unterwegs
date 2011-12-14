<hr />
<div id="footer" role="contentinfo">
	<p>
		 <?php 
		/**
		 * This is where the credit for the theme is placed. 
		 * Credits are showed only at the first page. 
		 * Please keep the link back to the author's website.
		 * Seriously, developing this awesome theme took a lot
		 * of effort and time, weeks and weeks of voluntary unpaid work. I only ask 
		 * that you retain this link here, and you can use and/or modify the theme
		 * however you like to.
		*/
		?>
		<?php bloginfo('name'); ?><?php if(is_home() and !is_paged()) { ?>| Design by <a href="http://www.gutscheingiraffe.com/" title="Gutscheincode - Gutscheingiraffe">Gutscheincode <?php echo date('Y'); ?></a><?php } ?>
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
	</p>
</div>
</div>
		<?php wp_footer(); ?>
</body>
</html>