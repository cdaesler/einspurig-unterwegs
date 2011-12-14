<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<link rel="stylesheet" href="wp-content/themes/glossy-stylo-grau/style.css" type="text/css" media="screen" />
	<script src="http://www.google.com/jsapi"></script>
	<script>google.load("jquery", "1");</script>
	<script src="wp-includes/js/jquery.ez-bg-resize.js" type="text/javascript" charset="utf-8"></script>
		<script>
		$(document).ready(function() {
			
			var BGImageArray = ["bg.jpg","bg2.jpg","bg3.jpg","bg4.jpg"];
			var BGImage = BGImageArray[Math.floor(Math.random()*BGImageArray.length)]

			$("body").ezBgResize({
				img     : "http://MACINTOSH.local:8888/images/bg.jpg", // Relative path example.  You could also use an absolute url (http://...).
				opacity : 1, // Opacity. 1 = 100%.  This is optional.
				center  : true // Boolean (true or false). This is optional. Default is true.
			});
		});
	</script>
</head>	
<body>
	<div id="page">	
		<div id="header"><h1>Wartungsarbeiten</h1></div>
		<div id="content"  class="narrowcolumn">
		  <div id="post-1" class="post">
			<p>Lieber Besucher von www.einspurig-unterwegs.de,
				<br /><br />
               aufgrund geplanter Wartungsarbeiten ist die Seite derzeit nicht erreichbar. 
               <br />
               <br />
               <br />
               Bitte komm sp&auml;ter nochmal wieder.
               <br />
            </p>
            <p>Vielen Dank f&uuml;r Dein Verst&auml;ndnis. </p>
           </div>
           </div>
         </div>
    </div>
</body>