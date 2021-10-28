<div class="padding-sm margin-top-sm">
  @if(request()->has('status') && request('status') == 'deleted' && auth()->user()->isAdmin())
    <div class="margin-bottom-md">
      <form action="{{ route('dashboard.trash.empty') }}" method="post">
        @csrf
        <span class="btn btn--subtle" id="emptyTrash">Empty trash</span>
      </form>
    </div>
  @endif

  <div id="notification-box" class="alert js-alert margin-bottom-lg" role="alert">
    <div class="flex items-center justify-between">
      <div class="flex items-center">
        <svg aria-hidden="true" class="icon margin-right-xxxs" viewBox="0 0 32 32" ><title>info icon</title><g><path d="M16,0C7.178,0,0,7.178,0,16s7.178,16,16,16s16-7.178,16-16S24.822,0,16,0z M18,7c1.105,0,2,0.895,2,2 s-0.895,2-2,2s-2-0.895-2-2S16.895,7,18,7z M19.763,24.046C17.944,24.762,17.413,25,16.245,25c-0.954,0-1.696-0.233-2.225-0.698 c-1.045-0.92-0.869-2.248-0.542-3.608l0.984-3.483c0.19-0.717,0.575-2.182,0.036-2.696c-0.539-0.514-1.794-0.189-2.524,0.083 l0.263-1.073c1.054-0.429,2.386-0.954,3.523-0.954c1.71,0,2.961,0.855,2.961,2.469c0,0.151-0.018,0.417-0.053,0.799 c-0.066,0.701-0.086,0.655-1.178,4.521c-0.122,0.425-0.311,1.328-0.311,1.765c0,1.683,1.957,1.267,2.847,0.847L19.763,24.046z"></path></g></svg>
        <div class="message">
        </div>
      </div>

      <button class="reset alert__close-btn js-alert__close-btn">
        <svg class="icon" viewBox="0 0 24 24"><title>Close alert</title><g stroke-linecap="square" stroke-linejoin="miter" stroke-width="3" stroke="currentColor" fill="none" stroke-miterlimit="10"><line x1="19" y1="5" x2="5" y2="19"></line><line fill="none" x1="19" y1="19" x2="5" y2="5"></line></g></svg>
      </button>
    </div>
  </div><!-- /.alert -->

  <template id="selected-id-template">
    <input type="hidden" name="selectedIDs[]" value="@{{value}}">
  </template><!-- /#selected-id-template -->
  <form action="{{route('dashboard.delete.multiple')}}"
    method="POST" id="form-bulk-delete"> @csrf
    <div class="bulk-selected-ids"></div><!-- /.bulk-selected-ids -->
  </form>

  <div id="table-1" class="int-table text-sm js-int-table">
    <div class="int-table__inner" id="site-table-container">
      <table class="int-table__table" aria-label="Interactive table example">
        <thead class="int-table__header js-int-table__header">
          <tr class="int-table__row">
            @if(! request()->has('status') || (request()->has('status') && request('status') != 'deleted'))
              <td class="int-table__cell">
                <div class="custom-checkbox int-table__checkbox">
                  <input class="custom-checkbox__input js-int-table__select-all" id="checkboxDeleteAll" type="checkbox" aria-label="Select all rows">
                  <div class="custom-checkbox__control" aria-hidden="true"></div>
                </div>
              </td>
            @endif

            <th class="int-table__cell int-table__cell--th text-center">Image</th>

            <th class="int-table__cell int-table__cell--th int-table__cell--sort js-int-table__cell--sort">
              <div class="flex items-center">
                <span>Post Title</span>

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

            @if(auth()->user()->isAdmin())
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
            @endif

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
            @if(! request()->has('status') || (request()->has('status') && request('status') != 'deleted'))
              <th class="int-table__cell int-table__cell--th text-left">Action</th>
            @endif

            @if(request()->has('status') && request('status') == 'draft')
              <th class="int-table__cell int-table__cell--th text-left">Publish</th>
            @endif

            @if( request()->has('status') && request('status') == 'pending' && auth()->user()->isAdmin())
              <th class="int-table__cell int-table__cell--th text-left">Publish</th>
              <th class="int-table__cell int-table__cell--th text-left">Reject</th>
            @endif

            @if(request()->has('status') && request('status') == 'deleted')
              <th class="int-table__cell int-table__cell--th text-left">Restore</th>
              @if (auth()->user()->isAdmin())
              <th class="int-table__cell int-table__cell--th text-left">Action</th>
              @endif
            @endif


          </tr>
        </thead>

        <tbody class="int-table__body js-int-table__body">
          @foreach($posts as $post)
            <tr class="int-table__row">
              @if(! request()->has('status') || (request()->has('status') && request('status') != 'deleted'))
                <th class="int-table__cell" scope="row">
                  <div class="custom-checkbox int-table__checkbox">
                    <input value="{{ $post->id }}" class="custom-checkbox__input js-int-table__select-row checkbox-delete" type="checkbox" aria-label="Select this row">
                    <div class="custom-checkbox__control" aria-hidden="true"></div>
                  </div>
                </th>
              @endif

              <td class="int-table__cell text-center cursor-pointer">
                @if(is_null($post->thumbnail_medium))
                  <a href="
                    {{
                        route(
                            'single-post-view',
                            [
                                'slug'   => $post->slug
                            ]
                        )
                    }}
                  " target="_blank" class="post-table-image-wrapper post-table-image bg-black bg-opacity-50%"></a>
                @else
                <a href="
                    {{
                        route(
                            'single-post-view',
                            [
                                'slug'   => $post->slug
                            ]
                        )
                    }}
                " target="_blank" class="post-table-image-wrapper post-table-image bg-black bg-opacity-50%">
                  <img src="{{ $post->showThumbnail('medium') }}">
                </a>
                @endif
              </td>

              <td class="int-table__cell cursor-pointer" aria-controls="modal-edit-post" data-id="{{ $post->id }}">
                <a href="#0">
                  {{ Str::limit($post->title, 80) }}
                </a>
              </td>

              @if ( auth()->user()->isAdmin() ) 
              <td class="int-table__cell">{{ $post->username }}</td>
              @endif

              <td class="int-table__cell">{{ $post->created_at->format('m/d/Y') }}</td>

              @if($post->status != 'deleted')
                <td class="int-table__cell text-center flex" style="overflow: unset;">
                  <form action="{{ route('dashboard.delete') }}" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <li class="menu-bar__item btn-delete" role="menuitem" aria-controls="modal-name-1">
                      <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 16 16">
                        <path d="M2,6v8c0,1.1,0.9,2,2,2h8c1.1,0,2-0.9,2-2V6H2z"></path>
                        <path d="M12,3V1c0-0.6-0.4-1-1-1H5C4.4,0,4,0.4,4,1v2H0v2h16V3H12z M10,3H6V2h4V3z"></path>
                      </svg>
                      <span class="menu-bar__label">Delete</span>
                    </li>
                  </form>

                  @if($post->status == 'published')
                    <a href="{{ route('dashboard.make-draft', ['id' => $post->id]) }}">
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

              @if($post->status != 'published' && $post->status != 'deleted' )
                @if ((request()->has('status') && request('status') == 'draft') || auth()->user()->isAdmin())
                <td>
                  <a href="{{ route('dashboard.publish', ['id' => $post->id]) }}" class="btn">Publish</a>
                </td>
                @endif
                @if( request()->has('status') && request('status') == 'pending' && auth()->user()->isAdmin())
                <td aria-controls="modal-reject-post" data-id="{{ $post->id }}">
                  <a href="#" class="btn">Reject</a>
                </td>
                @endif
              @elseif($post->status == 'deleted')
                <td class="int-table__cell" style="overflow: unset;">
                  <a href="{{ route('dashboard.restore', ['id' => $post->id]) }}" class="btn margin-right-sm">Restore</a>
                </td>
                @if (auth()->user()->isAdmin())
                <td class="int-table__cell text-center" style="overflow: unset;">
                  <form action="{{ route('dashboard.delete-permanently') }}" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
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
              @endif
            </tr>
          @endforeach
        </tbody>

      </table>
    </div><!-- /.int-table__inner -->
  </div><!-- /.int-table text-sm js-int-table -->

  <div class="flex items-center justify-between padding-top-sm">
    <p class="text-sm">
      {{ $posts->count() }}
      {{ ($posts->count() < 2) ? 'result' : 'results' }}
    </p>

    @if($posts->count() > 0)
    <nav class="table-pagination-bottom pagination text-sm" aria-label="Pagination">
      <ul class="pagination__list flex flex-wrap gap-xxxs">
        <li>
          <a
            href="{{ $posts->withQueryString()->previousPageUrl() }}"
            class="pagination__item
              {{ ($posts->currentPage() == 1) ? 'pagination__item--disabled' : '' }}
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

              <input aria-label="Page number" class="form-control" type="number" name="page" min="1" max="{{ $posts->lastPage() }}" value="{{ $posts->currentPage() }}">
            </form>
            <em>of {{ $posts->lastPage() }}</em>
          </span>
        </li>

        <li>
          <a
            href="{{ $posts->withQueryString()->nextPageUrl() }}"
            class="pagination__item
              {{ !$posts->hasMorePages() ? 'pagination__item--disabled' : '' }}
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
</div>

