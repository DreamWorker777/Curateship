@if (session('responseMessage'))
<div class="alert alert--is-visible js-alert margin-bottom-lg" role="alert">
  <div class="flex items-center justify-between">
    <div class="flex items-center">
      <svg aria-hidden="true" class="icon margin-right-xxxs" viewBox="0 0 32 32">
        <title>info icon</title>
        <g>
          <path d="M16,0C7.178,0,0,7.178,0,16s7.178,16,16,16s16-7.178,16-16S24.822,0,16,0z M18,7c1.105,0,2,0.895,2,2 s-0.895,2-2,2s-2-0.895-2-2S16.895,7,18,7z M19.763,24.046C17.944,24.762,17.413,25,16.245,25c-0.954,0-1.696-0.233-2.225-0.698 c-1.045-0.92-0.869-2.248-0.542-3.608l0.984-3.483c0.19-0.717,0.575-2.182,0.036-2.696c-0.539-0.514-1.794-0.189-2.524,0.083 l0.263-1.073c1.054-0.429,2.386-0.954,3.523-0.954c1.71,0,2.961,0.855,2.961,2.469c0,0.151-0.018,0.417-0.053,0.799 c-0.066,0.701-0.086,0.655-1.178,4.521c-0.122,0.425-0.311,1.328-0.311,1.765c0,1.683,1.957,1.267,2.847,0.847L19.763,24.046z"></path>
        </g>
      </svg>
      <p>
        {!! session()->get('responseMessage')!!}
      </p>
    </div>

    <button class="reset alert__close-btn js-alert__close-btn">
      <svg class="icon" viewBox="0 0 24 24">
        <title>Close alert</title>
        <g stroke-linecap="square" stroke-linejoin="miter" stroke-width="3" stroke="currentColor" fill="none" stroke-miterlimit="10">
          <line x1="19" y1="5" x2="5" y2="19"></line>
          <line fill="none" x1="19" y1="19" x2="5" y2="5"></line>
        </g>
      </svg>
    </button>
  </div>
</div>
@endif

@if(request()->has('status') && request('status') == 'deleted')
<div class="margin-bottom-md">
  <a href="{{ url('admin/users/empty-trash') }}" class="btn btn--subtle">Empty trash</a>
</div>
@endif

<template id="selected-id-template">
  <input type="hidden" name="selectedIDs[]" value="@{{value}}">
</template><!-- /#selected-id-template -->
<form action="{{ url('admin/users/bulk-suspend') }}" method="POST" id="form-bulk-suspend"> @csrf
  <div class="bulk-selected-ids"></div><!-- /.bulk-selected-ids -->
</form>
<form action="{{ url('admin/users/bulk-delete') }}" method="POST" id="form-bulk-delete"> @csrf
  <div class="bulk-selected-ids"></div><!-- /.bulk-selected-ids -->
</form>

