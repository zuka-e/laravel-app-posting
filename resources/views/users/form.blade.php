<div class="form-group row">
  <img src="/storage/users/{{ $user->image }}" onerror="this.src='/storage/no_image.jpg'" class="image col-sm-4"/>
  <input type="file" id="image" name="image" class="col-sm-12 my-1"/>
  @error('image')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror
</div>

<div class="form-group row">
  <label for="name" class="col-sm-12 col-form-label text-sm-left">{{ __('ユーザ名') }}</label>
  <div class="col-sm-12">
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
    name="name" value="{{ old('name')?: $user->name }}" required autocomplete="name" autofocus
    />
    @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
</div>

<div class="form-group row">
  <label for="phone_number" class="col-sm-12 col-form-label text-sm-left">{{ __('電話番号') }}</label>
  <div class="col-sm-12">
    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror"
    name="phone_number" value="{{ old('phone_number')?: $user->phone_number }}" required autocomplete="phone_number"
    />
    @error('phone_number')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
</div>

<div class="form-group row">
  <label for="email" class="col-sm-12 col-form-label text-sm-left">{{ __('メールアドレス') }}</label>
  <div class="col-sm-12">
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
    name="email" value="{{ old('email')?: $user->email }}" required autocomplete="email"
    />
    @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
</div>

<div class="form-group row">
  <label for="password" class="col-sm-12 col-form-label text-sm-left">{{ __('パスワード') }}</label>
  <div class="col-sm-12">
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
    name="password" autocomplete="new-password"
    />
    @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
</div>

<div class="form-group row">
  <label for="password-confirm" class="col-sm-12 col-form-label text-sm-left">{{ __('パスワード確認用') }}</label>
  <div class="col-sm-12">
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
  </div>
</div>

<div class="form-group row mt-5">
  <div class="col-sm-12 text-sm-right">
    <button type="submit" class="btn btn-success">
      {{ __($submit) }}
    </button>
  </div>
</div>
