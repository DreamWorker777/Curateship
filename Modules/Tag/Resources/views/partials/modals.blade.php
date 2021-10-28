<!-- 👇 Full Screen Modal -->
<form action="{{ route('tag.store') }}" data-action="{{ route('tag.store') }}" method="post" enctype="multipart/form-data" id="add-tag-form" novalidate> @csrf
  <div class="custom-modal modal modal--animate-translate-down flex flex-center bg-black bg-opacity-80% padding-md js-modal custom-modal-hide-body-scroll" id="modal-add-tag">
  <div class="modal__content height-100% tabs js-tabs width-100% max-width-sm bg radius-md shadow-md flex flex-column">
    <header class="bg-contrast-lower padding-y-sm padding-x-md flex items-center justify-between">
      <!-- 👇 Tabs -->
      <nav class="tabs">
        <ul class="flex flex-wrap gap-lg js-tabs__controls" aria-label="Tabs Interface">
          <li><a href="#tab1Panel1" class="tabs__control" aria-selected="true">Add Tag</a></li>
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

            <label class="form-label margin-bottom-xxs margin-top-md" for="tag_description">Enter Your Tag Description</label>
            <div id="editorjs" data-target-input="#tag_description" class="site-editor form-control" placeholder="Enter Tag"></div>
            <input type="hidden" name="tag_description" id="tag_description"/>
          </div>
        </section>

      <!--Tab2 Content-->
        <section id="tab1Panel2" class="padding-top-md js-tabs__panel">
          <input type="file" id="realThumbnail" class="is-hidden">
          <div class="ddf">
            <div class="ddf__area padding-y-xl padding-x-md js-ddf__area">
              <input class="ddf__input sr-only js-ddf__input" type="file" id="upload-file" name="media"  accept="image/jpeg, image/jpg, image/png, image/gif, video/mp4, video/webm" required>

              <input type="hidden" name="video" value=""/>
              <input type="hidden" name="thumbnail" value=""/>
              <input type="hidden" name="thumbnail_medium" value=""/>

              <label class="ddf__label js-ddf__label" for="upload-file">
                <i class="ddf__label-inner">
                  <svg class="icon icon--xl color-contrast-higher ddf__icon-cloud" viewBox="0 0 64 64" aria-hidden="true"><path fill="currentColor" d="M51,27c-.374,0-.742.025-1.109.056a18,18,0,0,0-35.782,0C13.742,27.025,13.374,27,13,27a13,13,0,0,0,0,26H51a13,13,0,0,0,0-26Z"/><path d="M43.764,41.354l-11-13a1.033,1.033,0,0,0-1.526,0l-11,13A1,1,0,0,0,21,43h7V59h8V43h7a1,1,0,0,0,.764-1.646Z" fill="var(--color-bg)"/></svg>

                  <span class="text-md text-bold color-contrast-higher">Drag and drop your files here</span>

                  <span class="color-contrast-medium padding-top-xxxs inline-block">or click to browse your files</span>
                </i>
              </label>

              <span class="ddf__label-end">
                <i class="ddf__label-end-inner">
                  <svg class="icon icon--xl color-contrast-higher ddf__icon-file" viewBox="0 0 64 64" aria-hidden="true"><path fill="currentColor" d="M1.4,16.868,7,15.636,18.972,13A1.783,1.783,0,0,1,21.1,14.359L28.21,46.683a1.783,1.783,0,0,1-1.358,2.124L9.28,52.675a1.784,1.784,0,0,1-2.124-1.358L.042,18.993A1.783,1.783,0,0,1,1.4,16.868Z" opacity="0.69"/><path fill="currentColor" d="M62.6,16.868,57,15.636,45.028,13A1.783,1.783,0,0,0,42.9,14.359L35.79,46.683a1.783,1.783,0,0,0,1.358,2.124L54.72,52.675a1.784,1.784,0,0,0,2.124-1.358l7.114-32.324A1.783,1.783,0,0,0,62.6,16.868Z" opacity="0.69"/><rect fill="currentColor" x="13" y="9" width="38" height="46" rx="2"/><path d="M42.941,41.664l-5-14a1,1,0,0,0-1.624-.4l-15,14A1,1,0,0,0,22,43H42a1,1,0,0,0,.941-1.336Z" fill="#fff"/><circle cx="24" cy="26" r="3" fill="var(--color-bg)"/></svg>

                  <!-- {n} will be replaced by the total number of files -->
                  <!-- use % symbol for singular/plural - only one will be shown  -->
                  <span class="js-ddf__files-counter">{n} selected %file%files%</span>

                  <div class="ddf__progress c-progress-bar is-hidden margin-x-auto margin-top-xxs js-ddf__progress" data-progress="0%">
                    <p class="sr-only" aria-live="polite" aria-atomic="true">Progress value is <span class="js-c-progress-bar__aria-value">0%</span></p>

                    <div class="c-progress-bar__shape" aria-hidden="true">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round">
                        <g> <!-- check + circle bg -->
                          <circle class="ddf__progress-circle" cx="12" cy="12" r="11" stroke-width="2"></circle>
                          <circle class="ddf__progress-circle-mask" cx="12" cy="12" r="11" stroke-width="2"></circle>
                          <polyline class="ddf__progress-check" points="6 12 10 16 18 8" fill="none" stroke="red" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        </g>

                        <g> <!-- progress loader -->
                          <circle class="c-progress-bar__bg" cx="12" cy="12" r="11" stroke-width="2"></circle>
                          <circle class="c-progress-bar__fill" cx="12" cy="12" r="11" stroke-width="2"></circle>
                        </g>
                      </svg>
                    </div>
                  </div>
                </i>
              </span>
            </div>
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
        <button type="submit" class="btn btn--primary">Save</button>
        <button type="submit" name="tag_publish" value="true" class="btn btn--primary">Publish</button>
      </div>
    </footer>
  </div>
  </div><!-- /.modal -->
