@extends('layouts.app')
@section('title', '投稿一覧')

@section('content')
<div class="row my-4">
  <div class="col-sm-8 offset-sm-2 col-xs-12">
    @include('posts.cards_index', ['posts' => $posts])
  </div>
</div>
@endsection
