<!-- 👇 Full Screen Modal -->
<form action="#" id="formEditPost" enctype="multipart/form-data">
  @csrf
  <input type="hidden" id="postId" value="">
  <div class="custom-modal modal modal--animate-translate-down flex flex-center bg-black bg-opacity-80% padding-md js-modal custom-modal-hide-body-scroll custom-disable-modal-close" id="modal-edit-post">
    <div class="modal__content height-100% tabs js-tabs width-100% max-width-sm bg radius-md shadow-md flex flex-column">
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

          <button type="button" class="reset modal__close-btn modal__close-btn--inner js-modal__close js-tab-focus" id="closeEditModal">
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
            <section id="tab1Panel1" class="padding-top-xs js-tabs__panel">
              <div>
                <h1 id="editTitleElem" class="js-input custom-input custom-input__title" placeholder="Title" target="editTitle" required></h1>
                <input type="hidden" id="editTitle" name="title" value="">

                <div class="grid gap-sm editorjs-fullwidth">
                  <div id="editorjs2" data-target-input="#editDescription" class="site-editor"></div>
                  <input type="hidden" name="description" id="editDescription"/>
                </div>
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
                  <div class="margin-bottom-sm">
                    <input class="form-control width-100%" type="text" name="slug" id="editSlug" placeholder="Edit Slug" required>
                  </div><!-- /.margin-bottom-sm -->
                  <div class="grid gap-sm">
                      <input class="form-control width-100%" type="text" name="page_title" id="editPageTitle" placeholder="Edit Page Title">
                    <div>

                      <div class="date-input js-date-input">
                        <label for="date-input-1"></label>
                        
                        <div class="date-input__wrapper">
                          <input type="text" class="form-control width-100% date-input__text js-date-input__text" id="post_date" name="post_date" placeholder="dd/mm/yyyy" autocomplete="off" id="date-input-1">
                          
                          <button class="reset date-input__trigger js-date-input__trigger js-tab-focus" aria-label="Select date using calendar widget" type="button">
                            <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter" stroke-miterlimit="10"><line x1="17" y1="4" x2="17" y2="1"  ></line><line x1="7" y1="4" x2="7" y2="1"></line><line x1="1" y1="8" x2="23" y2="8"></line><rect x="1" y="4" width="22" height="18"></rect></g></svg>
                          </button>
                        </div>
                        
                        <div class="date-picker bg radius-md shadow-md js-date-picker" role="dialog" aria-labelledby="calendar-label-1">
                          <header class="date-picker__header">
                            <div class="date-picker__month">
                              <span class="date-picker__month-label js-date-picker__month-label" id="calendar-label-1"></span> <!-- this will contain month label + year -->
                      
                              <nav>
                                <ul class="date-picker__month-nav js-date-picker__month-nav">
                                  <li>
                                    <button class="reset date-picker__month-nav-btn js-date-picker__month-nav-btn js-date-picker__month-nav-btn--prev js-tab-focus" type="button">
                                      <svg class="icon icon--xs" viewBox="0 0 16 16"><title>Previous month</title><polyline points="11 14 5 8 11 2" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2"/></svg>
                                    </button>
                                  </li>
                      
                                  <li>
                                    <button class="reset date-picker__month-nav-btn js-date-picker__month-nav-btn js-date-picker__month-nav-btn--next js-tab-focus" type="button">
                                      <svg class="icon icon--xs" viewBox="0 0 16 16"><title>Next month</title><polyline points="5 2 11 8 5 14" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2"/></svg>
                                    </button>
                                  </li>
                                </ul>
                              </nav>
                            </div>
                      
                            <ol class="date-picker__week">
                              <li><div class="date-picker__day">M<span class="sr-only">onday</span></div></li>
                              <li><div class="date-picker__day">T<span class="sr-only">uesday</span></div></li>
                              <li><div class="date-picker__day">W<span class="sr-only">ednesday</span></div></li>
                              <li><div class="date-picker__day">T<span class="sr-only">hursday</span></div></li>
                              <li><div class="date-picker__day">F<span class="sr-only">riday</span></div></li>
                              <li><div class="date-picker__day">S<span class="sr-only">aturday</span></div></li>
                              <li><div class="date-picker__day">S<span class="sr-only">unday</span></div></li>
                            </ol>
                          </header>
                      
                          <ol class="date-picker__dates js-date-picker__dates" aria-labelledby="calendar-label-1">
                            <!-- days will be created using js -->
                          </ol>
                        </div>
                      </div>
                      
                      <div class="post-tag-wrp edit-post-tag margin-top-lg">
                        <div class="alert alert--error js-alert" role="alert">
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
                          <div class="grid gap-sm margin-top-sm">
                              <label class="form-label margin-bottom-xxs" for="edit_tag_category_{{ $tag_category->id }}">
                                Edit {{ $tag_category->name }}
                              </label>
                              <select name="tag_category_{{ $tag_category->id }}[]" id="edit_tag_category_{{ $tag_category->id }}" class="form-control site-tag-pills" data-id="{{ $tag_category->id }}" multiple></select>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </fieldset>
            </section>
          </div>

          <!-- 👇 End Tab Panels -->
        </div><!-- /.padding-y-sm padding-x-md flex-grow overflow-auto -->

        <footer class="padding-y-sm padding-x-md bg shadow-md flex-shrink-0">
          <div class="flex justify-end gap-xs">
            <button type="button" class="btn btn--subtle js-modal__close" data-toggle="close-modal" data-target-close="#closeEditModal">Cancel</button>
            <a href="#" type="button" class="btn btn--primary is-hidden draft-post-link trigger-site-editor-save" data-target-input="#editDescription" id="btnEditSaveDraft" data-toggle-published="0">Draft</a>
            <a href="#" type="button" class="btn btn--primary is-hidden publish-post-link trigger-site-editor-save" data-target-input="#editDescription" id="btnEditSavePublish" data-toggle-published="1">Publish</a>
            <a href="#" type="button" class="btn btn--primary is-hidden restore-post-link">Restore</a>
            <button type="button" class="btn btn--primary trigger-site-editor-save" data-target-input="#editDescription" id="btnEditSave">Save</button>
          </div>
        </footer>
    </div><!-- /.modal__content -->

  </div><!-- /.modal -->
<!-- Full Screen Modal End -->
</form>
