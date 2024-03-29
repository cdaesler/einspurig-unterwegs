<?php
/*
Copyright (c) 2010 MobilizeToday.com, Mobile Web Solutions Inc.

Support: http://www.mobilizetoday.com/wordpress-themes/mobius/

This file is part of the Mobius WordPress Theme.
*/
?>
<?php
get_header(); ?>
<?php
	
	$posts_per_page = get_option('posts_per_page');
	$curr_page = get_query_var('paged');
	if ($curr_page == 0) {
		$curr_page = 1;
	}
	
	$startfrom = (($curr_page - 1) * ($posts_per_page))+1;

	
	
	if (have_posts()) : ?>
					<?php
						global $more;
						$more=0;
					?>
					<div class="post search-result">
						<div class="transparency"></div>

						<div class="postdata">
							<div class="post-header">
								<h2>Search Results</h2>
							</div>

							<ol start="<?php echo $startfrom;?>">
								<?php while (have_posts()) : the_post(); ?>
								<li><h3 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf('Permanent Link to %s', the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>
								<div><p><?php echo strip_tags(get_the_content('')); ?></p></div>
								<div class="clear"></div>
								<div class="date"><?php the_time('F d, Y') ?></div>
								</li>
								<?php endwhile; ?>
							</ol>
						</div>
					</div>


					<div id="pagination">
						<ul>
							<li class="default"><div class="fr"><?php previous_posts_link('Newer Entries &raquo;') ?></div> <?php next_posts_link('&laquo; Older Entries') ?></li>
						</ul>
						<div class="clear"></div>
					</div>
	<?php else : ?>
					<div class="post">
						<div class="transparency"></div>
						<div class="postdata">
							<div class="post-header">
								<h2>No posts found. Try a different search?</h2>
							</div>
						</div>
					</div>

	<?php endif; ?>


<?php get_footer(); ?>
