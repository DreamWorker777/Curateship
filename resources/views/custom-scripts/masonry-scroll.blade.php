<script>
	$(function(){
		var repositionId = null;
		var prevScrollPos = 0;

		function freezeScroll() {
			$(window).scrollTop(prevScrollPos);
			repositionId = setTimeout(freezeScroll, 1);
		}

		$('.js-infinite-scroll').bind("content-loaded", function(e) { 
			prevScrollPos = $(window).scrollTop();
			$('html').css('scroll-behavior', 'auto');
			freezeScroll();

			window.dispatchEvent(new Event('resize'));
			setTimeout(function() {
				clearTimeout(repositionId);
				$('html').css('scroll-behavior', 'smooth');
			}, 550);
		});
	});
</script>
