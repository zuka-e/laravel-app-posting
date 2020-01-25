@extends('layouts.app')
@section('title', $user->name)

@section('content')
<div class="row my-4">
  <div class="col-sm-3 col-xs-12">
    <div class="card mb-4">
      <img src="/storage/users/{{ $user->image }}" onerror="this.src='/storage/no_image.jpg'" class="image card-img-top" width="100%" height="100%"/>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">@ {{ $user->name }}</li>
        <li class="list-group-item">投稿 {{ count($user->posts) }}件</li>
      </ul>
      <div class="card-footer">
        <a class="btn btn-primary btn-block" href="{{ route('users.edit', ['user' => $user]) }}">編集</a>
      </div>
    </div>
  </div>
  <div class="col-sm-7 col-xs-12">
    @include('posts.cards_index', ['posts' => $user->posts()->paginate(20)])
  </div>
</div>
@endsection
