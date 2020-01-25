@extends('layouts.app')
@section('title', $post->title)

@section('content')
<div class="row">
  <div class="col-sm-8 offset-sm-2 col-xs-12">
    <div class="border p-4 bg-white">
      <h2 class="mb-4">{{ $post->title }}</h2>
      <p class="mb-5">{{ $post->content }}</p>
      @include('shared.edit_destroy',['column' => 'post', 'val' => $post])
      <section>
        <h4 class="mb-4">コメント</h4>
          @forelse($post->comments as $comment)
            <div class="border-top pt-4 pb-2">
              <div class="row mx-0">
                <span class="col-auto mr-auto">{{ $comment->user->name }}</span>
                <time class="col-auto text-secondary">{{ $comment->created_at->format('Y.m.d H:i') }}</time>
              </div>
              <p class="border p-2 mt-2">{{ $comment->content }}</p>
            </div>
            @include('shared.edit_destroy',['column' => 'comment', 'val' => $comment])
            @empty
              <p>コメントはまだありません。</p>
          @endforelse
          <form class="mb-4" method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" value="{{ $post->id }}" name="post_id">
            <div class="form-group">
              <label for="content">本文</label>
              <textarea name="content" rows="4" id="content"
              class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}">
                {{ old('content') }}
              </textarea>
              @if ($errors->has('content'))
                <div class="invalid-feedback">
                  {{ $errors->first('content') }}
                </div>
              @endif
            </div>
            <div class="mt-4">
              @auth
                <button type="submit" class="btn btn-primary">投稿</button>
              @else
                <a class="btn btn-dark" href="{{ route('login') }}">ログイン</a>
              @endauth
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
</div>
@endsection
