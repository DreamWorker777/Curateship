<div class="flex justify-between controlbar--sticky">
    <div class="margin-xs">
      <div class="inline-flex items-baseline">
        <h1 class="text-md color-contrast-high padding-y-xxxxs margin-x-xs" for="filterItems">Users:</h1>
          <div class="select inline-block js-select" data-trigger-class="reset text-sm color-contrast-high h1 inline-flex items-center cursor-pointer js-tab-focus">
            <select name="filterItems" id="filterItems">
              <optgroup data-type="status" label="Status">
                <option value="" data-count="{{ $users_active_count }}" selected>All Users</option>
                <option value="suspended" data-count="{{ $users_suspended_count }}" >Suspended</option>
                <option value="deleted" data-count="{{ $users_deleted_count }}" >Deleted</option>
              </optgroup>
              <optgroup data-type="role" label="Role">
                <option value="admin" data-count="{{ $adminUsersCount }}">Admin</option>
                <option value="editor" data-count="{{ $editorUsersCount }}">Editor</option>
                <option value="registered" data-count="{{ $registeredUsersCount }}" >Registered</option>
              </optgroup>
            </select>
        <svg class="icon icon--xxxs margin-left-xxs" viewBox="0 0 8 8"><path d="M7.934,1.251A.5.5,0,0,0,7.5,1H.5a.5.5,0,0,0-.432.752l3.5,6a.5.5,0,0,0,.864,0l3.5-6A.5.5,0,0,0,7.934,1.251Z"/></svg>
      </div>
    </div>
</div>

<!-- Menu Bar -->
<div class="flex flex-wrap items-center justify-between"><div>

  <ul class="flex flex-wrap padding-right-xs">
    <li class="menu-bar__item js-menu-bar modal-trigger-add-user" aria-controls="modal-add-user" role="menuitem" data-href="{{ url('admin/users/add') }}">
    <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 20 20">
        <path d="M18.85 4.39l-3.32-3.32a0.83 0.83 0 0 0-1.18 0l-11.62 11.62a0.84 0.84 0 0 0-0.2 0.33l-1.66 4.98a0.83 0.83 0 0 0 0.79 1.09 0.84 0.84 0 0 0 0.26-0.04l4.98-1.66a0.84 0.84 0 0 0 0.33-0.2l11.62-11.62a0.83 0.83 0 0 0 0-1.18z m-6.54 1.08l1.17-1.18 2.15 2.15-1.18 1.17z"></path>
      </svg>
        <span class="menu-bar__label">Add User</span>
    </li>

    <li class="menu-bar__item" aria-controls="modal-search">
    <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 20 20">
      <path d="M11.25 17.5c4.83 0 8.75-3.93 8.75-8.75s-3.93-8.75-8.75-8.75-8.75 3.93-8.75 8.75 3.93 8.75 8.75 8.75z m0-15c3.45 0 6.25 2.8 6.25 6.25s-2.8 6.25-6.25 6.25-6.25-2.8-6.25-6.25 2.8-6.25 6.25-6.25z"></path><path d="M0.36 17.86l3-2.99a10.02 10.02 0 0 0 1.76 1.77l-2.98 3a1.25 1.25 0 0 1-1.78 0 1.25 1.25 0 0 1 0-1.78z"></path>
      </svg>
        <span class="menu-bar__label">Search Users</span>
    </li>

    <li class="int-table-actions" data-table-controls="table-1">
      <ul class="menu-bar js-int-table-actions__no-items-selected js-menu-bar">
        <li class="menu-bar__item menu-bar__item--trigger js-menu-bar__trigger" role="menuitem" aria-label="More options">
          <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 16 16">
            <circle cx="8" cy="7.5" r="1.5" />
            <circle cx="1.5" cy="7.5" r="1.5" />
            <circle cx="14.5" cy="7.5" r="1.5" />
          </svg>
        </li>
      </ul>
      
      <ul class="menu-bar is-hidden js-int-table-actions__items-selected js-menu-bar">
        <li class="menu-bar__item menu-bar__item--trigger js-menu-bar__trigger" role="menuitem" aria-label="More options">
          <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 16 16">
            <circle cx="8" cy="7.5" r="1.5" />
            <circle cx="1.5" cy="7.5" r="1.5" />
            <circle cx="14.5" cy="7.5" r="1.5" />
          </svg>
        </li>

        <li class="menu-bar__item" role="menuitem" data-control-form="#form-bulk-delete">
        <svg class="icon menu-bar__icon" viewBox="0 0 20 20">
            <path d="M2.49 6.64v10.79a2.49 2.49 0 0 0 2.49 2.49h9.96a2.49 2.49 0 0 0 2.49-2.49v-10.79z m4.98 9.13h-1.66v-5.81h1.66z m3.32 0h-1.66v-5.81h1.66z m3.32 0h-1.66v-5.81h1.66z"></path><path d="M19.09 3.32h-4.98v-2.49a0.83 0.83 0 0 0-0.83-0.83h-6.64a0.83 0.83 0 0 0-0.83 0.83v2.49h-4.98a0.83 0.83 0 0 0 0 1.66h18.26a0.83 0.83 0 0 0 0-1.66z m-11.62-1.66h4.98v1.66h-4.98z"></path></svg>
            <span class="menu-bar__label">Delete</span>
          <span class="counter counter--critical counter--docked"><span class="table-total-selected">0</span><i class="sr-only">Delete</i></span>
        </li>

        <li class="menu-bar__item" role="menuitem" data-control-form="#form-bulk-suspend">
        <svg class="icon menu-bar__icon" viewBox="0 0 20 20">
        <path d="M10 0c-5.5 0-10 4.5-10 10s4.5 10 10 10 10-4.5 10-10-4.5-10-10-10z m5 11.25h-10v-2.5h10v2.5z"></path>
        </svg>
          <span class="counter counter--critical counter--docked"><span class="table-total-selected">0</span><!-- /.table-total-selected --> <i
                  class="sr-only">Suspend</i></span>
          <span class="menu-bar__label">Suspend</span>
        </li>
      </ul>

</div>
</div><!-- /.flex flex-wrap gap-sm items-center justify-between -->
</div>