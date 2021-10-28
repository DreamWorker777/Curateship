@guest
<script>
  (function(){
    console.log('signin script2');
    // toggle hide/ show password
    // use this only on dynamically loaded content
    // remove this block of code when not using dynamically loaded content
    $(document).on('click', '.js-hide-password', function(e) {
      e.preventDefault();
      var $this = $(this);
      var text = $this.text();
      var password = $this.siblings('input');

      "password" == password.attr("type")
            ? password.attr("type", "text")
            : password.attr("type", "password");

      $this.text(text == "Hide" ? "Show" : "Hide");
    });
    // toggle hide/ show password

    // event handler for clicking any trigger for modal forms
    $(document).on('click', '[data-signin]', function () {
      var $selector = null;
      var $this = $(this);
      var type = $this.data('signin');

      switch (type) {
        case 'login':
          $selector = $('#ajax-signin-form');
          break;
        case 'signup':
          $selector = $('#ajax-signup-form');
          break;
        case 'reset':
          $selector = $('#ajax-resetpassword-form');
          break;
        default:
          return;
          break;
      }
      showDynamicView($selector);
    });

    // watch for keydown
    $(document).on('keydown', function(event){
      // check if pressed on ESC key
      if (event.which === 27) {
        resetForms();
      }
    });

    // reset form when modal is clicked
    $(document).on('click', '.js-signin-modal', function(event){
      // if not the modal, then just do nothing
      if (event.target !== this){
        return;
      }
      // else reset forms
      resetForms();

      // remove hash when the modal closes
      // eg. `/#login`
      history.pushState("", document.title, window.location.pathname + window.location.search);
    });

    // resets form inputs, feedbacks, input errors
    function resetForms(){
      $('form').trigger('reset');
      $('.newsletter-card__feedback').removeClass('newsletter-card__feedback--is-visible');
      $('.cd-signin-modal__error').removeClass('cd-signin-modal__error--is-visible');
      $('input').removeClass('cd-signin-modal__input--has-error');
    }

    // show dynamic view like forms
    function showDynamicView($element) {
      var loaded = $element.data('loaded');
      var url = $element.data('url');

      // if true, don't reload
      if (loaded == 'true') {
        return;
      }

      $element.load( url, function(response, status, xhr) {
        var $this = $(this);
        $this.removeClass('custom-ajax-frame-loader');
      });
      $element.data('loaded', 'true');

    }

    // Check hash value if `login`
    // Then show Sign in modal
    if (location.hash.substr(1) == 'login') {
      $('[data-signin="login"]')[0].click();
    }

  })();

  (function () {
    // login form
    $(document).on('submit', '#login-form', function(e){
      e.preventDefault();
      var $this = $(this);
      var url = $this.attr('action');
      var method = $this.attr('method');

      var email = $('#signin-email').val();
      var password = $('#signin-password').val();
      var remember = $('#remember-me').val();

      var $feedback = $this.find('.newsletter-card__feedback');

      $.ajax({
        url: url,
        type: method,
        dataType: 'JSON',
        data: $this.serialize(),
        success:function(response){
          // console.log(response);

          if (response.status === 'success') {
            $feedback.removeClass('newsletter-card__feedback--error').addClass('newsletter-card__feedback--success newsletter-card__feedback--is-visible').html('<strong>Success!</strong> ' + response.message);

            // reset
            $this[0].reset();
            $('.cd-signin-modal__error').removeClass('cd-signin-modal__error--is-visible');
            $('input').removeClass('cd-signin-modal__input--has-error');

            // redirect
            window.location.replace(response.data.redirect_url);
          }else{
            $feedback.removeClass('newsletter-card__feedback--success').addClass('newsletter-card__feedback--error newsletter-card__feedback--is-visible').html(response.message);

            $('.cd-signin-modal__error').removeClass('cd-signin-modal__error--is-visible');
            $('input').removeClass('cd-signin-modal__input--has-error');
          }
        },
        error: function(response){
          console.log(response.responseText);
          var jsonResponse = response.responseJSON;
          var errors = jsonResponse.errors;
          var errorsHTML = '';

          console.log('ERROR', response.responseText);

          $('.cd-signin-modal__error').removeClass('cd-signin-modal__error--is-visible');
          $('input').removeClass('cd-signin-modal__input--has-error');

          $.each( errors, function( key, value ) {
            errorsHTML += value[0] + '</br>';

            $('#signin-'+key).addClass('cd-signin-modal__input--has-error');

            $('#signin-'+key+' + .cd-signin-modal__error').addClass('cd-signin-modal__error--is-visible').html(value[0]);

          });

        }
        });
    });
  })();

  (function(){
    // registration form
    $(document).on('submit', '#sign-up-form', function(e){
      e.preventDefault();
      var $this = $(this);
      var url = $this.attr('action');
      var method = $this.attr('method');

      var username = $('#username').val();
      var email = $('#email').val();
      var full_name = $('#full_name').val();
      var password = $('#password').val();
      var password_confirmation = $('#password_confirmation').val();
      var terms = $('#terms').val();

      var $feedback = $this.find('.newsletter-card__feedback');

      $('.btn-register').val("Registering...");

      $.ajax({
        url: url,
        type: method,
        dataType: 'JSON',
        data: $this.serialize(),
        success:function(response){
          // console.log(response);
          $('.btn-register').val("Create account");

          if (response.status === 'success') {
            $feedback.removeClass('newsletter-card__feedback--error').addClass('newsletter-card__feedback--success newsletter-card__feedback--is-visible').html('<strong>Success!</strong> ' + response.message);

            // reset
            $this[0].reset();
            $('.cd-signin-modal__error').removeClass('cd-signin-modal__error--is-visible');
            $('input').removeClass('cd-signin-modal__input--has-error');

            // redirect
            window.location.href = response.data.redirect_to;
          }
        },
        error: function(response){
          $('.btn-register').val("Create account");

          var jsonResponse = response.responseJSON;
          var errors = jsonResponse.errors;
          var errorsHTML = '';

          // console.log(errors);

          $('.cd-signin-modal__error').removeClass('cd-signin-modal__error--is-visible');
          $('input').removeClass('cd-signin-modal__input--has-error');

          $.each( errors, function( key, value ) {
            errorsHTML += value[0] + '</br>';

            if (key === 'terms') {
              $feedback.removeClass('newsletter-card__feedback--success').addClass('newsletter-card__feedback--error newsletter-card__feedback--is-visible').html('<strong>Error</strong> </br>'+ value[0]);
            }else{
              $('#'+key).addClass('cd-signin-modal__input--has-error');

              $('#'+key+' + .cd-signin-modal__error').addClass('cd-signin-modal__error--is-visible').html(value[0]);
            }

          });

        }
        });
    });
  })();
</script>
@endguest
