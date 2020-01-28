@extends('layouts.app')
@section('title', '新規投稿')

@section('content')
<div class="row my-4">
  <div class="col-md-8 offset-md-2 col-12 border p-4 bg-white">
    <h1 class="h2 mb-5">新規投稿作成</h1>
    <form method="POST" action="{{ route('posts.store') }}">
      @csrf
      @include('posts.form')
    </form>
  </div>
</div>
@endsection
