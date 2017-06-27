@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <div class="text-center">
            <h1>TaskList to Login</h1>
            {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
@endsection
