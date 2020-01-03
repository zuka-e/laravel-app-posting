<div class="form-group">
  <label for="title">タイトル</label>
  <input type="text" name="title" id="title" class="form-control
    {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title')?: $post->title }}"/>
  @if ($errors->has('title'))
    <div class="invalid-feedback">
      {{ $errors->first('title') }}
    </div>
  @endif
</div>

<div class="form-group">
  <label for="content">本文</label>
  <textarea name="content" id="content"
    class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" rows="15">
    {{ old('content')?: $post->content }}
  </textarea>
  @if ($errors->has('content'))
    <div class="invalid-feedback">
      {{ $errors->first('content') }}
    </div>
  @endif
</div>

<div class="mt-5">
  @auth
    <a class="btn btn-secondary" href="{{ route('posts.index') }}">
      キャンセル
    </a>
    <button type="submit" class="btn btn-primary">
      投稿する
    </button>
  @else
    <a class="btn btn-dark" href="{{ route('login') }}">
      ログイン
    </a>
  @endauth
</div>
