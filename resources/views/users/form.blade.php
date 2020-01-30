<span class="text-danger">* 必須</span>
<div class="form-group row">
  <label for="name" class="col-md-12 col-form-label text-md-left">
    {{ __('ユーザ名 ( 英数字 )') }} <span class="text-danger">*</span>
  </label>
  <div class="col-md-12">
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
  <label for="phone_number" class="col-md-12 col-form-label text-md-left">{{ __('電話番号') }}</label>
  <div class="col-md-12">
    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror"
    name="phone_number" value="{{ old('phone_number')?: $user->phone_number }}" autocomplete="phone_number"
    />
    @error('phone_number')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
</div>

<div class="form-group row">
  <label for="email" class="col-md-12 col-form-label text-md-left">
    {{ __('メールアドレス') }} <span class="text-danger">*</span>
  </label>
  <div class="col-md-12">
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
  <label for="password" class="col-md-12 col-form-label text-md-left">
    {{ __('パスワード ( 8文字以上 )') }} @guest<span class="text-danger">*</span>@endguest
  </label>
  <div class="col-md-12">
    <input id="password" type="password"
    class="form-control @error('password') is-invalid @enderror"
    name="password" @guest required @endguest autocomplete="new-password"
    />
    @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
</div>

<div class="form-group row">
  <label for="password-confirm" class="col-md-12 col-form-label text-md-left">
    {{ __('パスワード確認用') }} @guest<span class="text-danger">*</span>@endguest
  </label>
  <div class="col-md-12">
    <input id="password-confirm" type="password"
    class="form-control" name="password_confirmation" @guest required @endguest autocomplete="new-password">
  </div>
</div>

<div class="form-group row mt-5">
  <div class="col-md-12 text-md-right">
    <button type="submit" class="btn btn-success">
      {{ __($submit) }}
    </button>
  </div>
</div>
