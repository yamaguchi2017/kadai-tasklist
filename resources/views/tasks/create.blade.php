@extends('layouts.app')

@section('content')

    <h1>タスク新規作成ページ</h1>

    {!! Form::model($task, ['route' => 'tasks.store']) !!}

        {!! Form::label('content', 'タスク内容：') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('登録') !!}

    {!! Form::close() !!}

@endsection