<!-- 👇 Full Screen Modal -->
<div class="custom-modal modal modal--animate-translate-down flex flex-center bg-black bg-opacity-80% padding-md js-modal custom-modal-hide-body-scroll" id="modal-setting">
  <div class="modal__content height-100% tabs js-tabs width-100% max-width-sm bg radius-md shadow-md flex flex-column">
      <header class="bg-contrast-lower padding-y-sm padding-x-md flex items-center justify-between">
        
        <!-- 👇 Tabs -->
        <nav class="tabs">
          <ul class="flex flex-wrap gap-xl js-tabs__controls" aria-label="Tabs Interface">
            <li><a href="#tab1Panel1" class="tabs__control" aria-selected="true">Edit Setting</a></li>
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

      <!--Tab1 Content-->
      <div class="padding-y-sm padding-x-md flex-grow overflow-auto">
        <div class="js-tabs__panels">
          <section id="tab1Panel1" class="padding-top-md js-tabs__panel">
            <div>

              <div class="grid gap-sm">
                <label class="form-label margin-bottom-xxs" for="input-name">Enter Your Tag</label>
                <input class="form-control width-100%" type="text" name="input-name" id="input-name" required>
              <div>

                <label class="form-label margin-bottom-xxxs" for="selectThis">Select Tag category</label>
                <div class="select">
                  <select class="select__input form-control" name="selectThis" id="selectThis">
                      <option value="0">Select</option>
                      <option value="1">Origins</option>
                      <option value="1">Artists</option>
                      <option value="2">Characters</option>
                      <option value="2">Tags</option>
                      <option value="2">MISC</option>
                  </select>
                  <svg class="icon select__icon" aria-hidden="true" viewBox="0 0 16 16"><g stroke-width="1" stroke="currentColor"><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="15.5,4.5 8,12 0.5,4.5 "></polyline></g></svg>
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
          <button type="submit" class="btn btn--primary">Publish</button>
        </div>
      </footer>
    </form>
  </div><!-- /.modal__content -->
<!-- Full Screen Modal End -->
</div><!-- /.modal -->