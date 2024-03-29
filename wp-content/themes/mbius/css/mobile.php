@charset "utf-8";

/*
Copyright (c) 2010 MobilizeToday.com, Mobile Web Solutions Inc.

Support: http://www.mobilizetoday.com/wordpress-themes/mobius/

This file is part of the Mobius WordPress Theme.
*/

* {
	-webkit-text-size-adjust: none;
}
/***********************************************************************************************************************
	Reset styles
***********************************************************************************************************************/
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center, fieldset, form {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	vertical-align: baseline;
	background: transparent;
}
blockquote, q {
	quotes: none;
}
:focus {
	outline: 0;
}
ins {
	text-decoration: none;
}
del {
	text-decoration: line-through;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}
html {
	height: 100%;
}
.clear {
	clear: both;
}
/***********************************************************************************************************************
	Layout
***********************************************************************************************************************/
body {
	color: #fff;
	background: #000;
	font: normal 0.69em Arial, Helvetica, sans-serif;
	max-width: 640px;
}
#wrapper {
	padding: 0;
	min-width: 320px;
}
#middle {
	padding-top: 20px;
	width:100%;
}
/***********************************************************************************************************************
	Typography
***********************************************************************************************************************/
h1 {
	font-size: 2.02em;
	margin-bottom: 7px;
	font-weight: normal;
}
h2 {
	font-size: 1.95em;
	margin-bottom: 7px;
	font-weight: bold;
}
h3 {
	font-size: 1.76em;
	margin-bottom: 7px;
	font-weight: bold;
}
h4 {
	font-size: 1.56em;
	margin-bottom: 7px;
	text-transform: uppercase;
	font-weight: bold;
}
h5 {
	font-size: 1.48em;
	margin-bottom: 7px;
	font-weight: bold;
	text-transform: uppercase;
}
h6 {
	font-size: 1.30em;
	margin-bottom: 7px;
	text-transform: uppercase;
	font-weight: bold;
}
#content .text h5 {
	color: #e8da94;
}
p, pre {
	margin-bottom: 14px;
	font-size:1.36em;
}
b, strong {
	font-weight: bold;
}
#content p, .sidebar p {
	line-height: 18px;
	text-align: justify;
}
#header h1 {
	font-size: 3.2em;
	font-weight: bold;
	margin-bottom: 10px;
	text-align: center;
	text-shadow: #333 1px 1px 1px;
	text-transform:uppercase;
}
#header h1 a {
	color: #fff;
	text-decoration: none;
}
#header strong {
	text-transform: uppercase;
	font-size: 1.16em;
	margin-bottom: 14px;
	display: block;
	text-align: center;
	font-weight: normal;
	color: #fcff00;
	text-shadow: #333 1px 1px 1px;
}
/***********************************************************************************************************************
	Page design
***********************************************************************************************************************/
#icons {
	border: 1px solid #2b2b2b;
	padding: 3px 8px;
	height: 28px;
	line-height: 27px;
	font-size: 1.18em;
	margin-bottom: 3px;
}
#icons .skip-navigation {
	float: right;
	padding-left: 17px;
}
#icons a.facebook, #icons a.twitter, #icons a.rss {
	display: block;
	width: 28px;
	height: 28px;
	float: left;
	margin-right: 7px;
}
#icons a.facebook {
	background: url(<?php bloginfo('stylesheet_directory');?>/images/facebook-small.png) left top no-repeat;
}
#icons a.twitter {
	background: url(<?php bloginfo('stylesheet_directory');?>/images/twitter-small.png) left top no-repeat;
}
#icons a.rss {
	background: url(<?php bloginfo('stylesheet_directory'); ?>/images/rss-small.png) left top no-repeat;
}
#content .post, #icons {
	position:relative;
}
#content .post {
	overflow:hidden;
}
#content .post .transparency, #icons .transparency {
	opacity: 0.5;
	filter: alpha(opacity=50);
	-moz-opacity: 0.5;
	background-color: #000;
	position: absolute;
	left:0px;
	top:0px;
	right:0;
	bottom:0;
	z-index:1;
}
#content .postdata {
	position: relative;
	z-index: 2;
}
#icons .items {
	position: relative;
	z-index: 2;
}
#content .post {
	border: 1px solid #2b2b2b;
	margin-bottom: 3px;
}
#content .postdata {
	position: relative;
	z-index: 2;
	padding: 15px 7px;
}
.post-header  h2 {
	font-size: 1.95em;
	font-weight: normal;
	border-bottom: 1px solid #83817a;
	padding-bottom: 3px;
}
.post-header  h2 a {
	text-decoration: none;
	color: #fff;
}
.post-header .time {
	float: right;
	font-size: 0.60em;
	padding-top: 7px;
}
.post-header .post-meta {
	display: block;
	margin-bottom:2px;
	color: #aaa;
	font-size: 1.55em;
}
.post-header .date {
	font-size: 1.18em !important;
}
.post-header {
	padding-bottom: 7px;
}
#content img, .sidebar img {
	border: 1px dashed #fff;
}
hr {
	clear: both;
	color: #737373;
	background-color: #737373;
	height: 1px;
	border: 0;
	margin: 20px 0 15px 0;
}
#content ul, #content ol, .sidebar ul, .sidebar ol {
	padding-left: 17px;
}
#content ul, .sidebar ul {
	list-style-image: url(<?php bloginfo('stylesheet_directory'); ?>/images/list-item.gif);
}
#content li, .sidebar li {
    margin-bottom: 7px;
	font-size: 13px;
}
#content p.big {
	font-size:1.4em;
	padding-top: 10px;
}

