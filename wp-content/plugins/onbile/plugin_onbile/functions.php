<?php

function onbile_extract_excerpt($text, $content){

if ( '' == $text ) {
    $text = $content;
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]&gt;', ']]&gt;', $text);
    $text = strip_tags($text, '
');
    $excerpt_length = 40;
    $words = explode(' ', $text, $excerpt_length + 1);
    if (count($words) > $excerpt_length) {
    array_pop($words);
    $text = implode(' ', $words);
}
}
return $text;
}
function onbile_gallery_shortcode($attr) {
	global $post, $wp_locale;
	$image = null;
$attachments =& get_children(array('post_parent'=>get_the_ID(),'post_type'=>'attachment','post_mime_type'=>'image'));

if ($attachments == TRUE) {
       foreach($attachments as $att) {
       $image =  wp_get_attachment_image_src($att->ID,'full',false);
       $img .= '<img src="'.$image[0].'" /><br>';

       }
}
return $img;
}

if($_POST['api_key'])require_once('../../../wp-config.php');

$key = get_option("Onbile_apikey");
$apiKey = $_POST['api_key'];

if ($_POST['api_key'] == $key){

   if ($_POST['method'] == "get_posts"){
         global $post, $json;
         $categories = 	get_option("Onbile_categoriesIncludes");
          if ($categories == ""){
              $include = "";
          }else{
              $include = "category=".$categories."&";
          }
         $myposts = get_posts($include.'numberposts=5');
         $i = 0;
         foreach($myposts as $post) :
             setup_postdata($post);
              $post->content = get_the_content();
              $post->excerpt = onbile_extract_excerpt(get_the_excerpt(), get_the_content());
              $gallery_shortcode = '[gallery id="' . intval( $post->ID ) . '"]';
              $post->content  = apply_filters( 'the_content', $gallery_shortcode );
              $post->count = $category->category_count;
              $gallery = onbile_gallery_shortcode($attr);
              if ( preg_match('/\[gallery(.*?)?\]/', $output['post']->post_content, $matches) ) {
                 $content = explode($matches[0], $output['post']->post_content, 2);
                 $post->post_content = $content[0].$gallery.$content[1];
              }
              $post->author = get_the_author();
              $i = 0;
              foreach((get_the_category($post->ID)) as $category) {
                $post->categories[$i] =  $category;
                $i ++;
              }
              $output[]= $post;
         endforeach;
         echo $json->encode($output);

    }
    if ($_POST['method'] == "get_posts_cat"){
         global $post, $json;
         $page = $_POST['page'];
         if($page > 1)$offset = "&offset=".($page-1)*5;
         $category = get_category($_POST['category']);
         $myposts = get_posts('category='.$_POST['category'].$offset);
         $i = 0;
         foreach($myposts as $post) :
             setup_postdata($post);
              $post->content = get_the_content();
              $post->excerpt = onbile_extract_excerpt(get_the_excerpt(), get_the_content());
              $gallery_shortcode = '[gallery id="' . intval( $post->ID ) . '"]';
              $post->content  = apply_filters( 'the_content', $gallery_shortcode );
              $post->count = $category->category_count;
              $gallery = onbile_gallery_shortcode($attr);
              if ( preg_match('/\[gallery(.*?)?\]/', $output['post']->post_content, $matches) ) {
                 $content = explode($matches[0], $output['post']->post_content, 2);
                 $post->post_content = $content[0].$gallery.$content[1];
              }
              $post->author = get_the_author();
              $i = 0;
              foreach((get_the_category($post->ID)) as $category) {
                $post->categories[$i] =  $category;
                $i ++;
              }
              $output[] = $post;
         endforeach;

         echo $json->encode($output);

    }
    if ($_POST['method'] == "get_categories"){
          global $post, $json;
          $categories = 	get_option("Onbile_categoriesIncludes");
          if ($categories == ""){
              $include = "";
          }else{
              $include = "category=".$categories;
          }
          $categories=  get_categories($include.'parent=0');
          foreach ($categories as $cat) {
            $output[] = $cat;
          }
          echo $json->encode($output);

    }
    if ($_POST['method'] == "search"){

         global $wpdb, $json;
        $query_string = $_POST['search'];


     // foreach
        query_posts("s=".$query_string . "&order=ASC");
        //The Loop
        if ( have_posts() ) : while ( have_posts() ) : the_post();
              $post->content = get_the_content();
              $post->excerpt = onbile_extract_excerpt(get_the_excerpt(), get_the_content());
              $gallery_shortcode = '[gallery id="' . intval( $post->ID ) . '"]';
              $post->content  = apply_filters( 'the_content', $gallery_shortcode );
              $post->count = $category->category_count;
              $gallery = onbile_gallery_shortcode($attr);
              if ( preg_match('/\[gallery(.*?)?\]/', $output['post']->post_content, $matches) ) {
                 $content = explode($matches[0], $output['post']->post_content, 2);
                 $post->post_content = $content[0].$gallery.$content[1];
              }
              $post->author = get_the_author();
              $i = 0;
              foreach((get_the_category($post->ID)) as $category) {
                $post->categories[$i] =  $category;
                $i++;
              }
              $output[]= $post;
        endwhile; else:

        endif;
        echo $json->encode($output);
        //Reset Query
        wp_reset_query();
    }

    if ($_POST['method'] == "get_post"){
          global $post, $json;
          query_posts('p='.$_POST['postID']);

          global $more;
          $wantComment = 	get_option("Onbile_wantComments");
            // set $more to 0 in order to only get the first part of the post
            $more = 0;

            // the Loop
            while (have_posts()) : the_post();
              // the content of the post
              
              $post->content = get_the_content();
              $post->excerpt = onbile_extract_excerpt(get_the_excerpt(), get_the_content());
              $gallery_shortcode = '[gallery id="' . intval( $post->ID ) . '"]';
              $post->content  = apply_filters( 'the_content', $gallery_shortcode );
              $gallery = onbile_gallery_shortcode($attr);
              if ( preg_match('/\[gallery(.*?)?\]/', $output['post']->post_content, $matches) ) {
                 $content = explode($matches[0], $output['post']->post_content, 2);
                 $post->post_content = $content[0].$gallery.$content[1];
              }
              $post->author = get_the_author();
              $i = 0;
              foreach((get_the_category($post->ID)) as $category) {
                $output['categories'][$i] =  $category;
                $i = 1;
              }
              $output['post'] = $post;
              if ($wantComments != "false"){
                  $comments = get_comments('post_id='.$_POST['postID']);

                      if ($comments ) {
                              $i= 0;
                              foreach ($comments as $comment) :
                                  if ($comment->comment_approved == '0') :
                                      $output['commnent'][$i] = "err_3"; // comentario sin aprovar
                                  else:
                                      $output['commnent'][$i] = $comment;
                                  endif;
                                  $i++;
                              endforeach;
                     } else { // this is displayed if there are no comments so far

                              if ( comments_open() ) :
                                $output['comment_stat'][$i] ='err_0';//no comment

                              else : // comments are closed
                                $output['comment_stat'][$i] ='err_1';//comment_close

                              endif;

                    }
              }else{
                  $output['commnent'] = "nocoment";
              }
          endwhile;

         echo $json->encode($output);

    }

    if ($_POST['method'] == "save_coment"){

        global $post, $json;
        $time = current_time('mysql');

        $data = array(
            'comment_post_ID' => $_POST['postID'],
            'comment_author' => $_POST['author'],
            'comment_author_email' => $_POST['email'],
            'comment_author_url' => 'http://',
            'comment_content' => $_POST['comment'],
            'comment_type' =>'' ,
            'comment_parent' => 0,
            'user_id' => '',
            'comment_author_IP' => $_SERVER["REMOTE_ADDR"],
            'comment_agent' => '',
            'comment_date' => $time,
            'comment_approved' => 0,
        );


        wp_insert_comment($data);

    }
}else{

}
class onbile{
    function GetWpCategories()
	{
		global $wpdb;


		if( $wpdb->terms != '' )
		{
			$sql = "SELECT t.term_id AS cat_ID, t.name AS cat_name FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON tt.term_id = t.term_id WHERE tt.taxonomy = 'category' ORDER BY t.name";
		}
		else
		{
			$sql = "SELECT cat_ID, cat_name FROM $wpdb->categories ORDER BY cat_name";
		}

		$results = $wpdb->get_results($sql);
		if (!isset($results))
			$results = array();
		return $results;
     }
    function generalConfiguration(){
        $categories = 	get_option("Onbile_categoriesIncludes");
        $categories = explode(",", $categories);
        $wantComment = 	get_option("Onbile_wantComments");
        ?>
        <div class="wrap">
        <h2><?php echo __("General Configuration", 'meenews'); ?></h2>
        <form id="settings" name="settings" action="?page=onbile/generalconfiguration.php" enctype="multipart/form-data" method="post">
        <table class="widefat">
        <tbody>

        <tr>
        <th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterSubject"><?php echo __("Chose categories to show in category list of your mobile version:", 'onbile'); ?></label></th>
        <td>
        <?php
        $cats = onbile::GetWpCategories();
        foreach ($cats as $cat) :
        $checked = "";
        foreach ($categories as $categoselect)
        {
            if ($categoselect == $cat->cat_ID )
            {
                $checked = "checked=\"checked\"";
                break;
            }
        }
        ?>
        <input type="checkbox" name="categories[]" value="<?php echo $cat->cat_ID?>" <?php echo $checked?> /> <?php echo $cat->cat_name ?> <br/>
        <?php
        endforeach;
        ?>
        </td>
        </tr>
         <tr>
            <th style="text-align:left;vertical-align:top;" scope="row"><label style="vertical-align:top;" for="letterFrom"><?php echo __("Do you accept comments in your posts:", 'onbile'); ?></label></th>
        <td>
         <input <?php if($wantComment == "true") {echo 'checked = "true"';} ?> type="radio" id="wantComments"	name="wantcomments" value="true"  /><label for="period_0"><?php echo __("Yes", 'onbile'); ?></label>
         <input <?php if($wantComment == "false") {echo 'checked = "true"';}?>  type="radio" id="wantComments"	name="wantcomments" value="false"  /><label for="period_1"><?php echo __("No", 'onbile'); ?></label><br /></p>
         <br>
        </td>
        </tr>
        </tbody>
        </table>
        <div class="submit">
        <input name="send" type="submit" value="<?php echo __("Save Configuration", 'onbile'); ?>" />
        </div>
        </form>
        </div>
        <?php
     }

}
$onbile = new onbile();
?>