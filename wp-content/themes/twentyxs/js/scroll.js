var $xs = jQuery.noConflict();

$xs.easing.quart = function (x, t, b, c, d) {
	return -c * ((t=t/d-1)*t*t*t - 1) + b;
};

$xs(document).ready(function(){

	$xs('a[href*=#totop],a[href*=#respond],a[href*=#comments],a[href*=#content]').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var $target = jQuery(this.hash);
			$target = $target.length && $target || $xs('[name=' + this.hash.slice(1) +']');
			if ($target.length) {
				var targetOffset = $target.offset().top;
				$xs('html,body').animate({ scrollTop: targetOffset }, 1200, 'quart');
				return false;
			}
		}
	});

});