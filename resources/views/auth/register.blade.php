@extends('layouts.logout')

@section('content')

<!-- バリデーションメッセージ -->
@if ($errors->any())
<div class="register_error">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}

<h2 class="caption">新規ユーザー登録</h2>

{{ Form::label('user name') }}
{{ Form::text('username',null,['class' => 'input_form']) }}

{{ Form::label('mail address') }}
{{ Form::text('mail',null,['class' => 'input_form']) }}

{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input_form']) }}

{{ Form::label('password confirm') }}
{{ Form::password('password_confirmation',['class' => 'input_form']) }}

<div class="btn_content">
  {{ Form::submit('REGISTER',['class' => 'btn btn-danger']) }}
</div>

<p class="page_transition"><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
