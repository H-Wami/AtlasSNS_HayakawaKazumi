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
          <!-- アイコン画像仮置き -->
          <div class="post_content1">
            <li class="post_icon"><img src="images/icon1.png" alt="投稿者アイコン"></li>
          </div>
          <div class="post_content2">
            <div class="post_info">
              <li class="post_name">{{ $post->user->username }}</li>
              <li class="post_time">{{ $post->created_at }}</li>
            </div>
            <li class="new_post">{{ $post->post }}</li>
          </div>
          <!-- 削除ボタン -->
          <li class="delete_btn"><a href="/post/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
              <img src="images/trash.png" alt="削除ボタン削除後">
              <img src="images/trash-h.png" alt="削除ボタン削除前">
            </a>
          </li>
        </ul>
        @endforeach
      </div>
    </li>
  </ul>
</div>

@endsection
