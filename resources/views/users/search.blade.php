@extends('layouts.login')

@section('content')
<!-- 検索フォーム -->
<div class="search_content">
  <!-- 入力フォーム -->
  <form action="/search" method="post" class="search_form">
    @csrf
    <input type="text" name="keyword" placeholder=" ユーザー名" class="search_text">
    <!-- 検索ボタン -->
    <input type="image" src="images/search.png" class="search_btn" alt="検索ボタン">
  </form>
  <!-- 検索ワード表示 -->
  @if (!empty($keyword))
  <p class="keyword">検索ワード:{{ $keyword }}</p>
  @endif
</div>

<!-- 登録ユーザー表示 -->
<div class="user_display">
  <ul>
    <li class="user_block">
      <!-- ユーザー情報ひとまとめ -->
      <div class="user_contents">
        @foreach ($users as $user)
        <ul>
          <!-- 登録者アイコン -->
          <li class="register_icon">
            <img src="images/{{ $user->images }}" alt="登録者アイコン">
          </li>
          <!-- 登録者名 -->
          <li class="center_user_content">{{ $user->username }}</li>
          <!-- フォロー、フォロー解除ボタン -->
          @if (auth()->user()->isFollowing($user->id))<!-- もしログインユーザーがフォローしていたらフォロー解除ボタンを表示する-->
          <li class="unfollow_btn">
            <button type="button" class="btn btn-danger">
              <a href="/search" class="btn-text">フォロー解除</button></a>
          </li>
          @else <!-- フォローしていなかったらフォローボタンを表示する-->
          <li class="follow_btn"><button type="button" class="btn btn-info">
              <a href="/search" class="btn-text">フォローする</button></a>
          </li>
          @endif
        </ul>
        @endforeach
      </div>
    </li>
  </ul>
</div>

@endsection
