@extends('layouts.app')
@section('title', $user->name)

@section('content')
<div class="row my-4">
  <div class="col-md-8 offset-md-2 col-12">
    <div class="card">
      <div class="card-header">{{ __('登録情報') }}</div>
      <div class="card-body">
        <form method="POST" action="{{ route('users.update', ['user' => $user ]) }}" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="form-group row">
            <label for="image" class="col-md-12 col-form-label text-md-left">{{ __('プロフィール画像') }}</label>
            <img src="@if(App::environment('production')){{ env('AWS_URL') }}@else /storage/users/@endif{{ $user->image }}"
            onerror="this.src='{{ asset('/img/no_image.jpg') }}'" class="image col-md-4"/>
            <div class="col-md-12">
              <input id="image" type="file" class="my-1 @error('image') form-control is-invalid @enderror" name="image"/>
              @error('image')
                <span class="invalid-feedback col-md-12 d-block" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          @include('users.form', ['user' => $user, 'submit' => '更新'])
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
