<div class="controlbar--sticky flex justify-between">
  <div class="margin-xs">
    <div class="inline-flex items-baseline">
      <h1 class="text-md color-contrast-high margin-x-xs" for="filterItems">Edit Component</h1>
    </div>
  </div>

  <div class="flex flex-column items-start">
  <label class="form-label margin-bottom-xxxs" for="select-this"></label>
</div>

  <!-- Menu Bar -->
  <div class="flex flex-wrap items-center justify-between margin-right-xxs">
    <div class="flex flex-wrap">
    <div class="flex flex-wrap">

    <button class="btn btn--primary margin-xs text-sm margin-right-lg" aria-controls="select-component-modal">
    <svg class="icon margin-right-xxxs" viewBox="0 0 16 16" aria-hidden="true"><path d="M8,0a8,8,0,1,0,8,8A8,8,0,0,0,8,0Zm2.629,11.618L8,10.236,5.371,11.618l.5-2.927L3.747,6.618l2.939-.427L8,3.528,9.314,6.191l2.939.427L10.127,8.691Z"></path></svg>
    <span>Select Component</span>
   </button>

      <li class="menu-bar__item" aria-controls="edit-modal" onclick="setComponentName()">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g fill="#9b9b9b"><path d="M17.32 11.17a6.9 6.9 0 0 0 0-2.42l1.75-1.68a0.83 0.83 0 0 0 0.14-1.01l-1.25-2.16a0.84 0.84 0 0 0-0.95-0.38l-2.32 0.66a7.48 7.48 0 0 0-2.1-1.2l-0.58-2.35a0.83 0.83 0 0 0-0.8-0.63h-2.49a0.83 0.83 0 0 0-0.81 0.63l-0.59 2.35a7.49 7.49 0 0 0-2.09 1.2l-2.32-0.66a0.84 0.84 0 0 0-0.95 0.38l-1.25 2.16a0.83 0.83 0 0 0 0.14 1.01l1.75 1.68a7.62 7.62 0 0 0-0.11 1.21 7.53 7.53 0 0 0 0.11 1.21l-1.75 1.68a0.83 0.83 0 0 0-0.14 1.01l1.25 2.16a0.83 0.83 0 0 0 0.72 0.41 0.85 0.85 0 0 0 0.22-0.03l2.33-0.66a7.49 7.49 0 0 0 2.1 1.2l0.58 2.35a0.83 0.83 0 0 0 0.81 0.63h2.49a0.83 0.83 0 0 0 0.8-0.63l0.59-2.35a7.49 7.49 0 0 0 2.09-1.2l2.33 0.66a0.85 0.85 0 0 0 0.22 0.03 0.83 0.83 0 0 0 0.72-0.41l1.25-2.16a0.83 0.83 0 0 0-0.14-1.01z m-6.53 0.3v1.81h-1.66v-1.81a2.49 2.49 0 1 1 1.66 0z" fill="#9b9b9b"></path></g></svg>
        <span class="menu-bar__label">Settings</span>
      </li>

      <li class="menu-bar__item" aria-controls="preview-modal" onclick="previewComponent()">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g stroke-width="2" fill="#9b9b9b"><path fill="none" stroke="#9b9b9b" stroke-linecap="square" stroke-miterlimit="10" stroke-linejoin="miter" d="M10.08 1.89a8.19 8.19 0 1 0 0 16.38 8.19 8.19 0 1 0 0-16.38z"></path><path fill="none" stroke="#9b9b9b" stroke-linecap="square" stroke-miterlimit="10" stroke-linejoin="miter" d="M10.08 0.63v3.15"></path><path fill="none" stroke="#9b9b9b" stroke-linecap="square" stroke-miterlimit="10" stroke-linejoin="miter" d="M19.53 10.08h-3.15"></path><path fill="none" stroke="#9b9b9b" stroke-linecap="square" stroke-miterlimit="10" stroke-linejoin="miter" d="M10.08 19.53v-3.15"></path><path fill="none" stroke="#9b9b9b" stroke-linecap="square" stroke-miterlimit="10" stroke-linejoin="miter" d="M0.63 10.08h3.15"></path><path fill="none" stroke="#9b9b9b" stroke-linecap="square" stroke-miterlimit="10" stroke-linejoin="miter" d="M10.08 8.19a1.89 1.89 0 1 0 0 3.78 1.89 1.89 0 1 0 0-3.78z"></path></g></svg>
        <span class="menu-bar__label">Preview</span>
      </li>

      <li class="menu-bar__item" aria-controls="modal-search" onclick="deleteComponent()">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g fill="#9b9b9b"><path d="M18.48 2.94h-5.16l-0.74-2.23a0.42 0.42 0 0 0-0.4-0.29h-4.2a0.42 0.42 0 0 0-0.4 0.29l-0.74 2.23h-5.16a0.42 0.42 0 0 0-0.42 0.42v1.26a0.42 0.42 0 0 0 0.42 0.42h16.8a0.42 0.42 0 0 0 0.42-0.42v-1.26a0.42 0.42 0 0 0-0.42-0.42z"></path><path d="M16.8 5.88h-13.44v11.76a2.1 2.1 0 0 0 2.1 2.1h9.24a2.1 2.1 0 0 0 2.1-2.1z m-9.66 10.08a0.42 0.42 0 0 1-0.84 0v-6.3a0.42 0.42 0 0 1 0.84 0z m3.36 0a0.42 0.42 0 0 1-0.84 0v-6.3a0.42 0.42 0 0 1 0.84 0z m3.36 0a0.42 0.42 0 0 1-0.84 0v-6.3a0.42 0.42 0 0 1 0.84 0z" fill="#9b9b9b"></path></g></svg>
        <span class="menu-bar__label">Delete</span>
      </li>

      <li class="menu-bar__item js-menu-bar margin-left-lg" aria-controls="create-modal">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g><path fill="#223E49" d="M3.44 18.56l-0.5-1.34-1.34-0.5-0.46 2.3z"></path><path fill="#EAD8C5" d="M6.09 18.03l-1.05-3.03-2.91-0.93-0.53 2.65 1.84 1.84z"></path><path fill="#335262" d="M14.53 1.68l-2.23 2.22 1.56 2.4 2.4 1.56 2.22-2.23a0.84 0.84 0 0 0 0-1.18l-2.77-2.77a0.84 0.84 0 0 0-1.18 0z"></path><path fill="#E86C60" d="M2.13 14.07l10.17-10.17 2.4 2.4-10.17 10.17z"></path><path fill="#DD5E58" d="M4.11 16.05l10.17-10.17 1.98 1.98-10.17 10.17z"></path><path fill="#E6E6E6" d="M12.01 4.2l0.59-0.59 3.95 3.95-0.59 0.59z"></path></g></svg>
        <span class="menu-bar__label">Create Component</span>
      </li>

    </div>
  </div> <!-- end of <div class="flex flex-wrap items-center justify-between margin-right-xxs"> -->
</div>