#content table, .sidebar table {
	width: 100%;
	border: 1px solid #000;
	border-collapse:separate;
	border-spacing: 1px;
	background: #000;
}

#content table caption, .sidebar table caption{
	background: #e8da94;
	color: #000;
	font-size: 2.0em;
	text-align: left;
	padding: 3px 9px;
	line-height: 32px;
	/*margin: 0 2px;*/
}
#content table th, .sidebar table th {
	padding: 5px;
	background: #3d3d3d;
	text-align: left;
	font-size: 1.5em;
	color: #e8da94;
	font-weight: normal;
	padding: 3px 9px;
}
#content table td, .sidebar table td {
	background: #1a1a1a;
	color: #fff;
	font-size: 1.4em;
	padding: 3px 9px;
}
#content table tfoot td, .sidebar table tfoot td {
	background: #121212;
}
#content .alignleft {
	float: left;
}
#content .alignright {
	float: right;
}
#content img.alignleft {
	margin: 0 7px 3px 0;
}
#content img.alignright {
	margin: 0 0 3px 7px;
}
.aligncenter,
div.aligncenter {
	display: block;
	margin-left: auto;
	margin-right: auto;
}
img.centered {
	display: block;
	margin-left: auto;
	margin-right: auto;
}
#content .post-footer {
	border-top: 1px solid #8a817d;
	padding-top: 7px;
	line-height: 16px;
	font-size: 1.18em;
}

#content .search-result p {
	margin-bottom: 5px;
}
#content .search-result li {
	border-bottom: 1px solid #141414;
	padding-bottom: 10px;
	font-size: 1.85em;
	margin-left: 14px;
}
#content .search-result li ol li, #content .search-result li ul li {
	font-size: 0.65em;
	color: #fff !important;
	border-bottom: 0;
}
#content .search-result h3.title {
	margin-bottom: 4px;
	font-weight: normal;
	font-size: 1em;
}
#content .search-result li p {
	color: #fff;
	font-size: 0.73em;
}
#content .date {
	color: #7d7d7d;
	font-size: 0.73em;
}


#content .breadcrumbs {
	float: left;
	width: 100%;
	margin-bottom: 19px;
	border-bottom: 1px solid #262626;
	font-size: 1.1em;
	height: 36px;
	line-height: 27px;
	overflow:hidden;
}
#content .breadcrumbs div {
	width:600px;
	overflow:hidden;
	position:relative;
}
#content .breadcrumbs div ul {
	position:relative;
	width:99999px;
	padding:0;
	margin:0;
	list-style-type: none !important;
	list-style-image: url(../) !important;
}

#content .breadcrumbs .link-prev {
	display: block;
	position: absolute;
	text-indent: -5555em;
	background: url(<?php bloginfo('stylesheet_directory'); ?>/images/mobile/breadcrumbs-left.png) no-repeat;
	width: 48px;
	height: 36px;
	margin: -5px 0 0 0;
}
#content .breadcrumbs a.link-prev:hover, #content .breadcrumbs a.link-next:hover {
	background-position: 0 -36px;
}
#content .breadcrumbs .link-next {
	display: block;
	position: absolute;
	right: 10px;
	text-indent: -5555em;
	background: url(<?php bloginfo('stylesheet_directory'); ?>/images/mobile/breadcrumbs-right.png) no-repeat;
	width: 48px;
	height: 36px;
	margin: -5px 0 0 245px;
}
#content .breadcrumbs a {
	text-decoration: none;
	color: #fff;
}
#content .breadcrumbs ul {
	float: left;
	margin: 0;
	padding: 0;
	list-style-image: url(../);
	list-style-type: none;
}
#content .breadcrumbs ul li {
	float: left;
}

#content .gallery-item {
	float: left;
	margin-right: 3px;
	margin-bottom: 0;
	margin-top: 7px;
}
#content .gallery-caption {
	padding: 4px 0 0 0;
	text-align: center;
	margin: 0;
	font-size: 1.4em;
	font-weight: bold;
}
#content .gallery-icon img {
	width: 137px !important;
	height: 137px !important;
}

