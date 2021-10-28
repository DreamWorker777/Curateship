<!-- Delete Screen Modal -->
<div class="modal modal--animate-scale flex flex-center bg-contrast-higher bg-opacity-90% padding-md js-modal" id="modal-name-1">
    <div class="modal__content width-100% max-width-xs bg radius-md shadow-md" role="alertdialog" aria-labelledby="modal-title-1" aria-describedby="modal-description-1">
      <header class="bg-contrast-lower padding-y-sm padding-x-md flex items-center justify-between">
        <h4 class="text-truncate" id="modal-title-1">Modal title</h4>
  
        <button class="reset modal__close-btn modal__close-btn--inner hide@md js-modal__close js-tab-focus">
          <svg class="icon" viewBox="0 0 20 20">
            <title>Close modal window</title>
            <g fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2">
              <line x1="3" y1="3" x2="17" y2="17" />
              <line x1="17" y1="3" x2="3" y2="17" />
            </g>
          </svg>
        </button>
      </header>
  
      <div class="padding-y-sm padding-x-md">
        <div class="text-component">
          <p id="modal-description-1">Are you sure to want to delete *Article title*?</p>
        </div>
      </div>
  
      <footer class="padding-md">
        <div class="flex justify-end gap-xs">
          <button class="btn btn--subtle js-modal__close">Cancel</button>
          <button class="btn btn--primary">Delete</button>
        </div>
      </footer>
    </div>
  
    <button class="reset modal__close-btn modal__close-btn--outer display@md js-modal__close js-tab-focus">
      <svg class="icon icon--sm" viewBox="0 0 24 24">
        <title>Close modal window</title>
        <g fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2">
          <line x1="3" y1="3" x2="21" y2="21" />
          <line x1="21" y1="3" x2="3" y2="21" />
        </g>
      </svg>
    </button>
  </div>
  <!-- Delete Screen End -->