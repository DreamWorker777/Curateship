@if (session('responseMessage'))
<div class="alert alert--is-visible js-alert margin-bottom-lg" role="alert">
  <div class="flex items-center justify-between">
    <div class="flex items-center">
      <svg aria-hidden="true" class="icon margin-right-xxxs" viewBox="0 0 32 32" ><title>info icon</title><g><path d="M16,0C7.178,0,0,7.178,0,16s7.178,16,16,16s16-7.178,16-16S24.822,0,16,0z M18,7c1.105,0,2,0.895,2,2 s-0.895,2-2,2s-2-0.895-2-2S16.895,7,18,7z M19.763,24.046C17.944,24.762,17.413,25,16.245,25c-0.954,0-1.696-0.233-2.225-0.698 c-1.045-0.92-0.869-2.248-0.542-3.608l0.984-3.483c0.19-0.717,0.575-2.182,0.036-2.696c-0.539-0.514-1.794-0.189-2.524,0.083 l0.263-1.073c1.054-0.429,2.386-0.954,3.523-0.954c1.71,0,2.961,0.855,2.961,2.469c0,0.151-0.018,0.417-0.053,0.799 c-0.066,0.701-0.086,0.655-1.178,4.521c-0.122,0.425-0.311,1.328-0.311,1.765c0,1.683,1.957,1.267,2.847,0.847L19.763,24.046z"></path></g></svg>
        <p>
          {!! session()->get('responseMessage')!!}
       </p>
    </div>

    <button class="reset alert__close-btn js-alert__close-btn">
      <svg class="icon" viewBox="0 0 24 24"><title>Close alert</title><g stroke-linecap="square" stroke-linejoin="miter" stroke-width="3" stroke="currentColor" fill="none" stroke-miterlimit="10"><line x1="19" y1="5" x2="5" y2="19"></line><line fill="none" x1="19" y1="19" x2="5" y2="5"></line></g></svg>
    </button>
  </div>
</div>
@endif

@if($status == 'trashed')
  <div class="margin-bottom-md">
    <a href="{{ route('tag.empty-trash') }}" class="btn btn--subtle">Empty trash</a>
  </div>
@endif

<template id="selected-id-template">
  <input type="hidden" name="selectedIDs[]" value="@{{value}}">
</template><!-- /#selected-id-template -->
<form
  action="
    {{
      ($status == 'trashed') ? route('tag.bulk-delete') : route('tag.bulk-trash')
    }}
  "
  method="POST" id="form-bulk-delete"> @csrf
  <div class="bulk-selected-ids"></div><!-- /.bulk-selected-ids -->
</form>

