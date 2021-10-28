<div class="controlbar--sticky flex justify-between">
  <div class="margin-xs">
    <div class="inline-flex items-baseline">
      <h1 class="text-md color-contrast-high padding-y-xxxxs margin-x-xs" for="filterItems">Posts:</h1>
      <div class="select inline-block js-select" data-trigger-class="reset text-sm color-contrast-high h1 inline-flex items-center cursor-pointer js-tab-focus">
        <select name="filterItems" id="filterItems">
          <optgroup label="Post Status">
            <option value="" data-count="{{ $posts_published_count }}" selected>All Posts</option>
            <option value="draft" data-count="{{ $posts_draft_count }}">Draft</option>
            <option value="pending" data-count="{{ $posts_pending_count }}">Pending</option>
            <option value="deleted" data-count="{{ $posts_deleted_count }}">Trash</option>
          </optgroup>
        </select>
        <svg class="icon icon--xxxs margin-left-xxs" viewBox="0 0 8 8"><path d="M7.934,1.251A.5.5,0,0,0,7.5,1H.5a.5.5,0,0,0-.432.752l3.5,6a.5.5,0,0,0,.864,0l3.5-6A.5.5,0,0,0,7.934,1.251Z"/></svg>
      </div>
    </div>
  </div>

  <!-- Menu Bar -->
  <div class="flex flex-wrap items-center justify-between margin-right-xxs">
    <div class="flex flex-wrap">
      <li class="menu-bar__item js-menu-bar" aria-controls="modal-add-article">
      <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 20 20">
        <path d="M18.85 4.39l-3.32-3.32a0.83 0.83 0 0 0-1.18 0l-11.62 11.62a0.84 0.84 0 0 0-0.2 0.33l-1.66 4.98a0.83 0.83 0 0 0 0.79 1.09 0.84 0.84 0 0 0 0.26-0.04l4.98-1.66a0.84 0.84 0 0 0 0.33-0.2l11.62-11.62a0.83 0.83 0 0 0 0-1.18z m-6.54 1.08l1.17-1.18 2.15 2.15-1.18 1.17z"></path>
      </svg>
        <span class="menu-bar__label">Add Post</span>
      </li>

      <li class="menu-bar__item" aria-controls="modal-search">
        <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 20 20">
        <path d="M11.25 17.5c4.83 0 8.75-3.93 8.75-8.75s-3.93-8.75-8.75-8.75-8.75 3.93-8.75 8.75 3.93 8.75 8.75 8.75z m0-15c3.45 0 6.25 2.8 6.25 6.25s-2.8 6.25-6.25 6.25-6.25-2.8-6.25-6.25 2.8-6.25 6.25-6.25z"></path><path d="M0.36 17.86l3-2.99a10.02 10.02 0 0 0 1.76 1.77l-2.98 3a1.25 1.25 0 0 1-1.78 0 1.25 1.25 0 0 1 0-1.78z"></path>
        </svg>
        <span class="menu-bar__label">Search Posts</span>
      </li>

      <li class="menu-bar__item">
        <a href="{{ url('admin/posts/settings') }}">
          <svg class="icon menu-bar__icon" viewBox="0 0 20 20">
          <path d="M18.92 8.48a2.5 2.5 0 0 1-1.54-3.71c0.4-0.67 0.28-1.25-0.12-1.65l-0.38-0.38c-0.4-0.4-0.98-0.52-1.65-0.12a2.5 2.5 0 0 1-3.71-1.54c-0.19-0.76-0.68-1.08-1.25-1.08h-0.54c-0.56 0-1.06 0.32-1.25 1.08a2.5 2.5 0 0 1-3.71 1.54c-0.67-0.4-1.25-0.28-1.65 0.12l-0.39 0.38c-0.4 0.4-0.52 0.98-0.11 1.65a2.5 2.5 0 0 1-1.54 3.71c-0.76 0.19-1.08 0.68-1.08 1.25v0.54c0 0.56 0.32 1.06 1.08 1.25a2.5 2.5 0 0 1 1.54 3.71c-0.4 0.67-0.28 1.25 0.12 1.65l0.38 0.38c0.4 0.4 0.98 0.52 1.65 0.12a2.5 2.5 0 0 1 3.71 1.54c0.19 0.76 0.68 1.08 1.25 1.08h0.54c0.56 0 1.06-0.32 1.25-1.08a2.5 2.5 0 0 1 3.71-1.54c0.67 0.4 1.25 0.28 1.65-0.12l0.38-0.38c0.4-0.4 0.52-0.98 0.12-1.65a2.5 2.5 0 0 1 1.54-3.71c0.76-0.19 1.08-0.68 1.08-1.25v-0.54c0-0.56-0.33-1.06-1.08-1.25z m-8.92 5.27a3.75 3.75 0 1 1 0-7.5 3.75 3.75 0 0 1 0 7.5z"></path>
        </svg>
        </a>
        <span class="menu-bar__label">Settings</span>
      </li>

      <div class="int-table-actions" data-table-controls="table-1">
        <menu class="menu-bar js-int-table-actions__no-items-selected js-menu-bar" id="btnRefreshTable">
          <li class="menu-bar__item menu-bar__item--trigger js-menu-bar__trigger" role="menuitem" aria-label="More options">
            <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 16 16">
              <circle cx="8" cy="7.5" r="1.5" />
              <circle cx="1.5" cy="7.5" r="1.5" />
              <circle cx="14.5" cy="7.5" r="1.5" />
            </svg>
          </li>
        </menu>
        @if(!request()->has('status') || (request()->has('status') && request('status') != 'deleted'))
        <menu class="menu-bar is-hidden js-int-table-actions__items-selected js-menu-bar" id="btnDeleteMultiple">
          <li class="menu-bar__item menu-bar__item--trigger js-menu-bar__trigger" role="menuitem" aria-label="More options">
            <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 16 16">
              <circle cx="8" cy="7.5" r="1.5" />
              <circle cx="1.5" cy="7.5" r="1.5" />
              <circle cx="14.5" cy="7.5" r="1.5" /></svg>
          </li>
          <li class="menu-bar__item" role="menuitem">
          <svg class="icon menu-bar__icon" viewBox="0 0 20 20">
            <path d="M2.49 6.64v10.79a2.49 2.49 0 0 0 2.49 2.49h9.96a2.49 2.49 0 0 0 2.49-2.49v-10.79z m4.98 9.13h-1.66v-5.81h1.66z m3.32 0h-1.66v-5.81h1.66z m3.32 0h-1.66v-5.81h1.66z"></path><path d="M19.09 3.32h-4.98v-2.49a0.83 0.83 0 0 0-0.83-0.83h-6.64a0.83 0.83 0 0 0-0.83 0.83v2.49h-4.98a0.83 0.83 0 0 0 0 1.66h18.26a0.83 0.83 0 0 0 0-1.66z m-11.62-1.66h4.98v1.66h-4.98z"></path></svg>
            <span class="menu-bar__label">Delete</span>
            <span class="counter counter--critical counter--docked"><span id="deleteBadge">1</span> <i class="sr-only">Notifications</i></span>
          </li>

        </menu>
        @endif
      </div> <!-- end of <div class="int-table-actions" data-table-controls="table-1"> -->
    </div>
  </div> <!-- end of <div class="flex flex-wrap items-center justify-between margin-right-xxs"> -->
</div>
