<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">    
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		<tr>
        	<td style="width:100%;"><input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" class="search_input" /></td>
            <td style="width:100px; padding-left:20px;"><input name="imageField" type="image" src="<?php bloginfo('template_url'); ?>/images/search.png" alt="SEARCH" /></td>
        </tr>
    </tbody>
    </table>        
</form>