<div id="select-component-modal" class="modal modal--animate-scale flex flex-center bg-black bg-opacity-90% padding-md js-modal">
  <div class="modal__content width-100% max-width-sm max-height-100% overflow-auto bg radius-md inner-glow shadow-md" role="alertdialog" aria-labelledby="modal-title-1" aria-describedby="modal-description-1">

      <button class="reset modal__close-btn modal__close-btn--inner hide@md js-modal__close js-tab-focus">
        <svg class="icon icon--xs" viewBox="0 0 16 16">
          <title>Close modal window</title>
          <g stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
            <line x1="13.5" y1="2.5" x2="2.5" y2="13.5"></line>
            <line x1="2.5" y1="2.5" x2="13.5" y2="13.5"></line>
          </g>
        </svg>
      </button>


    <div class="padding-y-sm padding-x-md">
      <div class="text-component">

 <!-- Content -->
 <table class="table table--expanded@xs position-relative z-index-1 width-100% text-unit-em text-sm js-table" aria-label="Table Example">
  <thead class="table__header">
    <tr class="table__row">
      <th class="table__cell text-left" scope="col">Name</th>
      <th class="table__cell text-left" scope="col">Category</th>
      <th class="table__cell text-right" scope="col">Short Code</th>
    </tr>
  </thead>
  
  <tbody class="table__body">
    @foreach($components as $index => $component)
      <tr class="table__row" onclick="selectComponent({{ $index }})">
        <td class="table__cell" role="cell">
          <span class="table__label" aria-hidden="true">Name:</span> {{ $component['name'] }}
        </td>

        <td class="table__cell" role="cell">
          <span class="table__label" aria-hidden="true">Category:</span> {{ $component['category'] }}
        </td>

        <td class="table__cell text-right" role="cell">
          <span class="table__label" aria-hidden="true">Short Code:</span> <button class="btn btn--primary" onclick="copyShortCode( {{ $index }} )">Copy</button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
 <!-- End -->

      </div>
    </div>

  </div>

  <button class="reset modal__close-btn modal__close-btn--outer display@md js-modal__close js-tab-focus">
    <svg class="icon icon--sm" viewBox="0 0 24 24">
      <title>Close modal window</title>
      <g fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="3" y1="3" x2="21" y2="21" />
        <line x1="21" y1="3" x2="3" y2="21" />
      </g>
    </svg>
  </button>
</div>