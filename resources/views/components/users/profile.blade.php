<section>
  <div class="container max-width-adaptive-lg" id="userProfile">
    <div class="author author--featured">
      <div class="profile__cover radius-lg radius-top-left-0 radius-top-right-0" aria-hidden="true" style="background-image: url('{{ $user->getCoverPhoto() }}" alt="{{ $user->name }}'s Cover Photo');"></div>
      @if($user->hasAvatar())
        <a href="#" class="author__img-wrapper border border-4 border-white">
          <img src="{{ $user->getAvatar() }}" alt="Author picture">
        </a>
      @else
        <a href="#" class="author__img-wrapper border border-4 border-white bg-contrast-medium"></a>
      @endif

      <h3>{{ $user->name }}</h3>

      @if($user->users_setting)
        <div class="author__content text-component">
          <p>{{ $user->users_setting->bio }}</p>
        </div>

        @if($user->hasSocialMedia())
          <ul class="flex gap-xs flex-wrap justify-center">
            @if(!is_null($user->users_setting->twitter_link))
              <li>
                <a href="{{ $user->users_setting->twitter_link }}" class="author__social">
                  <svg class="icon" viewBox="0 0 32 32"><title>Follow the author on Twitter</title><g><path d="M32,6.1c-1.2,0.5-2.4,0.9-3.8,1c1.4-0.8,2.4-2.1,2.9-3.6c-1.3,0.8-2.7,1.3-4.2,1.6C25.7,3.8,24,3,22.2,3 c-3.6,0-6.6,2.9-6.6,6.6c0,0.5,0.1,1,0.2,1.5C10.3,10.8,5.5,8.2,2.2,4.2c-0.6,1-0.9,2.1-0.9,3.3c0,2.3,1.2,4.3,2.9,5.5 c-1.1,0-2.1-0.3-3-0.8c0,0,0,0.1,0,0.1c0,3.2,2.3,5.8,5.3,6.4c-0.6,0.1-1.1,0.2-1.7,0.2c-0.4,0-0.8,0-1.2-0.1 c0.8,2.6,3.3,4.5,6.1,4.6c-2.2,1.8-5.1,2.8-8.2,2.8c-0.5,0-1.1,0-1.6-0.1C2.9,27.9,6.4,29,10.1,29c12.1,0,18.7-10,18.7-18.7 c0-0.3,0-0.6,0-0.8C30,8.5,31.1,7.4,32,6.1z"></path></g></svg>
                </a>
              </li>
            @endif

            @if(!is_null($user->users_setting->facebook_link))
              <li>
                <a href="{{ $user->users_setting->facebook_link }}" class="author__social">
                  <svg class="icon" viewBox="0 0 32 32"><title>Follow the author on Facebook</title><path d="M32,16A16,16,0,1,0,13.5,31.806V20.625H9.438V16H13.5V12.475c0-4.01,2.389-6.225,6.043-6.225a24.644,24.644,0,0,1,3.582.312V10.5H21.107A2.312,2.312,0,0,0,18.5,13v3h4.438l-.71,4.625H18.5V31.806A16,16,0,0,0,32,16Z"></path></svg>
                </a>
              </li>
            @endif

            @if(!is_null($user->users_setting->instagram_link))
              <li>
                <a href="{{ $user->users_setting->instagram_link }}" class="author__social">
                  <svg class="icon" viewBox="0 0 32 32"><title>Follow the author on Instagram</title><path d="M16,3.7c4,0,4.479.015,6.061.087a6.426,6.426,0,0,1,4.51,1.639,6.426,6.426,0,0,1,1.639,4.51C28.282,11.521,28.3,12,28.3,16s-.015,4.479-.087,6.061a6.426,6.426,0,0,1-1.639,4.51,6.425,6.425,0,0,1-4.51,1.639c-1.582.072-2.056.087-6.061.087s-4.479-.015-6.061-.087a6.426,6.426,0,0,1-4.51-1.639,6.425,6.425,0,0,1-1.639-4.51C3.718,20.479,3.7,20.005,3.7,16s.015-4.479.087-6.061a6.426,6.426,0,0,1,1.639-4.51A6.426,6.426,0,0,1,9.939,3.79C11.521,3.718,12,3.7,16,3.7M16,1c-4.073,0-4.584.017-6.185.09a8.974,8.974,0,0,0-6.3,2.427,8.971,8.971,0,0,0-2.427,6.3C1.017,11.416,1,11.927,1,16s.017,4.584.09,6.185a8.974,8.974,0,0,0,2.427,6.3,8.971,8.971,0,0,0,6.3,2.427c1.6.073,2.112.09,6.185.09s4.584-.017,6.185-.09a8.974,8.974,0,0,0,6.3-2.427,8.971,8.971,0,0,0,2.427-6.3c.073-1.6.09-2.112.09-6.185s-.017-4.584-.09-6.185a8.974,8.974,0,0,0-2.427-6.3,8.971,8.971,0,0,0-6.3-2.427C20.584,1.017,20.073,1,16,1Z"></path><path d="M16,8.3A7.7,7.7,0,1,0,23.7,16,7.7,7.7,0,0,0,16,8.3ZM16,21a5,5,0,1,1,5-5A5,5,0,0,1,16,21Z"></path><circle cx="24.007" cy="7.993" r="1.8"></circle></svg>
                </a>
              </li>
            @endif
          </ul>
        @endif
      @endif

    </div>
  </div>
</section>