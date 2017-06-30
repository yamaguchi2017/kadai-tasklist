@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <?php $user = Auth::user(); ?>
        @include('tasks.index', ['tasks' => $tasks])
    @else
        <div class="jumbotron">
            <div class="text-center">
                <h1>TaskList to Login</h1>
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection
