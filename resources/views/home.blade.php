@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <a href="{{config('app.path')}}posts/create" class="btn btn-success">Create Post</a>
                    <br><br>
                    <h3>Your Blog Posts</h3>
                    <br>
                    @if (count($posts))
                    <table class="table">
                        <tr><th>Post Title</th><th></th><th></th></tr>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>
                                <a href="{{config('app.path')}}posts/{{$post->id}}/edit" class="btn btn-primary">
                                Edit Post</a>
                            </td>
                            <td>
                                {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'DELETE'])!!}
                                    {{Form::submit('Delete Post',['class'=>"btn btn-danger"])}}
                                {!!Form::close()!!}
                            </td>
                            
                        </tr>
                        @endforeach

                    @else
                        <h5>now you can create your posts</h5>    
                    @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
