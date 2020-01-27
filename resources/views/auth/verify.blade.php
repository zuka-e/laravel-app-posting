@extends('layouts.app')
@section('title', '登録はまだ完了しておりません')

@section('content')
<div class="container">
  <div class="row my-4">
    <div class="col-sm-8 offset-sm-2 col-xs-12">
      <div class="card">
        <div class="card-header">{{ __('登録はまだ完了しておりません') }}</div>
        <div class="card-body">
          @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('認証用メールが送信されました') }}
            </div>
          @endif
          {{ __('ご利用いただく前に、送信されたメールをご確認ください。') }}
          {{ __('') }}
          <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('クリックして再度メールを受け取る') }}</button>.
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
