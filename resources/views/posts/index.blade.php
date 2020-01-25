@extends('layouts.app')
@section('title', '投稿一覧')

@section('content')
<div class="row">
  <div class="col-sm-8 offset-sm-2 col-xs-12">
    <div class="my-4">
      @foreach ($posts as $post)
        <a href="{{ route('posts.show', ['post' => $post]) }}" class="card mb-4">
          <div class="card-header row mx-0">
            <h4 class="card-title col-auto mb-0 mr-auto pl-0">{{ $post->title }}</h4>
            <span class="col-auto">@ {{ $post->user->name }}</span>
          </div>
          <div class="card-body">
            <p class="card-text">
              {{ $post->content }}
            </p>
          </div>
          <div class="card-footer row mx-0 pl-0">
            <span class="col-auto mr-auto">
              投稿日時 {{ $post->created_at->format('Y/m/d H:i') }}
            </span>
            <div class="col-auto btn btn-primary btn-sm">
              コメント
              <span class="badge badge-light text-right">
                {{  $post->comments->count() }}件
              </span>
            </div>
          </div>
        </a>
      @endforeach
      <div class="d-flex justify-content-center mb-5">
        {{ $posts->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
