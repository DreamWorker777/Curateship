<div class="margin-bottom-md">
      <div class="flex flex-wrap gap-sm items-center justify-between">
        <div>
          <div class="flex flex-wrap gap-xs">

            <li class="menu-bar__item js-menu-bar" aria-controls="modal-add-article">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><title>ic_add_48px</title><rect data-element="frame" x="2.3999999999999986" y="2.3999999999999986" width="43.2" height="43.2" rx="22" ry="22" stroke="none" fill="#f9f9f9"></rect>
                    <g transform="translate(12 12) scale(0.5)" fill="#00a8db">
                        <path d="M38 26H26v12h-4V26H10v-4h12V10h4v12h12v4z"></path>
                    </g>
                </svg>

              </li>

              <li class="menu-bar__item" aria-controls="modal-search">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><title>ic_search_48px</title><rect data-element="frame" x="2.3999999999999986" y="2.3999999999999986" width="43.2" height="43.2" rx="22" ry="22" stroke="none" fill="#f9f9f9"></rect>
                    <g transform="translate(12 12) scale(0.5)" fill="#666666">
                        <path d="M31 28h-1.59l-.55-.55C30.82 25.18 32 22.23 32 19c0-7.18-5.82-13-13-13S6 11.82 6 19s5.82 13 13 13c3.23 0 6.18-1.18 8.45-3.13l.55.55V31l10 9.98L40.98 38 31 28zm-12 0c-4.97 0-9-4.03-9-9s4.03-9 9-9 9 4.03 9 9-4.03 9-9 9z"></path>
                    </g>
                </svg>
              </svg>
                <span class="menu-bar__label">Search Articles</span>
              </li>

            <div class="int-table-actions" data-table-controls="table-1">
                <menu class="menu-bar js-int-table-actions__no-items-selected js-menu-bar" id="btnRefreshTable">
                  <li class="menu-bar__item menu-bar__item--trigger js-menu-bar__trigger" role="menuitem" aria-label="More options">
                    <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 16 16">
                      <circle cx="8" cy="7.5" r="1.5" />
                      <circle cx="1.5" cy="7.5" r="1.5" />
                      <circle cx="14.5" cy="7.5" r="1.5" /></svg>
                  </li>
                  <li class="menu-bar__item " role="menuitem">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><title>ic_refresh_48px</title><rect data-element="frame" x="2.3999999999999986" y="2.3999999999999986" width="43.2" height="43.2" rx="22" ry="22" stroke="none" fill="#f9f9f9"></rect>
                        <g transform="translate(12 12) scale(0.5)" fill="#666666">
                            <path d="M35.3 12.7C32.41 9.8 28.42 8 24 8 15.16 8 8.02 15.16 8.02 24S15.16 40 24 40c7.45 0 13.69-5.1 15.46-12H35.3c-1.65 4.66-6.07 8-11.3 8-6.63 0-12-5.37-12-12s5.37-12 12-12c3.31 0 6.28 1.38 8.45 3.55L26 22h14V8l-4.7 4.7z"></path>
                        </g>
                    </svg>
                    <span class="menu-bar__label">Refresh</span>
                  </li>
                </menu>
                @if(! request()->has('status') || (request()->has('status') && request('status') != 'deleted'))
                  <menu class="menu-bar is-hidden js-int-table-actions__items-selected js-menu-bar" id="btnDeleteMultiple">
                    <li class="menu-bar__item menu-bar__item--trigger js-menu-bar__trigger" role="menuitem" aria-label="More options">
                      <svg class="icon menu-bar__icon" aria-hidden="true" viewBox="0 0 16 16">
                        <circle cx="8" cy="7.5" r="1.5" />
                        <circle cx="1.5" cy="7.5" r="1.5" />
                        <circle cx="14.5" cy="7.5" r="1.5" /></svg>
                    </li>
                    <li class="menu-bar__item" role="menuitem">
                      <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><title>trash-simple</title><rect data-element="frame" x="2.3999999999999986" y="2.3999999999999986" width="43.2" height="43.2" rx="22" ry="22" stroke="none" fill="#f9f9f9"></rect><g transform="translate(12 12) scale(0.5)" fill="#666666"><path fill="#666666" d="M7,13v32c0,1.105,0.895,2,2,2h30c1.105,0,2-0.895,2-2V13H7z M17,38c0,0.552-0.447,1-1,1s-1-0.448-1-1V22 c0-0.552,0.447-1,1-1s1,0.448,1,1V38z M25,38c0,0.552-0.447,1-1,1s-1-0.448-1-1V22c0-0.552,0.447-1,1-1s1,0.448,1,1V38z M33,38 c0,0.552-0.447,1-1,1s-1-0.448-1-1V22c0-0.552,0.447-1,1-1s1,0.448,1,1V38z"></path> <path d="M46,9H33V2c0-0.552-0.447-1-1-1H16c-0.553,0-1,0.448-1,1v7H2c-0.553,0-1,0.448-1,1 s0.447,1,1,1h44c0.553,0,1-0.448,1-1S46.553,9,46,9z M31,9H17V3h14V9z"></path></g></svg>
                      <span class="menu-bar__label">Delete</span>
                      <span class="counter counter--critical counter--docked"><span id="deleteBadge">1</span> <i class="sr-only">Notifications</i></span>
                    </li>
                  </menu>
                @endif
              </div>
          </div>
        </div>

        @if($posts->count() > 0)
        <nav class="pagination text-sm" aria-label="Pagination" id="table-pagination-top">
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
      </div>
  </div>

