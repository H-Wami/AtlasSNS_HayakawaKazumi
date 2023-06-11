@extends('layouts.login')

@section('content')
<!-- 検索フォーム -->
<div class="search_form">
  <!-- 入力フォーム -->
  <form action="search.blade.php" method="post">
    <input type="text" name="" placeholder=" ユーザー名">
    <!-- 投稿ボタン -->
    <img src="images/search.png" class="search_btn">
  </form>
</div>

@endsection
