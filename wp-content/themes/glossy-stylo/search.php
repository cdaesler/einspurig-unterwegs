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

	<?php if (have_posts()) : ?>

		<div id="postbg">
				<div id="postheader"></div>
				<div id="searchpost">
		<h2 class="pagetitle">Search Results</h2>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>


		<?php while (have_posts()) : the_post(); ?>

			<div id="test">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, F jS, Y') ?></small>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>
			
			
			

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>
	
		<div id="postbg">
				<div id="postheader"></div>
				<div id="searchpost">

		<h2>No posts found. Try a different search?</h2>
		<?php get_search_form(); ?>
		
		

	<?php endif; ?>

	
	
		 </div>
		 
				<div id="searchfooter"></div>
	</div>
</div>
</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
</div>