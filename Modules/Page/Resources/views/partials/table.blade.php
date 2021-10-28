@if($alert = session()->get('alert'))
    <div class="alert alert--is-visible js-alert margin-bottom-lg {{ $alert['class'] }}" role="alert">
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <svg aria-hidden="true" class="icon margin-right-xxxs" viewBox="0 0 32 32" ><title>info icon</title><g><path d="M16,0C7.178,0,0,7.178,0,16s7.178,16,16,16s16-7.178,16-16S24.822,0,16,0z M18,7c1.105,0,2,0.895,2,2 s-0.895,2-2,2s-2-0.895-2-2S16.895,7,18,7z M19.763,24.046C17.944,24.762,17.413,25,16.245,25c-0.954,0-1.696-0.233-2.225-0.698 c-1.045-0.92-0.869-2.248-0.542-3.608l0.984-3.483c0.19-0.717,0.575-2.182,0.036-2.696c-0.539-0.514-1.794-0.189-2.524,0.083 l0.263-1.073c1.054-0.429,2.386-0.954,3.523-0.954c1.71,0,2.961,0.855,2.961,2.469c0,0.151-0.018,0.417-0.053,0.799 c-0.066,0.701-0.086,0.655-1.178,4.521c-0.122,0.425-0.311,1.328-0.311,1.765c0,1.683,1.957,1.267,2.847,0.847L19.763,24.046z"></path></g></svg>
          <div>
            {!! $alert['message'] !!}
          </div>
        </div>

        <button class="reset alert__close-btn js-alert__close-btn">
          <svg class="icon" viewBox="0 0 24 24"><title>Close alert</title><g stroke-linecap="square" stroke-linejoin="miter" stroke-width="3" stroke="currentColor" fill="none" stroke-miterlimit="10"><line x1="19" y1="5" x2="5" y2="19"></line><line fill="none" x1="19" y1="19" x2="5" y2="5"></line></g></svg>
        </button>
      </div>
    </div><!-- /.alert -->
  @endif

  @if(request()->has('is_trashed'))
    <div class="margin-bottom-md">
      <form action="{{ route('admin.pages.trash.empty') }}" method="post">
        @csrf
        <span class="btn btn--subtle" id="emptyTrash">Empty trash</span>
      </form>
    </div>
  @endif

  <template id="selected-id-template">
    <input type="hidden" name="selectedIDs[]" value="@{{value}}">
  </template><!-- /#selected-id-template -->
  <form action="{{route('admin.pages.delete.multiple')}}"
    method="POST" id="form-bulk-delete"> @csrf
    <div class="bulk-selected-ids"></div><!-- /.bulk-selected-ids -->
  </form>

  <div id="table-1" class="int-table text-sm js-int-table">
    <div class="int-table__inner" id="site-table-container">
      <table class="int-table__table plain-table" aria-label="Interactive table example">
        <thead class="int-table__header js-int-table__header">
          <tr class="int-table__row">
            @if(!request()->has('is_trashed'))
              <td class="int-table__cell">
                <div class="custom-checkbox int-table__checkbox">
                  <input class="custom-checkbox__input js-int-table__select-all" id="checkboxDeleteAll" type="checkbox" aria-label="Select all rows">
                  <div class="custom-checkbox__control" aria-hidden="true"></div>
                </div>
              </td>
            @endif

            <th class="int-table__cell int-table__cell--th int-table__cell--sort js-int-table__cell--sort">
              <div class="flex items-center">
                <span>Page Title</span>

                <svg class="icon icon--xxs margin-left-xxxs int-table__sort-icon" aria-hidden="true" viewBox="0 0 12 12">
                  <polygon class="arrow-up" points="6 0 10 5 2 5 6 0" />
                  <polygon class="arrow-down" points="6 12 2 7 10 7 6 12" /></svg>
              </div>

              <ul class="sr-only js-int-table__sort-list">
                <li>
                  <input type="radio" name="sortingName" id="sortingNameNone" value="none" checked>
                  <label for="sortingNameNone">No sorting</label>
                </li>

                <li>
                  <input type="radio" name="sortingName" id="sortingNameAsc" value="asc">
                  <label for="sortingNameAsc">Sort in ascending order</label>
                </li>

                <li>
                  <input type="radio" name="sortingName" id="sortingNameDes" value="desc">
                  <label for="sortingNameDes">Sort in descending order</label>
                </li>
              </ul>
            </th>

            <th class="int-table__cell int-table__cell--th int-table__cell--sort js-int-table__cell--sort">
              <div class="flex items-center">
                <span>Username</span>

                <svg class="icon icon--xxs margin-left-xxxs int-table__sort-icon" aria-hidden="true" viewBox="0 0 12 12">
                  <polygon class="arrow-up" points="6 0 10 5 2 5 6 0" />
                  <polygon class="arrow-down" points="6 12 2 7 10 7 6 12" /></svg>
              </div>

              <ul class="sr-only js-int-table__sort-list">
                <li>
                  <input type="radio" name="sortingEmail" id="sortingEmailNone" value="none" checked>
                  <label for="sortingEmailNone">No sorting</label>
                </li>

                <li>
                  <input type="radio" name="sortingEmail" id="sortingEmailAsc" value="asc">
                  <label for="sortingEmailAsc">Sort in ascending order</label>
                </li>

                <li>
                  <input type="radio" name="sortingEmail" id="sortingEmailDes" value="desc">
                  <label for="sortingEmailDes">Sort in descending order</label>
                </li>
              </ul>
            </th>

            <th class="int-table__cell int-table__cell--th int-table__cell--sort js-int-table__cell--sort" data-date-format="dd-mm-yyyy">
              <div class="flex items-center">
                <span>Date</span>

                <svg class="icon icon--xxs margin-left-xxxs int-table__sort-icon" aria-hidden="true" viewBox="0 0 12 12">
                  <polygon class="arrow-up" points="6 0 10 5 2 5 6 0" />
                  <polygon class="arrow-down" points="6 12 2 7 10 7 6 12" /></svg>
              </div>

              <ul class="sr-only js-int-table__sort-list">
                <li>
                  <input type="radio" name="sortingDate" id="sortingDateNone" value="none" checked>
                  <label for="sortingDateNone">No sorting</label>
                </li>

                <li>
                  <input type="radio" name="sortingDate" id="sortingDateAsc" value="asc">
                  <label for="sortingDateAsc">Sort in ascending order</label>
                </li>

                <li>
                  <input type="radio" name="sortingDate" id="sortingDateDes" value="desc">
                  <label for="sortingDateDes">Sort in descending order</label>
                </li>
              </ul>
            </th>
            @if(!request()->has('is_trashed'))
              <th class="int-table__cell int-table__cell--th text-left">Action</th>
            @endif

            @if(!request()->has('is_trashed') && request()->has('is_draft'))
              <th class="int-table__cell int-table__cell--th text-left">Publish</th>
            @endif

            @if( !request()->has('is_trashed') && request()->has('is_pending'))
              <th class="int-table__cell int-table__cell--th text-left">Publish</th>
              <th class="int-table__cell int-table__cell--th text-left">Reject</th>
            @endif

            @if(request()->has('is_trashed'))
              <th class="int-table__cell int-table__cell--th text-left">Restore</th>
              <th class="int-table__cell int-table__cell--th text-left">Action</th>
            @endif

          </tr>
        </thead>

        <tbody class="int-table__body js-int-table__body">
          @foreach($pages as $page)
            <tr class="int-table__row">
              @if(!request()->has('is_trashed'))
                <th class="int-table__cell" scope="row">
                  <div class="custom-checkbox int-table__checkbox">
                    <input value="{{ $page->id }}" class="custom-checkbox__input js-int-table__select-row checkbox-delete" type="checkbox" aria-label="Select this row">
                    <div class="custom-checkbox__control" aria-hidden="true"></div>
                  </div>
                </th>
              @endif

              <td class="int-table__cell cursor-pointer" aria-controls="modal-edit-page" data-id="{{ $page->id }}">
                <a class="item-edit-link" href="#0">
                  {{ Str::limit($page->title) }}
                </a>
              </td>
              <td class="int-table__cell">{{ $page->username }}</td>
              <td class="int-table__cell">{{ $page->created_at->format('m/d/Y') }}</td>

              @if(!$page->is_deleted || ($page->is_published && !$page->is_deleted))
                <td class="int-table__cell text-center flex" style="overflow: unset;">
                  @if(!$page->is_deleted)
                    <form action="{{ route('admin.pages.delete') }}" method="post">
                      @csrf
                      <input type="hidden" name="page_id" value="{{ $page->id }}">
                      <li class="menu-bar__item btn-delete" role="menuitem" aria-controls="modal-name-1">
                        <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 16 16">
                          <path d="M2,6v8c0,1.1,0.9,2,2,2h8c1.1,0,2-0.9,2-2V6H2z"></path>
                          <path d="M12,3V1c0-0.6-0.4-1-1-1H5C4.4,0,4,0.4,4,1v2H0v2h16V3H12z M10,3H6V2h4V3z"></path>
                        </svg>
                        <span class="menu-bar__label">Delete</span>
                      </li>
                    </form>
                  @endif

                  @if($page->is_published && !$page->is_deleted)
                    <a href="{{ route('admin.pages.make-draft', ['id' => $page->id]) }}">
                      <li class="menu-bar__item menu-bar__item--hide" role="menuitem">
                        <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 12 12">
                          <path d="M10.121.293a1,1,0,0,0-1.414,0L1,8,0,12l4-1,7.707-7.707a1,1,0,0,0,0-1.414Z"></path>
                        </svg>
                        <span class="menu-bar__label">Draft</span>
                      </li>
                    </a>
                  @endif
                </td>
              @endif

              @if(!$page->is_published && !$page->is_deleted)
                <td>
                  <a href="{{ route('admin.pages.publish', ['id' => $page->id]) }}" class="btn">Publish</a>
                </td>
                @if( request()->has('is_pending') )
                <td aria-controls="modal-reject-page" data-id="{{ $page->id }}">
                  <a href="javascript:void(0)" class="btn">Reject</a>
                </td>
                @endif
              @elseif($page->is_deleted)
                <td class="int-table__cell" style="overflow: unset;">
                  <a href="{{ route('admin.pages.restore', ['id' => $page->id]) }}" class="btn margin-right-sm">Restore</a>
                </td>
                <td class="int-table__cell text-center" style="overflow: unset;">
                  <form action="{{ route('admin.pages.delete-permanently') }}" method="post">
                    @csrf
                    <input type="hidden" name="page_id" value="{{ $page->id }}">
                    <li class="menu-bar__item btn-delete" role="menuitem">
                      <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 16 16">
                        <path d="M2,6v8c0,1.1,0.9,2,2,2h8c1.1,0,2-0.9,2-2V6H2z"></path>
                        <path d="M12,3V1c0-0.6-0.4-1-1-1H5C4.4,0,4,0.4,4,1v2H0v2h16V3H12z M10,3H6V2h4V3z"></path>
                      </svg>
                      <span class="menu-bar__label">Delete</span>
                    </li>
                  </form>
                </td>
              @endif
            </tr>
          @endforeach
        </tbody>

      </table>
    </div><!-- /.int-table__inner -->
  </div><!-- /.int-table text-sm js-int-table -->

  <div class="flex items-center justify-between padding-top-sm">
    <p class="text-sm">
      {{ $pages->count() }}
      {{ ($pages->count() < 2) ? 'result' : 'results' }}
    </p>

    @if($pages->count() > 0)
    <nav class="pagination text-sm" aria-label="Pagination" id="table-pagination-bottom">
      <ul class="pagination__list flex flex-wrap gap-xxxs">
        <li>
          <a
            href="{{ $pages->withQueryString()->previousPageUrl() }}"
            class="pagination__item
              {{ ($pages->currentPage() == 1) ? 'pagination__item--disabled' : '' }}
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
              @if($request->has('is_trashed'))
                <input type="hidden" name="is_trashed" value="{{ $is_trashed }}">
              @endif

              @if($request->has('is_draft'))
                <input type="hidden" name="is_draft" value="{{ $is_draft }}">
              @endif

              @if($request->has('is_pending'))
                <input type="hidden" name="is_pending" value="{{ $is_pending }}">
              @endif
              <input aria-label="Page number" class="form-control" type="number" name="page" min="1" max="{{ $pages->lastPage() }}" value="{{ $pages->currentPage() }}">
            </form>
            <em>of {{ $pages->lastPage() }}</em>
          </span>
        </li>

        <li>
          <a
            href="{{ $pages->withQueryString()->nextPageUrl() }}"
            class="pagination__item
              {{ !$pages->hasMorePages() ? 'pagination__item--disabled' : '' }}
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
</div><!-- /.bg radius-md padding-md shadow-sm -->