<div id="table-1" class="int-table text-sm plain-table @if($tags->count() > 0) js-int-table @endif">
    <div class="int-table__inner">
      <table class="int-table__table" aria-label="Interactive table example">
        @if($tags->count() > 0)
        <thead class="int-table__header js-int-table__header">
          <tr class="int-table__row">
            <td class="int-table__cell">
              <div class="custom-checkbox int-table__checkbox">
                <input class="custom-checkbox__input js-int-table__select-all" type="checkbox" aria-label="Select all rows" />
                <div class="custom-checkbox__control" aria-hidden="true"></div>
              </div>
            </td>
            <th class="int-table__cell int-table__cell--th text-center">Image</th>
            <th class="int-table__cell int-table__cell--th int-table__cell--sort  js-int-table__cell--sort @if($sort == 'name') int-table__cell--{{$order}} @endif" data-sort="name">
              <div class="flex items-center">
                <span>Tag name</span>

                <svg class="icon icon--xxs margin-left-xxxs int-table__sort-icon" aria-hidden="true" viewBox="0 0 12 12"><polygon class="arrow-up" points="6 0 10 5 2 5 6 0"/><polygon class="arrow-down" points="6 12 2 7 10 7 6 12"/></svg>
              </div>

              <ul class="sr-only js-int-table__sort-list">
                <li>
                  <input type="radio" name="sortingName" id="sortingNameNone" value="none">
                  <label for="sortingNameNone">No sorting</label>
                </li>

                <li>
                  <input type="radio" name="sortingName" id="sortingNameAsc" value="asc"
                    @if($sort == "name" && $order == 'asc')
                      checked
                    @endif
                  >
                  <label for="sortingNameAsc">Sort in ascending order</label>
                </li>

                <li>
                  <input type="radio" name="sortingName" id="sortingNameDes" value="desc"
                    @if($sort == "name" && $order == 'desc')
                      checked
                    @endif
                  >
                  <label for="sortingNameDes">Sort in descending order</label>
                </li>
              </ul>
            </th>

            <th class="int-table__cell int-table__cell--th int-table__cell--sort  js-int-table__cell--sort @if($sort == 'tag_count') int-table__cell--{{$order}} @endif" data-sort="tag_count">
              <div class="flex items-center">
                <span>Tag count</span>

                <svg class="icon icon--xxs margin-left-xxxs int-table__sort-icon" aria-hidden="true" viewBox="0 0 12 12"><polygon class="arrow-up" points="6 0 10 5 2 5 6 0"/><polygon class="arrow-down" points="6 12 2 7 10 7 6 12"/></svg>
              </div>

              <ul class="sr-only js-int-table__sort-list">
                <li>
                  <input type="radio" name="sortingTagCount" id="sortingTagCountNone" value="none">
                  <label for="sortingTagCountNone">No sorting</label>
                </li>

                <li>
                  <input type="radio" name="sortingTagCount" id="sortingTagCountAsc" value="asc"
                    @if($sort == "name" && $order == 'asc')
                      checked
                    @endif
                  >
                  <label for="sortingTagCountAsc">Sort in ascending order</label>
                </li>

                <li>
                  <input type="radio" name="sortingTagCount" id="sortingTagCountDes" value="desc"
                    @if($sort == "name" && $order == 'desc')
                      checked
                    @endif
                  >
                  <label for="sortingTagCountDes">Sort in descending order</label>
                </li>
              </ul>
            </th>

            <th class="int-table__cell int-table__cell--th int-table__cell--sort  js-int-table__cell--sort @if($sort == 'category_name') int-table__cell--{{$order}} @endif" data-sort="category_name">
              <div class="flex items-center">
                <span>Category</span>

                <svg class="icon icon--xxs margin-left-xxxs int-table__sort-icon" aria-hidden="true" viewBox="0 0 12 12"><polygon class="arrow-up" points="6 0 10 5 2 5 6 0"/><polygon class="arrow-down" points="6 12 2 7 10 7 6 12"/></svg>
              </div>

              <ul class="sr-only js-int-table__sort-list">
                <li>
                  <input type="radio" name="sortingCategoryName" id="sortingCategoryNameNone" value="none">
                  <label for="sortingCategoryNameNone">No sorting</label>
                </li>

                <li>
                  <input type="radio" name="sortingCategoryName" id="sortingCategoryNameAsc" value="asc"
                    @if($sort == "name" && $order == 'asc')
                      checked
                    @endif
                  >
                  <label for="sortingCategoryNameAsc">Sort in ascending order</label>
                </li>

                <li>
                  <input type="radio" name="sortingCategoryName" id="sortingCategoryNameDes" value="desc"
                    @if($sort == "name" && $order == 'desc')
                      checked
                    @endif
                  >
                  <label for="sortingCategoryNameDes">Sort in descending order</label>
                </li>
              </ul>
            </th>

            <th class="int-table__cell int-table__cell--th text-left">Action</th>
          </tr>
        </thead>
        @endif

        <tbody class="int-table__body js-int-table__body">
        @foreach($tags as $key => $tag)
          <tr class="int-table__row">
            <th class="int-table__cell" scope="row">
              <div class="custom-checkbox int-table__checkbox">
                <input class="custom-checkbox__input js-int-table__select-row" type="checkbox" value="{{ $tag->id }}" aria-label="Select this row" />
                <div class="custom-checkbox__control" aria-hidden="true"></div>
              </div>
            </th>
            <td class="int-table__cell text-center">
              @if($tag->getThumbnail('medium') != false)
                <a href="
                    {{
                      route(
                        'pages.tags',
                        [
                          'tag'   => $tag->name
                        ]
                      )
                    }}
                " target="_blank" class="post-table-image-wrapper post-table-image bg-black bg-opacity-50%">
                  <img src="{{ $tag->showThumbnail('medium') }}" alt="Image of {{ $tag->name }}, "/>
                </a>
              @else
                <a href="
                    {{
                      route(
                        'pages.tags',
                        [
                          'tag'   => $tag->name
                        ]
                      )
                    }}
                  " target="_blank" class="post-table-image-wrapper post-table-image bg-black bg-opacity-50%"></a>
              @endif
            </td>
            <td class="int-table__cell">
              <a href="{{ route('tag.edit', [$tag->id]) }}" data-url="{{ route('tag.edit', [$tag->id]) }}" data-method="get" aria-controls="modal-edit-tag" class="site-load-modal-edit-form item-edit-link">{{ $tag->name }}</a>
            </td>
            <td class="int-table__cell">
              {{ $tag->getPostCount() }}
            </td>
            <td class="int-table__cell">{{ $tag->category_name }}</td>
            <td class="int-table__cell text-left" style="overflow: unset;">

              <menu class="menu-bar menu-bar--expanded@md js-menu-bar" style="opacity: 1;">
                <li class="menu-bar__item menu-bar__item--trigger js-menu-bar__trigger align-left" role="menuitem" aria-label="More options">
                  <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 16 16">
                    <circle cx="8" cy="7.5" r="1.5" />
                    <circle cx="1.5" cy="7.5" r="1.5" />
                    <circle cx="14.5" cy="7.5" r="1.5" /></svg>
                </li>

                <li> <!--  -->
                  <a
                    href="
                      {{
                        ($tag->status == 'published') ?
                          route('tag.draft', [$tag->id]) :
                          route('tag.publish', [$tag->id])
                      }}
                    "
                    role="menuitem" class="menu-bar__item">
                    <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 12 12">
                      <path d="M10.121.293a1,1,0,0,0-1.414,0L1,8,0,12l4-1,7.707-7.707a1,1,0,0,0,0-1.414Z"></path>
                    </svg>
                    <span class="menu-bar__label">
                      {{
                        ($tag->status == 'published') ? 'Move to Drafts' : 'Publish'
                      }}
                    </span>
                  </a>
                </li>

                <li>
                  <a
                    href="
                      {{
                        ($status == 'trashed') ? route('tag.delete', ['id' => $tag->id])
                                      : route('tag.trash', ['id' => $tag->id])
                      }}
                    "
                    class="menu-bar__item menu-bar__item--hide" role="menuitem"
                  >
                    <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 16 16">
                      <path d="M2,6v8c0,1.1,0.9,2,2,2h8c1.1,0,2-0.9,2-2V6H2z"></path>
                      <path d="M12,3V1c0-0.6-0.4-1-1-1H5C4.4,0,4,0.4,4,1v2H0v2h16V3H12z M10,3H6V2h4V3z"></path>
                    </svg>
                    <span class="menu-bar__label">
                      {{
                        ($status == 'trashed') ? 'Delete' : 'Move to Trash'
                      }}
                    </span>
                  </a>
                </li>

              </menu>

            </td>
          </tr>
        @endforeach
        </tbody>

      </table>
    </div><!-- /.int-table__inner -->
  </div><!-- /.int-table text-sm js-int-table -->

  <div class="flex items-center justify-between padding-top-sm">
    <p class="text-sm">
      {{ $tags->count() }}
      {{ ($tags->count() < 2) ? 'result' : 'results' }}
    </p>

    @if($tags->count() > 0)
    <nav class="pagination text-sm" aria-label="Pagination"  id="table-pagination-bottom">
      <ul class="pagination__list flex flex-wrap gap-xxxs">
        <li>
          <a
            href="{{ $tags->withQueryString()->previousPageUrl() }}"
            class="pagination__item
              {{ ($tags->currentPage() == 1) ? 'pagination__item--disabled' : '' }}
            "
          >
            <svg class="icon" viewBox="0 0 16 16">
              <title>Go to previous page</title>
              <g stroke-width="1.5" stroke="currentColor">
                <polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="9.5,3.5 5,8 9.5,12.5 "></polyline>
              </g>
            </svg>
          </a>
        </li>


        <li>
          <span class="pagination__jumper flex items-center">
            <form action="{{ url()->full() }}" class="inline" method="get">
              @if($request->has('status'))
                <input type="hidden" name="status" value="{{ $status }}">
              @endif

              @if($request->has('tag_category_id'))
                <input type="hidden" name="tag_category_id" value="{{ $tag_category_id }}">
              @endif

              <input aria-label="Page number" class="form-control" type="number" name="page" min="1" max="{{ $tags->lastPage() }}" value="{{ $tags->currentPage() }}">
            </form>
            <em>of {{ $tags->lastPage() }}</em>
          </span>
        </li>


        <li>
          <a
            href="{{ $tags->withQueryString()->nextPageUrl() }}"
            class="pagination__item
              {{ !$tags->hasMorePages() ? 'pagination__item--disabled' : '' }}
            "
          >
            <svg class="icon" viewBox="0 0 16 16">
              <title>Go to next page</title>
              <g stroke-width="1.5" stroke="currentColor">
                <polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="6.5,3.5 11,8 6.5,12.5 "></polyline>
              </g>
            </svg>
          </a>
        </li>
      </ul>
    </nav>
    @endif
  </div><!-- /.flex items-center justify-between padding-top-sm -->

<!-- Re-initialized utl and menu component if the request is ajax -->
@if(Request::ajax())
  <!-- <script src="{{ asset('assets/js/util.js') }}"></script> -->
  <!-- <script src="{{ asset('assets/js/components/_1_menu.js') }}"></script> -->
  <script src="{{ asset('assets/js/components/_2_interactive-table.js') }}"></script>
  <!-- <script src="{{ asset('assets/js/components/_1_modal-window.js') }}"></script> -->
  <script>
    (function() {
      // event that watches interactive table checkboxes
      $(document).on('change', '.int-table__table .custom-checkbox__input', function(){
        var checkedCheckboxes = $('.custom-checkbox__input:checked').length;
        if (checkedCheckboxes > 0) {
          // show menu-bar
          $('.menu-bar.js-int-table-actions__items-selected').removeClass('is-hidden');
          $('.menu-bar.js-int-table-actions__no-items-selected').addClass('is-hidden');
          return;
        }

        // hide menu-bar
        $('.menu-bar.js-int-table-actions__items-selected').addClass('is-hidden');
        $('.menu-bar.js-int-table-actions__no-items-selected').removeClass('is-hidden');
      });
    })();
  </script>
@endif