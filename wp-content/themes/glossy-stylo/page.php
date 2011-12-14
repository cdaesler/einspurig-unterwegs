<?php
get_header(); ?>
<div id="inhalt">
<div id="page">
<div id="header" role="banner">
	<div id="headerimg">
		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<div class="description"><?php bloginfo('description'); ?></div>
	</div>
	<div id="content" class="narrowcolumn" role="main">

		<div id="postbg">
				<div id="postheader"></div>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
			</div>
					
			
			</div>
			<div id="postfooter"></div>
		</div>
		<?php endwhile; endif; ?>
	
	
	<?php comments_template(); ?>
	
	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
</div>