<div class="int-table js-int-table text-sm" id="table-1">

  <div class="int-table__inner" id="site-table-container">
    <table class="int-table__table" aria-label="Interactive table example">
      <thead class="int-table__header js-int-table__header">
        <tr class="int-table__row">
          <td class="int-table__cell">
            <div class="custom-checkbox int-table__checkbox">
              <input class="custom-checkbox__input js-int-table__select-all" type="checkbox" aria-label="Select all rows" />
              <div class="custom-checkbox__control" aria-hidden="true"></div>
            </div>
          </td>

          <th class="int-table__cell int-table__cell--th int-table__cell--sort  js-int-table__cell--sort @if($sort == 'id') int-table__cell--{{$order}} @endif" data-sort="id">
            <div class="flex items-center">
              <span>ID</span>

              <svg class="icon icon--xxs margin-left-xxxs int-table__sort-icon" aria-hidden="true" viewBox="0 0 12 12">
                <polygon class="arrow-up" points="6 0 10 5 2 5 6 0" />
                <polygon class="arrow-down" points="6 12 2 7 10 7 6 12" />
              </svg>
            </div>

            <ul class="sr-only js-int-table__sort-list">
              <li>
                <input type="radio" name="sortingId" id="sortingIdNone" value="none">
                <label for="sortingIdNone">No sorting</label>
              </li>

              <li>
                <input type="radio" name="sortingId" id="sortingIdAsc" value="asc" @if($sort=="id" && $order=='asc' ) checked @endif>
                <label for="sortingIdAsc">Sort in ascending order</label>
              </li>

              <li>
                <input type="radio" name="sortingId" id="sortingIdDes" value="desc" @if($sort=="id" && $order=='desc' ) checked @endif>
                <label for="sortingIdDes">Sort in descending order</label>
              </li>
            </ul>
          </th>

          <th class="int-table__cell int-table__cell--th int-table__cell--sort  js-int-table__cell--sort @if($sort == 'username') int-table__cell--{{$order}} @endif" data-sort="username">
            <div class="flex items-center">
              <span>Username</span>

              <svg class="icon icon--xxs margin-left-xxxs int-table__sort-icon" aria-hidden="true" viewBox="0 0 12 12">
                <polygon class="arrow-up" points="6 0 10 5 2 5 6 0" />
                <polygon class="arrow-down" points="6 12 2 7 10 7 6 12" />
              </svg>
            </div>

            <ul class="sr-only js-int-table__sort-list">
              <li>
                <input type="radio" name="sortingUserName" id="sortingUserNameNone" value="none">
                <label for="sortingUserNameNone">No sorting</label>
              </li>

              <li>
                <input type="radio" name="sortingUserName" id="sortingUserNameAsc" value="asc" @if($sort=="username" && $order=='asc' ) checked @endif>
                <label for="sortingUserNameAsc">Sort in ascending order</label>
              </li>

              <li>
                <input type="radio" name="sortingUserName" id="sortingUserNameDes" value="desc" @if($sort=="username" && $order=='desc' ) checked @endif>
                <label for="sortingUserNameDes">Sort in descending order</label>
              </li>
            </ul>
          </th>

          <th class="int-table__cell int-table__cell--th int-table__cell--sort  js-int-table__cell--sort @if($sort == 'email') int-table__cell--{{$order}} @endif" data-sort="email">
            <div class="flex items-center">
              <span>Email</span>

              <svg class="icon icon--xxs margin-left-xxxs int-table__sort-icon" aria-hidden="true" viewBox="0 0 12 12">
                <polygon class="arrow-up" points="6 0 10 5 2 5 6 0" />
                <polygon class="arrow-down" points="6 12 2 7 10 7 6 12" />
              </svg>
            </div>

            <ul class="sr-only js-int-table__sort-list">
              <li>
                <input type="radio" name="sortingEmail" id="sortingEmailNone" value="none">
                <label for="sortingEmailNone">No sorting</label>
              </li>

              <li>
                <input type="radio" name="sortingEmail" id="sortingEmailAsc" value="asc" @if($sort=="email" && $order=='asc' ) checked @endif>
                <label for="sortingEmailAsc">Sort in ascending order</label>
              </li>

              <li>
                <input type="radio" name="sortingEmail" id="sortingEmailDes" value="desc" @if($sort=="email" && $order=='desc' ) checked @endif>
                <label for="sortingEmailDes">Sort in descending order</label>
              </li>
            </ul>
          </th>

          <th class="int-table__cell int-table__cell--th int-table__cell--sort  js-int-table__cell--sort @if($sort == 'created_at') int-table__cell--{{$order}} @endif" data-sort="created_at" data-date-format="d/m/Y">
            <div class="flex items-center">
              <span>Date</span>

              <svg class="icon icon--xxs margin-left-xxxs int-table__sort-icon" aria-hidden="true" viewBox="0 0 12 12">
                <polygon class="arrow-up" points="6 0 10 5 2 5 6 0" />
                <polygon class="arrow-down" points="6 12 2 7 10 7 6 12" />
              </svg>
            </div>

            <ul class="sr-only js-int-table__sort-list">
              <li>
                <input type="radio" name="sortingDate" id="sortingDateNone" value="none">
                <label for="sortingDateNone">No sorting</label>
              </li>

              <li>
                <input type="radio" name="sortingDate" id="sortingDateAsc" value="asc" @if($sort=="created_at" && $order=='asc' ) checked @endif>
                <label for="sortingDateAsc">Sort in ascending order</label>
              </li>

              <li>
                <input type="radio" name="sortingDate" id="sortingDateDes" value="desc" @if($sort=="created_at" && $order=='desc' ) checked @endif>
                <label for="sortingDateDes">Sort in descending order</label>
              </li>
            </ul>
          </th>

          <th class="int-table__cell int-table__cell--th int-table__cell--sort  js-int-table__cell--sort @if($sort == 'role') int-table__cell--{{$order}} @endif" data-sort="role">
            <div class="flex items-center">
              <span>Role</span>

              <svg class="icon icon--xxs margin-left-xxxs int-table__sort-icon" aria-hidden="true" viewBox="0 0 12 12">
                <polygon class="arrow-up" points="6 0 10 5 2 5 6 0" />
                <polygon class="arrow-down" points="6 12 2 7 10 7 6 12" />
              </svg>
            </div>

            <ul class="sr-only js-int-table__sort-list">
              <li>
                <input type="radio" name="sortingRole" id="sortingRoleNone" value="none">
                <label for="sortingRoleNone">No sorting</label>
              </li>

              <li>
                <input type="radio" name="sortingRole" id="sortingRoleAsc" value="asc" @if($sort=="role" && $order=='asc' ) checked @endif>
                <label for="sortingRoleAsc">Sort in ascending order</label>
              </li>

              <li>
                <input type="radio" name="sortingRole" id="sortingRoleDes" value="desc" @if($sort=="role" && $order=='desc' ) checked @endif>
                <label for="sortingRoleDes">Sort in descending order</label>
              </li>
            </ul>
          </th>

          <th class="int-table__cell int-table__cell--th text-right">Action</th>
        </tr>
      </thead>

      <tbody class="int-table__body js-int-table__body" id="site-table-body">
        @php
        foreach($users as $key => $user){
        @endphp

        <tr class="int-table__row">
          <th class="int-table__cell" scope="row">
            <div class="custom-checkbox int-table__checkbox">
              <input class="custom-checkbox__input js-int-table__select-row" type="checkbox" value="{{$user->id}}" aria-label="Select this row" />
              <div class="custom-checkbox__control" aria-hidden="true"></div>
            </div>
          </th>
          <td class="int-table__cell">{{$user->id}}</td>

          <td class="int-table__cell">
            <div class="flex author author--meta">
              <a href="#0" class="author__img-wrapper bg-black bg-opacity-50%">
                @if($user->hasAvatar())
                <img src="{{ $user->getAvatar() }}" alt="Author picture">
                @endif
              </a>
              <a href="{{url('admin/users/edit/'.$user->id)}}" data-update-url="{{url('admin/users/update/'.$user->id)}}" class="modal-trigger-edit-user" aria-controls="modal-edit-user" role="button">{{$user->username}}</a>
            </div>
          </td>

          <td class="int-table__cell">{{$user->email}}</td>
          <td class="int-table__cell">{{ $user->created_at->format('d/m/Y') }}</td>
          <td class="int-table__cell">{{$user->role}}</td>
          <td class="int-table__cell">
            <button class="reset int-table__menu-btn margin-left-auto js-tab-focus" data-label="Edit row" aria-controls="menu-table-row-{{$user->id}}">
              <svg class="icon" viewBox="0 0 16 16">
                <circle cx="8" cy="7.5" r="1.5" />
                <circle cx="1.5" cy="7.5" r="1.5" />
                <circle cx="14.5" cy="7.5" r="1.5" />
              </svg>
            </button>
            <menu id="menu-table-row-{{$user->id}}" class="menu js-menu">
              <li role="menuitem">
                <a href="{{url('admin/users/edit/'.$user->id)}}" data-update-url="{{url('admin/users/update/'.$user->id)}}" aria-controls="modal-edit-user" role="button" class="menu__content js-menu__content modal-trigger-edit-user">
                  <svg class="icon menu__icon" aria-hidden="true" viewBox="0 0 12 12">
                    <path d="M10.121.293a1,1,0,0,0-1.414,0L1,8,0,12l4-1,7.707-7.707a1,1,0,0,0,0-1.414Z"></path>
                  </svg>
                  <span>Edit</span>
                </a>
              </li>

              @php
              $accountStatus = [
              'slug' => 'suspend',
              'text' => 'Suspend',
              ];

              if($user->status == 'suspended'){
              $accountStatus = [
              'slug' => 'activate',
              'text' => 'Activate',
              ];
              }
              @endphp

              <li role="menuitem">
                <a href="{{url('admin/users/'.$accountStatus['slug'].'/'.$user->id)}}" class="menu__content js-menu__content">
                  <svg class="icon menu__icon" aria-hidden="true" viewBox="0 0 16 16">
                    <path d="M15,4H1C0.4,4,0,4.4,0,5v10c0,0.6,0.4,1,1,1h14c0.6,0,1-0.4,1-1V5C16,4.4,15.6,4,15,4z M14,14H2V6h12V14z"></path>
                    <rect x="2" width="12" height="2"></rect>
                  </svg>
                  <span>{{$accountStatus['text']}}</span>
                </a>
              </li>

              <li role="menuitem">
                @if(request()->has('status') && request('status') == 'deleted')
                <a href="{{ url('admin/users/delete/'.$user->id) }}" class="menu__content js-menu__content">
                  <svg class="icon menu__icon" aria-hidden="true" viewBox="0 0 12 12">
                    <path d="M8.354,3.646a.5.5,0,0,0-.708,0L6,5.293,4.354,3.646a.5.5,0,0,0-.708.708L5.293,6,3.646,7.646a.5.5,0,0,0,.708.708L6,6.707,7.646,8.354a.5.5,0,1,0,.708-.708L6.707,6,8.354,4.354A.5.5,0,0,0,8.354,3.646Z"></path>
                    <path d="M6,0a6,6,0,1,0,6,6A6.006,6.006,0,0,0,6,0ZM6,10a4,4,0,1,1,4-4A4,4,0,0,1,6,10Z"></path>
                  </svg>
                  <span>Delete permanently</span>
                </a>
                @else
                <a href="{{ url('admin/users/trash/'.$user->id) }}" class="menu__content js-menu__content">
                  <svg class="icon menu__icon" aria-hidden="true" viewBox="0 0 12 12">
                    <path d="M8.354,3.646a.5.5,0,0,0-.708,0L6,5.293,4.354,3.646a.5.5,0,0,0-.708.708L5.293,6,3.646,7.646a.5.5,0,0,0,.708.708L6,6.707,7.646,8.354a.5.5,0,1,0,.708-.708L6.707,6,8.354,4.354A.5.5,0,0,0,8.354,3.646Z"></path>
                    <path d="M6,0a6,6,0,1,0,6,6A6.006,6.006,0,0,0,6,0ZM6,10a4,4,0,1,1,4-4A4,4,0,0,1,6,10Z"></path>
                  </svg>
                  <span>Delete</span>
                </a>
                @endif
              </li>
            </menu>
          </td>
        </tr>

        @php
        }
        @endphp
      </tbody>
    </table><!-- /.int-table__table -->
  </div><!-- /#site-table-container -->
