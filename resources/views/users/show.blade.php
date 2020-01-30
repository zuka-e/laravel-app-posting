@extends('layouts.app')
@section('title', $user->name)

@section('content')
<div class="row my-4">
  <div class="col-lg-3 d-lg-block">
    <div class="card mb-4">
      <img src="@if(App::environment('production')){{ env('AWS_URL') }}@else /storage/users/@endif{{ $user->image }}"
      onerror="this.src='{{ asset('/img/no_image.jpg') }}'" class="image col-md-4"/>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">@ {{ $user->name }}</li>
        <li class="list-group-item">投稿 {{ count($user->posts) }}件</li>
      </ul>
      @can('update', $user)
        <div class="card-footer">
          <a class="btn btn-primary btn-block" href="{{ route('users.edit', ['user' => $user]) }}">編集</a>
        </div>
      @endcan
    </div>
  </div>
  <div class="col-lg-7">
    @include('posts.cards_index', ['posts' => $user->posts()->orderBy('updated_at', 'desc')->paginate(20)])
  </div>
</div>
@endsection
