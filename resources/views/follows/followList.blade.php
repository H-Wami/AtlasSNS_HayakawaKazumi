@extends('layouts.login')

@section('content')

<!-- フォローしている人のアイコン一覧 -->
<div class="icon_display">
  <!-- タイトル -->
  <h2 class="list_title">Follow List</h2>
  <!-- アイコンひとまとめ -->
  <div class="icon_contents">
    @foreach ($follows as $follow)
    <ul>
      <li>
        <!-- フォローアイコン -->
        <div class="follow_icon"><img src="{{ asset('storage/'.$follow->images) }}" alt="フォローアイコン"></div>
      </li>
    </ul>
    @endforeach
  </div>
</div>

<!-- フォローしている人の投稿の表示 -->
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
            <div class="post_icon"><img src="{{ asset('storage/'.$post->user->images) }}" alt="投稿者アイコン"></div>
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
