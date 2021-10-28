<div class="max-width-md mg-auto padding-md">
  <div class="add-post-wrp editorjs-fullwidth hidden">
    <form action="{{ route('dashboard.store') }}" data-action="{{ route('dashboard.store') }}" id="formAddPost" method="POST" enctype="multipart/form-data" >
      @csrf
      <input type="hidden" name="status"/>
      <div class="flex">
        <div class="height-100% width-100% bg radius-md flex flex-column">

          <div class="padding-y-sm flex-grow overflow-auto">

            <h1 class="js-input custom-input custom-input__title" placeholder="Title" target="title" required></h1>
            <input type="hidden" id="title" name="title" value="">
            
            <div class="grid gap-sm">
              <div id="editorjs" data-target-input="#description" class="site-editor"></div>
              <input type="hidden" name="description" id="description"/>
            </div>

            <div class="file-upload">
              <div class="alert alert--error margin-top-sm margin-bottom-sm js-alert" role="alert">
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <svg aria-hidden="true" class="icon margin-right-xxxs" viewBox="0 0 32 32" ><title>info icon</title><g><path d="M16,0C7.178,0,0,7.178,0,16s7.178,16,16,16s16-7.178,16-16S24.822,0,16,0z M18,7c1.105,0,2,0.895,2,2 s-0.895,2-2,2s-2-0.895-2-2S16.895,7,18,7z M19.763,24.046C17.944,24.762,17.413,25,16.245,25c-0.954,0-1.696-0.233-2.225-0.698 c-1.045-0.92-0.869-2.248-0.542-3.608l0.984-3.483c0.19-0.717,0.575-2.182,0.036-2.696c-0.539-0.514-1.794-0.189-2.524,0.083 l0.263-1.073c1.054-0.429,2.386-0.954,3.523-0.954c1.71,0,2.961,0.855,2.961,2.469c0,0.151-0.018,0.417-0.053,0.799 c-0.066,0.701-0.086,0.655-1.178,4.521c-0.122,0.425-0.311,1.328-0.311,1.765c0,1.683,1.957,1.267,2.847,0.847L19.763,24.046z"></path></g></svg>
                    <p>Please upload Media File.</p>
                  </div>
                  <button class="reset alert__close-btn js-alert__close-btn">
                    <svg class="icon" viewBox="0 0 24 24"><title>Close alert</title><g stroke-linecap="square" stroke-linejoin="miter" stroke-width="3" stroke="currentColor" fill="none" stroke-miterlimit="10"><line x1="19" y1="5" x2="5" y2="19"></line><line fill="none" x1="19" y1="19" x2="5" y2="5"></line></g></svg>
                  </button>
                </div>
              </div>
              <label for="upload-file" class="file-upload__label btn btn--primary">
                <span class="flex items-center">
                  <svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><g fill="none" stroke="currentColor" stroke-width="2"><path  stroke-linecap="square" stroke-linejoin="miter" d="M2 16v6h20v-6"></path><path stroke-linejoin="miter" stroke-linecap="butt" d="M12 17V2"></path><path stroke-linecap="square" stroke-linejoin="miter" d="M18 8l-6-6-6 6"></path></g></svg>
                  
                  <span class="margin-left-xxs file-upload__text file-upload__text--has-max-width">Upload Media</span>
                </span>
              </label> 

              <input type="file" class="file-upload__input" name="media" id="upload-file" accept="image/jpeg, image/jpg, image/png, image/gif, video/mp4, video/webm" required>

              <input type="hidden" name="video" value=""/>
              <input type="hidden" name="thumbnail" value=""/>
              <input type="hidden" name="thumbnail_medium" value=""/>
            </div>

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
              </div><!-- /.alert -->
            </div>

            <div class="padding-top-xs">
              <div class="post-tag-wrp add-post-tag">
                <div class="alert alert--error margin-top-sm js-alert" role="alert">
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                      <svg aria-hidden="true" class="icon margin-right-xxxs" viewBox="0 0 32 32" ><title>info icon</title><g><path d="M16,0C7.178,0,0,7.178,0,16s7.178,16,16,16s16-7.178,16-16S24.822,0,16,0z M18,7c1.105,0,2,0.895,2,2 s-0.895,2-2,2s-2-0.895-2-2S16.895,7,18,7z M19.763,24.046C17.944,24.762,17.413,25,16.245,25c-0.954,0-1.696-0.233-2.225-0.698 c-1.045-0.92-0.869-2.248-0.542-3.608l0.984-3.483c0.19-0.717,0.575-2.182,0.036-2.696c-0.539-0.514-1.794-0.189-2.524,0.083 l0.263-1.073c1.054-0.429,2.386-0.954,3.523-0.954c1.71,0,2.961,0.855,2.961,2.469c0,0.151-0.018,0.417-0.053,0.799 c-0.066,0.701-0.086,0.655-1.178,4.521c-0.122,0.425-0.311,1.328-0.311,1.765c0,1.683,1.957,1.267,2.847,0.847L19.763,24.046z"></path></g></svg>
                      <p>Please fill at least one tag.</p>
                    </div>
                    <button class="reset alert__close-btn js-alert__close-btn">
                      <svg class="icon" viewBox="0 0 24 24"><title>Close alert</title><g stroke-linecap="square" stroke-linejoin="miter" stroke-width="3" stroke="currentColor" fill="none" stroke-miterlimit="10"><line x1="19" y1="5" x2="5" y2="19"></line><line fill="none" x1="19" y1="19" x2="5" y2="5"></line></g></svg>
                    </button>
                  </div>
                </div>
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

          <footer class="padding-y-sm bg flex-shrink-0">
            <div class="flex justify-end gap-xs">
              <button type="button" class="btn btn--subtle btn-cancel-post">Cancel</button>
              <button type="button" id="btnSave" class="btn btn--primary site-editor" data-target-input="#description">Save</button>
              <button type="button" id="btnPublish" class="btn btn--primary site-editor" data-target-input="#description">Publish</button>
            </div>
          </footer>
        </div><!-- /.modal__content -->
      </div><!-- /.modal -->
    </form>
  </div>
</div>