@extends('layouts.app')
@section('title', '新規登録')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8 offset-md-2 col-12">
    <div class="card">
      <div class="card-header">{{ __('ユーザ登録') }}</div>
      <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            @include('users.form',['user' => new App\Models\User(),'submit' => '登録'])
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
