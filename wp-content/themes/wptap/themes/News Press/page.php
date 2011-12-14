<?php get_header();?>
		<div id="content">
			<div id="ad_code">
				<?php echo do_action('home_adv') ;?>
			</div>
			<?php
				while(have_posts()): the_post();
			?>
			<div class="border article">
				<div class="post-meta">
					<h1> <?php the_title();?> </h1>

					<?php if(np_page_date()): ?>
						<p class="postdate" > Date: <a href="<?php bloginfo('siteurl'); ?>?m=<?php echo mysql2date('Ym', $post->post_date); ?>"><?php the_date();?></a></p>
					<?php endif; ?>

					<?php if(np_page_author()): ?>
						<p class="postdate" > Author: <?php the_author_posts_link();?></p>
					<?php endif; ?>

					<?php if(np_page_category()): ?>
						<p class="postdate" > Categories: <a href="" ><?php the_category(',');?> </a></p>
					<?php endif; ?>

					<?php if(np_page_tags()): ?>
						<p class="postdate" >Tags: <a href="" ><?php the_tags(" ");?> </a></p>
					<?php endif; ?>
				</div>
				<p class="gotocomments"  >
				<a  href=" <?php comments_link() ?>">
					Skip to comments
				</a>
				
				</p>
				<div class="entry">
					<?php the_content();?>
				</div>
				<div class="social-networks">
					<div class="social-wrap11">
					    <a id="sbookmark" class="bookmark-it alignright" href="#">	Bookmark it</a>
						<a id="sshare" class="mail-it alignright" href="#">	Share it </a> 
						<ul id="shareul">
							<li>
								<a class="a1" href="http://twitter.com/home?status=<?php the_permalink(); ?>" title="Click to share this post on Twitter">
									 <?php _e( "Post to Twitter", "wptap" ); ?>
								</a>
							</li>
							<li>
								<a class="a4"  href="mailto:?subject=<?php bloginfo('sitename');the_title();?>&body=Check out this post: <?php the_permalink(); ?>" title="mail it"> Mail it
								</a>
							</li>
							<li>
								<a class="a5"  href="http://www.facebook.com/share.php?u=<?php the_permalink() ?>" target="_blank"> Facebook
								</a>
							</li>
						</ul>
						<ul id="sbookmarks">
							<li class="delicious"><a  href="http://del.icio.us/post?url=<?php the_permalink();?>&amp;title=<?php the_title();?>" target="_blank">Del.icio.us</a></li>
							<li class="digg"><a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink();?>&amp;title=<?php the_title();?>" target="_blank">Digg</a></li>
							<li class="technorati"><a href="http://technorati.com/faves?add=<?php the_permalink();?>" target="_blank">Technorati</a></li>
							<li class="newsvine"><a href="http://www.newsvine.com/_wine/save?popoff=0&amp;u=<?php the_permalink();?>&amp;h=<?php the_title();?>" target="_blank">Newsvine</a></li>
							<li class="reddit"><a href="http://reddit.com/submit?url=<?php the_permalink();?>&amp;title=<?php the_title();?>" target="_blank">Reddit</a></li>
						</ul>
					</div>
				</div>	
				<div id="comm">
					<?php comments_template();?>
				</div>
			</div>			
			<?php endwhile;?>
		</div>
<?php get_footer();?>