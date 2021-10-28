<div class="container max-width-lg hide-nav padding-y-sm z-index-header pointer-events-none js-hide-nav js-hide-nav--main">
  <header class="float-nav-header pointer-events-auto">
      <!-- MENU-->
      <div class="flex-basis-0 flex-grow flex items-center display@md">
      <ul class="flex items-center gap-sm padding-left-xs">
        <li class="flex items-center"><a class="float-nav-header__link" href="#0">Tour</a></li>
        <li class="flex items-center"><a class="float-nav-header__link" href="#0">Features</a></li>
      </ul>
    </div>
  <!-- END-->
    <div class="flex-basis-0 flex-grow flex items-center justify-start padding-left-xs justify-center@md padding-left-0@md">
      <a class="float-nav-header__logo" href="#0">
        <!-- LOGO-->
        <a class="header-v2__logo" href="{{ url('/') }}">
          <div class="flex">
            {!! !empty($settings_data['logo_svg']) ? $settings_data['logo_svg'] : '' !!}
          </div>
        </a>
        <!-- END-->
      </a>
    </div>
  
    <div class="flex-basis-0 flex-grow flex items-center justify-end">
      <ul class="flex items-center gap-sm">
        <li class="flex items-center display@md"><a class="float-nav-header__link" href="#0">Account</a></li>
    
        <li>
          <button class="reset float-nav-header__menu-btn js-tab-focus" aria-controls="float-nav-modal">
            <span>Menu</span>

            <svg class="icon margin-left-xxs" aria-hidden="true" viewBox="0 0 13 13">
              <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                <line x1="0.5" y1="6.5" x2="12.5" y2="6.5"/>
                <line x1="0.5" y1="2.5" x2="12.5" y2="2.5"/>
                <line x1="0.5" y1="10.5" x2="12.5" y2="10.5"/>
              </g>
            </svg>
          </button>
        </li>
      </ul>
    </div>
  </header>
</div>

