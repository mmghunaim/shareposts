@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    {!! Form::open(['action'=>'PostsController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
    <div class="form-group">
            {{-- input label --}}
            {{Form::label('title','Title')}}
            {{-- text input  --}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="from-group">
            {{Form::label('body','Body')}}
            {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body'])}}    
        </div>
        <br>
        <div class="from-group">
                {{Form::file('cover_image')}}
        </div>
        <br>
        {{Form::submit('Share Post',['class'=>'btn btn-primary','style'=>'width:100%'])}}
    {!! Form::close()!!} 
@endsection