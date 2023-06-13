@extends('layouts.login')

@section('content')

<!-- バリデーションメッセージ -->
@if ($errors->any())
<div class="post_create_error">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<!-- 投稿フォーム -->
<div class="post_form">
  <!-- アイコン画像仮置き -->
  <div class="icon">
    <img src="images/icon1.png">
  </div>
  <!-- 入力フォーム -->
  <!-- <form action="/create" method="post"> -->
  {!! Form::open(['url' => 'post/create']) !!}
  <textarea name="newPost" placeholder="投稿内容を入力してください。"></textarea>
  <!-- 投稿ボタン -->
  <input type="image" src="images/post.png" class="post_btn" alt="投稿ボタン">
  {!! Form::close() !!}
  <!-- </form> -->
</div>

<!-- 投稿の表示 -->
<div class="post_display">
  <ul>
    <li class="post_block">
      <!-- 投稿ひとまとめ -->
      <div class="post_contents">
        @foreach ($posts as $post)
        <ul>
          <!-- 左端のまとまり -->
          <li class="left_post_content">
            <!-- アイコン画像仮置き -->
            <div class="post_icon"><img src="images/icon1.png" alt="投稿者アイコン"></div>
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
            @if($post->user->username === Auth::user()->username)
            <!-- ボタンのまとまり -->
            <div class="btn_post_content">
              <!-- 編集ボタン -->
              <div class="update_btn"><a href="">
                  <img src="images/edit.png" alt="編集ボタン">
                </a>
              </div>
              <!-- 削除ボタン -->
              <div class="delete_btn"><a href="/post/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
                  <img src="images/trash.png" alt="削除ボタン削除後">
                  <img src="images/trash-h.png" alt="削除ボタン削除前">
                </a>
              </div>
            </div>
            @endif
          </li>
        </ul>
        @endforeach
      </div>
    </li>
  </ul>
</div>

@endsection
