@extends('layouts.app')
@section('title', '新規投稿')

@section('content')
<div class="row">
  <div class="col-sm-8 offset-sm-2 col-xs-12 border p-4 bg-white">
    <h1 class="h2 mb-5">新規投稿作成</h1>
    <form method="POST" action="{{ route('posts.store') }}">
      @csrf
      <div class="form-group">
        <label for="title">タイトル</label>
        <input type="text" name="title" id="title"
        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}">
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
        >{{ old('content') }}</textarea>
        @if ($errors->has('content'))
          <div class="invalid-feedback">
            {{ $errors->first('content') }}
          </div>
        @endif
      </div>

      <div class="mt-5">
        <a class="btn btn-secondary" href="{{ route('posts.index') }}">
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
