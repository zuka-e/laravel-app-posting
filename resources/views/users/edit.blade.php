@extends('layouts.app')
@section('title', $user->name)

@section('content')
<div class="row">
  <div class="col-md-8 offset-md-2 col-12">
    <div class="card">
      <div class="card-header">{{ __('登録情報') }}</div>
      <div class="card-body">
        <form method="POST" action="{{ route('users.update', ['user' => $user ]) }}" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          @include('users.form',['submit' => '更新'])
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
