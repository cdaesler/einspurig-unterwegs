		<div id="footer">
			<p>All Contents Copyright &copy; <?php bloginfo('sitename');?></p>
			<p>Powered by <a href="http://www.wordpress.org">WordPress</a> & Mobilized  by <a href="http://www.wptap.com/index.php/news-press/">WPtap</a></p>
		</div>
	</div>
<?php
$html = <<< EOT
\n\n<script type="text/javascript">
	//slideshow
	$('#featured-slideshow').cycle({
		fx: 'fade',
		speed: 250,
		next: '#controls .next',
		prev: '#controls .prev',
		timeout: 6000,
		width:"100%"
	});
</script>
EOT;
echo $html;
?>
<?php wp_footer();?>
</body>
</html>
