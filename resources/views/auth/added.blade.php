@extends('layouts.logout')

@section('content')

<!-- 登録したユーザー名表示 -->
<div id="clear">
  <p class="new_login_name">{{ Session::get('username') }}さん</p>
  <p class="welcome_text">ようこそ！AtlasSNSへ</p>
  <p class="added_text">ユーザー登録が完了致しました。</p>
  <p class="added_text">早速ログインをしてみましょう！</p>

  <div class="return_btn">
    <button type="button" class="btn btn-danger"><a href="/login" class="btn-text">ログイン画面へ</a></button>
  </div>
</div>

@endsection
