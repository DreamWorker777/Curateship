<script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>

<script>
	var pageNumber = 2;
	$(function(){
		$('ul.pagination').hide();
		$(window).bind('scroll', function(){
			var scrollHeight = $(document).height();
			var scrollPosition = $(window).height() + $(window).scrollTop();

			var isAtBottom = (scrollHeight - scrollPosition == 0 || scrollHeight - scrollPosition == 0.5 || scrollHeight - scrollPosition < 0.5) ? true : false;

			if(isAtBottom){
				$.ajax({
					type: 'GET',
					url: window.location.href + "?page=" + pageNumber,
					success: function(data){
						var loadPost = '';
						var postLinks = $(data).find('.infinite-scroll a.post-link');
						if(postLinks.length){
							postLinks.each(function(tag){
								loadPost += $(this)[0].outerHTML;
							});

							// Add page number when there are links
							pageNumber++;
							$('a.post-link:last').after(loadPost);
						}
					}
				});

			}
		});

		// Disable default behavior of anchor tags when dragging
		var isDragging = false;
		$("a.j-draggable").css('cursor', 'pointer');
		$("a.j-draggable")
		.mousedown(function() {
		    isDragging = false;
		})
		.mousemove(function() {
		    isDragging = true;
		 })
		.mouseup(function() {
		    var wasDragging = isDragging;
		    isDragging = false;
		    if (!wasDragging) {
		        window.location = $(this).attr('src');
		    }
		});
	});

</script>
