@extends('layouts.app')
@section('title', "$post->title 編集")

@section('content')
<div class="row">
  <div class="col-sm-8 offset-sm-2 col-xs-12 border p-4 bg-white">
    <h1 class="h2 mb-5">投稿編集</h1>
    <form method="POST" action="{{ route('posts.update', ['post' => $post ]) }}">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="title">タイトル</label>
        <input type="text" name="title" id="title"
        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') ?: $post->title }}">
        @if ($errors->has('title'))
          <div class="invalid-feedback">
            {{ $errors->first('title') }}
          </div>
        @endif
      </div>

      <div class="form-group">
        <label for="content">本文</label>
        <textarea name="content" id="content"
            class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"
            rows="15"
        >{{ old('content')?: $post->content }}</textarea>
        @if ($errors->has('content'))
          <div class="invalid-feedback">
            {{ $errors->first('content') }}
          </div>
        @endif
      </div>

      <div class="mt-5">
        <a class="btn btn-secondary" href="{{ route('posts.show', ['post' => $post ]) }}">
          キャンセル
        </a>
        <button type="submit" class="btn btn-primary">
          投稿する
        </button>
      </div>

    </form>
  </div>
</div>
@endsection