</form><!-- /.modal__content -->
<!-- Full Screen Modal End -->

<!-- 👇 Full Screen Modal -->
<div class="custom-modal modal modal--animate-translate-down flex flex-center bg-black bg-opacity-80% padding-md js-modal custom-modal-hide-body-scroll" id="modal-add-tag-category">
  <form action="{{ route('tag-category.store') }}" method="post" class="modal__content height-100% tabs js-tabs width-100% max-width-sm bg radius-md shadow-md flex flex-column" id="add-tag-category-form" novalidate> @csrf
    <header class="bg-contrast-lower padding-y-sm padding-x-md flex items-center justify-between">
      <!-- 👇 Tabs -->
      <nav class="tabs">
        <ul class="flex flex-wrap gap-xl js-tabs__controls" aria-label="Tabs Interface">
          <li><a href="#addTagCategoryTabPanel1" class="tabs__control" aria-selected="true">Add</a></li>
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
        <section id="addTagCategoryTabPanel1" class="padding-top-md js-tabs__panel">
            <div class="grid gap-sm">
              <label class="form-label margin-bottom-xxs" for="tag_category_name">Enter Tag Category</label>
              <input class="form-control width-100%" type="text" name="tag_category_name" id="tag_category_name" required>

          </div>
        </section>
      </div>

      <!-- 👇 End Tab Panels -->
    </div><!-- /.padding-y-sm padding-x-md flex-grow overflow-auto -->

    <footer class="padding-y-sm padding-x-md bg shadow-md flex-shrink-0">
      <div class="flex justify-end gap-xs">
        <input type="hidden" name="tag_category_id">
        <button type="button" class="btn btn--subtle js-modal__close">Cancel</button>
        <button type="submit" class="btn btn--primary">Save</button>
      </div>
    </footer>
  </form><!-- /.modal__content -->
</div><!-- /.modal -->
<!-- Full Screen Modal End -->

<div class="modal modal--search modal--animate-fade flex flex-center padding-md js-modal" id="modal-search">
  <div class="modal__content width-100% max-width-sm" role="alertdialog" aria-labelledby="modal-search-title" aria-describedby="">
    <form action="{{ route('tag.index') }}" class="full-screen-search">
      <label for="search-input-x" id="modal-search-title" class="sr-only">Search</label>
      <input class="reset full-screen-search__input" type="search" value="{{ $q }}" name="q" id="search-input-tag" placeholder="Search...">
      <button class="reset full-screen-search__btn">
        <svg class="icon" viewBox="0 0 24 24">
          <title>Search</title>
          <g stroke-linecap="square" stroke-linejoin="miter" stroke-width="2" stroke="currentColor" fill="none" stroke-miterlimit="10">
            <line x1="22" y1="22" x2="15.656" y2="15.656"></line>
            <circle cx="10" cy="10" r="8"></circle>
          </g>
        </svg>
      </button>
    </form>
  </div>

  <button class="reset modal__close-btn modal__close-btn--outer  js-modal__close js-tab-focus">
    <svg class="icon icon--sm" viewBox="0 0 24 24">
      <title>Close modal window</title>
      <g fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2">
        <line x1="3" y1="3" x2="21" y2="21" />
        <line x1="21" y1="3" x2="3" y2="21" />
      </g>
    </svg>
  </button>
</div><!-- /.modal -->