#content blockquote, .sidebar blockquote {
	line-height: 18px;
	font-style: italic;
	min-height: 45px;
	height: auto !important;
	height: 45px;
}
#content blockquote p.author {
	font-weight: bold;
	text-align: right;
	font-style: normal;
}
/* Comments */
#content .commentlist {
	list-style-type: none;
	padding-left: 5px;
	font-size: 1.18em;
}
#content .commentlist li {
	font-size: 1.18em;
}
#content .commentlist li * {
	font-size: inherit;
}
#content .commentlist ul {
	list-style-type: none !important;
	list-style-image: url(../) !important;
}
#content .commentlist .avatar {
	border: 1px solid #737373;
	float: left;
	margin-right: 5px;
	width: 31px;
	height: 31px;
}
#content .commentlist div.comment-author {
	min-height: 33px;
	padding-left: 5px;
	height: auto !important;
	height: 33px;
	position: absolute;
}
#content .commentlist div.p {
	padding-left: 50px;
	border-bottom: 1px solid #141414;
	min-height: 50px;
	height: auto !important;
}
#content .commentlist cite {
	color: #e8da94;
}
#content .commentlist cite a {
	color: #e8da94;
	text-decoration: none;
	font-style: normal;
	font-weight: bold;
}
#content .commentlist cite a:hover {
	text-decoration: underline;
}
.fl {
	float: left;
}
.fr {
	float: right;
}
img.fl {
	margin: 0 12px 3px 0;
}
img.fr {
	margin: 0 0 3px 12px;
}
.read-more a {
	font-size: 1.55em;
	text-align: right;
	display: block;
}
/* Pagination */

#pagination {
	width: 297px;
	padding-top: 10px;
	margin: 0 auto;
}
#pagination ul {
	list-style-type: none;
	list-style-image: url(../);
	padding: 0;
	margin: 0;
}
#pagination ul li {
	float: left;
	width: 27px;
	height: 36px;
	line-height: 36px;
	font-size: 1.91em;
	color: #e8da94;
	text-align: center;
	margin-right: 4px;
}
#pagination ul li a {
	color: #e8da94;
	text-decoration: none;
}
#pagination .previous, #pagination .next {
	width: 36px;
	height: 36px;
}
#pagination .previous a {
	background: url(<?php bloginfo('stylesheet_directory'); ?>/images/mobile-nav-left.jpg) left top no-repeat;
	display: block;
	float: left;
	text-indent: -5555em;
	width: 36px;
	height: 36px;
}
#pagination .next a {
	background: url(<?php bloginfo('stylesheet_directory'); ?>/images/mobile-nav-right.jpg) left top no-repeat;
	display: block;
	float: left;
	text-indent: -5555em;
	width: 36px;
	height: 36px;
}
#pagination .previous a:hover, #pagination .next a:hover {
	background-position: 0 -36px;
}
#pagination li.active a {
	color: #fff;
}
.post li {
	font-size: 1.4em;
}
/***********************************************************************************************************************
		Forms
***********************************************************************************************************************/
#content .post form ul {
	list-style-type: none !important;
	list-style-image: url(../) !important;
	padding:0;
}
#content .post form li {
	margin:0;
}
#content .post legend {
	font-size: 2.09em;
	padding-bottom: 6px;
	color: #fff;
}
#content .post input {
	border: 0;
	color: #b9b8b8;
	padding:9px 0;
	background:transparent;
	font-size: 1.42em;
	width:100%;
}
#content .post textarea {
	border: 0;
	color: #b9b8b8;
	font-family: Arial, Helvetica, sans-serif;
	padding: 0;
	background:transparent;
	font-size: 1.42em;
	width:100%;
}
#content .post label {
	font-size: 1.42em;
}
#content .post label.caption, .widget_search{
	display: none;
}
#content .post div.form-row {
	border-bottom: 1px solid #3d3d3d;
	padding: 0 3px;
}
#content .post .row-first {
	border-top: 1px solid #3d3d3d;
}
#content .post div.form-row div {
	padding:5px 0;
}
#content .post input.submit {
	display: block;
	width: 285px;
	height: 36px;
	font-size: 1.42em;
	color: #000;
	background: url(<?php bloginfo('stylesheet_directory'); ?>/images/submit.jpg) no-repeat;
	float: none !important;
	margin: 10px auto 0 !important;
	padding: 0 !important;
}
#content .post select {
	border:none;
	color: #b9b8b8;
	font: 1.42em Arial, Helvetica, sans-serif;
	width: 100%;
	background:transparent;
	margin:10px 0;
}
#content .post input[type=checkbox],
#content .post input[type=radio] {
	height:30px;
	width:30px;
}
/***********************************************************************************************************************
	Footer
***********************************************************************************************************************/
#footer {
	display:block;
	margin:0 auto 10px;
	font: 0.85em Tahoma, Geneva, Kalimati,sans-serif;
	color: #999;
	width:320px;
	height:38px;
}
.mobile-search {
	margin-bottom: 10px;
}
#footer a {
	color: #999 !important;
	text-decoration: none;
}
#footer a:hover {
	text-decoration: underline !important;
}
#footer p {
	margin: 4px 3px !important;
	text-align: center;
	padding: 0;
}
#footer .mobile-optimized {
	display:none;
}
#footer p em {
	float:left;
	font-style:normal;
	line-height:19px;
	padding-left:15px;
}
#mobilizetoday {
	float:left;
	width:131px;
	height:19px;
	margin-left:4px;
	overflow:hidden;
	text-indent:-7777px;
	background:url(<?php bloginfo('stylesheet_directory'); ?>/images/mobilizetoday.gif) no-repeat;
}

