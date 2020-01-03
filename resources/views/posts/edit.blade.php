@extends('layouts.app')
@section('title', "$post->title 編集")

@section('content')
<div class="row">
  <div class="col-sm-8 offset-sm-2 col-xs-12 border p-4 bg-white">
    <h1 class="h2 mb-5">投稿編集</h1>
    <form method="POST" action="{{ route('posts.update', ['post' => $post ]) }}">
      @csrf
      @method('PATCH')
      @include('posts.form')
    </form>
  </div>
</div>
@endsection
