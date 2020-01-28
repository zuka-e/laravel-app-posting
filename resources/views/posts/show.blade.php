@extends('layouts.app')
@section('title', $post->title)

@section('content')
<div class="row my-4">
  <div class="col-md-8 offset-md-2 col-12">
    <div class="border rounded p-4 bg-white">
      <div class="row mb-2">
        <span class="col-auto mr-auto">@ {{ $post->user->name }}</span>
        <time class="col-auto text-secondary">{{ $post->updated_at->format('Y/m/d H:i') }}</time>
      </div>
      <div class="row mb-4">
        <h2 class="col-auto mr-auto">{{ $post->title }}</h2>
        <span class="col-auto text-secondary">{{ $post->created_at !== $post->updated_at ? '( 編集済 )' : ''}}</span>
      </div>
      <p class="mb-5">{{ $post->content }}</p>
      @include('shared.edit_destroy',['column' => 'post', 'val' => $post])
      <section>
        <h4 class="mb-4">コメント</h4>
          @forelse($post->comments as $comment)
            <div class="border-top pt-4 pb-2">
              <div class="row mx-0">
                <span class="col-auto mr-auto">{{ $comment->user->name }}</span>
                <time class="col-auto text-secondary">{{ $comment->updated_at->format('Y/m/d H:i') }}</time>
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
