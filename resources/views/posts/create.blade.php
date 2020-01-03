@extends('layouts.app')
@section('title', '新規投稿')

@section('content')
<div class="row">
  <div class="col-sm-8 offset-sm-2 col-xs-12 border p-4 bg-white">
    <h1 class="h2 mb-5">新規投稿作成</h1>
    <form method="POST" action="{{ route('posts.store') }}">
      @csrf
      @include('posts.form')
    </form>
  </div>
</div>
@endsection
