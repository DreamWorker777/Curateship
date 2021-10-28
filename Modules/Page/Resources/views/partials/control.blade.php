<div class="flex justify-between controlbar--sticky">
  <div class="margin-xs">
    <div class="inline-flex items-baseline">
      <h1 class="text-md color-contrast-high padding-y-xxxxs margin-x-xs" for="filterItems">Pages:</h1>
      <div class="select inline-block js-select" data-trigger-class="reset text-sm color-contrast-high h1 inline-flex items-center cursor-pointer js-tab-focus">
        <select name="filterItems" id="filterItems">
          <optgroup label="Page Status">
            <option value="" data-count="{{ $pages_published_count }}" selected>All Pages</option>
            <option value="draft" data-count="{{ $pages_draft_count }}">Draft</option>
            <option value="pending" data-count="{{ $pages_pending_count }}">Pending</option>
            <option value="trashed" data-count="{{ $pages_deleted_count }}">Trash</option>
          </optgroup>
        </select>
        <svg class="icon icon--xxxs margin-left-xxs" viewBox="0 0 8 8"><path d="M7.934,1.251A.5.5,0,0,0,7.5,1H.5a.5.5,0,0,0-.432.752l3.5,6a.5.5,0,0,0,.864,0l3.5-6A.5.5,0,0,0,7.934,1.251Z"/></svg>
      </div>
    </div>
  </div>

  <!-- Menu Bar -->
  <div class="flex flex-wrap items-center justify-between margin-right-xxs">
    <div class="flex flex-wrap">
      <li class="menu-bar__item js-menu-bar" aria-controls="modal-add-page">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><title>pencil</title><g fill="#000000"><path d="M18.85 4.39l-3.32-3.32a0.83 0.83 0 0 0-1.18 0l-11.62 11.62a0.84 0.84 0 0 0-0.2 0.33l-1.66 4.98a0.83 0.83 0 0 0 0.79 1.09 0.84 0.84 0 0 0 0.26-0.04l4.98-1.66a0.84 0.84 0 0 0 0.33-0.2l11.62-11.62a0.83 0.83 0 0 0 0-1.18z m-6.54 1.08l1.17-1.18 2.15 2.15-1.18 1.17z" fill="#000000"></path></g></svg>
        <span class="menu-bar__label">Add Page</span>
      </li>

      <li class="menu-bar__item" aria-controls="modal-search">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><title>search</title><g stroke-width="2" fill="#000000"><path fill="none" stroke="#000000" stroke-linecap="square" stroke-miterlimit="10" d="M1.66 18.26l3.32-3.32"></path><path fill="none" stroke="#000000" stroke-linecap="square" stroke-miterlimit="10" d="M11.62 1.66a6.64 6.64 0 1 1 0 13.28 6.64 6.64 0 1 1 0-13.28z"></path><path d="M14.94 8.3a3.32 3.32 0 0 0-3.32-3.32" fill="none" stroke="#000000" stroke-miterlimit="10"></path></g></svg>
          <span class="menu-bar__label">Search Pages</span>
      </li>

      <li class="menu-bar__item padding-top-xxxs">
        <a href="{{ url('admin/pages/settings') }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><title>cogwheel</title><g fill="#000000"><path d="M19.3 8.35l-2.48-0.28a7.05 7.05 0 0 0-0.62-1.49l1.56-1.95a0.83 0.83 0 0 0-0.06-1.11l-1.19-1.18a0.83 0.83 0 0 0-1.11-0.06l-1.95 1.56a7.05 7.05 0 0 0-1.49-0.62l-0.27-2.48a0.83 0.83 0 0 0-0.83-0.74h-1.67a0.83 0.83 0 0 0-0.84 0.74l-0.27 2.48a7.05 7.05 0 0 0-1.49 0.62l-1.95-1.56a0.83 0.83 0 0 0-1.11 0.06l-1.19 1.19a0.83 0.83 0 0 0-0.06 1.11l1.56 1.95a7.05 7.05 0 0 0-0.62 1.49l-2.48 0.27a0.83 0.83 0 0 0-0.74 0.83v1.67a0.83 0.83 0 0 0 0.74 0.84l2.48 0.28a7.05 7.05 0 0 0 0.62 1.49l-1.56 1.94a0.83 0.83 0 0 0 0.06 1.11l1.19 1.19a0.83 0.83 0 0 0 1.11 0.06l1.95-1.56a7.05 7.05 0 0 0 1.49 0.62l0.27 2.48a0.83 0.83 0 0 0 0.84 0.74h1.67a0.83 0.83 0 0 0 0.83-0.74l0.28-2.48a7.05 7.05 0 0 0 1.49-0.62l1.95 1.56a0.83 0.83 0 0 0 1.11-0.06l1.18-1.19a0.83 0.83 0 0 0 0.06-1.11l-1.56-1.95a7.05 7.05 0 0 0 0.62-1.49l2.48-0.27a0.83 0.83 0 0 0 0.74-0.83v-1.67a0.83 0.83 0 0 0-0.74-0.84z m-9.28 5.01a3.34 3.34 0 1 1 3.34-3.34 3.34 3.34 0 0 1-3.34 3.34z" fill="#000000"></path></g></svg>
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
        @if(!request()->has('is_trashed'))
        <menu class="menu-bar is-hidden js-int-table-actions__items-selected js-menu-bar" id="btnDeleteMultiple">
          <li class="menu-bar__item menu-bar__item--trigger js-menu-bar__trigger" role="menuitem" aria-label="More options">
            <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 16 16">
              <circle cx="8" cy="7.5" r="1.5" />
              <circle cx="1.5" cy="7.5" r="1.5" />
              <circle cx="14.5" cy="7.5" r="1.5" /></svg>
          </li>
          <li class="menu-bar__item" role="menuitem">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><title>bin</title><g fill="#000000"><path d="M2.49 6.64v10.79a2.49 2.49 0 0 0 2.49 2.49h9.96a2.49 2.49 0 0 0 2.49-2.49v-10.79z m4.98 9.13h-1.66v-5.81h1.66z m3.32 0h-1.66v-5.81h1.66z m3.32 0h-1.66v-5.81h1.66z" fill="#000000"></path><path d="M19.09 3.32h-4.98v-2.49a0.83 0.83 0 0 0-0.83-0.83h-6.64a0.83 0.83 0 0 0-0.83 0.83v2.49h-4.98a0.83 0.83 0 0 0 0 1.66h18.26a0.83 0.83 0 0 0 0-1.66z m-11.62-1.66h4.98v1.66h-4.98z"></path></g></svg>
              <span class="menu-bar__label">Delete</span>
              <span class="counter counter--critical counter--docked"><span id="deleteBadge">1</span> <i class="sr-only">Notifications</i></span>
          </li>
        </menu>
        @endif
      </div>
    </div>
  </div>
</div>
