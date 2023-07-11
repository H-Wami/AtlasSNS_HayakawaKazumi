@extends('layouts.login')

@section('content')

<!-- バリデーションメッセージ -->
@if ($errors->any())
<div class="profile_update_error">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

@foreach ($users as $user)
<!-- もしユーザーIDがログインユーザーIDと一致していたら -->
@if($user->id === Auth::user()->id)
<!-- ログインユーザープロフィール -->
<div class="login_user_profile">
  <!-- アイコン画像 -->
  <div class="login_profile_icon">
    <img src="{{ asset('storage/'.Auth::user()->images) }}" alt="プロフィールアイコン">
  </div>
  <!-- フォームひとまとめ -->
  <div class="profile_form_contents">
    <form action="/user/update" method="post" enctype="multipart/form-data" class="">
      @csrf
      <!-- ユーザー名 -->
      <div class="text_form_contents">
        <label for="user name">user name</label>
        <input type="text" name="username" value="{{ $user->username }}" class="text_form">
      </div>
      <!-- メールアドレス -->
      <div class="text_form_contents">
        <label for="mail address">mail address</label>
        <input type="text" name="mail" value="{{ $user->mail }}" class="text_form">
      </div>
      <!-- パスワード -->
      <div class="text_form_contents">
        <label for="password">password</label>
        <input type="password" name="password" class="text_form">
      </div>
      <!-- パスワード確認用 -->
      <div class="text_form_contents">
        <label for="password confirm">password confirm</label>
        <input type="password" name="password_confirmation" class="text_form">
      </div>
      <!-- 自己紹介文 -->
      <div class="text_form_contents">
        <label for="bio">bio</label>
        <input type="text" name="bio" value="{{ $user->bio }}" class="text_form">
      </div>
      <!-- アイコン用画像アップロード -->
      <div class="images_form_contents">
        <label for="icon image">icon image</label>
        <div class="images_form_container">
          <label class="images_form">
            <input type="file" name="images" accept="image/jpeg,image/png,image/bmp,image/gif,image/svg+xml" class="images_form_inside">
          ファイルを選択</label>
        </div>
      </div>
      <!-- 更新実行ボタン -->
      <div class="profile_update_btn">
        <input type="submit" value="更新" class="btn btn-danger w-25">
      </div>
    </form>
  </div>
</div>



<!-- 一致していなかったら(ログインユーザー以外) -->
@else
<!-- ログインユーザー以外のプロフィール -->
<div class="user_profile">
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
            <div class="post_icon"><img src="{{ asset('storage/'.$post->user->images) }}" alt="投稿者アイコン"></a></div>
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
@endif
@endforeach
@endsection
