@extends('layouts.application')
@section('title', 'post.index')

@section('content')
<div class="basic-page">
  <div class="col-sm-6 col-sm-offset-3 col-xs-12">
    @foreach ($posts as $post)
      <p>{{ $post->id }}. {{ $post->content }}</p>
    @endforeach
  </div>
</div>
@endsection
