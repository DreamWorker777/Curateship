<aside class="sidebar sidebar--sticky sidebar--static@md col-3@md js-sidebar sidebar--right-on-mobile" data-static-class="z-index-1 bg-contrast-lowest" id="sidebar" aria-labelledby="sidebarTitle">
  <div class="sidebar__panel">
  <nav class="sidenav padding-y-sm text-sm@md js-sidenav">

    <ul class="sidenav__list">
      <li class="sidenav__item padding-y-xxxxs">
        <a href="{{ url('admin/') }}" class="sidenav__link" {{ (url('/admin/') == url()->full()) ? 'aria-current=page' : '' }}>
          <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16"><g><circle cx="6" cy="8" r="2"></circle><path d="M10,2H6C2.7,2,0,4.7,0,8s2.7,6,6,6h4c3.3,0,6-2.7,6-6S13.3,2,10,2z M10,12H6c-2.2,0-4-1.8-4-4s1.8-4,4-4h4 c2.2,0,4,1.8,4,4S12.2,12,10,12z"></path></g></svg>
          <span class="sidenav__text">Dashboard</span>
        </a>
      </li>
    </ul>

    <div class="sidenav__divider margin-y-xs" role="presentation"></div>

    <ul class="sidenav__list">
      <li class="sidenav__item sidenav__item--collapse">
        <a href="{{ url('admin/posts') }}" class="sidenav__link" {{ (url('/admin/posts') == url()->full()) ? 'aria-current=page' : '' }}>
          
          <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16"><g fill="#000000"><path d="M8.616,2.677,1.646,9.646a.5.5,0,0,0-.128.222l-1.5,5.5a.5.5,0,0,0,.614.614l5.5-1.5a.5.5,0,0,0,.222-.128l6.969-6.97Z" fill="#000000"></path><path d="M15.561,3.025,12.975.439a1.5,1.5,0,0,0-2.121,0L9.677,1.616l4.707,4.707,1.177-1.177A1.5,1.5,0,0,0,15.561,3.025Z"></path></g></svg>
          <span class="sidenav__text">Posts</span><span class="sidenav__counter">{{ getPostsCount() }} <i class="sr-only">notifications</i></span>
        </a>

        <button class="reset sidenav__sublist-control js-sidenav__sublist-control js-tab-focus" aria-label="Toggle sub navigation">
          <svg class="icon" viewBox="0 0 12 12"><polygon points="4 3 8 6 4 9 4 3"/></svg>
        </button>

        <ul class="sidenav__list">
          <li class="sidenav__item">
            <a href="{{ url('admin/posts') }}" class="sidenav__link">
              <span class="sidenav__text">Posts</span><span class="sidenav__counter">{{ getPostsCount() }} <i class="sr-only">notifications</i></span>
            </a>
          </li>
        </ul>
      </li>

      <li class="sidenav__item">
        <a href="{{ url('admin/pages') }}" class="sidenav__link" {{ (url('/admin/pages') == url()->full()) ? 'aria-current=page' : '' }}>
          <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16"><g fill="#000000"><path d="M15,1H1A.945.945,0,0,0,0,2V14a.945.945,0,0,0,1,1H15a.945.945,0,0,0,1-1V2A.945.945,0,0,0,15,1ZM8,11H3V9H8Zm5-4H3V5H13Z" fill="#000000"></path></g></svg>
          <span class="sidenav__text">Pages</span><span class="sidenav__counter">{{ getPagesCount() }} <i class="sr-only">notifications</i></span>
        </a>
      </li>

      <li class="sidenav__item">
        <a href="{{ url('admin/users') }}" class="sidenav__link" {{ (url('/admin/users') == url()->full()) ? 'aria-current=page' : '' }}>
          <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16"><g fill="#000000"><path d="M14.912,9.689l-2.157-.616a.5.5,0,0,1-.338-.325l-.17-.522a4.949,4.949,0,0,0,2.3-.4.5.5,0,0,0,.192-.712A5.233,5.233,0,0,1,14,4.131,3.093,3.093,0,0,0,11.119,1,3,3,0,0,0,8.263,2.774,4.189,4.189,0,0,1,9,5.128a4.239,4.239,0,0,0,.584,2.457,1.5,1.5,0,0,1-.534,2.1l.137.04A2.51,2.51,0,0,1,11,12.131V14.5a1.483,1.483,0,0,1-.092.5H15.5a.5.5,0,0,0,.5-.5V11.131A1.5,1.5,0,0,0,14.912,9.689Z"></path> <path d="M8.912,10.689l-2.157-.616a.5.5,0,0,1-.338-.325l-.17-.522a4.949,4.949,0,0,0,2.3-.4.5.5,0,0,0,.192-.712A5.233,5.233,0,0,1,8,5.131,3.093,3.093,0,0,0,5.119,2,3,3,0,0,0,2,5a5.374,5.374,0,0,1-.736,3.115.5.5,0,0,0,.193.711,4.949,4.949,0,0,0,2.3.4l-.17.522a.5.5,0,0,1-.338.325l-2.157.616A1.5,1.5,0,0,0,0,12.131V14.5a.5.5,0,0,0,.5.5h9a.5.5,0,0,0,.5-.5V12.131A1.5,1.5,0,0,0,8.912,10.689Z" fill="#000000"></path></g></svg>
          <span class="sidenav__text">Users</span><span class="sidenav__counter">{{ getUsersCount() }} <i class="sr-only">notifications</i></span>
        </a>
      </li>

      <li class="sidenav__item">
        <a href="{{ url('admin/tag') }}" class="sidenav__link" {{ (url('/admin/tag') == url()->full()) ? 'aria-current=page' : '' }}>
          <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16"><g fill="#000000"><path d="M15.707,7.207,8.5,0H3V2H6.914l7.5,7.5a2.012,2.012,0,0,1,.187.227l1.106-1.106A1,1,0,0,0,15.707,7.207Z"></path> <path d="M13.707,10.207,6.5,3H1V8.5l7.207,7.207a1,1,0,0,0,1.414,0l4.086-4.086A1,1,0,0,0,13.707,10.207ZM4,7A1,1,0,1,1,5,6,1,1,0,0,1,4,7Z" fill="#000000"></path></g></svg>
          <span class="sidenav__text">Tags</span><span class="sidenav__counter">{{ getTagsCount() }} <i class="sr-only">notifications</i></span>
        </a>
      </li>
    </ul>

    <div class="sidenav__divider margin-y-xs" role="presentation"></div>

    <div class="sidenav__label margin-bottom-xxxs">
      <span class="text-sm color-contrast-medium">Settings</span>
    </div>

    <ul class="sidenav__list">
      <li class="sidenav__item">
        <a href="{{ url('admin/settings') }}" class="sidenav__link"  {{ (url('/admin/settings') == url()->full()) ? 'aria-current=page' : '' }}>
          <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16"><g fill="#000000"><path fill="#000000" d="M14,0H2C0.9,0,0,0.9,0,2v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V2C16,0.9,15.1,0,14,0z M7,12H2v-2h5V12z M7,8H4V6H2V4h2V2h3V8z M14,12h-2v2H9V8h3v2h2V12z M14,6H9V4h5V6z"></path></g></svg>
          <span class="sidenav__text">General</span>
        </a>
      </li>

      <li class="sidenav__item">
        <a href="{{ url('admin/posts/settings') }}" class="sidenav__link"  {{ (url('/admin/posts/settings') == url()->full()) ? 'aria-current=page' : '' }}>
          <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16"><g fill="#000000"><path fill="#000000" d="M15,1H1C0.4,1,0,1.4,0,2v12c0,0.6,0.4,1,1,1h14c0.6,0,1-0.4,1-1V2C16,1.4,15.6,1,15,1z M6,4c0.6,0,1,0.4,1,1 c0,0.6-0.4,1-1,1C5.4,6,5,5.6,5,5C5,4.4,5.4,4,6,4z M2,12l2-4l3,2l3-4l4,6H2z"></path></g></svg>
          <span class="sidenav__text">Image</span>
        </a>
      </li>

      <li class="sidenav__item">
        <a href="{{ url('admin/menus?menu=2') }}" class="sidenav__link" {{ strpos(url()->full(), url('/admin/menus')) !== false ? 'aria-current=page' : '' }}>
          <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16"><g fill="#000000"><path fill="#000000" d="M8,14H1c-0.552,0-1-0.448-1-1v0c0-0.552,0.448-1,1-1h7c0.552,0,1,0.448,1,1v0C9,13.552,8.552,14,8,14z"></path> <path fill="#000000" d="M15,4H1C0.448,4,0,3.552,0,3v0c0-0.552,0.448-1,1-1h14c0.552,0,1,0.448,1,1v0C16,3.552,15.552,4,15,4z"></path> <path d="M15,9H1C0.448,9,0,8.552,0,8v0c0-0.552,0.448-1,1-1h14c0.552,0,1,0.448,1,1v0 C16,8.552,15.552,9,15,9z"></path></g></svg>
          <span class="sidenav__text">Menus</span>
        </a>
      </li>

      <li class="sidenav__item">
        <a href="{{ url('admin/scraper') }}" class="sidenav__link" {{ strpos(url()->full(), url('/admin/scaper')) !== false ? 'aria-current=page' : '' }}>
        <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16"><g fill="#000000"><path fill="#000000" d="M15.27 7.3h-0.48c-0.66-0.54-2.6-3.76-2.82-4.67l0.34-0.57a0.66 0.66 0 1 0-1.13-0.68l-0.33 0.54c-0.79 0.3-4.96 0.3-5.76 0l-0.33-0.55a0.66 0.66 0 0 0-1.14 0.69l0.35 0.57c-0.22 0.91-2.17 4.14-2.83 4.67h-0.48a0.66 0.66 0 1 0 0 1.33h0.48c0.66 0.54 2.6 3.76 2.83 4.67l-0.35 0.57a0.66 0.66 0 1 0 1.14 0.69l0.33-0.54c0.79-0.3 4.96-0.3 5.76 0l0.33 0.54a0.66 0.66 0 1 0 1.13-0.69l-0.34-0.57c0.22-0.91 2.17-4.14 2.82-4.67h0.48a0.66 0.66 0 1 0 0-1.33z m-2.21 0h-1.55c-0.33-0.34-1.03-1.41-1.24-1.88l0.84-1.39c0.44 0.9 1.28 2.37 1.95 3.27z m-3.94 2.53c-0.62-0.07-1.7-0.07-2.3 0-0.25-0.5-0.77-1.36-1.2-1.86 0.43-0.5 0.95-1.36 1.2-1.87 0.62 0.07 1.7 0.07 2.3 0 0.25 0.5 0.77 1.36 1.2 1.87-0.43 0.5-0.95 1.36-1.2 1.86z m0.82-6.43l-0.82 1.36c-0.48 0.09-1.82 0.09-2.3 0l-0.83-1.36c1.1 0.1 2.86 0.1 3.95 0z m-4.28 2.02c-0.21 0.48-0.91 1.54-1.24 1.88h-1.55c0.66-0.9 1.51-2.36 1.95-3.27l0.84 1.39z m-2.79 3.21h1.55c0.33 0.34 1.03 1.41 1.24 1.88l-0.84 1.39c-0.44-0.9-1.29-2.37-1.95-3.27z m3.12 3.91l0.83-1.36c0.49-0.09 1.82-0.09 2.3 0l0.82 1.36c-1.1-0.1-2.85-0.1-3.95 0z m4.28-2.03c0.21-0.48 0.91-1.54 1.24-1.88h1.55c-0.66 0.9-1.51 2.36-1.95 3.27l-0.84-1.39z"></path><path d="M7.97 7.3a0.66 0.66 0 1 0 0 1.33 0.66 0.66 0 1 0 0-1.33z"></path></g></svg>
          <span class="sidenav__text"> Scraper</span>
        </a>
      </li>

    </ul>

    <div class="sidenav__divider margin-y-xs" role="presentation"></div>

    <div class="sidenav__label margin-bottom-xxxs">
      <span class="text-sm color-contrast-medium">Personal</span>
    </div>

    <ul class="sidenav__list site-load-content">
      <li class="sidenav__item">
        <a href="{{ url('users/settings') }}" class="sidenav__link" {{ (url('/users/settings') == url()->full()) ? 'aria-current=page' : '' }} target="_blank">
          <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16"><g><circle cx="6" cy="8" r="2"></circle><path d="M10,2H6C2.7,2,0,4.7,0,8s2.7,6,6,6h4c3.3,0,6-2.7,6-6S13.3,2,10,2z M10,12H6c-2.2,0-4-1.8-4-4s1.8-4,4-4h4 c2.2,0,4,1.8,4,4S12.2,12,10,12z"></path></g></svg>
          <span class="sidenav__text">Edit Profile</span>
        </a>
      </li>

      <li class="sidenav__item">
        <a href="{{ url('logout') }}" class="sidenav__link">
          <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16"><g fill="#000000"><path fill="#000000" d="M12.6 2h-4.6v2h-2v-3c0-0.6 0.4-1 1-1h8c0.6 0 1 0.4 1 1v9c0 0.3-0.1 0.5-0.3 0.7l-5 5c-0.2 0.2-0.4 0.3-0.7 0.3-0.1 0-0.3 0-0.4-0.1-0.4-0.1-0.6-0.5-0.6-0.9v-9c0-0.3 0.1-0.5 0.3-0.7l3.3-3.3z m-1.6 10.6l3-3v-6.2l-3 3v6.2z"></path><path fill="#000000" d="M0.3 7.3l3.7-3.7 1.4 1.4-2 2h4.6v2h-4.6l2 2-1.4 1.4-3.7-3.7c-0.4-0.4-0.4-1 0-1.4z"></path></g></svg>
          <span class="sidenav__text">Log out</span>
        </a>
      </li>
    </ul>
  </nav>
</div>
</aside>
