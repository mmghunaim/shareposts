@extends('layouts.app')

@section('content')
    @if (Auth::guest())
    <div class="jumbotron text-center">
        <h1>Wellcome to my first laravel app</h1>
        <p> This is just simple laravel app</p>
        <p><a href="login" class="btn btn-primary btn-lg" role="button">Login in</a>
            <a href="register" class="btn btn-success btn-lg" role="button">Register</a>
        </p>     
    </div>
    @else
    <div class="jumbotron text-center">
        <h1>Shared Post Application</h1>
        <p>you register as {{auth()->user()->name}}</p>
    </div>
    @endif
    
@endsection    
    