@if ( request()->has('is_pending') )
<div class="bg radius-md padding-md margin-top-lg shadow-sm">
  <h4 class="margin-bottom-sm">Rejected</h4>
  <div id="table-2" class="int-table text-sm js-int-table">
    <div class="int-table__inner" id="site-table-container">
      <table class="int-table__table" aria-label="Interactive table example">
        <thead class="int-table__header js-int-table__header">
          <tr class="int-table__row">
            <td class="int-table__cell">
              <div class="custom-checkbox int-table__checkbox">
                <input class="custom-checkbox__input js-int-table__select-all" id="checkboxDeleteAll" type="checkbox" aria-label="Select all rows">
                <div class="custom-checkbox__control" aria-hidden="true"></div>
              </div>
            </td>

            <th class="int-table__cell int-table__cell--th int-table__cell--sort js-int-table__cell--sort">
              <div class="flex items-center">
                <span>Page Title</span>

                <svg class="icon icon--xxs margin-left-xxxs int-table__sort-icon" aria-hidden="true" viewBox="0 0 12 12">
                  <polygon class="arrow-up" points="6 0 10 5 2 5 6 0" />
                  <polygon class="arrow-down" points="6 12 2 7 10 7 6 12" /></svg>
              </div>

              <ul class="sr-only js-int-table__sort-list">
                <li>
                  <input type="radio" name="sortingName" id="sortingNameNone" value="none" checked>
                  <label for="sortingNameNone">No sorting</label>
                </li>

                <li>
                  <input type="radio" name="sortingName" id="sortingNameAsc" value="asc">
                  <label for="sortingNameAsc">Sort in ascending order</label>
                </li>

                <li>
                  <input type="radio" name="sortingName" id="sortingNameDes" value="desc">
                  <label for="sortingNameDes">Sort in descending order</label>
                </li>
              </ul>
            </th>

            <th class="int-table__cell int-table__cell--th int-table__cell--sort js-int-table__cell--sort">
              <div class="flex items-center">
                <span>Username</span>

                <svg class="icon icon--xxs margin-left-xxxs int-table__sort-icon" aria-hidden="true" viewBox="0 0 12 12">
                  <polygon class="arrow-up" points="6 0 10 5 2 5 6 0" />
                  <polygon class="arrow-down" points="6 12 2 7 10 7 6 12" /></svg>
              </div>

              <ul class="sr-only js-int-table__sort-list">
                <li>
                  <input type="radio" name="sortingEmail" id="sortingEmailNone" value="none" checked>
                  <label for="sortingEmailNone">No sorting</label>
                </li>

                <li>
                  <input type="radio" name="sortingEmail" id="sortingEmailAsc" value="asc">
                  <label for="sortingEmailAsc">Sort in ascending order</label>
                </li>

                <li>
                  <input type="radio" name="sortingEmail" id="sortingEmailDes" value="desc">
                  <label for="sortingEmailDes">Sort in descending order</label>
                </li>
              </ul>
            </th>

            <th class="int-table__cell int-table__cell--th int-table__cell--sort js-int-table__cell--sort">
              <div class="flex items-center">
                <span>Reason</span>

                <svg class="icon icon--xxs margin-left-xxxs int-table__sort-icon" aria-hidden="true" viewBox="0 0 12 12">
                  <polygon class="arrow-up" points="6 0 10 5 2 5 6 0" />
                  <polygon class="arrow-down" points="6 12 2 7 10 7 6 12" /></svg>
              </div>

              <ul class="sr-only js-int-table__sort-list">
                <li>
                  <input type="radio" name="sortingEmail" id="sortingEmailNone" value="none" checked>
                  <label for="sortingEmailNone">No sorting</label>
                </li>

                <li>
                  <input type="radio" name="sortingEmail" id="sortingEmailAsc" value="asc">
                  <label for="sortingEmailAsc">Sort in ascending order</label>
                </li>

                <li>
                  <input type="radio" name="sortingEmail" id="sortingEmailDes" value="desc">
                  <label for="sortingEmailDes">Sort in descending order</label>
                </li>
              </ul>
            </th>

            <th class="int-table__cell int-table__cell--th int-table__cell--sort js-int-table__cell--sort" data-date-format="dd-mm-yyyy">
              <div class="flex items-center">
                <span>Date</span>

                <svg class="icon icon--xxs margin-left-xxxs int-table__sort-icon" aria-hidden="true" viewBox="0 0 12 12">
                  <polygon class="arrow-up" points="6 0 10 5 2 5 6 0" />
                  <polygon class="arrow-down" points="6 12 2 7 10 7 6 12" /></svg>
              </div>

              <ul class="sr-only js-int-table__sort-list">
                <li>
                  <input type="radio" name="sortingDate" id="sortingDateNone" value="none" checked>
                  <label for="sortingDateNone">No sorting</label>
                </li>

                <li>
                  <input type="radio" name="sortingDate" id="sortingDateAsc" value="asc">
                  <label for="sortingDateAsc">Sort in ascending order</label>
                </li>

                <li>
                  <input type="radio" name="sortingDate" id="sortingDateDes" value="desc">
                  <label for="sortingDateDes">Sort in descending order</label>
                </li>
              </ul>
            </th>
            <th class="int-table__cell int-table__cell--th text-left">Action</th>
            <th class="int-table__cell int-table__cell--th text-left">Publish</th>
          </tr>
        </thead>

        <tbody class="int-table__body js-int-table__body">
          @foreach($rejected_pages as $page)
            <tr class="int-table__row">
              <th class="int-table__cell" scope="row">
                <div class="custom-checkbox int-table__checkbox">
                  <input value="{{ $page->id }}" class="custom-checkbox__input js-int-table__select-row checkbox-delete" type="checkbox" aria-label="Select this row">
                  <div class="custom-checkbox__control" aria-hidden="true"></div>
                </div>
              </th>

              <td class="int-table__cell cursor-pointer" aria-controls="modal-edit-page" data-id="{{ $page->id }}">
                <a href="#0">
                  {{ Str::limit($page->title, 47) }}
                </a>
              </td>
              <td class="int-table__cell">{{ $page->username }}</td>
              <td class="int-table__cell">{{ $page->reject_reason }}</td>
              <td class="int-table__cell">{{ $page->created_at->format('m/d/Y') }}</td>

              <td class="int-table__cell text-center flex" style="overflow: unset;">
                <form action="{{ route('admin.pages.delete') }}" method="post">
                  @csrf
                  <input type="hidden" name="page_id" value="{{ $page->id }}">
                  <li class="menu-bar__item btn-delete" role="menuitem" aria-controls="modal-name-1">
                    <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 16 16">
                      <path d="M2,6v8c0,1.1,0.9,2,2,2h8c1.1,0,2-0.9,2-2V6H2z"></path>
                      <path d="M12,3V1c0-0.6-0.4-1-1-1H5C4.4,0,4,0.4,4,1v2H0v2h16V3H12z M10,3H6V2h4V3z"></path>
                    </svg>
                    <span class="menu-bar__label">Delete</span>
                  </li>
                </form>
              </td>

              <td>
                <a href="{{ route('admin.pages.publish', ['id' => $page->id]) }}" class="btn">Publish</a>
              </td>
            </tr>
          @endforeach
        </tbody>

      </table>
    </div><!-- /.int-table__inner -->
  </div><!-- /.int-table text-sm js-int-table -->

  <div class="flex items-center justify-between padding-top-sm">
    <p class="text-sm">
      {{ $rejected_pages->count() }}
      {{ ($rejected_pages->count() < 2) ? 'result' : 'results' }}
    </p>

    @if($rejected_pages->count() > 0)
    <nav class="pagination text-sm" aria-label="Pagination" id="table-pagination-bottom">
      <ul class="pagination__list flex flex-wrap gap-xxxs">
        <li>
          <a
            href="{{ $rejected_pages->withQueryString()->previousPageUrl() }}"
            class="pagination__item
              {{ ($rejected_pages->currentPage() == 1) ? 'pagination__item--disabled' : '' }}
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
              @if($request->has('is_trashed'))
                <input type="hidden" name="is_trashed" value="{{ $is_trashed }}">
              @endif

              @if($request->has('is_draft'))
                <input type="hidden" name="is_draft" value="{{ $is_draft }}">
              @endif

              @if($request->has('is_pending'))
                <input type="hidden" name="is_pending" value="{{ $is_pending }}">
              @endif
              <input aria-label="Page number" class="form-control" type="number" name="page" min="1" max="{{ $rejected_pages->lastPage() }}" value="{{ $rejected_pages->currentPage() }}">
            </form>
            <em>of {{ $rejected_pages->lastPage() }}</em>
          </span>
        </li>

        <li>
          <a
            href="{{ $rejected_pages->withQueryString()->nextPageUrl() }}"
            class="pagination__item
              {{ !$rejected_pages->hasMorePages() ? 'pagination__item--disabled' : '' }}
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
@endif
