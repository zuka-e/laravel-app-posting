@extends('layouts.app')
@section('title', "$post->title 編集")

@section('content')
<div class="row my-4">
  <div class="col-md-8 offset-md-2 col-12 border p-4 bg-white">
    <h1 class="h2 mb-5">投稿編集</h1>
    <form method="POST" action="{{ route('posts.update', ['post' => $post ]) }}">
      @csrf
      @method('PATCH')
      @include('posts.form')
    </form>
  </div>
</div>
@endsection