@if ( request()->has('status') && request('status') == 'pending')
<div class="padding-md margin-top-lg">
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

            <th class="int-table__cell int-table__cell--th text-center">Image</th>

            <th class="int-table__cell int-table__cell--th int-table__cell--sort js-int-table__cell--sort">
              <div class="flex items-center">
                <span>Post Title</span>

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

            @if(auth()->user()->isAdmin())
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
            @endif

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

            @if( auth()->user()->isAdmin())
              <th class="int-table__cell int-table__cell--th text-left">Publish</th>
            @endif
          </tr>
        </thead>

        <tbody class="int-table__body js-int-table__body">
          @foreach($rejected_posts as $post)
            <tr class="int-table__row">
              <th class="int-table__cell" scope="row">
                <div class="custom-checkbox int-table__checkbox">
                  <input value="{{ $post->id }}" class="custom-checkbox__input js-int-table__select-row checkbox-delete" type="checkbox" aria-label="Select this row">
                  <div class="custom-checkbox__control" aria-hidden="true"></div>
                </div>
              </th>

              <td class="int-table__cell text-center cursor-pointer">
                @if(is_null($post->thumbnail_medium))
                  <a href="
                  {{
                    route(
                      'single-post-view',
                      [
                        'slug'   => $post->slug
                      ]
                    )
                  }}
                  " target="_blank" class="post-table-image-wrapper post-table-image bg-black bg-opacity-50%"></a>
                @else
                  <a href="
                    {{
                      route(
                        'single-post-view',
                        [
                          'slug'   => $post->slug
                        ]
                      )
                    }}
                  " target="_blank" class="post-table-image-wrapper post-table-image bg-black bg-opacity-50%">
                    <img src="{{ $post->showThumbnail('medium') }}">
                  </a>
                @endif
              </td>

              <td class="int-table__cell cursor-pointer" aria-controls="modal-edit-post" data-id="{{ $post->id }}">
                <a href="#0">
                  {{ Str::limit($post->title, 47) }}
                </a>
              </td>

              @if ( auth()->user()->isAdmin() ) 
              <td class="int-table__cell">{{ $post->username }}</td>
              @endif

              <td class="int-table__cell">{{ $post->reject_reason }}</td>

              <td class="int-table__cell">{{ $post->created_at->format('m/d/Y') }}</td>

              <td class="int-table__cell text-center flex" style="overflow: unset;">
                <form action="{{ route('dashboard.delete') }}" method="post">
                  @csrf
                  <input type="hidden" name="post_id" value="{{ $post->id }}">
                  <li class="menu-bar__item btn-delete" role="menuitem" aria-controls="modal-name-1">
                    <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 16 16">
                      <path d="M2,6v8c0,1.1,0.9,2,2,2h8c1.1,0,2-0.9,2-2V6H2z"></path>
                      <path d="M12,3V1c0-0.6-0.4-1-1-1H5C4.4,0,4,0.4,4,1v2H0v2h16V3H12z M10,3H6V2h4V3z"></path>
                    </svg>
                    <span class="menu-bar__label">Delete</span>
                  </li>
                </form>
              </td>

              @if ( auth()->user()->isAdmin() ) 
              <td>
                <a href="{{ route('dashboard.publish', ['id' => $post->id]) }}" class="btn">Publish</a>
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
      {{ $rejected_posts->count() }}
      {{ ($rejected_posts->count() < 2) ? 'result' : 'results' }}
    </p>

    @if($rejected_posts->count() > 0)
    <nav class="table-pagination-bottom pagination text-sm" aria-label="Pagination">
      <ul class="pagination__list flex flex-wrap gap-xxxs">
        <li>
          <a
            href="{{ $rejected_posts->withQueryString()->previousPageUrl() }}"
            class="pagination__item
              {{ ($rejected_posts->currentPage() == 1) ? 'pagination__item--disabled' : '' }}
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
              <input type="hidden" name="status" value="{{ $status }}">

              <input aria-label="Page number" class="form-control" type="number" name="page" min="1" max="{{ $rejected_posts->lastPage() }}" value="{{ $rejected_posts->currentPage() }}">
            </form>
            <em>of {{ $rejected_posts->lastPage() }}</em>
          </span>
        </li>

        <li>
          <a
            href="{{ $rejected_posts->withQueryString()->nextPageUrl() }}"
            class="pagination__item
              {{ !$rejected_posts->hasMorePages() ? 'pagination__item--disabled' : '' }}
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
@endif
