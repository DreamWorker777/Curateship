<!-- 👇 Full Screen Modal -->
<form action="#" id="formEditPage">
  @csrf
  <input type="hidden" id="pageId" value="">
  <div class="custom-modal modal modal--animate-translate-down flex flex-center bg-contrast-higher bg-opacity-90% padding-md js-modal custom-modal-hide-body-scroll custom-disable-modal-close" id="modal-edit-page">
    <div class="modal__content height-100% tabs js-tabs width-100% max-width-sm bg radius-md shadow-md flex flex-column">
        <header class="bg-contrast-lower padding-y-sm padding-x-md flex items-center justify-between">
          <!-- 👇 Tabs -->
          <nav class="tabs">
            <ul class="flex flex-wrap gap-lg js-tabs__controls" aria-label="Tabs Interface">
              <li><a href="#tab1Panel1" class="tabs__control" aria-selected="true">Edit</a></li>
              <li><a href="#tab1Panel2" class="tabs__control">Settings</a></li>
            </ul>
          </nav>
          <!-- End Tabs -->

          <button type="button" class="btn btn--subtle btn-full-screen" title="Expand to full screen">
            Full Screen
          </button>
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
                          <input type="text" class="form-control width-100% date-input__text js-date-input__text" id="page_date" name="page_date" placeholder="dd/mm/yyyy" autocomplete="off" id="date-input-1">
                          
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
            <a href="#" type="button" class="btn btn--primary is-hidden draft-page-link trigger-site-editor-save" data-target-input="#editDescription" id="btnEditSaveDraft" data-toggle-published="0">Draft</a>
            <a href="#" type="button" class="btn btn--primary is-hidden publish-page-link trigger-site-editor-save" data-target-input="#editDescription" id="btnEditSavePublish" data-toggle-published="1">Publish</a>
            <a href="#" type="button" class="btn btn--primary is-hidden restore-page-link">Restore</a>
            <button type="button" class="btn btn--primary trigger-site-editor-save" data-target-input="#editDescription" id="btnEditSave">Save</button>
          </div>
        </footer>
    </div><!-- /.modal__content -->

  </div><!-- /.modal -->
<!-- Full Screen Modal End -->
</form>
