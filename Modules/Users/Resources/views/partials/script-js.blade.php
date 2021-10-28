@auth
<link rel="stylesheet" href="{{ asset('assets/js/croppie/croppie.min.css') }}">
<script src="{{ asset('assets/js/croppie/croppie.min.js') }}"></script>
<script>
  (function() {
    // load content when user clicked on sidebar links
    $(document).on('change', '#filterItems', function(e) {
      e.preventDefault();
      var $this = $(this);
      var url = "{{ url('/admin/users') }}";
      var url_snippet = $this.find('option:selected').closest('optgroup').attr('data-type');
      if (url_snippet == undefined) {
        url_snippet = 'status';
      }
      if ($this.val()) {
        url = url + '?' + url_snippet + '=' + $this.val();
      }
      $('meta[name="current-url"]').attr('content', url);

      localStorage.setItem("cs_admin_users_init_tab", $(this).val());

      // loads page content inside this element
      $('#site-table-with-pagination-container').load(url, function() {
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

    // trigger to submit modal form
    $('.modal-form').on('submit', function(e) {
      var $this = $(this);

      var url = $this.attr('action');
      var method = $this.attr('method');
      var dataType = 'JSON';
      var data = $this.serialize();

      var formData = new FormData($(this)[0]);

      var currentURL = $('meta[name="current-url"]').attr('content');

      $this.find('.form-error-msg').removeClass('form-error-msg--is-visible').html('');

      $.ajax({
        url: url,
        method: method,
        dataType: dataType,
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          $this.get(0).reset();
          window.top.location.reload();
        },
        error: function(response, textStatus) {
          var jsonResponse = response.responseJSON;
          var errors = jsonResponse.errors;

          $.each(errors, function(key, value) {
            $this.find('[name="' + key + '"]' + ' + .form-error-msg').addClass('form-error-msg--is-visible').html(value[0]);
          });
        },
        always: function(response) {},
      });

      return false;
    });

    /* ***********************Admin User Images setting Add New*********************** */
    // trigger to show add user modal form
    $(document).on('click', '.modal-trigger-add-user', function(e) {
      e.preventDefault();

      var $this = $(this);
      var url = $this.data('href');
      var $element = $('#ajax-add-user-form');
      $element.load(url, function(response, status, xhr) {});

      $('#cover-photo-add').val('');

      $('#btnDeleteAvatarAdd').prop('disabled', true).addClass('btn--disabled');
      $('#settings-avatar-add').hide();

      $('#btnDeleteCoverPhotoAdd').prop('disabled', true).addClass('btn--disabled');

      let $options = {
        enableExif: true,
        showZoomer: false,
        viewport: {
          width: 550,
          height: 280,
          type: 'square' //circle
        },
        boundary: {
          width: 550,
          height: 280
        }
      };

      $options['url'] = "/assets/img/gray.jpg";

      if (!$('#imageDemoAdd').data('croppie'))
        $image_crop_add = $('#imageDemoAdd').croppie($options);
      else
        $image_crop_add.croppie('bind', {
          url: $options['url'],
        });
    });

    $('[data-custom-image-file-preview]').on('change', function() {
      readURL(this);
    });

    $('[data-custom-image-file-reset-file]').on('click', function() {
      var $this = $(this);
      var targetFile = $this.data('custom-image-file-reset-file');
      var $targetFileLabel = $(targetFile).prev('.file-upload__label').find('.file-upload__text');
      var targetImage = $(targetFile).data('custom-image-file-preview');

      $targetFileLabel.text($targetFileLabel.data('default-text'));

      $(targetImage).hide();

      $this.prop('disabled', true).addClass('btn--disabled');

      $this.closest('form').find('[name="delete_avatar"]').val(true);

    });

    // set image to avatar when read file
    function readURL(input) {
      var $this = $(input);
      var target = $this.data('custom-image-file-preview');
      var resetter = $this.data('custom-image-file-resetter');
      $('#btnDeleteAvatarAdd').prop('disabled', false).removeClass('btn--disabled');

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $(target).attr('src', e.target.result).show();
          $(resetter).prop('disabled', false).removeClass('btn--disabled');
          $this.closest('form').find('[name="delete_avatar"]').val('');
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

    $('#uploadImageAdd').on('change', function() {
      readFileAdd(this);
      validateSize(this);

      var reader = new FileReader();
      reader.onload = function(event) {
        $image_crop_add.croppie('bind', {
          url: event.target.result
        }).then(function() {
          $('.alert-cover-photo').removeClass('hidden');
        });
      }
      reader.readAsDataURL(this.files[0]);
    });

    // Read file when select file in admin add modal
    function readFileAdd(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          result = e.target.result;
          arrTarget = result.split(';');
          tipo = arrTarget[0];
          validFormats = ['data:image/jpeg', 'data:image/png'];
          if (validFormats.indexOf(tipo) == -1) {
            alert('Accept only .jpg o .png image types');
            $('.alert-cover-photo').addClass('hidden');
            $('#uploadImageAdd').val('');
            return false;
          }
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    // cancel user cover photo in admin dashboard
    $('#btnCancelAdd').on('click', function(event) {
      $('.alert-cover-photo').addClass('hidden');
      $image_crop_add.croppie('bind', {
        url: "/assets/img/gray.jpg",
      });
    });

    // upload user cover photo in admin dashboard
    $('#btnUploadCoverPhotoAdd').on('click', function(event) {
      $image_crop_add.croppie('result', {
        type: 'base64',
        format: 'png',
        size: 'original'
      }).then(function(response) {
        $('#base64ImageAdd').val('');
        $('#base64ImageAdd').val(response);
        $.ajax({
          url: "{{ route('admin.add-coverphoto') }}",
          dataType: 'json',
          type: 'post',
          data: {
            _token: $('input[name=_token]').val(),
            base64ImageAdd: response
          },
          success: function(response) {
            if (response.status) {
              $('.alert-cover-photo').addClass('hidden');
              $('#cover-photo-add').val(response.file_name);
              $('#btnDeleteCoverPhotoAdd').prop('disabled', false).removeClass('btn--disabled');

            }
          }
        });
      });
    });

    // Delete user avatar in admin dashboard in add modal
    $(document).on('click', '#btnDeleteAvatarAdd', function(e) {
      e.preventDefault();
      if (confirm('Are you sure you want to delete your cover photo?')) {
        var $el = $('#avatar-add');
        $el.wrap('<form>').closest('form').get(0).reset();
        $el.unwrap();
        $("#avatar-add").val('');

        $('#btnDeleteAvatarAdd').prop('disabled', true).addClass('btn--disabled');
        $('#settings-avatar-add').hide();
      }
    });

    // Delete cover photo in admin dashboard in add modal
    $('#btnDeleteCoverPhotoAdd').on('click', function() {
      if (confirm('Are you sure you want to delete your avatar?')) {
        $('#cover-photo-add').val('');
        $('#btnDeleteCoverPhotoAdd').prop('disabled', true).addClass('btn--disabled');
        $('.alert-cover-photo').addClass('hidden');
        $image_crop_add.croppie('bind', {
          url: "/assets/img/gray.jpg",
        });
      }
    });
    /* ***********************Admin User Images setting Add New*********************** */

    /* ***********************Admin User Images setting Update*********************** */
    var currentUserAvatar = '',
      currentDataAvatar = '',
      currentUserCoverPhoto = '',
      currentUserId = '';
    // trigger to show edit user modal form
    $(document).on('click', '.modal-trigger-edit-user', function(e) {
      e.preventDefault();
      // $('.modal-trigger-edit-user').on('click', function() {

      var $this = $(this);
      var url = $this.attr('href');
      var updateURL = $this.data('update-url');

      $('#modal-edit-user-form').attr('action', updateURL);
      var $element = $('#ajax-edit-user-form');
      $element.load(url, function(response, status, xhr) {
        currentUserAvatar = $(response).filter('.input-user-avatar').val();
        currentDataAvatar = $(response).filter('.input-user-avatar').attr('data-avatar');
        currentUserHasCoverPhoto = $(response).filter('.input-has-cover-photo').val();
        currentUserCoverPhoto = $(response).filter('.input-user-cover-photo').val();
        currentUserId = $(response).filter('.user-id').val();

        /* ***********************Admin User Images setting *********************** */
        if (currentUserAvatar) {
          $('#settings-avatar').attr("src", currentUserAvatar);
          $('#settings-avatar').show();
          $('#btnDeleteAvatar').prop('disabled', false).removeClass('btn--disabled');
        } else {
          $('#btnDeleteAvatar').prop('disabled', true).addClass('btn--disabled');
          $('#settings-avatar').hide();
        }
        if (currentUserHasCoverPhoto) {
          $('#btnDeleteCoverPhoto').prop('disabled', false).removeClass('btn--disabled');
        } else {
          $('#btnDeleteCoverPhoto').prop('disabled', true).addClass('btn--disabled');
        }

        let $options = {
          enableExif: true,
          showZoomer: false,
          viewport: {
            width: 550,
            height: 280,
            type: 'square' //circle
          },
          boundary: {
            width: 550,
            height: 280
          }
        };

        $options['url'] = currentUserCoverPhoto;

        if (!$('#imageDemo').data('croppie'))
          $image_crop = $('#imageDemo').croppie($options);
        else
          $image_crop.croppie('bind', {
            url: $options['url'],
          });

        /* ***********************Admin User Images setting *********************** */
      });
    });

    $('#uploadImage').on('change', function() {
      readFile(this);
      validateSize(this);

      var reader = new FileReader();
      reader.onload = function(event) {
        $image_crop.croppie('bind', {
          url: event.target.result
        }).then(function() {
          $('.alert-cover-photo').removeClass('hidden');
        });
      }
      reader.readAsDataURL(this.files[0]);
    });

    function readFile(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          result = e.target.result;
          arrTarget = result.split(';');
          tipo = arrTarget[0];
          validFormats = ['data:image/jpeg', 'data:image/png'];
          if (validFormats.indexOf(tipo) == -1) {
            alert('Accept only .jpg o .png image types');
            $('.alert-cover-photo').addClass('hidden');
            $('#uploadImage').val('');
            return false;
          }
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    function validateSize(file) {
      var FileSize = file.files[0].size / 1024 / 1024; // in MB
      if (FileSize > 5) {
        alert('File size exceeds 5 MB');
        $(file).val('');
      } else {

      }
    }

    // upload user cover photo in admin dashboard
    $('#btnUploadCoverPhoto').on('click', function(event) {
      $('.alert-cover-photo').empty();
      $('.alert-cover-photo').html('Loading...');
      $image_crop.croppie('result', {
        type: 'base64',
        format: 'png',
        size: 'original'
      }).then(function(response) {
        $('#base64Image').val('');
        $('#base64Image').val(response);
        $.ajax({
          url: '/admin/users/update-coverphoto/' + currentUserId,
          dataType: 'json',
          type: 'post',
          data: {
            _token: $('input[name=_token]').val(),
            base64Image: response
          },
          success: function(response) {
            if (response.status) {
              $('.alert-cover-photo').html(response.message);
            }
          }
        });
      });
    });

    // Delete user avatar in admin dashboard
    $('#btnDeleteAvatar').on('click', function() {
      if (confirm('Are you sure you want to delete your avatar?')) {
        $.ajax({
          url: 'users/settings/avatar/delete/ajax/' + currentUserId,
          dataType: 'json',
          type: 'post',
          data: {
            _token: $('input[name=_token]').val(),
          },
          success: function(response) {
            if (response.status) {
              window.location.reload();
            } else {
            }
          }
        });
      }
    });

    // Delete user cover photo in admin dashboard
    $('#btnDeleteCoverPhoto').on('click', function() {

      if (confirm('Are you sure you want to delete your cover photo?')) {
        $.ajax({
          url: '/admin/users/delete-coverphoto/' + currentUserId,
          dataType: 'json',
          type: 'post',
          data: {
            _token: $('input[name=_token]').val(),
          },
          success: function(response) {
            if (response.status) {
              window.location.reload();
            } else {
            }
          }
        });
      }
    });
    /* ***********************Admin User Images setting Update*********************** */

  })();
</script>
@endauth