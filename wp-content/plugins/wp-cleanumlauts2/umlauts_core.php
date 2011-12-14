<?php
// input
$o42_cu_chars['in'] = array(
    chr(196), chr(228), chr(214), chr(246), chr(220), chr(252), chr(223)
);
$o42_cu_chars['ecto'] = array(
    'Ä', 'ä', 'Ö', 'ö', 'Ü', 'ü', 'ß'
);
$o42_cu_chars['utf8'] = array(
    utf8_encode('Ä'), utf8_encode('ä'), utf8_encode('Ö'), utf8_encode('ö'),
    utf8_encode('Ü'), utf8_encode('ü'), utf8_encode('ß')
);
$o42_cu_chars['perma'] = array(
    'Ae', 'ae', 'Oe', 'oe', 'Ue', 'ue', 'ss'
);

// output
$o42_cu_chars['post'] = array(
    '&Auml;', '&auml;', '&Ouml;', '&ouml;', '&Uuml;', '&uuml;', '&szlig;'
);
$o42_cu_chars['feed'] = array(
    '&#196;', '&#228;', '&#214;', '&#246;', '&#220;', '&#252;', '&#223;'
);

// using this function to restore the raw title because of bug in WP 3.1
function o42_restore_raw_title( $title, $raw_title="", $context="" ) {
	if ( $context == 'save' )
		return $raw_title;
	else
		return $title;
}

function o42_cu_permalinks($title) {
	global $o42_cu_chars;

	if (seems_utf8($title)) {
			$invalid_latin_chars = array(chr(197).chr(146) => 'OE', chr(197).chr(147) => 'oe', chr(197).chr(160) => 'S', chr(197).chr(189) => 'Z', chr(197).chr(161) => 's', chr(197).chr(190) => 'z', chr(226).chr(130).chr(172) => 'E');
			$title = utf8_decode(strtr($title, $invalid_latin_chars));
	}
	$title = str_replace($o42_cu_chars['ecto'], $o42_cu_chars['perma'], $title);
	$title = str_replace($o42_cu_chars['in'], $o42_cu_chars['perma'], $title);
	$title = sanitize_title_with_dashes($title);
	return $title;
}

function o42_cu_content($content) {
    global $o42_cu_chars;
    $erg = $content;
    if (strtoupper(get_option('blog_charset')) == 'UTF-8') {
			$erg = str_replace($o42_cu_chars['utf8'], $o42_cu_chars['post'], $erg);
    }
    $erg = str_replace($o42_cu_chars['ecto'], $o42_cu_chars['post'], $erg);
    $erg = str_replace($o42_cu_chars['in'], $o42_cu_chars['post'], $erg);
    return $erg;
}

function o42_cu_feed($content) {
    global $o42_cu_chars;
		$erg = $content;
    if (strtoupper(get_option('blog_charset')) == 'UTF-8') {
			$erg = str_replace($o42_cu_chars['utf8'], $o42_cu_chars['feed'], $erg);
    }
    $erg = str_replace($o42_cu_chars['ecto'], $o42_cu_chars['feed'], $erg);
    $erg = str_replace($o42_cu_chars['in'], $o42_cu_chars['feed'], $erg);
    return $erg;
}

$options = get_option('umlauts_options');

/* enable cleaning of permalinks */
if ($options['activate_permalinks']) {
	remove_filter('sanitize_title', 'sanitize_title_with_dashes');
	add_filter( 'sanitize_title', 'o42_restore_raw_title', 9, 3 );
	add_filter( 'sanitize_title', 'o42_cu_permalinks' , 10);
}

/* enable cleaning of feeds */
if ($options['activate_feeds']) {
	add_filter('the_title_rss', 'o42_cu_feed');
	add_filter('the_excerpt_rss', 'o42_cu_feed');
	add_filter('the_content_rss', 'o42_cu_feed');
}

/* enable cleaning of posts */
if ($options['activate_posts']) {
	add_filter('the_title', 'o42_cu_content');
	add_filter('the_excerpt', 'o42_cu_content');
	add_filter('the_content', 'o42_cu_content');
	add_filter('comment_text', 'o42_cu_content');
}

// filter comments
if ($options['activate_comments']) {
	add_filter('comment_author', 'o42_cu_feed');
	add_filter('comment_author_rss', 'o42_cu_feed');
	add_filter('comment_author_link', 'o42_cu_feed');
	add_filter('comment_text_rss', 'o42_cu_feed');
}
?>
