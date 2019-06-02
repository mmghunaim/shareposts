@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if (count($posts)>0)
        @foreach($posts as $post)
            <div class="card card-body bg-light" style="padding: 3">
                <div class="row">
                    <div class="col-m-4 col-sm-4">
                        <img src="{{config('app.path')}}storage/images/{{$post->cover_image}}" 
                        alt="this is image" style="width:100%;border-radius:5%;">
                    </div>
                    <div class="col-m-8 col-sm-8" style="margin:auto 0px;">
                        <h3><a href="{{config('app.path')}}posts\{{$post->id}}">{{$post->title}}</a></h3>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                        {{-- $post->user_id or $post->user->name --}}
                    </div>
                </div>
            </div><br>
        @endforeach
        {{-- {{$posts->links()}} --}}
    @else
        <p>no posts found</p>
    @endif
@endsection