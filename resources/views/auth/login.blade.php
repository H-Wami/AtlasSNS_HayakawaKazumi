@extends('layouts.logout')

@section('content')

<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}

<p class="caption">AtlasSNSへようこそ</p>

{{ Form::label('mail address') }}
{{ Form::text('mail',null,['class' => 'input_form']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input_form']) }}

<div class="btn_content">
{{ Form::submit('LOGIN',['class' => 'btn btn-danger']) }}
</div>

<p class="page_transition"><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
