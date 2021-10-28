<!-- 👇 Full Screen Modal -->
<form action="#" id="formAddPage">
  @csrf
  <div class="custom-modal modal modal--animate-translate-down flex flex-center bg-contrast-higher bg-opacity-90% padding-md js-modal custom-modal-hide-body-scroll custom-disable-modal-close" id="modal-add-page">
    <div class="modal__content height-100% tabs js-tabs width-100% max-width-sm bg radius-md shadow-md flex flex-column">
        <header class="bg-contrast-lower padding-y-sm padding-x-md flex items-center justify-between">
          <!-- 👇 Tabs -->
          <nav class="tabs">
            <ul class="flex flex-wrap gap-lg js-tabs__controls" aria-label="Tabs Interface">
              <li><a href="#tab1Panel1" class="tabs__control" aria-selected="true">Add</a></li>
              <li><a href="#tab1Panel2" class="tabs__control">Settings</a></li>
            </ul>
          </nav>
          <!-- End Tabs -->

          <button type="button" class="btn btn--subtle btn-full-screen" title="Expand to full screen">
            Full Screen
          </button>
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
            <section id="tab1Panel1" class="padding-top-xs js-tabs__panel">
              <div>
                <h1 class="js-input custom-input custom-input__title" placeholder="Title" target="title" required></h1>
                <input type="hidden" id="title" name="title" value="">
  
                <div class="grid gap-sm editorjs-fullwidth">
                  <div id="editorjs" data-target-input="#description" class="site-editor"></div>
                  <input type="hidden" name="description" id="description"/>
                </div>
              </div>
            </section>

            <!--Tab2 Content-->
            <section id="tab1Panel2" class="padding-top-md js-tabs__panel">
              <fieldset class="margin-bottom-md">
                <legend class="form-legend">Form Legend</legend>

                <div class="grid gap-sm">
                  <input class="form-control width-100%" type="text" name="page_title" id="pageTitle" placeholder="Enter SEO Title (optional)">
                </div>
              </fieldset>
            </section>
          </div>

          <!-- 👇 End Tab Panels -->
        </div><!-- /.padding-y-sm padding-x-md flex-grow overflow-auto -->

        <footer class="padding-y-sm padding-x-md bg shadow-md flex-shrink-0">
          <div class="flex justify-end gap-xs">
            <button type="button" class="btn btn--subtle js-modal__close">Cancel</button>
            <button type="button" id="btnSave" class="btn btn--primary site-editor" data-target-input="#description">Save</button>
            <button type="button" id="btnPublish" class="btn btn--primary site-editor" data-target-input="#description">Publish</button>
          </div>
        </footer>
    </div><!-- /.modal__content -->
  </div><!-- /.modal -->
<!-- Full Screen Modal End -->
</form>

<div class="modal modal--search modal--animate-fade flex flex-center padding-md js-modal" id="modal-search">
  <div class="modal__content width-100% max-width-sm" role="alertdialog" aria-labelledby="modal-search-title" aria-describedby="">
    <form class="full-screen-search" action="{{ url('admin/pages') }}" method="GET">
      <label for="search-input-x" id="modal-search-title" class="sr-only">Search</label>
      <input class="reset full-screen-search__input" type="search" name="pagesearch" id="search-input-x" placeholder="Search..." required>
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