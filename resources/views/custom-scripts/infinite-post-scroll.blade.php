<script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>

<script>
	function initVideoJS() {
		$('.video-js').each( function(index, elem) {
			videojs(document.getElementsByClassName('video-js')[index], {
				controls: true,
				autoplay: false,
				fill: false,
				fluid: true,
				preload: 'auto'
			});
		});
	}

	$('.js-infinite-scroll').bind("content-loaded", function(e) { 
		initVideoJS();
	});

	var prev_url = '';
	function changePageURLAndTitle(page, url) {
		if (typeof (history.pushState) != "undefined" && prev_url != url) {
			var obj = {Page: page, Url: url};
			document.title = obj.Page;
			history.pushState(obj, obj.Page, obj.Url);
			prev_url = obj.Url;
		}
	}

	function changePageBasicInfo() {
		var scrollTop = $(window).scrollTop();
		$('.single-post').each(function(e) {
			var top = this.getBoundingClientRect().top;
			if ( top > 20 && top < 40) {
				let pg_title = $(this).attr("data-title");
				let url = $(this).attr("data-url");
				changePageURLAndTitle(pg_title, url);

				return false;
			}
		});
	}

	$(window).scroll(function() {
		changePageBasicInfo();
	});
</script>
