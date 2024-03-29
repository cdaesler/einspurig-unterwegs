/*
Copyright (c) 2010 MobilizeToday.com, Mobile Web Solutions Inc.

Support: http://www.mobilizetoday.com/wordpress-themes/mobius/

This file is part of the Mobius WordPress Theme.
*/

#wrapper {
	background: url(<?php bloginfo('stylesheet_directory'); ?>/images/sky-blue/mobile/body-background.jpg) center top no-repeat;
}
#middle {
	background: url(<?php bloginfo('stylesheet_directory'); ?>/images/sky-blue/mobile/head-texture.jpg) left top repeat-x;
}

a {
	color: #60bef8;
}
a:hover {
	color: #60bef8;
	text-decoration: none;
}

#content .breadcrumbs span {
	color: #60bef8;
}
#content .search-result li {
	color: #60bef8;
}
#content blockquote {
	padding-left: 40px;
	background: url(<?php bloginfo('stylesheet_directory'); ?>/images/sky-blue/blockquote-small.png) no-repeat;
}
#content .commentlist div.comment-author {
	border-left: 3px solid #40aaeb;
}
#pagination ul li.active {
	background: url(<?php bloginfo('stylesheet_directory'); ?>/images/sky-blue/pagination-bg.jpg) center center no-repeat;
}


#mobile-navigation ul {
	background: url(<?php bloginfo('stylesheet_directory'); ?>/images/sky-blue/mobile/menu-bg.jpg);
	border-top: 1px solid #63b5e9;
}
#mobile-navigation ul li ul {
	background: #3ca5e4 url(../);
	border-top: 0;
}
#mobile-navigation li {
	border-bottom: 1px solid #63b5e9;
	color: #fff;
	padding: 0 0 0 0;
	margin: 0;
}
div.mobile-search {
	background: #00395f;
	line-height: 40px;
	height: 40px;
	border-bottom: 1px solid #63b5e9;
}
div.mobile-search input {
	border: 0;
	background: #00395f !important;
	color: #fff !important;
	font-size: 1.73em;
	padding-left: 24px;
	width: 78%;
	margin-top: 6px;
}
div.mobile-search input.submit {
	background: #00395f url(<?php bloginfo('stylesheet_directory'); ?>/images/sky-blue/mobile/mobile-search-bg.gif) right top no-repeat !important;
	display: block;
	text-indent: -5555em;
	float: right !important;
	width: 35px;
	padding-left: 0;
	height: 40px;
	margin-top: 0;
}
.sm-slide-block a.sm-open-close {
	background: url(<?php bloginfo('stylesheet_directory'); ?>/images/sky-blue/mobile/heading.png) 0 -27px no-repeat;
}
#icons .skip-navigation {
	background: url(<?php bloginfo('stylesheet_directory'); ?>/images/sky-blue/mobile/skip-navigation.gif) left center no-repeat;
}