/***********************************************************************************************************************
	Hide desktop content
***********************************************************************************************************************/
#search-box, /*.sidebar,*/ #menu {
	display: none;
}
/***********************************************************************************************************************
	Menu
***********************************************************************************************************************/
#mobile-navigation ul {
	margin: 0;
	padding: 0;
	list-style-type: none;
	list-style-image: url(../);
	
}
#mobile-navigation li a {
	text-decoration: none;
	text-transform: uppercase;
}
#mobile-navigation ul li ul  {
	font-size: 0.74em;
}
#mobile-navigation li {
	line-height: 40px;
}
#mobile-navigation li a {
	color: #fff;
	text-decoration: none;
	padding-left: 23px;
	background: url(<?php bloginfo('stylesheet_directory'); ?>/images/mobile/white-bullet-circle.png) 10px 8px no-repeat;
	font-size: 1.45em;
}
#mobile-navigation ul li ul li a {
	color: #fff;
	text-decoration: none;
	background: url(<?php bloginfo('stylesheet_directory'); ?>/images/mobile/white-bullet-square.gif) 25px 6px no-repeat !important;
	font-size: 1.2em;
}
#mobile-navigation ul li.current ul li a {
    color: #fff;
}
#mobile-navigation li a:hover, #mobile-navigation li.current a {
	background: url(<?php bloginfo('stylesheet_directory'); ?>/images/mobile/yellow-bullet-circle.png) 10px 8px no-repeat;
}
#mobile-navigation ul li.current ul li a:hover {
	color: #fbff00;
	background: url(<?php bloginfo('stylesheet_directory'); ?>/images/mobile/yellow-bullet-square.gif) 25px 6px no-repeat !important;
}

#mobile-navigation ul li ul li a {
	padding-left: 40px;
}
#mobile-navigation li a:hover, #mobile-navigation li.current a {
	color: #fbff00;
}
/***********************************************************************************************************************
	Sample heading
***********************************************************************************************************************/
.sm-slide-block h4 {
	float: left;
	line-height: 27px;
	font-size: 1.4em;
}
.sm-slide-block a.sm-open-close {
	text-indent: -5555em;
	display: block;
	float: right;
	width: 147px;
	height: 27px;
}
.sm-slide-block.inactive a.sm-open-close {
	background-position: 0 0;

}
.sm-slide-block.active a.sm-open-close {
	background-position: 0 -27px;
}
.sm-slide-block.inactive .sm-block {
	display: none;
}
.sm-slide-block .sm-block {
	clear: both;
	background: #0f0f0f;
	border: 1px solid #2b2b2b;
	padding: 0 10px;
	line-height: 18px;
	font-size: 1.4em;
}
.sm-slide-block .sm-block ul li{
	font-size: 1.2em;
	line-height:25px;
	margin:10px 0;
	padding:0;
}
.sm-slide-block .sm-block ul li ul li,
.sm-slide-block .sm-block ul li ul li ul li
{
	font-size: 1.0em;
}
span.comment-time {
	color: #e8da94;
	margin-bottom: 0;
	display: block;
}
#pagination ul li.default {
	width: 100% !important;
	text-align: left !important;
}
#pagination ul li.default .fr {
	float: right;
	text-align: right !important;
}
#pagination ul li a {
	color: #e8da94;
	text-decoration: none;
}
.commentlist img {
	border: 0 !important;
}
.commentlist .fn {
	padding-left: 49px;
}

img {
	max-width:300px;
	height:auto;
}
.sidebar .clear {
	margin-bottom: 5px;
}
#calendar_wrap {
	width: 98%;
	margin: 0;
	margin-left: -7px;
}
.bypostauthor .p p {
	color: #E8DA94 !important;
} 
#content .commentlist ul, #content .commentlist ul ul, #content .commentlist ul ul ul, #content .commentlist ul ul ul ul, #content .commentlist ul ul ul ul ul {
	padding-top: 8px;
}