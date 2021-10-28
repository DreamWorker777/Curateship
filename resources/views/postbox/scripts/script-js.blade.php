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

<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<!--<script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>-->

<script>
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
      url: "{{ route('posts.upload-media') }}",
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
        $('#btnSave, #btnPublish').addClass('btn--disabled');
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

        // Enable Save Buttons 
        $('#btnSave, #btnPublish').removeClass('btn--disabled');
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
  $(document).on('change', '#upload-file', uploadMedia);
}());
</script>

<script>
  var editor = null;
  var isValidInput = false,
      isValidPostTag = false;


  /** Form Fields Validation Module */
  // post tag fields validation
  function validatePostTagFields(form) {
    isValidPostTag = false;
    $tag_elems_wrp = $(form).find('.post-tag-wrp');
    // $tag_elems_alert_wrp = $tag_elems_wrp.find('.alert');
    $tag_elems_alert_wrp = $('.js-alert');
    $tag_elems = $tag_elems_wrp.find('select');

    if ($tag_elems.length == 0)
      return true;

    $tag_elems.each(function(idx, elem) {
      if ($(elem).select2('data').length > 0) {
        isValidPostTag = true;
      }
    });

    if (isValidPostTag) {
      if (isValidInput) {
        $tag_elems_alert_wrp.removeClass('alert--is-visible alert--error');
        $tag_elems_alert_wrp.find('.message-container').html('');
      }
      $tag_elems.each(function(idx, elem) {
        $(elem).removeClass('form-control--error');
        $(elem).siblings('.select2').find('.select2-selection').removeClass('form-control--error');
      });

    } else {
      $tag_elems_alert_wrp.addClass('alert--is-visible alert--error');
      $tag_elems_alert_wrp.find('.message-container').html('<p>Please fill at least one tag.</p>');
      $tag_elems.each(function(idx, elem) {
        $(elem).addClass('form-control--error');
        $(elem).siblings('.select2').find('.select2-selection').addClass('form-control--error');
      });
    }

    return isValidPostTag;
  }
  
  function validateCustomSelect(selector) {
    if ($(selector).parents('.post-tag-wrp').length > 0) {
      $form = $(selector).parents('form')[0];
      validatePostTagFields($form);

    } else {
      if ($(selector).prop('required')) { // only when set as required field
        if ($(selector).select2('data').length == 0) {
          $(selector).addClass('form-control--error');
          $(selector).siblings('.select2').find('.select2-selection').addClass('form-control--error');

        } else {
          $(selector).removeClass('form-control--error');
          $(selector).siblings('.select2').find('.select2-selection').removeClass('form-control--error');
        }
      }
    }
  }

  // remove validation error from form
  function clearError($form) {
    $form.find('.form-control--error').each(function(idx, elem) {
      $(elem).removeClass('form-control--error');
    });
    $form.find('.alert--is-visible').each(function(idx, elem) {
      $(elem).removeClass('alert--is-visible');
    });
  }

  // form required fields validation
  function validateItem(elem) {
    switch ($(elem).prop('tagName')) {
      case 'INPUT':
        if ($(elem).attr('name') == 'thumbnail') {
          // file control
          $upload_alert_wrp = $('.js-alert');
          if ($(elem).val() == '') {
            $upload_alert_wrp.addClass('alert--is-visible alert--error');
            $(elem).addClass('form-control--error');
            $(elem).parent('.ddf__area').addClass('form-control--error');
            $upload_alert_wrp.find('.message-container').html('<p>Please upload media.</p>');
            isValidInput = false;

          } else {
            $upload_alert_wrp.removeClass('alert--is-visible alert--error');
            $(elem).removeClass('form-control--error');
            $(elem).parent('.ddf__area').removeClass('form-control--error');
            $upload_alert_wrp.find('.message-container').html('');
          }
          
        } else if ($(elem).prop('type') == 'button' || $(elem).prop('type') == 'submit') {
          // buttons, ignore this
        } else {
          if ($(elem).val() == '') {
            $(elem).addClass('form-control--error');
            isValidInput = false;
          } else {
            $(elem).removeClass('form-control--error');
          }
        }
        break;
      
      default:
        if ($(elem).hasClass('custom-input')) {
          if ($(elem).html().trim() == '') {
            $(elem).addClass('form-control--error');
            isValidInput = false;
          } else {
            $(elem).removeClass('form-control--error');
          }
        }
    }

    return isValidInput;
  }

  function formDataValidation($form) {
    $form.find('[required]').each(function (idx, elem) {
      validateItem(elem);
    });

    validatePostTagFields($form);
    if ($form.find('.form-control--error').length > 0)
      return false;

    return true;
  }  

  var tags_by_category = {!! $tags_by_category !!};
  function matchCustom(params, data) {
    // If there are no search terms, return null to prevent show all tags
    if ($.trim(params.term) === '') {
      return null;
    }

    // Do not display the item if there is no 'text' property
    if (typeof data.text === 'undefined') {
      return null;
    }

    // `params.term` should be the term that is used for searching
    // `data.text` is the text that is displayed for the data object
    if (data.text.toLowerCase().indexOf(params.term) > -1) {
      var modifiedData = $.extend({}, data, true);

      // You can return modified objects from here
      // This includes matching the `children` how you want in nested data sets
      return modifiedData;
    }

    // Return `null` if the term should not be displayed
    return null;
  } 

  function select2ForTags(selector){
    $(selector).select2({
      tags: true,
      hideAdded: true,
      data: tags_by_category[$(selector).attr("data-id")],
      tokenSeparators: [","],
      matcher: matchCustom,
      minimumInputLength: 2
    }).on('select2:opening', function(e){
      var $searchfield = $(selector).parent().find('.select2-search__field');

      if ($searchfield.val() == '')
        return false;
      else
        return true;
    }).on('select2:select', function(e) {
      validateCustomSelect(selector);
    }).on('select2:unselect', function(e) {
      validateCustomSelect(selector);
    });
  }

  $('form').find('[required]').each(function (idx, elem) {
    $(elem).change(function() {
      validateItem($(this));
    });
  });

  // =====================================================================================================================================
  // Initialize Action
  // =====================================================================================================================================
  function initCutomInput() {
    // initialize js custom input element event
    var CustomJSInput = function (element)  {
      this.element = element;
      this.target = this.element.getAttribute('target');
      this.targetElement = document.getElementById(this.target);

      initCustomJSInput(this);
      initCustomJSInputEvent(this);
    }

    // initialize element
    function initCustomJSInput(input) {
      input.element.setAttribute('contenteditable', true);
    }

    // initialize event
    function initCustomJSInputEvent(input) {
      // keyboard navigation
      input.element.addEventListener('keydown', function(event){
        if (event.keyCode === 13)
          event.preventDefault();
      });

      input.element.addEventListener('input', function(event){
        if (getCustomInputElementConent(input) === '')
          input.element.innerHTML = '';
        
        if (input.element.hasAttribute('required') && getCustomInputElementConent(input) === '') {
          Util.addClass(input.element, 'form-control--error');
        } else {
          Util.removeClass(input.element, 'form-control--error');
        }

        input.targetElement.value = getCustomInputElementConent(input);
      });
    }

    function getCustomInputElementConent(input) {
      return input.element.innerHTML.replace('<br>', '').trim();
    }

    //initialize the Custom JS Input objects
    var customJSInputElem = document.getElementsByClassName('js-input');
    if( customJSInputElem.length > 0 ) {
      for( var i = 0; i < customJSInputElem.length; i++) {
        (function(i){new CustomJSInput(customJSInputElem[i]);})(i);
      }
    }
  }

  function initCutomUpload() {
    var InputFile = function(element) {
      this.element = element;
      this.input = this.element.getElementsByClassName('file-upload__input')[0];
      this.label = this.element.getElementsByClassName('file-upload__label')[0];
      this.multipleUpload = this.input.hasAttribute('multiple'); // allow for multiple files selection
      
      // this is the label text element -> when user selects a file, it will be changed from the default value to the name of the file 
      this.labelText = this.element.getElementsByClassName('file-upload__text')[0];
      this.initialLabel = this.labelText.textContent;
  
      initInputFileEvents(this);
    }; 
  
    function initInputFileEvents(inputFile) {
      // make label focusable
      inputFile.label.setAttribute('tabindex', '0');
      inputFile.input.setAttribute('tabindex', '-1');
  
      // move focus from input to label -> this is triggered when a file is selected or the file picker modal is closed
      inputFile.input.addEventListener('focusin', function(event){ 
        inputFile.label.focus();
      });
  
      // press 'Enter' key on label element -> trigger file selection
      inputFile.label.addEventListener('keydown', function(event) {
        if( event.keyCode && event.keyCode == 13 || event.key && event.key.toLowerCase() == 'enter') {inputFile.input.click();}
      });
  
      // file has been selected -> update label text
      inputFile.input.addEventListener('change', function(event){ 
        updateInputLabelText(inputFile);
      });
    };
  
    function updateInputLabelText(inputFile) {
      var label = '';
      if(inputFile.input.files && inputFile.input.files.length < 1) { 
        label = inputFile.initialLabel; // no selection -> revert to initial label
      } else if(inputFile.multipleUpload && inputFile.input.files && inputFile.input.files.length > 1) {
        label = inputFile.input.files.length+ ' files'; // multiple selection -> show number of files
      } else {
        label = inputFile.input.value.split('\\').pop(); // single file selection -> show name of the file
      }
      inputFile.labelText.textContent = label;
    };
  
    //initialize the InputFile objects
    var inputFiles = document.getElementsByClassName('file-upload-custom');
    if( inputFiles.length > 0 ) {
      for( var i = 0; i < inputFiles.length; i++) {
        (function(i){new InputFile(inputFiles[i]);})(i);
      }
    }    
  }

  function init() {
    // Initialize Title field.
    initCutomInput();

    // Initialize Image upload field.
    initCutomUpload();

    // Initialize custom select.
    $('.site-tag-pills').each(function(){
      select2ForTags(this);
    });

    // Initialize editorjs.
    const ImageTool = window.ImageTool;

    if ($('#editorjs').length > 0) {
      editor = new EditorJS({
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
    }

    // Save form data for future check.
    $("#formPostBox").data('serialize', $("#formPostBox").serialize());
  }

  // =====================================================================================================================================
  // Initialize Events
  // =====================================================================================================================================
  function initBoxLoadBtnEvent() {
    $('.btn-load-box').each(function() {
      $(this).click(function() {
        $('.btn-load-box').removeClass('menu-bar-control--active');
        $(this).addClass('menu-bar-control--active');
        loadTemplate($(this).attr("box-type"));
      })
    });
  }

  function initSubmitBtnEvent() {
    $(document).on('click', '#btnSave, #btnPublish', function(e) {
      e.preventDefault();
      if (!formDataValidation($('#formPostBox')))
        return;

      var status = ($(this).attr('id') != 'btnSave') ? 'published' : 'draft';
      $('#formPostBox').find('input[name="status"]').val(status);
      // for Page content type
      $('#formPostBox').find('input[name="is_published"]').val(($(this).attr('id') != 'btnSave') ? 1 : 0);
      $('#formPostBox').submit();
    });
  }

  function initEvents() {
    // used editorjs for add post form
    $('.site-editor').unbind('input click');
    $('.site-editor').bind('input click', function(){
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

    $('.btn-close-posttag-box').unbind('click');
    $('.btn-close-posttag-box').bind('click', function(e) {
      e.preventDefault();
      $('.post-tag-wrp').addClass('hidden');
    });

    $('#btnAddTags').unbind('click');
    $('#btnAddTags').bind('click', function(e) {
      e.preventDefault();
      $('.post-tag-wrp').removeClass('hidden');
    });
  }

  // =====================================================================================================================================
  // Load template module
  // =====================================================================================================================================
  function loadTemplate(type = 'post') {
    // Validate type.
    const availableTypes = ['post', 'page'];
    if ( ! availableTypes.includes(type) ) {
      return false;
    }

    // Check if content is changed.
    let isUpdated = false;
    if ($("#formPostBox").serialize() != $("#formPostBox").data('serialize')) {
      isUpdated = true;
    }

    // Confirm changes if already made.
    let isReloadable = true;
    if ( isUpdated && ! confirm("Are you sure you load " + type + " template? The data you made changes will be lost.") ) {
      isReloadable = false;
    }

    // Get & load template content.
    if (isReloadable) {
      $.ajax({
        url: '/admin/loadbox/' + type,
        dataType: 'json',
        type: 'get',
        success: function(response) {
          $('.postbox').html(response.box_template);

          // Reinitialize.
          init();

          // Reinit events.
          initEvents();
        }
      });
    }
  }

  // Call initialize functions.
  init();
  initBoxLoadBtnEvent();
  initSubmitBtnEvent();
  initEvents();
</script>
@endauth
