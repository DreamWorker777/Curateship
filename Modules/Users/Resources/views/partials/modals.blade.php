<!-- 👇 Full Screen Modal -->
<div class="custom-modal modal modal--animate-translate-down flex flex-center bg-black bg-opacity-80% padding-md js-modal custom-disable-modal-close custom-modal-hide-body-scroll" id="modal-add-user">
  <div class="modal__content height-100% tabs js-tabs width-100% max-width-xs bg radius-md shadow-md flex flex-column" role="alertdialog" aria-labelledby="modal-add-user-title" aria-describedby="modal-description-4">
    <form action="{{ url('admin/users/store') }}" id="modal-form-add-user" class="modal-form flex flex-column height-100%" method="post"> @csrf
      <input type="file" class="is-hidden" name="avatar" id="new_avatar" accept="image/*">
      <header class="bg-contrast-lower padding-y-sm padding-x-xs flex items-center justify-between">
        <!-- 👇 Tabs -->
        <nav class="">
          <ul class="flex flex-wrap gap-sm js-tabs__controls" aria-label="Tabs Interface">
            <li><a href="#tab1Panel1" class="tabs__control" aria-selected="true">Add User</a></li>
            <li><a href="#tab1Panel2" class="tabs__control">Images</a></li>
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

      <div class="padding-y-sm padding-x-md flex-grow overflow-auto">
        <div class="js-tabs__panels">
          <section id="tab1Panel1" class="padding-top-md js-tabs__panel">
            <div class="text-component">
              <div id="ajax-add-user-form">Loading...</div><!-- /#ajax-add-user-form -->
            </div>
          </section>

          <section id="tab1Panel2" class="padding-top-md js-tabs__panel">
            <div class="text-component">
              <div>
                {{-- ADD COVER PHOTO --}}
                <div>
                  <div class="alert-cover-photo hidden">
                    <button class="btn-cover-photo" id="btnCancelAdd" type="button">Cancel</button>
                    <button class="btn-cover-photo" id="btnUploadCoverPhotoAdd" type="button">Update</button>
                  </div>
                  <div>
                    <input type="file" name="upload_image" id="uploadImageAdd" style="display: none;">
                    <div id="uploaded_image_add"></div>
                  </div>

                  <div id="imageDemoAdd"></div>

                  <input type="hidden" value="" id="base64ImageAdd">
                  <input type="hidden" name="cover-photo-add" id="cover-photo-add">
                </div>

                <div class="author margin-bottom-md">
                  <a href="#0" class="author__img-wrapper bg-black bg-opacity-50%">
                    <img alt="Author picture" id="settings-avatar-add" style="display: none;">
                  </a>
                  <div class="author__content text-component padding-top-sm padding-left-xs">
                    <div class="flex flex-wrap gap-sm">
                      <div class="file-upload inline-block">
                        <label for="avatar-add" class="file-upload__label btn btn--subtle">
                          <span class="file-upload__text file-upload__text--has-max-width" data-default-text="Upload a file">Upload Avatar</span>
                        </label>

                        <input type="file" class="file-upload__input" data-custom-image-file-preview="#settings-avatar-add" data-custom-image-file-resetter="#settings-avatar-delete" name="avatar-add" id="avatar-add" accept="image/*">
                      </div><!-- /.file-upload inline-block -->
                      <button type="button" id="btnDeleteAvatarAdd" class="btn btn--subtle">Delete Avatar</button>

                      <label for="uploadImageAdd" class="btn" id="btnEditCoverPhotoAdd">Edit Cover Photo</label>
                      <button type="button" id="btnDeleteCoverPhotoAdd" class="btn btn--subtle">
                        Delete Cover Photo
                      </button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </section>

        </div>
        <!-- 👇 End Tab Panels -->
      </div><!-- /.padding-y-sm padding-x-md flex-grow overflow-auto -->

      <footer class="padding-y-sm padding-x-md bg shadow-md flex-shrink-0">
        <div class="flex justify-end gap-xs">
          <button type="button" class="btn btn--subtle js-modal__close">Cancel</button>
          <button type="submit" class="btn btn--primary">Save</button>
        </div>
      </footer>
    </form>
  </div><!-- /.modal__content -->

</div><!-- /.modal -->
<!-- Full Screen Modal End -->

