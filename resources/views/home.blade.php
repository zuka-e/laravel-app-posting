@extends('layouts.app')
@section('title', 'HOME')

@section('content')
<div class="row my-4">
  @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
  @endif
  <div class="col-lg-3 d-none d-lg-block">
    <div class="card mb-4">
      @guest
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <a class="btn btn-primary btn-block" href="{{ route('login') }}">{{ __('ログイン') }}</a>
          </li>
          <li class="list-group-item">
            <a class="btn btn-success btn-block" href="{{ route('register') }}">{{ __('新規登録') }}</a>
          </li>
        </ul>
      @else
      <img src="@if(App::environment('production')){{ env('AWS_URL') }}@else /storage/users/@endif{{ $user->image }}"
      onerror="this.src='{{ asset('/img/no_image.jpg') }}'" class="image card-img-top" width="100%" height="100%"/>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">@ {{ $user->name }}</li>
        <li class="list-group-item">投稿 {{ count($user->posts) }}件</li>
      </ul>
      @endguest
    </div>
  </div>
  <div class="col-lg-7">
    @include('posts.cards_index', ['posts' => $posts])
  </div>
</div>
@endsection
