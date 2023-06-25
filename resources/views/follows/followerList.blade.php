@extends('layouts.login')

@section('content')

<!-- フォローされている人のアイコン一覧 -->
<div class="">
  <!-- タイトル -->
  <h2>Follower List</h2>
  @foreach ($followers as $follower)
  <ul>
    <li>
      <!-- アイコンひとまとめ -->
      <div class="follower_icon"><img src="{{ asset('storage/'.$follower->images) }}" alt="フォローアイコン"></div>
    </li>
  </ul>
  @endforeach

</div>

@endsection
