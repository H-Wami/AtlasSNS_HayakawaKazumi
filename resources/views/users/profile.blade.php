@extends('layouts.login')

@section('content')

<!-- ログインユーザー以外のプロフィール -->
<div class="user_profile">
  @foreach ($users as $user)
  <!-- アイコン画像 -->
  <div class="profile_icon"><img src="{{ asset('storage/'.$user->images) }}" alt="プロフィールアイコン"></div>
  <div class="profile_text">
    <!-- ユーザー名 -->
    <div class="profile_container">
      <p class="profile_item">name</p>
      <p class="profile_info">{{ $user->username }}</p>
    </div>
    <!-- 自己紹介文 -->
    <div class="profile_container">
      <p class="profile_item">bio</p>
      <p class="profile_info">{{ $user->bio }}</p>
    </div>
  </div>
  <!-- フォロー、フォロー解除ボタン -->
  <div class="profile_btn">
    @if (auth()->user()->isFollowing($user->id))<!-- もしログインユーザーがフォローしていたらフォロー解除ボタンを表示する-->
    <div class="profile_unfollow_btn">
      <button type="button" class="btn btn-danger">
        <a href="/user/{{$user->id}}/unfollow" class="btn-text">フォロー解除</a></button>
    </div>
    @else <!-- フォローしていなかったらフォローボタンを表示する-->
    <div class="profile_follow_btn">
      <form action="/user/{{$user->id}}/follow" method="post">
        @csrf
        <button type="submit" class="btn btn-info">フォローする</button>
      </form>
    </div>
    @endif
  </div>
  @endforeach
</div>

<!-- 特定ユーザーの投稿一覧 -->
<div class="post_display">
  <ul>
    <li class="post_block">
      <!-- 投稿ひとまとめ -->
      <div class="post_contents">
        @foreach ($posts as $post)
        <ul>
          <!-- 左端のまとまり -->
          <li class="left_post_content">
            <!-- アイコン画像 -->
            <div class="post_icon"><a href="/user/{{$post->user->id}}/profile"><img src="{{ asset('storage/'.$post->user->images) }}" alt="投稿者アイコン"></a></div>
          </li>
          <!-- 中心のまとまり -->
          <li class="center_post_content">
            <!-- 投稿者名前 -->
            <div class="post_name">{{ $post->user->username }}</div>
            <!-- つぶやき内容 -->
            <div class="new_post">{{ $post->post }}</div>
          </li>
          <!-- 右端のまとまり -->
          <li class="right_post_content">
            <!-- 投稿時間 -->
            <div class="post_time">{{ $post->created_at }}</div>
          </li>
        </ul>
        @endforeach
      </div>
    </li>
  </ul>
</div>
@endsection
