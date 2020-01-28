@extends('layouts.app')
@section('title', '投稿一覧')

@section('content')
<div class="row my-4">
  <div class="col-md-8 offset-md-2 col-12">
    @include('posts.cards_index', ['posts' => $posts])
  </div>
</div>
@endsection
