@extends('layouts.app')
@section('title', '403 Forbidden')

@section('content')
  <div class="row">
    <div class="col-md-8 offset-md-2 col-12">
      <div class="border p-4 bg-white text-center">
        <p>お探しのページにアクセスする権限がありません。</p>
        <a href="{{ route('root') }}" class="btn btn-info text-white">
          ホームへ戻る
        </a>
      </div>
    </div>
  </div>
@endsection
