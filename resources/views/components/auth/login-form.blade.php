<form action="{{ route('login') }}" method="POST" class="cd-signin-modal__form" id="login-form">@csrf
  <div class="newsletter-card__feedback newsletter-card__feedback--success margin-top-sm" role="alert"> <!-- /.newsletter-card__feedback--is-visible -->
    Success!
  </div><!-- /.newsletter-card__feedback -->
  <p class="cd-signin-modal__fieldset">
    <label
      class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace"
      for="signin-email"
      >E-mail</label
    >
    <input
      class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border"
      id="signin-email"
      name="email"
      type="email"
      placeholder="E-mail"
    />
    <span class="cd-signin-modal__error">Error message here!</span>
  </p>

  <p class="cd-signin-modal__fieldset">
    <label
      class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace"
      for="signin-password"
      >Password</label
    >
    <input
      class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border"
      id="signin-password"
      name="password"
      type="text"
      placeholder="Password"
    />
    <span class="cd-signin-modal__error">Error message here!</span>
    <a
      href="#0"
      class="cd-signin-modal__hide-password js-hide-password"
      >Hide</a
    >
    <span class="cd-signin-modal__error">Error message here!</span>
  </p>

  <p class="cd-signin-modal__fieldset">
    <input
      type="checkbox"
      id="remember-me"
      name="remember"
      checked
      class="cd-signin-modal__input"
    />
    <label for="remember-me">Remember me</label>
  </p>

  <p class="cd-signin-modal__fieldset">
    <input
      class="cd-signin-modal__input cd-signin-modal__input--full-width"
      type="submit"
      value="Login"
    />
  </p>
</form>
