@auth
<script>
  (function(){

    setInterval(() => {
      if ($('.mega-nav').hasClass('hide-nav--off-canvas')) {
        $('.sidebar--sticky-on-desktop').addClass('custom');
      }else{
        $('.sidebar--sticky-on-desktop').removeClass('custom');
      }
    }, 0);

    $('.custom-modal-hide-body-scroll').on('modalIsOpen', function(){
      $('body').css('overflow', 'hidden');
    }).on('modalIsClose', function(){
      $('body').css('overflow', 'hidden auto');
    });

    // Interactive table checkbox toggle
    $(document).on('input', '.js-int-table__select-all, .js-int-table__select-row', function(){
      var $checkBoxesChecked = $('.js-int-table__select-row:checked');
      var $totalSelected = $('.table-total-selected');
      // console.log($("#selected-id-template").html());
      var $inputHiddenTemplate = $("#selected-id-template").html().trim();

      $('.bulk-selected-ids').html('');

      $checkBoxesChecked.each(function(){
        var $this = $(this);
        var $selectedID = $inputHiddenTemplate.replace(/@{{value}}/gi, $this.val());
        $('.bulk-selected-ids').append($selectedID);
      });

      $totalSelected.text($checkBoxesChecked.length);
    });

    // when pagination links are clicked, only load the table
    $(document).on('click', '.site-table-pagination-ajax a, .site-table-filter a', function(e){
      e.preventDefault();
      var $this = $(this);
      var url = $this.attr('href');

      $('meta[name="current-url"]').attr('content', url);
      // console.log(url);

      $('.bulk-selected-ids').html(''); // remove hidden inputs on bulk select
      $('.table-total-selected').text('0'); // set counter to 0

      $('#site-table-limit-dropdown').find('[data-index="0"]').click(); // reset dropdown

      $('#site-table-with-pagination-container').load(url, function(){
        var $this = $(this);
        // Reload content for modal component issue
        $this.load(url);

        // Apply pagination dynamically
        var $tablePaginationBottom = $('#table-pagination-bottom');
        var $tablePaginationTop = $('#table-pagination-top');

        $tablePaginationTop.html(
          ($tablePaginationBottom.length > 0) ?
            $tablePaginationBottom.html() :
            $tablePaginationTop.html('')
        );

      });
    });

    // trigger for second menu
    $('.js-anim-second-menu').on('click', function() {
      var target = $(this).attr('data-target');

      if (target) {
        // close already opened sub menu
        $('.header-v2__nav--is-visible').each(function(idx, elem) {
          if ($(elem).attr('id') !== target) {
            $(elem).removeClass('header-v2__nav--is-visible');
          }
        });

        // change mobile toggle menu status
        $('.anim-menu-btn--state-b').prop('aria-expanded', false).removeClass('anim-menu-btn--state-b');

        var targetMenu = document.getElementById(target);
        $(targetMenu).toggleClass('header-v2__nav--is-visible');
      }
    });

    $('.js-anim-menu-btn').on('click', function() {
      // check if second menu is already opened
      if ($('#second-menu').hasClass('header-v2__nav--is-visible'))
        $('#second-menu').removeClass('header-v2__nav--is-visible');
    });
  })();
</script>
@endauth
