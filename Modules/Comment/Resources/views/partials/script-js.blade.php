@auth
<script>
  (function(){

    // Interactive table checkbox toggle
    $(document).on('input', '.js-int-table__select-all, .js-int-table__select-row', function(){
      var $checkBoxesChecked = $('.js-int-table__select-row:checked');
      var $totalSelected = $('.table-total-selected');
      var $inputHiddenTemplate = $("#selected-id-template").html().trim();

      $('.bulk-selected-ids').html('');

      $checkBoxesChecked.each(function(){
        var $this = $(this);
        var $selectedID = $inputHiddenTemplate.replace(/@{{value}}/gi, $this.val());
        $('.bulk-selected-ids').append($selectedID);
      });

      $totalSelected.text($checkBoxesChecked.length);
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
          console.log('Request failed: ' + textStatus);
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

      console.log(sort, order);
    });
  })();
</script>
@endauth
