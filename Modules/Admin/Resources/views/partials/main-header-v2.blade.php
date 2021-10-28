<header class="header-v2 js-header-v2 bg-black position-sticky top-0 js-mega-nav">
  <div class="header-v2__wrapper">
    <div class="header-v2__container container max-width-lg">
      <div class="header-v2__sub-container">

        <!-- LOGO-->
        <a class="header-v2__logo" href="{{ url('/') }}">
          <div class="flex">
            {!! !empty($settings_data['logo_svg']) ? $settings_data['logo_svg'] : '' !!}
          </div>
        </a>
        <!-- END-->

        <!-- Logo Text-->
        <a href="{{ url('/') }}">
          <h1 class="header-v2-logo">{{ !empty($settings_data['logo_title']) ? $settings_data['logo_title'] : '' }}</h1>
        </a>
      </div>
      <!-- END-->

      <!-- User Icon and Drop-down Mobile-->
      <div class="mobile-btn flex gap-xxs">
        @auth
          @if(auth()->user()->hasAvatar())
          <button class="header-v2__nav-control reset anim-menu-btn js-anim-menu-btn switch-icon switch-icon--rotate js-switch-icon js-tab-focus" aria-label="Toggle icon" menu-target="user-menu">
            <div class="mega-nav__icon-btn dropdown__wrapper inline-block author author--minimal-mobile switch-icon__icon switch-icon__icon--a">
              <div class="author__img-wrapper author--minimal dropdown__trigger">
                <img src="{{ auth()->user()->getAvatar() }}" alt="Logged in user avatar">
              </div>
            </div>
            <svg class="switch-icon__icon switch-icon__icon--b" viewBox="0 0 20 20">
              <g fill="none" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" stroke="#efefef">
                <line x1="15" y1="5" x2="5" y2="15"></line>
                <line x1="15" y1="15" x2="5" y2="5"></line>
              </g>
            </svg>
          </button>
          @else
          <button class="header-v2__nav-control reset anim-menu-btn anim-menu-btn--avatar js-anim-menu-btn js-tab-focus" aria-label="Toggle icon" menu-target="user-menu">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
              <title>face-man</title>
              <g class="icon__group" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" transform="translate(0.5 0.5)" fill="white" stroke="white">
                <path fill="none" stroke-miterlimit="10"
                  d="M1.051,10.933 C4.239,6.683,9.875,11.542,16,6c3,4.75,6.955,4.996,6.955,4.996"></path>
                <circle data-stroke="none" fill="white" cx="7.5" cy="14.5" r="1.5" stroke-linejoin="miter"
                  stroke-linecap="square" stroke="none"></circle>
                <circle data-stroke="none" fill="white" cx="16.5" cy="14.5" r="1.5" stroke-linejoin="miter"
                  stroke-linecap="square" stroke="none"></circle>
                <circle fill="none" stroke="white" stroke-miterlimit="10" cx="12" cy="12" r="11"></circle>
                <path d="M4.222 4.222l15.556 15.556" />
                <path d="M19.778 4.222L4.222 19.778" />
              </g>
            </svg>
          </button>
          @endif
        @endauth

        <button class="header-v2__nav-control reset anim-menu-btn js-anim-menu-btn js-tab-focus" aria-label="Toggle menu" menu-target="main-menu">
          <i class="anim-menu-btn__icon anim-menu-btn__icon--close" aria-hidden="true"></i>
        </button>
      </div>

      <nav id="main-menu" class="header-v2__nav color-contrast-low header-v2__nav-full-height margin-left-xxl@md" role="navigation">
        <ul class="header-v2__nav-list header-v2__nav-list--main">
          <li class="header-v2__nav-item header-v2__nav-item--main"><a href="{{ url('admin/') }}"
              class="header-v2__nav-link" {{ Request::path() == 'admin' ? 'aria-current' : '' }}><span>Home</span></a>
          </li>
          <li class="header-v2__nav-item header-v2__nav-item--main"><a href="{{ url('admin/posts') }}" class="header-v2__nav-link"
            {{ Request::path() == 'admin/posts' ? 'aria-current' : '' }}><span>Posts</span></a></li>
          <li class="header-v2__nav-item header-v2__nav-item--main"><a href="{{ url('admin/tag') }}" class="header-v2__nav-link"
              {{ Request::path() == 'admin/tag' ? 'aria-current' : '' }}><span>Tags</span></a></li>
          <li class="header-v2__nav-item header-v2__nav-item--main"><a href="{{ url('admin/users') }}" class="header-v2__nav-link"
              {{ Request::path() == 'admin/users' ? 'aria-current' : '' }}><span>Users</span></a></li>
          <li class="header-v2__nav-item header-v2__nav-item--main"><a href="{{ url('admin/settings') }}" class="header-v2__nav-link"
              {{ Request::path() == 'admin/settings' ? 'aria-current' : '' }}><span>Settings</span></a></li>
              <li class="header-v2__nav-item header-v2__nav-item--main"><a href="{{ url('admin/editor/component') }}" class="header-v2__nav-link"
              {{ Request::path() == 'admin/editor/component' ? 'aria-current' : '' }}><span>Editor</span></a></li>
      </nav>

      <!-- User Icon and Drop-down Desktop -->
      <nav id="second-menu" class="header-v2__nav header-v2__nav-align-right color-contrast-low">
        <ul class="header-v2__nav-list header-v2__nav-list--main">
          <li class="header-v2__nav-item header-v2__nav-item--main header-v2__nav-item--has-children margin-left-sm">
            @auth
            <div class="dropdown__wrapper inline-block author author--minimal-mobile ">
              <a href="#0" class="mega-nav__icon-btn author__img-wrapper author--minimal dropdown__trigger">
                @if(auth()->user()->hasAvatar())
                <img src="{{ auth()->user()->getAvatar() }}" alt="Logged in user avatar,">
                @else
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
                  <title>face-man</title>
                  <g stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" transform="translate(0.5 0.5)"
                    fill="white" stroke="white">
                    <path fill="none" stroke-miterlimit="10"
                      d="M1.051,10.933 C4.239,6.683,9.875,11.542,16,6c3,4.75,6.955,4.996,6.955,4.996"></path>
                    <circle data-stroke="none" fill="white" cx="7.5" cy="14.5" r="1.5" stroke-linejoin="miter"
                      stroke-linecap="square" stroke="none"></circle>
                    <circle data-stroke="none" fill="white" cx="16.5" cy="14.5" r="1.5" stroke-linejoin="miter"
                      stroke-linecap="square" stroke="none"></circle>
                    <circle fill="none" stroke="white" stroke-miterlimit="10" cx="12" cy="12" r="11"></circle>
                  </g>
                </svg>
                @endif
              </a>

              <div class="header-v2__nav-dropdown">
                <ul class="header-v2__nav-list">
                  <li class="header-v2__nav-item header-v2__nav-item--label">My Post Panel</li>
                  <li class="header-v2__nav-item"><a href="{{ url('dashboard') }}" class="header-v2__nav-link">Dashboard</a></li>
                  <li class="header-v2__nav-item">
                    <a href="#0" class="header-v2__nav-link justify-between">
                      <span>Add Post <i class="sr-only">(opens in new window)</i></span>
                      <svg class="icon icon--xxs" aria-hidden="true" viewBox="0 0 12 12">
                        <g stroke-width="1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" fill="none">
                          <path d="M10.5,8.5v2a1,1,0,0,1-1,1h-8a1,1,0,0,1-1-1v-8a1,1,0,0,1,1-1h2"></path>
                          <polygon points="9.5 0.5 11.5 2.5 6.5 7.5 3.5 8.5 4.5 5.5 9.5 0.5"></polygon>
                          <line x1="11.5" y1="0.5" x2="5.5" y2="6.5"></line>
                        </g>
                      </svg>
                    </a>
                  </li>

                  <li class="header-v2__nav-item header-v2__nav-item--divider" role="separator"></li>
                  <li class="header-v2__nav-item header-v2__nav-item--label">Profile settings</li>
                  <li class="header-v2__nav-item"><a href="{{ url('profile') }}" class="header-v2__nav-link">Profile</a></li>
                  <li class="header-v2__nav-item"><a href="{{ url('users/settings') }}" class="header-v2__nav-link">Edit Profile</a></li>
                  <li class="header-v2__nav-item"><a href="{{ url('/logout') }}" class="header-v2__nav-link">Logout</a></li>

                  <li class="header-v2__nav-item header-v2__nav-item--divider" role="separator"></li>
                  <li class="header-v2__nav-item header-v2__nav-item--label">Admin</li>
                  <li class="header-v2__nav-item"><a href="{{ url('admin') }}" class="header-v2__nav-link">Admin Dashboard</a></li>
                </ul>
              </div>
            </div>
            @endauth
          </li>
          <!-- END -->

          @guest
          <!-- Login and Sign-up buttons -->
          <li class="header-v2__nav-item padding-right-sm padding-left-sm"><a href="{{ url('/site2/login') }}" class="btn btn--subtle">Login</a>
          <li class="header-v2__nav-item"><a href="{{ url('/site2/register') }}" class="btn btn--primary">Signup</a></li>
          <!-- END -->
          @endguest

          @auth
          <li class="header-v2__nav-item padding-left-sm"><a href="{{ url('/logout') }}" class="btn btn--subtle">Log out</a></li>
          
          <!-- Theme Switch -->
          <div class="margin-left-md switch">
          <input class="switch__input" type="checkbox" id="themeSwitch">
          <label class="switch__label" for="themeSwitch" aria-hidden="true">Option label</label>
          <div class="switch__marker" aria-hidden="true"></div>
          </div>
          @endauth
        </ul>
      </nav>


      <!-- User Icon and Drop-down Mobile -->
      <nav id="user-menu" class="header-v2__nav header-v2__nav-dropdown">
        <ul class="header-v2__nav-list">
          <li class="header-v2__nav-item header-v2__nav-item--label">My Post Panel</li>
          <li class="header-v2__nav-item"><a href="{{ url('dashboard') }}" class="header-v2__nav-link">Dashboard</a></li>
          <li class="header-v2__nav-item">
            <a href="#0" class="header-v2__nav-link">
              <span>Add Post <i class="sr-only">(opens in new window)</i></span>
              <svg class="icon icon--xxs" aria-hidden="true" viewBox="0 0 12 12">
                <g stroke-width="1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" fill="none">
                  <path d="M10.5,8.5v2a1,1,0,0,1-1,1h-8a1,1,0,0,1-1-1v-8a1,1,0,0,1,1-1h2"></path>
                  <polygon points="9.5 0.5 11.5 2.5 6.5 7.5 3.5 8.5 4.5 5.5 9.5 0.5"></polygon>
                  <line x1="11.5" y1="0.5" x2="5.5" y2="6.5"></line>
                </g>
              </svg>
            </a>
          </li>

          <li class="header-v2__nav-item header-v2__nav-item--divider" role="separator"></li>
          <li class="header-v2__nav-item header-v2__nav-item--label">Profile settings</li>
          <li class="header-v2__nav-item"><a href="{{ url('profile') }}" class="header-v2__nav-link">Profile</a></li>
          <li class="header-v2__nav-item"><a href="{{ url('users/settings') }}" class="header-v2__nav-link">Edit Profile</a></li>
          <li class="header-v2__nav-item"><a href="{{ url('/logout') }}" class="header-v2__nav-link">Logout</a></li>

          <li class="header-v2__nav-item header-v2__nav-item--divider" role="separator"></li>
          <li class="header-v2__nav-item header-v2__nav-item--label">Admin</li>
          <li class="header-v2__nav-item"><a href="{{ url('admin') }}" class="header-v2__nav-link">Admin Dashboard</a></li>
        </ul>
      </nav>   
    </div>
  </div>

</header>
