@extends('layouts.app')

@section('content')
    <a href="{{config('app.path')}}posts" class="btn btn-primary">Go Back</a>
    <br><br>
    <h1>{{$post->title}}</h1>
    <br><br>
    <img src="{{config('app.path')}}storage/images/{{$post->cover_image}}" 
                        alt="this is image" style="width:30%;border-radius:5%;"><br><br>
    <div>
        {{-- {{$post->body}} --}}
        {{-- to parse html tag use double !! --}}
        {!!$post->body!!}
    </div>
    <hr>
    <small>written on {{$post->created_at}}  by {{$post->user->name}} </small>
    <br>
    <small>updated at {{$post->updated_at}}</small>
    
    <hr>
    {{-- check authenticated --}}
    @auth
        @if (Auth::user()->id == $post->user_id)
            <a href="{{$post->id}}/edit" class="btn btn-primary">Edit</a>
            {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'DELETE','class'=>'float-right'])!!}
                {{-- {{Form::hidden('_method','DELETE')}} --}}
            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endauth

    {{-- @if (!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
            <a href="{{$post->id}}/edit" class="btn btn-primary">Edit</a>
            {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'DELETE','class'=>'float-right'])!!}
                {{-- {{Form::hidden('_method','DELETE')}} --}}
                {{-- {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            {!!Form::close()!!} --}}
        {{-- @endif --}}
    {{-- @endif --}}
    
    {{-- if you want check guest --}}
    {{-- @guest
        
    @endguest --}}
@endsection