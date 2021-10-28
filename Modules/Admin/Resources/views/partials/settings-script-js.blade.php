@auth

<script>
  $(function(){
    function showErrorMsg(dest_name, errors) {
      $('.' + dest_name).addClass('alert-danger').removeClass('alert-success');
      $('.' + dest_name + ' .msg-container').html("");

      for (const [key, error] of Object.entries(errors)) {
        for (let i=0; i<error.length; i++) {
          $('.' + dest_name + ' .msg-container').append($('<p />').html(error[i]));
        }
      }
      $('.' + dest_name).addClass('alert--is-visible');
    }

    function showSuccessMsg(dest_name, message, data = null) {
      $('.' + dest_name).addClass('alert-success').removeClass('alert-danger');
      $('.' + dest_name + ' .msg-container').html("");

      $('.' + dest_name + ' .msg-container').append($('<p />').html(message));
      if (data != null) {
        var report_template = '<p><strong>' + data.total.removed + '</strong> of <strong>' + data.total.count + '</strong> files are removed.</p>';
        report_template += '<p>Total size: <strong>' + data.total.size + '</strong></p>';
        report_template += '<p>Avatars: Removed <strong>' + data.avatars.removed + '</strong> of <strong>' + data.avatars.total + '</strong> files.</p>';
        report_template += '<p>Cover Photos: Removed <strong>' + data.cover.removed + '</strong> of <strong>' + data.cover.total + '</strong> files.</p>';
        report_template += '<p>Post Images: Removed <strong>' + (data.posts.original.removed + data.posts.thumbnail.removed) + '</strong> of <strong>' + (data.posts.original.total + data.posts.thumbnail.total) + '</strong> files.</p>';
        report_template += '<p>Post Videos: Removed <strong>' + data.posts.video.removed + '</strong> of <strong>' + data.posts.video.total + '</strong> files.</p>';
        $('.' + dest_name + ' .msg-container').append(report_template);
      }

      $('.' + dest_name).addClass('alert--is-visible');
    }

    $(document).on('click', '#btnSave', function(e){
      e.preventDefault();

      $(this).html('Please wait...');
      var formData = new FormData($('#formSetting')[0]);

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
      });

      $.ajax({
        url: "{{ route('settings.store') }}",
        dataType: 'json',
        type: 'post',
        contentType: false,
        processData: false,
        data: formData,
        success: function(response){
          console.log(response);

          if (response.status == false) {
            showErrorMsg('alert-main', response.errors);
          } else {
            showSuccessMsg('alert-main', response.message);
          }

          $('#btnSave').html('Save');
        }
      });
    });

    $(document).on('click', '#btnClearUnusedFiles', function(e){
      e.preventDefault();

      $(this).html('Clearing Unused Media Files...');

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
      });

      $.ajax({
        url: "{{ route('settings.clear_media') }}",
        dataType: 'json',
        type: 'get',
        contentType: false,
        processData: false,
        success: function(response){
          console.log(response);

          if (response.status == false) {
            showErrorMsg('alert-sub', response.errors);
          } else {
            showSuccessMsg('alert-sub', response.message, response.data);
          }

          $('#btnClearUnusedFiles').html('Clear Files');
        }
      });
    });

    /** Custom script for smooth scrolling when there is a fixed header */
    var mainHeaderHeight = parseInt($('header').height());
    var subHeaderHeight = parseInt($('.controlbar--sticky').height());
    var lastItemIndex = 0;
    $('.js-smooth-scroll').each(function(index) {
      $(this).click(function() {
        var currentItemIndex = index;
        if (currentItemIndex > lastItemIndex) {
          // down scroll
          $('html').css('scroll-padding', mainHeaderHeight + subHeaderHeight + 'px');
        } else {
          // up scroll
          $('html').css('scroll-padding', mainHeaderHeight + subHeaderHeight + 'px');
        }

        lastItemIndex = currentItemIndex;
      });
    });
  });
</script>
@endauth