<!-- modal window -->
<div id="float-nav-modal" class="float-nav-modal modal modal--animate-fade bg js-modal" data-theme="demo-dark" data-modal-prevent-scroll="body">
  <div class="padding-top-xl height-100% overflow-auto momentum-scrolling">
    <div class="container max-width-lg height-100% flex flex-column">
      <header class="flex items-center justify-between">
        <a class="float-nav-header__logo" href="#0">
          <svg class="block" width="78" height="18" viewBox="0 0 78 18">
            <title>Go to homepage</title>
            <g fill="currentColor">
              <path d="M14.822 14.985V16.7H1.181V1.3h1.847v13.685z"></path>
              <path d="M15.656 9c0-5.017 3.521-8.163 9.373-8.163S34.4 3.983 34.4 9s-3.52 8.163-9.374 8.163-9.37-3.146-9.37-8.163zm16.855 0c0-4.137-2.949-6.447-7.482-6.447s-7.48 2.31-7.48 6.447 2.948 6.447 7.48 6.447 7.482-2.31 7.482-6.447z"></path>
              <path d="M55.324 12.961c-1.276 2.4-4.356 4.2-8.625 4.2-5.963 0-9.483-3.146-9.483-8.163S40.736.837 46.633.837a9.85 9.85 0 0 1 7.833 3.213L52.86 5.172c-1.386-1.738-3.432-2.619-6.227-2.619-4.6 0-7.525 2.178-7.525 6.447s2.949 6.447 7.658 6.447c3.057 0 5.566-.9 6.711-3.037v-2h-7V8.692h8.845z"></path>
              <path d="M58.072 9c0-5.017 3.521-8.163 9.373-8.163S76.819 3.983 76.819 9s-3.52 8.163-9.374 8.163S58.072 14.017 58.072 9zm16.855 0c0-4.137-2.948-6.447-7.482-6.447s-7.48 2.31-7.48 6.447 2.948 6.447 7.48 6.447 7.482-2.31 7.482-6.447z"></path>
            </g>
          </svg>
        </a>
  
        <button class="reset float-nav-modal__close-btn js-modal__close js-tab-focus">
          <svg class="icon" viewBox="0 0 20 20">
            <title>Close modal window</title>
            <g class="float-nav-modal__close-icon-g" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="2" y1="2" x2="18" y2="18"/>
              <line x1="18" y1="2" x2="2" y2="18"/>
            </g>
          </svg>
        </button>
      </header>
  
      <nav class="padding-y-xl width-66%@md" role="navigation" aria-label="Main">
        <ol class="float-nav-modal__list grid gap-xs">
          <li><a class="float-nav-modal__link" href="#0">Tour</a></li>
          <li><a class="float-nav-modal__link" href="#0">Roadmap</a></li>
          <li><a class="float-nav-modal__link" href="#0">Clients</a></li>
          <li><a class="float-nav-modal__link" href="#0">About</a></li>
          <li><a class="float-nav-modal__link" href="#0">Get in Touch</a></li>
        </ol>
      </nav>
  
      <footer class="border-top border-contrast-higher border-opacity-10% padding-y-sm margin-top-auto">
        <div class="flex items-center justify-between">
          <p class="text-xs color-contrast-medium">&copy; Copyright</p>
  
          <!-- socials -->
          <div>
            <ul class="flex flex-wrap gap-xs items-center">
              <li>
                <a class="float-nav-modal__social-btn" href="#0">
                  <svg class="icon" viewBox="0 0 32 32">
                    <title>Follow us on Twitter</title>
                    <g>
                      <path d="M32,6.1c-1.2,0.5-2.4,0.9-3.8,1c1.4-0.8,2.4-2.1,2.9-3.6c-1.3,0.8-2.7,1.3-4.2,1.6C25.7,3.8,24,3,22.2,3 c-3.6,0-6.6,2.9-6.6,6.6c0,0.5,0.1,1,0.2,1.5C10.3,10.8,5.5,8.2,2.2,4.2c-0.6,1-0.9,2.1-0.9,3.3c0,2.3,1.2,4.3,2.9,5.5 c-1.1,0-2.1-0.3-3-0.8c0,0,0,0.1,0,0.1c0,3.2,2.3,5.8,5.3,6.4c-0.6,0.1-1.1,0.2-1.7,0.2c-0.4,0-0.8,0-1.2-0.1 c0.8,2.6,3.3,4.5,6.1,4.6c-2.2,1.8-5.1,2.8-8.2,2.8c-0.5,0-1.1,0-1.6-0.1C2.9,27.9,6.4,29,10.1,29c12.1,0,18.7-10,18.7-18.7 c0-0.3,0-0.6,0-0.8C30,8.5,31.1,7.4,32,6.1z"></path>
                    </g>
                  </svg>
                </a>
              </li>
    
              <li>
                <a class="float-nav-modal__social-btn" href="#0">
                  <svg class="icon" viewBox="0 0 32 32">
                    <title>Follow us on Facebook</title>
                    <path d="M32,16A16,16,0,1,0,13.5,31.806V20.625H9.438V16H13.5V12.475c0-4.01,2.389-6.225,6.043-6.225a24.644,24.644,0,0,1,3.582.312V10.5H21.107A2.312,2.312,0,0,0,18.5,13v3h4.438l-.71,4.625H18.5V31.806A16,16,0,0,0,32,16Z"></path>
                  </svg>
                </a>
              </li>
    
              <li>
                <a class="float-nav-modal__social-btn" href="#0">
                  <svg class="icon" viewBox="0 0 32 32">
                    <title>Follow us on Youtube</title>
                    <path d="M31.7,9.6c0,0-0.3-2.2-1.3-3.2c-1.2-1.3-2.6-1.3-3.2-1.4C22.7,4.7,16,4.7,16,4.7h0c0,0-6.7,0-11.2,0.3 c-0.6,0.1-2,0.1-3.2,1.4c-1,1-1.3,3.2-1.3,3.2S0,12.2,0,14.8v2.4c0,2.6,0.3,5.2,0.3,5.2s0.3,2.2,1.3,3.2c1.2,1.3,2.8,1.2,3.5,1.4 C7.7,27.2,16,27.3,16,27.3s6.7,0,11.2-0.3c0.6-0.1,2-0.1,3.2-1.4c1-1,1.3-3.2,1.3-3.2s0.3-2.6,0.3-5.2v-2.4 C32,12.2,31.7,9.6,31.7,9.6z M12.7,20.2l0-9l8.6,4.5L12.7,20.2z"></path>
                  </svg>
                </a>
              </li>
            </ul>
          </div>
          <!-- end socials -->
        </div>
      </footer>
    </div>
  </div>
</div>