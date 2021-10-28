@auth
<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/@editorjs/link@latest"></script> -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/raw@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>

<script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>

<script>
var videojs_template = 
  `<video id="media-player" class="video-js video-small vjs-big-play-centered" data-setup='{"controls": true, "autoplay": false, "preload": "auto", "fluid": true}' width="320" height="150" style="display:none">
    <source src="" type="" />
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that
      <a href="https://videojs.com/html5-video-support/" target="_blank"
        >supports HTML5 video</a
      >
    </p>
  </video>`;

(function() {
  // Ajax Upload Process
  function validateMediaUpload(formData, jqForm, options) {
    console.log('validate form before upload');
    var form = jqForm[0];

    if ( !form.media.value ) {
      alert('File not found');
      return false;
    }
  }

  function uploadMedia(e) {
    e.preventDefault();

    console.log($(e.target).closest('form').attr('id'));
    var $form = $(e.target).closest('form');

    var progress_wrp = $('.progress-bar');
    var progress_value = $(progress_wrp).find('.progress-bar__value');
    var progress_final = $(progress_wrp).find('.progress-bar__final');
    var notification = $('.alert-upload');
    var bar = $('.progress-bar .progress-bar__fill');
    var js_percent = $('.progress-bar .js-progress-bar__aria-value');
    var percent = $('.progress-bar .progress-bar__value');


    $form.ajaxSubmit({
      url: "{{ route('tags.upload-media') }}",
      type: 'post',
      beforeSubmit: validateMediaUpload,
      beforeSend: function() {
        console.log('before send');
        var percentVal = '0%';
        progress_wrp.show();
        bar.width(percentVal)
        percent.html(percentVal);
        js_percent.html(percentVal);

        // Disable Save buttons
        $('#btnSave, #btnPublish, #btnEditSaveDraft, #btnEditSave, #btnEditSavePublish, .restore-post-link').addClass('btn--disabled');
      },
      uploadProgress: function(event, position, total, percentComplete) {
        console.log('uploading...');
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);
        js_percent.html(percentVal);

        if (percentComplete == 100) {
          console.log('upload done');
          progress_value.hide();
          progress_final.show();
        }
      },
      complete: function(xhr) {
        console.log('upload complete');

        progress_wrp.hide();
        progress_value.show();
        progress_final.hide();

        $(notification).find('.message').html('Media file is uploaded successfully.');
        notification.removeClass('alert--error').addClass('alert--success').fadeIn().delay(1000).fadeOut();

        // reset progress bar
        var percentVal = '0%';
        bar.width(percentVal)
        percent.html(percentVal);
        js_percent.html(percentVal);

        console.log(xhr.responseJSON);
        // Update form data based on response data.
        $form.find('input[name="video"]').val(xhr.responseJSON.video);
        $form.find('input[name="thumbnail"]').val(xhr.responseJSON.thumbnail);
        $form.find('input[name="thumbnail_medium"]').val(xhr.responseJSON.thumbnail_medium);

        // Should clear file upload input field. (Trick to clear data)
        $(e.target).attr('type', 'text');
        $(e.target).attr('type', 'file');
        $(e.target).prop('required', false);

        // reset video (Only when video is already initialized)
        if ( $('div#media-player').length > 0 ) {
          var oldPlayer = document.getElementById('media-player');
          videojs(oldPlayer).dispose();
        }

        // Update media video & thumbnail
        if ( xhr.responseJSON.video_url != '') {
          console.log('update video')
          $('#edit-media-player').html(videojs_template).show();

          $('#media-player').find('source').attr('src', xhr.responseJSON.video_url).attr('type', xhr.responseJSON.video_type);
          $('#media-player').attr('poster', xhr.responseJSON.thumbnail_url).show();

          videojs('#media-player', {
            controls: true,
            autoplay: false,
            fill: true,
            preload: 'auto'
          });
          $('#thumbnailPreview').hide();
        } else {
          console.log('update thumbnail')
          $('#thumbnailPreview').attr('src', xhr.responseJSON.thumbnail_url).show();
          $('#edit-media-player').hide();
        }

        // Enable Save Buttons 
        $('#btnSave, #btnPublish, #btnEditSaveDraft, #btnEditSave, #btnEditSavePublish, .restore-post-link').removeClass('btn--disabled');
      },
      error: function() {
        // alert('failed');
        progress_wrp.hide();
        progress_value.show();
        progress_final.hide();

        $(notification).find('.message').html('Filed to upload media file.');
        notification.removeClass('alert--success').addClass('alert--error').fadeIn().delay(1000).fadeOut();
      }
    });

    return false;
  }  
  $(document).on('change', '#editMedia', uploadMedia);
  $(document).on('change', '#upload-file', uploadMedia);
}());
</script>

