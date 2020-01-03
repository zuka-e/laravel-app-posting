@extends('layouts.app')
@section('title', $user->name)

@section('content')
<div class="row">
  <div class="col-sm-8 offset-sm-2 col-xs-12">
    <div class="card">
      <div class="card-header">{{ __('登録情報') }}</div>
      <div class="card-body">
        <form method="POST" action="{{ route('users.update', ['user' => $user ]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group row">
          <img src="/storage/users/{{ $user->image }}" class="image col-sm-4"/>
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

        <div class="form-group row mt-5">
          <div class="col-sm-12 text-sm-right">
            <button type="submit" class="btn btn-success">
              {{ __('更新') }}
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