<!-- 👇 Full Screen Modal -->
<div class="custom-modal modal modal--animate-translate-down flex flex-center bg-black bg-opacity-80% padding-md js-modal custom-modal-hide-body-scroll" id="modal-edit-user">
  <div class="modal__content height-100% tabs js-tabs width-100% max-width-xs bg radius-md shadow-md flex flex-column" role="alertdialog" aria-labelledby="modal-edit-user-title" aria-describedby="modal-description-4">
    <form action="#" method="POST" id="modal-edit-user-form" class="modal-form  flex flex-column height-100%" enctype="multipart/form-data">
      @csrf
      <!-- <input type="file" class="is-hidden" name="avatar" id="avatar" accept="image/*"> -->
      <header class="bg-contrast-lower padding-y-sm padding-x-xs flex items-center justify-between">
        <!-- 👇 Tabs -->
        <nav class="">
          <ul class="flex flex-wrap gap-sm js-tabs__controls" aria-label="Tabs Interface">
            <li><a href="#tab2Panel1" class="tabs__control" aria-selected="true">Edit User</a></li>
            <li><a href="#tab2Panel2" class="tabs__control">Images</a></li>
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

      <div class="padding-y-sm padding-x-md flex-grow overflow-auto">
        <div class="js-tabs__panels">
          <section id="tab2Panel1" class="padding-top-md js-tabs__panel">
            <div class="text-component">
              <div id="ajax-edit-user-form">Loading...</div><!-- /#ajax-edit-user-form -->
            </div>
          </section>

          <section id="tab2Panel2" class="padding-top-md js-tabs__panel flex gap-sm items-center">

            <div>
              {{-- UPDATE COVER PHOTO --}}
              <div>
                <div class="alert-cover-photo hidden">
                  <button class="btn-cover-photo" id="btnCancel" type="button" onclick="location.reload()">Cancel</button>
                  <button class="btn-cover-photo" id="btnUploadCoverPhoto" type="button">Update</button>
                </div>
                <div>
                  <input type="file" name="upload_image" id="uploadImage" style="display: none;">
                  <div id="uploaded_image"></div>
                </div>

                <div id="imageDemo"></div>

                <input type="hidden" value="" id="base64Image">
              </div>

              <div class="author margin-bottom-md">
                <a href="#0" class="author__img-wrapper bg-black bg-opacity-50%">
                  <img alt="Author picture" id="settings-avatar" style="display: none;">
                </a>
                <div class="author__content text-component padding-top-sm padding-left-xs">
                  <div class="flex flex-wrap gap-sm">
                    <div class="file-upload inline-block">
                      <label for="avatar" class="file-upload__label btn btn--subtle">
                        <span class="file-upload__text file-upload__text--has-max-width" data-default-text="Upload a file">Upload Avatar</span>
                      </label>

                      <input type="file" class="file-upload__input" data-custom-image-file-preview="#settings-avatar" data-custom-image-file-resetter="#settings-avatar-delete" name="avatar" id="avatar" accept="image/*">
                    </div><!-- /.file-upload inline-block -->
                    <button type="button" id="btnDeleteAvatar" class="btn btn--subtle">Delete Avatar</button>

                    <label for="uploadImage" class="btn" id="btnEditCoverPhoto">Edit Cover Photo</label>
                    <button type="button" id="btnDeleteCoverPhoto" class="btn btn--subtle">
                      Delete Cover Photo
                    </button>
                  </div>
                </div>
              </div>

            </div>
          </section>

        </div>
        <!-- 👇 End Tab Panels -->
      </div><!-- /.padding-y-sm padding-x-md flex-grow overflow-auto -->

      <footer class="padding-y-sm padding-x-md bg shadow-md flex-shrink-0">
        <div class="flex justify-end gap-xs">
          <button type="button" class="btn btn--subtle js-modal__close">Cancel</button>
          <button type="submit" class="btn btn--primary">Save</button>
        </div>
      </footer>
    </form>
  </div><!-- /.modal__content -->
</div><!-- /.modal -->
<!-- Full Screen Modal End -->
<!-- Search users modal -->
<div class="modal modal--search modal--animate-fade flex flex-center padding-md js-modal" id="modal-search">
  <div class="modal__content width-100% max-width-sm" role="alertdialog" aria-labelledby="modal-search-title" aria-describedby="">
    <form class="full-screen-search" action="{{ url('admin/users') }}" method="GET">
      <input type="hidden" name="limit" value="{{$limit ?? ''}}">
      <input type="hidden" name="sort" value="{{$sort ?? ''}}">
      <input type="hidden" name="order" value="{{$order ?? ''}}">
      <label for="search-input-x" id="modal-search-title" class="sr-only">Search</label>
      <input class="reset full-screen-search__input" type="search" name="q" value="{{ $q ?? '' }}" id="search-input-x" placeholder="Search...">
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
</div>
<!-- Full Screen Modal End -->