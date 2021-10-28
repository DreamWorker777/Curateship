@guest
<!-- SIGN IN MODAL START -->
  <div class="cd-signin-modal js-signin-modal">
    <!-- this is the entire modal form, including the background -->
    <div class="cd-signin-modal__container">
      <!-- this is the container wrapper -->
      <ul class="cd-signin-modal__switcher js-signin-modal-switcher js-signin-modal-trigger">
        <li>
          <a href="#0" data-signin="login" data-type="login">Sign in</a>
        </li>
        <li>
          <a href="#0" data-signin="signup" data-type="signup">New account</a>
        </li>
      </ul>

      <div class="cd-signin-modal__block js-signin-modal-block" data-type="login">
        <!-- log in form -->
        <div id="ajax-signin-form" class="custom-ajax-frame-loader" data-custom="ajax" data-loaded="false" data-url="{{ route('login.ajax') }}">Loading...</div><!-- /#ajax-signin-form -->
        <p class="cd-signin-modal__bottom-message js-signin-modal-trigger">
          <a href="#0" data-signin="reset">Forgot your password?</a>
        </p>
      </div>
      <!-- cd-signin-modal__block -->

      <div class="cd-signin-modal__block js-signin-modal-block" data-type="signup">
        <!-- sign up form -->
        <div id="ajax-signup-form" class="custom-ajax-frame-loader" data-custom="ajax" data-loaded="false" data-url="{{ route('register.ajax') }}">Loading...</div><!-- /#ajax-signup-form -->
      </div>
      <!-- cd-signin-modal__block -->

      <div class="cd-signin-modal__block js-signin-modal-block" data-type="reset">
        <!-- reset password form -->
        <div id="ajax-resetpassword-form" class="custom-ajax-frame-loader" data-custom="ajax" data-loaded="false" data-url="{{ route('password.reset.ajax') }}">Loading...</div><!-- /#ajax-resetpassword-form -->
        <p class="cd-signin-modal__bottom-message js-signin-modal-trigger">
          <a href="#0" data-signin="login">Back to log-in</a>
        </p>
      </div>
      <!-- cd-signin-modal__block -->

      <a href="#0" class="cd-signin-modal__close js-close">Close</a>
    </div>
    <!-- cd-signin-modal__container -->
  </div>
  <!-- cd-signin-modal -->
<!-- SIGN IN MODAL START -->
@endguest