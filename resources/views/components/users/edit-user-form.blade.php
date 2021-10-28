    <div class="alert js-alert margin-bottom-lg" role="alert"> <!-- /.alert--is-visible -->
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <svg aria-hidden="true" class="icon margin-right-xxxs" viewBox="0 0 32 32" ><title>info icon</title><g><path d="M16,0C7.178,0,0,7.178,0,16s7.178,16,16,16s16-7.178,16-16S24.822,0,16,0z M18,7c1.105,0,2,0.895,2,2 s-0.895,2-2,2s-2-0.895-2-2S16.895,7,18,7z M19.763,24.046C17.944,24.762,17.413,25,16.245,25c-0.954,0-1.696-0.233-2.225-0.698 c-1.045-0.92-0.869-2.248-0.542-3.608l0.984-3.483c0.19-0.717,0.575-2.182,0.036-2.696c-0.539-0.514-1.794-0.189-2.524,0.083 l0.263-1.073c1.054-0.429,2.386-0.954,3.523-0.954c1.71,0,2.961,0.855,2.961,2.469c0,0.151-0.018,0.417-0.053,0.799 c-0.066,0.701-0.086,0.655-1.178,4.521c-0.122,0.425-0.311,1.328-0.311,1.765c0,1.683,1.957,1.267,2.847,0.847L19.763,24.046z"></path></g></svg>
          <div class="alert-message"></div><!-- /.alert-message -->
        </div>
      </div>
    </div>

    <div class="margin-bottom-sm">
      <input class="form-control width-100%" type="text" name="name" id="name" value="{{$user->name}}" @error('name') aria-invalid="true" @enderror placeholder="Name">
      <div role="alert" class="form-error-msg"></div> <!-- /.form-error-msg--is-visible -->
    </div>

    <div class="margin-bottom-sm">
      <input class="form-control width-100%" type="email" name="email" id="email" value="{{$user->email}}" placeholder="email@myemail.com" @error('email') aria-invalid="true" @enderror>
      <div role="alert" class="form-error-msg"></div> <!-- /.form-error-msg--is-visible -->
    </div>

    <div class="margin-bottom-sm">
      <input class="form-control width-100%" type="text" name="username" id="username" value="{{$user->username}}" @error('username') aria-invalid="true" @enderror placeholder="Username">
      <div role="alert" class="form-error-msg"></div> <!-- /.form-error-msg--is-visible -->
    </div>

    <div class="margin-bottom-sm">
      <label class="form-label margin-bottom-xxxs" for="role">Select role</label>
      <div class="select">
        <select class="select__input form-control" name="role" id="role" @if(auth()->user()->id == $user->id) disabled @endif>
          @php
            foreach($roles as $role){
              $permission = ($user->permission == 0) ? $user->previous_permission : $user->permission;
          @endphp
            <option value="{{$role->key}}" @if($permission === $role->permission) selected @endif>{{$role->name}}</option>
          @php
            }
          @endphp
        </select>

        <svg class="icon select__icon" aria-hidden="true" viewBox="0 0 16 16"><g stroke-width="1" stroke="currentColor"><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="15.5,4.5 8,12 0.5,4.5 "></polyline></g></svg>
      </div><!-- /.select -->
      @if(auth()->user()->id == $user->id)
        <p class="text-xs color-contrast-medium margin-top-xxs">You cannot change your role while logged in.</p>
      @endif
    </div>

    <div class="margin-bottom-sm">
      <textarea class="form-control width-100%" type="text" name="bio" id="bio" @error('bio') aria-invalid="true" @enderror placeholder="Bio (optional)">{{ ($user->users_setting) ? $user->users_setting->bio : '' }}</textarea>
      <div role="alert" class="form-error-msg"></div>
    </div>

    <div class="margin-bottom-sm">
      <input class="form-control width-100%" type="text" name="twitter_link" id="twitterLink" value="{{ ($user->users_setting) ? $user->users_setting->twitter_link : '' }}" @error('twitter_link') aria-invalid="true" @enderror placeholder="Twitter link (optional)">
      <div role="alert" class="form-error-msg"></div> <!-- /.form-error-msg--is-visible -->
    </div>

    <div class="margin-bottom-sm">
      <input class="form-control width-100%" type="text" name="facebook_link" id="facebookLink" value="{{ ($user->users_setting) ? $user->users_setting->facebook_link : '' }}" @error('facebook_link') aria-invalid="true" @enderror placeholder="Facebook link (optional)">
      <div role="alert" class="form-error-msg"></div> <!-- /.form-error-msg--is-visible -->
    </div>

    <div class="margin-bottom-sm">
      <input class="form-control width-100%" type="text" name="instagram_link" id="instagramLink" value="{{ ($user->users_setting) ? $user->users_setting->instagram_link : '' }}" @error('instagram_link') aria-invalid="true" @enderror placeholder="Instagram link (optional)">
      <div role="alert" class="form-error-msg"></div> <!-- /.form-error-msg--is-visible -->
    </div>

    <input type="hidden" class="user-id" value="{{ $user->id }}">
    <input type="hidden" class="input-user-cover-photo" value="{{ $user->getCoverPhoto() }}">
    <input type="hidden" class="input-has-cover-photo" value="{{ $user->hasCoverPhoto() }}">
    <input type="hidden" @if($user->hasAvatar()) value="{{ $user->getAvatar() }}" @endif class="input-user-avatar" data-avatar="{{ $user->users_setting ? $user->users_setting->avatar : '' }}">
