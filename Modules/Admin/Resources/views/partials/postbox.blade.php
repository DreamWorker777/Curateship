<section>
    <div class="mt-4">
      <div class="postbox-container link-card radius-md radius-top-left-0 radius-top-right-0" id="site-table-with-pagination-container">
        <form action="{{ route('postbox.store') }}" id="formPostBox" method="POST" enctype="multipart/form-data" >
          @csrf
          <div class="grid">
            <!-- Post box -->
            <div class="postbox">
              <?php
              if($alert = session()->get('alert')) {
                $type = $alert['type'];
              } else {
                $type = 'post';
              }
              ?>
              @include('postbox.templates.'.$type)
            </div>
  
            <!-- Content type selections -->
            <div class="border-top border-contrast-lower"></div>
            <div class="box-footer">
              <menu class="menu-bar menu-bar--expanded@md js-menu-bar margin-xs">
                <li class="menu-bar__item menu-bar__item--trigger js-menu-bar__trigger" role="menuitem" aria-label="More options">
                  <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 16 16">
                    <circle cx="8" cy="7.5" r="1.5" />
                    <circle cx="1.5" cy="7.5" r="1.5" />
                    <circle cx="14.5" cy="7.5" r="1.5" /></svg>
                </li>
  
                <li class="menu-bar__item btn-load-box {{ $type == 'post' ? 'menu-bar-control--active' : '' }}" role="menuitem" box-type="post">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>pencil</title><g fill="#000000"><path d="M22.707,5.293l-4-4a1,1,0,0,0-1.414,0l-14,14a1.013,1.013,0,0,0-.242.391l-2,6A1,1,0,0,0,2,23a1.014,1.014,0,0,0,.316-.051l6-2a1.013,1.013,0,0,0,.391-.242l14-14A1,1,0,0,0,22.707,5.293ZM14.829,6.585l1.414-1.414,2.586,2.586L17.415,9.171Z" fill="#000000"></path></g></svg>
                  <span class="menu-bar__label">Create Post</span>
                </li>
  
                <li class="menu-bar__item btn-load-box {{ $type == 'page' ? 'menu-bar-control--active' : '' }}" role="menuitem" box-type='page'>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>note</title><g fill="#000000"><path d="M23,2H1A1,1,0,0,0,0,3V21a1,1,0,0,0,1,1H23a1,1,0,0,0,1-1V3A1,1,0,0,0,23,2ZM12,18H4V16h8Zm8-5H4V11H20Zm0-5H4V6H20Z" fill="#000000"></path></g></svg>
                  <span class="menu-bar__label">Create Page</span>
                </li>
  
                <li class="menu-bar__item btn-load-box {{ $type == 'page' ? 'menu-bar-control--active' : '' }}" role="menuitem" box-type='page'>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>video-player</title><g fill="#000000"><path d="M21,2H3A3,3,0,0,0,0,5V19a3,3,0,0,0,3,3H21a3,3,0,0,0,3-3V5A3,3,0,0,0,21,2ZM9,17V7l8,5Z" fill="#000000"></path></g></svg>
                  <span class="menu-bar__label">Add Video</span>
                </li>
              </menu>
              <div class="buttons margin-xs">
                <button id="btnSave" class="btn btn--primary margin-right-xs">Save</button>
                <button id="btnPublish" class="btn btn--primary">Publish</button>
              </div>
            </div>
          </div><!-- /.grid -->
        </form>
      </div>
    </div><!-- /.container -->
  </section>