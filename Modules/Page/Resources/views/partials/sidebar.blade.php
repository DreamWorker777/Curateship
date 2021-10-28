<aside class="sidebar sidebar--static@md col-3@md js-sidebar sidebar--right-on-mobile" data-static-class="sidebar--sticky-on-desktop z-index-1 bg-contrast-lowest" id="sidebar" aria-labelledby="sidebarTitle">
  <div class="sidebar__panel">
  <nav class="sidenav padding-y-sm text-sm@md js-sidenav position-fixed">
    <div class="sidenav__label margin-bottom-xxxs">
      <span class="text-sm color-contrast-medium">Pages</span>
    </div>

    <ul class="sidenav__list">
      <li class="sidenav__item sidenav__item--expanded">
        <a href="{{ url('/admin/pages') }}" data-tab="published" class="sidenav__link ajax-link"{{ (url('/admin/pages') == url()->full()) ? 'aria-current=page' : '' }}>
          <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16"><g><path d="M14,7H2v7c0,0.6,0.4,1,1,1h10c0.6,0,1-0.4,1-1V7z"></path><rect y="1" width="16" height="4"></rect></g></svg>
          <span class="sidenav__text">All Pages</span>
          <span class="sidenav__counter">{{ $pages_published_count }} <i class="sr-only">notifications</i></span>
        </a>

        <button class="reset sidenav__sublist-control js-sidenav__sublist-control js-tab-focus" aria-label="Toggle sub navigation">
          <svg class="icon" viewBox="0 0 12 12"><polygon points="4 3 8 6 4 9 4 3"/></svg>
        </button>

        <ul class="sidenav__list">
          <li class="sidenav__item">
            <a href="{{ url('/admin/pages?is_draft=1') }}" data-tab="draft" class="sidenav__link ajax-link">
              <span class="sidenav__text">Draft</span>
              <span class="sidenav__counter">{{ $pages_draft_count }} <i class="sr-only">notifications</i></span>
            </a>
          </li>

          <li class="sidenav__item">
            <a href="{{ url('/admin/pages?is_pending=1') }}" data-tab="pending" class="sidenav__link ajax-link">
              <span class="sidenav__text">Pending</span>
              <span class="sidenav__counter">{{ $pages_pending_count }} <i class="sr-only">notifications</i></span>
            </a>
          </li>
          <li class="sidenav__item">
            <a href="{{ url('/admin/pages?is_trashed=1') }}" data-tab="trashed" class="sidenav__link ajax-link">
              <span class="sidenav__text">Trash</span>
              <span class="sidenav__counter">{{ $pages_deleted_count }} <i class="sr-only">notifications</i></span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
</div>
</aside>
