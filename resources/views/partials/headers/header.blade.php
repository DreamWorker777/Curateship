<header class="mega-nav mega-nav--mobile mega-nav--desktop@md position-relative js-mega-nav hide-nav js-hide-nav js-hide-nav--main">
  <div class="mega-nav__container">
    <!-- 👇 logo -->
    <a href="{{ url('/') }}" class="mega-nav__logo">
      <div class="flex">
        {!! !empty($settings_data['logo_svg']) ? $settings_data['logo_svg'] : '' !!}
        <!-- 👇 Logo Text -->
        <h1 class="logo margin-left-xxs">{{ !empty($settings_data['logo_title']) ? $settings_data['logo_title'] : '' }}</h1>
      </div>
    </a>

    <!-- 👇 icon buttons --mobile -->
    <div class="mega-nav__icon-btns mega-nav__icon-btns--mobile gap-xxxxs">
      @guest
      <a href="#0" class="mega-nav__icon-btn js-signin-modal-trigger" data-signin="login">
        <svg class="icon" viewBox="0 0 24 24" class="js-signin-modal-trigger" data-signin="login">
          <title>Login</title>
          <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2">
            <circle cx="12" cy="6" r="4" />
            <path d="M12 13a8 8 0 00-8 8h16a8 8 0 00-8-8z" />
          </g>
        </svg>
      </a>
      @endguest
      @auth
      <!-- With avatar -->
      <div class="dropdown js-dropdown padding-xxxs">
        <div class="mega-nav__icon-btn dropdown__wrapper inline-block author author--minimal-mobile ">
          <a href="#0" class="author__img-wrapper dropdown__trigger">
            @if(auth()->user()->hasAvatar())
              <img src="{{ auth()->user()->getAvatar() }}" alt="Logged in user avatar,">
            @else
              <!-- Without avatar -->
              <div class="mega-nav__icon-btn dropdown__wrapper inline-block padding-bottom-xxxxs">
                <svg class="icon" viewBox="0 0 24 24">
                  <title>Go to account settings</title>
                  <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2">
                    <circle cx="12" cy="6" r="4" />
                    <path d="M12 13a8 8 0 00-8 8h16a8 8 0 00-8-8z" />
                  </g>
                </svg>
              </div>
            @endif
          </a>

          <ul class="dropdown__menu" aria-label="submenu">
            <li><a href="{{ url('profile') }}" class="dropdown__item">Profile</a></li>
            <li class="dropdown__separator" role="separator"></li>
            <li><a href="{{ url('users/settings') }}" class="dropdown__item">Dashboard</a></li>
            <li><a href="{{ url('users/settings') }}" class="dropdown__item">Account Settings</a></li>
            @if(auth()->user()->isAdmin())
            <li><a href="{{ url('admin') }}" class="dropdown__item">Admin Dashboard</a></li>
            @endif
            <li><a href="{{ url('/logout') }}" class="dropdown__item">Log out</a></li>
          </ul>
        </div><!-- /.mega-nav__icon-btn dropdown__wrapper inline-block -->
      </div><!-- /.dropdown js-dropdown -->
      @endauth

      <button class="reset mega-nav__icon-btn mega-nav__icon-btn--search js-tab-focus" aria-label="Toggle search" aria-controls="mega-nav-search">
        <svg class="icon" viewBox="0 0 24 24">
          <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2">
            <path d="M4.222 4.222l15.556 15.556" />
            <path d="M19.778 4.222L4.222 19.778" />
            <circle cx="9.5" cy="9.5" r="6.5" />
          </g>
        </svg>
      </button>

      <button class="reset mega-nav__icon-btn mega-nav__icon-btn--menu js-tab-focus" aria-label="Toggle menu" aria-controls="mega-nav-navigation">
        <svg class="icon" viewBox="0 0 24 24">
          <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2">
            <path d="M1 6h22" />
            <path d="M1 12h22" />
            <path d="M1 18h22" />
          </g>
        </svg>
      </button>
    </div>

    <div class="mega-nav__nav js-mega-nav__nav" id="mega-nav-navigation" role="navigation" aria-label="Main">
      <div class="mega-nav__nav-inner">
        <?php 
          $shortcode = app('shortcode');
          echo $shortcode->compile('[menu name="Primary Menu"]');

          if (isset($disable_shortcode) && $disable_shortcode)
            $shortcode->disable();
        ?>
        <ul class="mega-nav__items js-main-nav custom-mega-nav__items-mobile">
          <!-- 👇 icon buttons --desktop -->
          <li class="mega-nav__icon-btns mega-nav__icon-btns--desktop">
            @guest
            <div class="mega-nav__icon-btn dropdown__wrapper inline-block js-signin-modal-trigger">
              <a href="#0" class="color-inherit flex height-100% width-100% flex-center" data-signin="login">
                <svg class="icon" viewBox="0 0 24 24" data-signin="login">
                  <title>Login</title>
                  <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2">
                    <circle cx="12" cy="6" r="4" />
                    <path d="M12 13a8 8 0 00-8 8h16a8 8 0 00-8-8z" />
                  </g>
                </svg>
              </a>
            </div>
            @endguest

            @auth
            <!-- With avatar -->
            <div class="dropdown js-dropdown padding-right-xxxs">
              <div class="mega-nav__icon-btn dropdown__wrapper inline-block author author--minimal-mobile">
                <a href="#0" class="author__img-wrapper author--minimal dropdown__trigger">
                  @if(auth()->user()->hasAvatar())
                    <img src="{{ auth()->user()->getAvatar() }}" alt="Logged in user avatar,">
                  @else
                    <!-- Without avatar -->
                    <div class="mega-nav__icon-btn dropdown__wrapper inline-block">
                    <svg class="icon" viewBox="0 0 24 24">
                      <title>Go to account settings</title>
                      <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2">
                        <circle cx="12" cy="6" r="4" />
                        <path d="M12 13a8 8 0 00-8 8h16a8 8 0 00-8-8z" />
                      </g>
                    </svg>
                  </div>
                  @endif
                </a>

                <ul class="dropdown__menu" aria-label="submenu">
                  <li><a href="{{ url('profile') }}" class="dropdown__item">Profile</a></li>
                  <li class="dropdown__separator" role="separator"></li>
                  <li><a href="{{ url('dashboard') }}" class="dropdown__item">Dashboard</a></li>
                  <li><a href="{{ url('users/settings') }}" class="dropdown__item">Account Settings</a></li>
                  @if(auth()->user()->isAdmin())
                  <li><a href="{{ url('admin') }}" class="dropdown__item">Admin Dashboard</a></li>
                  @endif
                  <li><a href="{{ url('/logout') }}" class="dropdown__item">Log out</a></li>
                </ul>
              </div><!-- /.mega-nav__icon-btn dropdown__wrapper inline-block -->
            </div><!-- /.dropdown js-dropdown -->
            @endauth

            <button class="reset mega-nav__icon-btn mega-nav__icon-btn--search js-tab-focus" aria-label="Toggle search" aria-controls="mega-nav-search">
              <svg class="icon" viewBox="0 0 24 24">
                <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2">
                  <path d="M4.222 4.222l15.556 15.556" />
                  <path d="M19.778 4.222L4.222 19.778" />
                  <circle cx="9.5" cy="9.5" r="6.5" />
                </g>
              </svg>
            </button>
          </li>

          @guest
          <!-- 👇 button -->
          <li class="mega-nav__item js-signin-modal-trigger custom-mega-nav__item-column">
            <a href="#0" class="btn btn--primary mega-nav__btn" data-signin="signup">Register</a>
          </li>
          <li class="mega-nav__item js-signin-modal-trigger custom-mega-nav__item-column">
            <a href="#0" class="btn btn--subtle mega-nav__btn" data-signin="login">Login</a>
          </li>
          @endguest

          @auth
          <li class="mega-nav__item">
            <a href="{{ url('/logout') }}" class="btn btn--subtle mega-nav__btn">Log out</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>

    <!-- 👇 search -->
    <div class="mega-nav__search js-mega-nav__search" id="mega-nav-search">
      <div class="mega-nav__search-inner">
        <form action="{{ route('pages.posts') }}" method="GET">
          <input type="hidden" name="limit" value="{{$limit ?? ''}}">
          <input type="hidden" name="sort" value="{{$sort ?? ''}}">
          <input type="hidden" name="order" value="{{$order ?? ''}}">

          <input class="form-control width-100%" type="reset search" name="q" value="{{ $q ?? '' }}" id="megasite-search" placeholder="Search..." aria-label="Search">
        </form>
        <div class="margin-top-lg">
          <p class="mega-nav__label">Quick Links</p>
          <ul>
            <li><a href="https://www.facebook.com/saigonfinest" class="mega-nav__quick-link">Visit us on Facebook</a></li>
            <li><a href="https://www.instagram.com/saigon_finest/" class="mega-nav__quick-link">Visit us on Instagram</a></li>
            <li><a href="https://saigonfinest.com/contact" class="mega-nav__quick-link">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>
