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
      <img src="/storage/users/{{ $user->image }}" onerror="this.src='/storage/no_image.jpg'" class="image card-img-top" width="100%" height="100%"/>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">@ {{ $user->name }}</li>
        <li class="list-group-item">投稿 {{ count($user->posts) }}件</li>
      </ul>
    </div>
  </div>
  <div class="col-lg-7">
    @include('posts.cards_index', ['posts' => $posts])
  </div>
</div>
@endsection
