<!-- 👇 Full Screen Modal -->
<form action="#" id="formRejectPost">
  @csrf
  <input type="hidden" id="postId" value="">
  <div class="custom-modal modal modal--animate-translate-down flex flex-center bg-contrast-higher bg-opacity-90% padding-md js-modal custom-modal-hide-body-scroll custom-disable-modal-close" id="modal-reject-post">
    <div class="modal__content width-100% max-width-sm bg radius-md shadow-md flex flex-column">
        <header class="bg-contrast-lower padding-y-sm padding-x-md flex items-center justify-between">
          <button type="button" class="btn btn--subtle btn-full-screen" title="Expand to full screen">
            Full Screen
          </button>
          <button type="button" class="reset modal__close-btn modal__close-btn--inner js-modal__close js-tab-focus" id="closeRejectModal">
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
          <div>
            <div class="grid gap-sm">
              <input type="text" class="form-control width-100%" name="rejectMsg" id="rejectMsg" placeholder="Fill the reject reason"/>
            </div>
          </div>
        </div><!-- /.padding-y-sm padding-x-md flex-grow overflow-auto -->

        <footer class="padding-y-sm padding-x-md bg shadow-md flex-shrink-0">
          <div class="flex justify-end gap-xs">
            <button type="button" class="btn btn--subtle js-modal__close" data-toggle="close-modal" data-target-close="#closeRejectModal">Cancel</button>
            <a href="#" type="button" class="btn btn--primary" id="btnReject">Reject</a>
          </div>
        </footer>
    </div><!-- /.modal__content -->

  </div><!-- /.modal -->
<!-- Full Screen Modal End -->
</form>
