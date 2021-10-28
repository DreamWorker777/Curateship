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
      $('body').css('overflow', 'inherit');
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
    $(document).on('click', '.site-load-content a, .site-table-filter a', function(e){
      $('.bulk-selected-ids').html(''); // remove hidden inputs on bulk select
      $('.table-total-selected').text('0'); // set counter to 0

      $('#site-table-limit-dropdown').find('[data-index="0"]').click(); // reset dropdown
    });

    // watch for change on the results limit dropdown
    $(document).on('change', '#site-table-limit', function() {
      var $this = $(this);
      var $submitForm = $this.closest('form');
      /* $submitForm.submit();
      return; */
      var url = $submitForm.attr('action');
      var method = $submitForm.attr('method');
      var dataType = 'HTML';
      var data = $submitForm.serialize();

      $.ajax({
        url: url,
        method: method,
        dataType: dataType,
        data: data
      })
        .done(function(data) {
          $('#site-table-with-pagination-container').html(data);
        })
        .fail(function(jqXHR, textStatus) {
          // console.log('Request failed: ' + textStatus);
          alert('Something went wrong. Please reload the page.');
        })
        .always(function() {});

    });

    // change sort and order whenever a table header column is toggled
    $(document).on('click', '.js-int-table__cell--sort', function(){
      var $this = $(this);
      var sort = $this.data('sort')
      var $checkedOrder = $this.find('input[type="radio"]:checked');
      var order = (order == 'none') ? 'desc' : $checkedOrder.val();

      $('input[name="sort"]').val(sort);
      $('input[name="order"]').val(order);

      // console.log(sort, order);
    });

    $(document).on('click', '.site-table-filter a', function(){
      var $this = $(this);
      $('.site-table-filter a').attr('aria-current', '');
      $this.attr('aria-current', 'page');
    });

    // trigger for bulk select
    $('[data-control-form]').on('click', function(){
      var $this = $(this);
      var $form = $($this.data('control-form'));

      $form.submit();
    });

    $(document).on('click', '.site-load-content a', function (e) {
      e.preventDefault();
      var $this = $(this);
      var url = $this.attr('href');

      $('meta[name="current-url"]').attr('content', url);
      console.log(url);

      // loads page content inside this element
      $('#site-table-with-pagination-container').load(url);
    });
  })();
</script>
@endauth
