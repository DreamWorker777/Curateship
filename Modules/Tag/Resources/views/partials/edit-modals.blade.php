<!-- 👇 Full Screen Modal -->
<div class="custom-modal modal modal--animate-translate-down flex flex-center bg-black bg-opacity-80% padding-md js-modal custom-modal-hide-body-scroll custom-disable-modal-close" id="modal-edit-tag">
  <form action="{{ route('tag.store') }}" data-action="{{ route('tag.store') }}" method="post" enctype="multipart/form-data" class="modal__content height-100% tabs js-tabs width-100% max-width-sm bg radius-md shadow-md flex flex-column" id="edit-tag-form" novalidate> @csrf
    <header class="bg-contrast-lower padding-y-sm padding-x-md flex items-center justify-between">
      <!-- 👇 Tabs -->
      <nav class="tabs">
        <ul class="flex flex-wrap gap-lg js-tabs__controls" aria-label="Tabs Interface">
          <li><a href="#tab1Panel1" class="tabs__control" aria-selected="true">Edit</a></li>
          <li><a href="#tab1Panel2" class="tabs__control">Media</a></li>
          <li><a href="#tab1Panel3" class="tabs__control">Settings</a></li>
        </ul>
      </nav>
      <!-- End Tabs -->

      <button class="reset modal__close-btn modal__close-btn--inner js-modal__close js-tab-focus">
        <svg class="icon" viewBox="0 0 20 20">
          <title>Close modal window</title>
          <g fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2">
            <line x1="3" y1="3" x2="17" y2="17" />
            <line x1="17" y1="3" x2="3" y2="17" />
          </g>
        </svg>
      </button>
    </header>

    <!--Tab1 Content-->
    <div class="padding-y-sm padding-x-md flex-grow overflow-auto">
      <div class="js-tabs__panels">
        <div class="alert js-alert form-alert" role="alert"> <!-- /.alert--is-visible alert -->
          <div class="flex items-center justify-between">
            <div class="flex items-center">
              <div class="alert-message"></div><!-- /.alert-message -->
            </div>
          </div>
        </div>
        <section id="tab1Panel1" class="padding-top-md js-tabs__panel">
          <div class="flex width-90% gap-xs">
            <div class="flex-grow">
              <input class="form-control width-100%" type="text" name="tag_name" id="tag_name" required placeholder="Enter Tag">
              <div role="alert" class="form-error-msg"></div>
            </div>

            <div>
              <div class="flex items-start">
                <label class="form-label" for="tag_category_id"></label>
                <div class="select inline-block js-select" data-trigger-class="btn btn--subtle" style="right: 0;">
                  <select name="tag_category_id" id="tag_category_id">
                    <optgroup label="Tag category">
                    @foreach($tag_categories as $key => $tag_category)
                      <option
                        value="{{ $tag_category->id }}"
                        @if($key === 0)
                          selected
                        @endif
                      >{{ $tag_category->name }}</option>
                    @endforeach
                    </optgroup>
                  </select>

                  <svg class="icon icon--xs margin-left-xxxs" aria-hidden="true" viewBox="0 0 16 16"><polygon points="3,5 8,11 13,5 "></polygon></svg>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div role="alert" class="form-error-msg"></div>

            <label class="form-label margin-bottom-xxs margin-top-md" for="edit_tag_description">Enter Your Tag Description</label>
            <div id="editorjs2" data-target-input="#edit_tag_description" class="site-editor form-control" placeholder="Enter Tag"></div>
            <input type="hidden" name="tag_description" id="edit_tag_description"/>
          </div>
        </section>

        <!--Tab2 Content-->
        <section id="tab1Panel2" class="padding-top-md js-tabs__panel">
          <div class="margin-bottom-md">
            <img src="#" id="thumbnailPreview" class="width-40%" style="display:none">
            <div id="edit-media-player" style="display:none">
            </div>
          </div>

          <div class="file-upload inline-block">
            <label for="editMedia" class="file-upload__label btn btn--subtle">
              <span class="file-upload__text file-upload__text--has-max-width">Edit Media</span>
            </label>
            <input type="file" class="file-upload__input" name="media" id="editMedia" accept="image/jpeg, image/jpg, image/png, image/gif, video/mp4, video/webm">

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
        </section>

        <!--Tab3 Content-->
        <section id="tab1Panel3" class="padding-top-md js-tabs__panel">
            <fieldset class="margin-bottom-md">
              <legend class="form-legend">Form Legend</legend>

              <div class="grid gap-sm">
                  <label class="form-label margin-bottom-xxs" for="tag_seo_title">Tag Page Title</label>
                  <input class="form-control width-100%" type="text" name="tag_seo_title" id="tag_seo_title">
                  <div role="alert" class="form-error-msg"></div>
                <div>

                </div>
              </div>
            </fieldset>
        </section>
      </div>

      <!-- 👇 End Tab Panels -->
    </div><!-- /.padding-y-sm padding-x-md flex-grow overflow-auto -->

    <footer class="padding-y-sm padding-x-md bg shadow-md flex-shrink-0">
      <div class="flex justify-end gap-xs">
        <input type="hidden" name="tag_id" value="0">
        <button type="button" class="btn btn--subtle js-modal__close">Cancel</button>
        <button type="submit" class="btn btn--primary trigger-site-editor-save">Save</button>
        <button type="submit" name="tag_publish" value="true" class="btn btn--primary trigger-site-editor-save">Publish</button>
      </div>
    </footer>
  </form><!-- /.modal__content -->
</div><!-- /.modal -->
<!-- Full Screen Modal End -->
