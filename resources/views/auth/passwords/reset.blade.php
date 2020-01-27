@extends('layouts.app')
@section('title', 'パスワード再設定')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-8">
      <div class="card">
        <div class="card-header">{{ __('パスワード再設定') }}</div>
        <div class="card-body">
          <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group row">
              <label for="email" class="col-sm-12 col-form-label text-sm-left">{{ __('メールアドレス') }}</label>
              <div class="col-sm-12">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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
                name="password" required autocomplete="new-password">
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
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
            </div>
            <div class="form-group row mt-5">
              <div class="col-sm-12 text-sm-right">
                <button type="submit" class="btn btn-primary">
                  {{ __('変更') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
