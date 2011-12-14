<?php
global $newspres_options ;
$newspres_setting = wptap_get_settings($newspres_options); ?>
<?php get_header(); ?>
		<div id="content">
			<?php
				while(have_posts()): the_post();
				$wp_title=get_the_title();
				$t_length=40;
				if($wp_title!=substr($wp_title,0,$t_length)) $wp_title=substr($wp_title,0,$t_length)."...";
				
			?>
			<div class="article index">
				<!--<a class="extra" href="#">Shwo post detals</a>-->
				<span class="extra">Shwo post detals</span>
				<div class="calendar" style="background-position:0 -<?php echo ((intval(get_the_time('m')-1)) * 50); ?>px;">
					<span class="the_month"><?php echo get_the_time('M') ?></span>
					<span class="the_day"><?php echo get_the_time('j') ?></span>
				</div>
					<h2><a href="<?php the_permalink();?>"><?php echo $wp_title; ?></a></h2>
				<div class="article-details">
					<?php if(np_post_author()): ?><!-- Post Date -->
						<p class="author">Author: <?php the_author();?></p>
					<?php endif; ?>
					
					<?php if(np_if_show_homecategory()): ?>
						<p class="categories">Categories: <?php the_category(',');?></p>
					<?php endif; ?>
					<?php if(np_if_show_hometags()): ?><!-- Post Tag -->
						<p class="tags">Tags: <?php the_tags(' ');?></p>
					<?php endif; ?>
				</div>
				<div class="entry">
					<?php echo get_the_excerpt(); ?>
				</div>
				
			</div>
			<?php endwhile;?>
			<div class="navi-index">
				<div class="alignright"><?php next_posts_link('Older Entries') ?></div>
				<div class="alignleft"><?php previous_posts_link('Newer Entries') ?></div>	
			</div>
		</div>
<?php get_footer();?>