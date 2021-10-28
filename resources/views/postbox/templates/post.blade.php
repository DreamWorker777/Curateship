<div class="box-header padding-xs">
  <div class="flex flex-wrap justify-between items-center">
      <h3 class="box-title text-left text-md padding-xxxxs">Create Post</h3>
    <div class="buttons btn--sm">
      <button id="btnAddTags" class="btn">Add Tags</button>

      <div class="file-upload-custom">
        <label for="upload-file" class="file-upload__label btn">
          <span class="flex items-center">
            <span class="margin-right-xxs file-upload__text file-upload__text--has-max-width">Add</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><title>img</title><g stroke-width="2" fill="#000000"><path fill="none" stroke="#000000" stroke-linecap="square" stroke-miterlimit="10" d="M3.32 1.66h14.94v16.6h-16.6v-16.6h1.66z"></path><path data-stroke="none" d="M15.73 13.51l-2.91-5.81a0.41 0.41 0 0 0-0.33-0.23 0.43 0.43 0 0 0-0.37 0.17l-3.42 4.56-1.74-2.09a0.41 0.41 0 0 0-0.67 0.05l-2.08 3.32a0.41 0.41 0 0 0 0.35 0.63h10.79a0.41 0.41 0 0 0 0.38-0.6z" fill="#000000"></path><path data-stroke="none" fill="#000000" d="M7.88 4.98a1.24 1.24 0 1 0 0 2.49 1.24 1.24 0 1 0 0-2.49z"></path></g></svg>
            
            
          </span>
        </label> 
        <input type="file" class="file-upload__input" name="media" id="upload-file" accept="image/jpeg, image/jpg, image/png, image/gif, video/mp4, video/webm">
        <input type="hidden" name="video" value=""/>
        <input type="hidden" name="thumbnail" value="" required/>
        <input type="hidden" name="thumbnail_medium" value=""/>
      </div>
    </div>
  </div>
</div>

<div class="border-top border-contrast-lower"></div>
<div class="box-content padding-sm">
  <!-- Media upload progress loader -->
  <div class="margin-top-md">
    <div class="inline-block progress-bar progress-bar--color-update flex flex-column items-center js-progress-bar" style="display:none">
      <p class="sr-only" aria-live="polite" aria-atomic="true">Progress value is <span class="js-progress-bar__aria-value">0%</span></p>
    
      <span class="progress-bar__value margin-bottom-xs" aria-hidden="true">0%</span>
      <span class="progress-bar__final margin-bottom-xs" aria-hidden="true" style="display:none">Moving uploaded file...</span>
    
      <div class="progress-bar__bg " aria-hidden="true">
        <div class="progress-bar__fill " style="width: 0%;"></div>
      </div>
    </div>
    <div class="alert alert-upload alert--is-visible" style="display:none">
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <div class="message">
          </div>
        </div>
      </div>
    </div><!-- /.alert -->
  </div>

  <?php
  if($alert = session()->get('alert')) {
    $alert_class = 'alert--is-visible ' . $alert['class'];
    $alert_message = $alert['message'];
  } else {
    $alert_class = '';
    $alert_message = '';
  }
  ?>
    <div class="alert js-alert margin-bottom-lg {{ $alert_class }}" role="alert">
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <svg aria-hidden="true" class="icon margin-right-xxxs" viewBox="0 0 32 32" ><title>info icon</title><g><path d="M16,0C7.178,0,0,7.178,0,16s7.178,16,16,16s16-7.178,16-16S24.822,0,16,0z M18,7c1.105,0,2,0.895,2,2 s-0.895,2-2,2s-2-0.895-2-2S16.895,7,18,7z M19.763,24.046C17.944,24.762,17.413,25,16.245,25c-0.954,0-1.696-0.233-2.225-0.698 c-1.045-0.92-0.869-2.248-0.542-3.608l0.984-3.483c0.19-0.717,0.575-2.182,0.036-2.696c-0.539-0.514-1.794-0.189-2.524,0.083 l0.263-1.073c1.054-0.429,2.386-0.954,3.523-0.954c1.71,0,2.961,0.855,2.961,2.469c0,0.151-0.018,0.417-0.053,0.799 c-0.066,0.701-0.086,0.655-1.178,4.521c-0.122,0.425-0.311,1.328-0.311,1.765c0,1.683,1.957,1.267,2.847,0.847L19.763,24.046z"></path></g></svg>
          <div class="message-container">
            {!! $alert_message !!}
          </div>
        </div>

        <button class="reset alert__close-btn js-alert__close-btn">
          <svg class="icon" viewBox="0 0 24 24"><title>Close alert</title><g stroke-linecap="square" stroke-linejoin="miter" stroke-width="3" stroke="currentColor" fill="none" stroke-miterlimit="10"><line x1="19" y1="5" x2="5" y2="19"></line><line fill="none" x1="19" y1="19" x2="5" y2="5"></line></g></svg>
        </button>
      </div>
    </div><!-- /.alert -->
  
  <div class="editorjs-fullwidth">
    <input type="hidden" name="type" value="post"/>
    <input type="hidden" name="status"/>
    <div class="flex">
      <div class="width-100% bg radius-md flex flex-column">
        <div class="flex-grow overflow-auto">
          <h1 class="js-input custom-input custom-input__title" placeholder="Title" target="title" required></h1>
          <input type="hidden" id="title" name="title" value="">
          
          <div class="grid">
            <div id="editorjs" data-target-input="#description" class="site-editor"></div>
            <input type="hidden" name="description" id="description"/>
          </div>

          <div class="post-tag-wrp padding-top-xs hidden">
            <button class="btn-close-posttag-box modal__close-btn modal__close-btn--inner">
              <svg class="icon" viewBox="0 0 24 24"><title>Close alert</title><g stroke-linecap="square" stroke-linejoin="miter" stroke-width="3" stroke="currentColor" fill="none" stroke-miterlimit="10"><line x1="19" y1="5" x2="5" y2="19"></line><line fill="none" x1="19" y1="19" x2="5" y2="5"></line></g></svg>
            </button>

            <div class="add-post-tag">
              @foreach($tag_categories as $key=> $tag_category)
              <div class="grid gap-sm">
                  <label class="form-label margin-bottom-xxs" for="tag_category_{{ $tag_category->id }}">
                    Add {{ $tag_category->name }}
                  </label>
                  <select name="tag_category_{{ $tag_category->id }}[]" id="tag_category_{{ $tag_category->id }}" class="site-tag-pills" data-id="{{ $tag_category->id }}" multiple></select>
              </div>
              @endforeach
            </div>
          </div>
        </div><!-- /.padding-y-sm flex-grow overflow-auto -->
      </div><!-- /.modal__content -->
    </div><!-- /.modal -->
  </div>
</div>
