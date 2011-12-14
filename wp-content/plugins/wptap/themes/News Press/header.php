<?php include_once("core/header.php"); 

?>
<?php do_action('wp_head'); 
?>
<body>
	<div id="page">
		<div id="header" >
		<div id="home_title" style="margin-left:6px;">
			<?php if(isset($newspres_settings['pages_icon']) && !empty($newspres_settings['pages_icon'])): ?>
				<img src="<?php bloginfo('template_url')?>/images/icons/<?php echo icon_name() ?>" alt="<?php if($newspres_settings['homepagetitle']){ echo $newspres_settings['homepagetitle']; } else{ bloginfo('name'); } ?>" class="logo" width="30"/>
			<?php endif; ?>	
			<!-- Home title  -->
			<h1 title="<?php if($newspres_settings['homepagetitle']){ echo $newspres_settings['homepagetitle']; } else{ bloginfo('name'); } ?>">
			<a  href="<?php bloginfo('siteurl');?>" <?php echo 'style="color:'.$newspres_settings['titlecolors'].'"' ?>>
			<?php if($newspres_settings['homepagetitle']){ echo $newspres_settings['homepagetitle']; } else{ bloginfo('name'); } ?></a></h1>

			<!--Bookmark -->
			<a class="bookmark" id="bookmark"></a><!--####### Bookmark -->
		</div>
			<!-- Begin Navergration  -->
			<ul class="nav">
				<?php if(np_hom_nav_home()): ?>
					<li><a href="<?php bloginfo('url'); ?>"> <?php _e( 'Home', 'wptap' ); ?></a></li>
				<?php endif; ?>

				<!-- Show Category /-->
				<?php if(np_hom_nav_category()): ?>
					<li id="categories"><a href="#">Categories</a></li>
				<?php endif; ?>

				<!-- Show Pages /-->
				<?php
					if(np_hom_nav_page()):?>
					<li id="pages"><a href="#"><?php _e('Page'); ?></a></li>
				<?php endif;	?>

				<!-- checked display serach /-->
				<?php if(np_hom_nav_search()): ?>
				<li id="search"><a href="#"><?php _e( 'Search' ); ?></a></li>
				<?php endif; ?>

				<!-- Show Login / -->
				<?php
				if(np_hom_nav_login()) {
					get_currentuserinfo();
					if (!current_user_can('edit_posts')) {
						$output .= ' <li id="login"><a href="#">' . __( 'Login' ) . '</a></li>'."\n";
					} else {
						$version = (float)get_bloginfo('version');
						if ($version >= 2.7) {
							$output .= '<li id="logout"><a href="' . wp_logout_url($_SERVER['REQUEST_URI']) . '">';
						} else {
							$output .= '<li id="logout"><a href="' . get_bloginfo('wpurl') . '/wp-login.php?action=logout&redirect_to=' . $_SERVER['REQUEST_URI'] . '">';
						}

						$output .=  __( 'Logout' ) . '</a></li>'."\n";
					}
					echo $output;
				}
			?>
			</ul>

			<div class="extenstion">
			<!-- Search List -->
			<?php if(np_hom_nav_search()): ?>
				<form action="<?php bloginfo('siteurl'); ?>" id="searchform" class="formsearch" method="get">
					<input type="text" id="s" name="s" value="<?php the_search_query(); ?>" class="text-input"/>
					<input type="submit" value="Search" id="searchsubmit" class="button"/>
				</form>
			<?php endif; ?>
			<!--###### End  Search List ####-->

			<!-- Category List -->
			<?php if(np_hom_nav_category()): ?>
				<ul id="categoriesbox">
					<?php 
						$include = wptap_option_value($theme_option_name, 'menucagegories') ? wptap_option_value($theme_option_name, 'menucagegories') : -1;
						if($include && is_array($include))
							$include = implode(',', $include);
					?>
					<?php echo preg_replace('@\<li([^>]*)>\<a([^>]*)>(.*?)\<\/a>\n<\/li>?@i', '<li$1><a$2><span>$3</span></a></li>', wp_list_categories('hierarchical=0&echo=0&hide_empty=0&title_li=&include='.$include)); ?>	
				</ul>
			<?php endif; ?>
			<!--######  End Category List -->

			<!-- Bengin  Pages List -->
			<?php if(np_hom_nav_page()): ?>
				<ul id="pagesbox">
					<?php
						$include = wptap_option_value($theme_option_name, 'menupagelist') ? wptap_option_value($theme_option_name, 'menupagelist') : -1;
						if($include && is_array($include))
							$include = implode(',', $include);					
							$output = '';
							$pages = get_pages('depth=0&include='.$include);
						    foreach($pages as $page) {
						    $output .= '<li classs="page_item page-item-'.$page->ID.'"><a title="'.$page->post_title.'" href="'.$page->guid.'"><span>'.$page->post_title.'</span></a></li>';
						 }
						 echo $output;
					?>
				</ul>
			<?php endif; ?>
			<!--##### End  Pages List #####-->
		
			<!-- book mark  -->
				<ul id="menubox">
					<li class="collect1">
						<a id="bookmarkit" title="Bookmark" href="#">
							<img src="<?php bloginfo('template_url'); ?>/images/home/bookmark.png" alt="bookmark" />
						</a>
					</li>
					<!-- bookmark collect /-->

					<li class="rss1">
						<a href="<?php bloginfo('rss2_url');?>" title="RSS">
							<img src="<?php bloginfo('template_url'); ?>/images/home/Rss.png" alt="rss" />
						</a>
					</li>
					<!--##### bookmark rss /-->
					<!-- bookmark email /-->
					<li class="email1">
						<a href="mailto:<?php bloginfo('admin_email');?>" title="Email">
							<img alt="email" title="" src="<?php bloginfo('template_url'); ?>/images/home/email.png" />
						</a>
					</li><!--#### bookmark email /-->
				
				<?php if(nv_hom_bookmarkfacebook()): ?>
					<li class="email1">
						<a href="<?php echo wptap_option_value($theme_option_name, 'facebookurl');?>" title="facebook">
							<img src="<?php bloginfo('template_url'); ?>/images/home/facebook.png" alt="facebook" />
						</a>
					</li>
				<?php endif; ?>
				<!-- boomark facebook /-->
				<?php if(nv_hom_bookmarktwitter()): ?>
					<li class="email1">
						<a href="<?php echo wptap_option_value($theme_option_name, 'twitterurl');?>" title="twitter">
							<img src="<?php bloginfo('template_url'); ?>/images/home/twitter.png" alt="twitter" />
						</a>
					</li>
				<?php endif; ?><!-- bookmark twitter /-->

				<?php if(nv_hom_bookmarkmyspace()): ?>
					<li class="email1">
						<a href="<?php echo wptap_option_value($theme_option_name, 'myspaceurl');?>" title="myspace">
							<img src="<?php bloginfo('template_url'); ?>/images/home/myspace.png" alt="myspace" />
						</a>
					</li>
				<?php endif; ?><!-- bookmark myspace /-->
				</ul>
		<div>		
	</div>
			<!--#### Begin rss and mail ######-->


		<?php if(np_hom_nav_login()): ?>
			<form name="loginform" id="loginform" class="formlogin" action="<?php bloginfo('wpurl'); ?>/wp-login.php" method="post">				
					<input type="text" name="log" id="user_login" class="text-input" value="Username" onblur="if(this.value=='')this.value='Username';" onclick="if(this.value=='Username')this.value='';" />
					<input type="password" name="pwd" id="user_pass" class="text-input" value="Password" onblur="if(this.value=='')this.value='Password';" onclick="if(this.value=='Password')this.value='';"/>
					<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
					<input type="submit" name="submit" value="<?php _e('Login'); ?>" id="loginsubmit"/>
			</form>
		<?php endif; ?>
</div>		
		
