<?php
get_header(); ?>

	<div id="content" class="narrowcolumn" role="main">

	<?php if (have_posts()) : ?>

		<div id="postbg">
				<div id="postheader"></div>
				<div id="searchpost">
		<h2 class="pagetitle"><?php printf( __( 'Suchergebnis für: %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Ältere Einträge') ?></div>
			<div class="alignright"><?php previous_posts_link('Neuere Einträge &raquo;') ?></div>
		</div>


		<?php while (have_posts()) : the_post(); ?>

			<div id="entry">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<!--small><?php the_time('l, j. F Y') ?></small-->
				<div class="searchpost-teaser">
					<?php the_excerpt(); ?>
				</div>
				<div class="searchpost-link">
					<a href="<?php the_permalink() ?>" title="Weiterlesen">Weiterlesen</a>
				</div>
				<!--p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Veröffentlicht in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('Kommentar hinterlassen &#187;', '1 Kommentar &#187;', '% Kommentare &#187;'); ?></p>
               -->
			</div>
			

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Ältere Einträge') ?></div>
			<div class="alignright"><?php previous_posts_link('Neuere Einträge &raquo;') ?></div>
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

<?php get_sidebar(); ?>

<?php get_footer(); ?>
