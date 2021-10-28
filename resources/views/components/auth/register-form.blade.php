<form action="{{ route('register') }}" method="POST" class="cd-signin-modal__form" id="sign-up-form">@csrf
  <div class="newsletter-card__feedback newsletter-card__feedback--success margin-top-sm" role="alert"> <!-- /.newsletter-card__feedback--is-visible -->
    Success!
  </div><!-- /.newsletter-card__feedback -->
  <p class="cd-signin-modal__fieldset">
    <label
      class="cd-signin-modal__label cd-signin-modal__label--username cd-signin-modal__label--image-replace"
      for="username"
      >Username</label
    >
    <input
      class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border"
      id="username"
      name="username"
      type="text"
      placeholder="Username"
    />
    <span class="cd-signin-modal__error">Error message here!</span>
  </p>

  <p class="cd-signin-modal__fieldset">
    <label
      class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace"
      for="email"
      >E-mail</label
    >
    <input
      class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border"
      id="email"
      name="email"
      type="email"
      placeholder="E-mail"
    />
    <span class="cd-signin-modal__error">Error message here!</span>
  </p>
  @if (!empty($settings_data['reg_en_fullname']) && $settings_data['reg_en_fullname'] === 'on')
  <p class="cd-signin-modal__fieldset">
    <label
      class="cd-signin-modal__label cd-signin-modal__label--username cd-signin-modal__label--image-replace"
      for="full_name"
      >Full name</label
    >
    <input
      class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border"
      id="full_name"
      name="full_name"
      type="text"
      placeholder="Full name"
    />
    <span class="cd-signin-modal__error">Error message here!</span>
  </p>
  @endif

  <p class="cd-signin-modal__fieldset">
    <label
      class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace"
      for="password"
      >Password</label
    >
    <input
      class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border"
      id="password"
      name="password"
      type="text"
      placeholder="Password"
    />
    <span class="cd-signin-modal__error">Error message here!</span>
    <a
      href="#0"
      class="cd-signin-modal__hide-password js-hide-password" tabindex="-1"
      >Hide</a
    >
    <span class="cd-signin-modal__error">Error message here!</span>
  </p>

  <p class="cd-signin-modal__fieldset">
    <label
      class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace"
      for="password_confirmation"
      >Retype password</label
    >
    <input
      class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border"
      id="password_confirmation"
      name="password_confirmation"
      type="text"
      placeholder="Retype password"
    />
    <span class="cd-signin-modal__error">Error message here!</span>
    <a
      href="#0"
      class="cd-signin-modal__hide-password js-hide-password" tabindex="-1"
      >Hide</a
    >
    <span class="cd-signin-modal__error">Error message here!</span>
  </p>

  <p class="cd-signin-modal__fieldset">
    <input
      type="checkbox"
      id="terms"
      name="terms"
      class="cd-signin-modal__input"
    />
    <label for="terms"
      >I agree to the <a href="#0" tabindex="-1">Terms</a></label
    >
  </p>

  <p class="cd-signin-modal__fieldset">
    <input
      class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding btn-register"
      type="submit"
      value="Create account"
    />
  </p>
</form>