<script>
  $(function(){

    const ImageTool = window.ImageTool;

    var editor = new EditorJS({
      /**
      * Id of Element that should contain Editor instance
      */
      holder: 'editorjs',
      placeholder: 'Tell your story...',
      tools: {
        header: Header,
        raw: RawTool,
        image: {
          class: ImageTool,
          config: {
            endpoints: {
              byFile: window.location.origin + '/editorjs/upload-image'
            },
            additionalRequestHeaders : {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          }
        },
        embed: Embed,
        quote: Quote,
        checklist: {
          class: Checklist,
          inlineToolbar: true,
        },
        list: {
          class: List,
          inlineToolbar: true,
        }
      }
    });

    var editor2 = new EditorJS({
      /**
      * Id of Element that should contain Editor instance
      */
      holder: 'editorjs2',
      placeholder: 'Tell your story...',
      tools: {
        header: Header,
        raw: RawTool,
        image: {
          class: ImageTool,
          config: {
            endpoints: {
              byFile: window.location.origin + '/editorjs/upload-image'
            },
            additionalRequestHeaders : {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          }
        },
        embed: Embed,
        quote: Quote,
        checklist: {
          class: Checklist,
          inlineToolbar: true,
        },
        list: {
          class: List,
          inlineToolbar: true,
        }
      }
    });

    $('.site-editor').on('input click', function(){
      var $this = $(this);

      if($this.data('target-input')){
        var $targetInput = $($this.data('target-input'));

        editor.save().then((outputData) => {
          // Save data as string
          $targetInput.val(JSON.stringify(outputData));
        }).catch((error) => {
          console.log('Saving failed: ', error);
        });
      }
    });

    $('#editorjs2, .trigger-site-editor-save').on('input click', function(){
      var $this = $(this);

      if($this.data('target-input')){
        var $targetInput = $($this.data('target-input'));

        editor2.save().then((outputData) => {
          // Save data as string
          $targetInput.val(JSON.stringify(outputData));
        }).catch((error) => {
          console.log('Saving failed: ', error);
        });
      }

    });

    // Set tag_publish defaults to false
    $('[name="tag_publish"]').val(false);

    // Toggle tag_publish to true
    $(document).on('click', '[name="tag_publish"]', function(){
      $(this).val(true);
    });

    // Add tag form
    $(document).on('submit', '#add-tag-form, #edit-tag-form', function(e){
      e.preventDefault();

      var $this = $(this);
      var $submitButtons = $this.find('button[type="submit"]');
      var toPublish = $this.find('[name="tag_publish"]').val();

      var formData = new FormData($this[0]);
      formData.append('tag_publish', toPublish);

      var url = $this.attr('action');
      var method = $this.attr('method');

      var $feedback = $this.find('.form-alert');

      // Disable buttons
      $submitButtons.prop('disabled', true);

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
      });

      $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
        complete: function(){
          $('[name="tag_publish"]').val(false);
        },
        success:function(response){
          if (response.status === 'success') {
            $feedback.removeClass('alert--error').addClass('alert--success alert--is-visible').html('<strong>Success!</strong> ' + response.message);

            // reset
            $this[0].reset();

            window.location.reload();
          }else{
            $feedback.removeClass('alert--success').addClass('alert--error alert--is-visible').html(response.message);

            // Enable buttons
            $submitButtons.prop('disabled', false);
          }
        },
        error: function(response){
          var jsonResponse = response.responseJSON;
          var errors = jsonResponse.errors;
          var errorsHTML = '';

          console.log('ERROR', response.responseText);

          $.each( errors, function( key, value ) {
            errorsHTML += value[0];

            if (key < errors.length - 1) {
              errorsHTML += errorsHTML + '</br>';
            }

          });

          $feedback.removeClass('alert--success').addClass('alert--error alert--is-visible').html(errorsHTML);

          // Enable buttons
          $submitButtons.prop('disabled', false);

          console.log('ERRORS', errorsHTML);

        }
        });
    });

    $(document).on('click', '[aria-controls="modal-add-tag"]', function(){
      var $modalForm = $('#add-tag-form');

      editor.clear();

      $('[name="tag_publish"]').show();
      $('[name="tag_id"]').val(0);
      $modalForm[0].reset();
      $modalForm.attr('action', $modalForm.data('action'));
    });

    $(document).on('click', '.site-load-modal-edit-form', function(e){
      var $this = $(this);
      var $target = $($this.data('target'));
      var url = $this.data('url');
      var method = $this.data('method');

      var $modalForm = $('#edit-tag-form');
      $modalForm.find(':input').prop('disabled', true);

      editor2.clear();

      $('[name="tag_publish"]').hide();

      $('#edit-media-player').html(videojs_template).hide();
      $('#thumbnailPreview').hide();

      $.ajax({
        url: url,
        method: method,
        dataType: 'JSON'
      })
      .done(function(response) {
        var data = response.data;
        $('[name="tag_id"]').val(data.id);

        $('[name="tag_category_id"]').val(data.tag_category_id);

        // workaround to select js-select
        setTimeout(() => {
          $('#tag_category_id-dropdown').find('[data-value="'+data.tag_category_id+'"].select__item--option').click();
        }, 1);

        $('[name="tag_name"]').val(data.name);
        $('[name="tag_seo_title"]').val(data.seo_title);
        $modalForm.attr('action', data.submit_url);

        $modalForm.find(':input').prop('disabled', false);

        if (response.data.description != null && response.data.description != '') {
          var editorData = JSON.parse(response.data.description);
          if (editorData.blocks.length > 0) {
            editor2.render(editorData);
            $('[name="tag_description"]').val(response.data.description);
          }
        } else {
          $('[name="tag_description"]').val('');
        }

        if ( response.data.video != '') {
          $('#media-player').find('source').attr('src', response.data.video).attr('type', response.data.video_type);
          $('#media-player').attr('poster', response.data.thumbnail).show();
          videojs('#media-player', {
            controls: true,
            autoplay: false,
            fill: true,
            preload: 'auto'
          });
          $('#edit-media-player').show();
          $('#thumbnailPreview').hide();
        } else {
          $('#thumbnailPreview').attr('src', response.data.thumbnail).show();
          $('#edit-media-player').hide();
        }
      })
      .fail(function(response, textStatus) {
        console.log(response);
      })
      .always(function() {});
    });

    // Add tag category form
    $(document).on('submit', '#add-tag-category-form', function(e){
      e.preventDefault();

      var $this = $(this);
      var $submitButtons = $this.find('button[type="submit"]');

      var formData = $this.serialize();

      var url = $this.attr('action');
      var method = $this.attr('method');

      var $feedback = $this.find('.form-alert');

      // Disable buttons
      $submitButtons.prop('disabled', true);

      $.ajax({
        url: url,
        type: method,
        dataType: 'JSON',
        data: formData,
        complete: function(){
          //
        },
        success:function(response){
          if (response.status === 'success') {
            $feedback.removeClass('alert--error').addClass('alert--success alert--is-visible').html('<strong>Success!</strong> ' + response.message);

            // reset
            $this[0].reset();

            window.location.reload();
          }else{
            $feedback.removeClass('alert--success').addClass('alert--error alert--is-visible').html(response.message);

            // Enable buttons
            $submitButtons.prop('disabled', false);
          }
        },
        error: function(response){
          var jsonResponse = response.responseJSON;
          var errors = jsonResponse.errors;
          var errorsHTML = '';

          console.log('ERROR', response.responseText);

          $.each( errors, function( key, value ) {
            errorsHTML += value[0];

            if (key < errors.length - 1) {
              errorsHTML += errorsHTML + '</br>';
            }

          });

          $feedback.removeClass('alert--success').addClass('alert--error alert--is-visible').html(errorsHTML);

          // Enable buttons
          $submitButtons.prop('disabled', false);

          console.log('ERRORS', errorsHTML);

        }
        });
    });

  });
</script>

<script>
  (function(){

    // load content when user clicked on sidebar links
    $(document).on('change', '#filterItems', function (e) {
      e.preventDefault();
      var $this = $(this);
      var url = "{{ url('/admin/tag') }}";
      if ($this.val()) {
        url = url + '?status=' + $this.val();
      }
      $('meta[name="current-url"]').attr('content', url);

      localStorage.setItem("cs_admin_tag_init_tab", $(this).val());

      // loads page content inside this element
      $('#site-table-with-pagination-container').load(url, function(){

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

    // init reload previous tab logic
    var init_tab = localStorage.getItem("cs_admin_tag_init_tab");
    if (init_tab != null && document.referrer == document.location) {
      $('#filterItems-dropdown button[data-value="' + init_tab + '"]').click();
      return false;
    } else {
      localStorage.setItem("cs_admin_tag_init_tab", ""); // clear
    }

    $(document).on('change', '#upload-file', function(){
      var ddfArea = $(this).closest('.ddf__area');

      ddfArea.addClass('ddf__area--file-dropped');
      ddfArea.find('.js-ddf__files-counter').html("1 selected file");
    });

  })();
</script>
@endauth
