<?php
get_header(); ?>
	<div id="content" class="narrowcolumn">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div id="postbg">
				<div id="postheader"></div>
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php einspurig_posted_on(); ?> <!-- by <?php the_author() ?> --> </small>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div >
				
                <fb:like href="http://www.einspurig-unterwegs.de" send="true" width="450" show_faces="true" colorscheme="dark"></fb:like>
				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Veröffentlicht unter <?php the_category(', ') ?> | <?php edit_post_link('Bearbeiten', '', ' | '); ?>  <?php comments_popup_link('Kommentar hinterlassen &#187;', '1 Kommentar &#187;', '% Kommentare &#187;'); ?></p>
			
				</div>
				
				<div id="postfooter"></div>
			</div>
		<?php endwhile; ?>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Ältere Einträge') ?></div>
			<div class="aligncenter"><a href="#header" rel="backtotop">Zum Seitenanfang</a></div>
			<div class="alignright"><?php previous_posts_link('Neuere Einträge &raquo;') ?></div>
		</div>
	<?php else : ?>
	<div id="postbg">
				<div id="postheader"></div>	
				<div id="searchpost">
		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>
	 </div>
			<div id="postfooter"></div>
	</div>
	<?php endif; ?>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