</div><!-- /.int-table js-int-table -->

<div class="flex items-center justify-between padding-top-sm">
  <p class="text-sm">
    {{ $users->count() }}
    {{ ($users->count() < 2) ? 'result' : 'results' }}
  </p>

  @if($users->count() > 0)
  <nav class="pagination text-sm" aria-label="Pagination" id="table-pagination-bottom">
    <ul class="pagination__list flex flex-wrap gap-xxxs">
      <li>
        <a href="{{ $users->withQueryString()->previousPageUrl() }}" class="pagination__item
              {{ ($users->currentPage() == 1) ? 'pagination__item--disabled' : '' }}
            ">
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

            @if($request->has('role'))
            <input type="hidden" name="role" value="{{ $role }}">
            @endif

            <input aria-label="Page number" class="form-control" type="number" name="page" min="1" max="{{ $users->lastPage() }}" value="{{ $users->currentPage() }}">
          </form>
          <em>of {{ $users->lastPage() }}</em>
        </span>
      </li>

      <li>
        <a href="{{ $users->withQueryString()->nextPageUrl() }}" class="pagination__item
              {{ !$users->hasMorePages() ? 'pagination__item--disabled' : '' }}
            ">
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
<script src="{{ asset('assets/js/util.js') }}"></script>
<script src="{{ asset('assets/js/components/_1_menu.js') }}"></script>
<script src="{{ asset('assets/js/components/_2_interactive-table.js') }}"></script>
<script src="{{ asset('assets/js/components/_1_modal-window.js') }}"></script>
<script>
  (function() {
    // event that watches interactive table checkboxes
    $(document).on('click', '.int-table__table .custom-checkbox__input', function() {
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