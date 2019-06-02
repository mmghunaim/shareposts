<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Alert;
use App\Post;
//if you dont want to use eloquent
use DB;
class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');

        //views wo want to except from auth
        $this->middleware('auth')->except(['index', 'show']);
        //$this->middleware('auth',['except'=>['index','show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //this is the use of eloquent ORM database query rather than sql "object relational mapper"
        //$posts = Post::all();
        //return Post::where('title','post two')->get();
        //$posts = DB::select('SELECT * FROM posts');
        // $posts = Post::orderBy('title','desc')->take(1)->get();
        $posts = Post::orderBy('created_at','desc')->get();
        //$posts = Post::where('user_id',auth()->user()->id)->get();
        // $posts = Post::orderBy('created_at','desc')->paginate(1);// with one prepage
        return view('posts.index')->with('posts',$posts);
    }
    
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body' =>'required',
            'cover_image' => 'image|nullable|max:1999'
            //last line means the file must be image or nothing ,max size of apatch server uploade size is 2mb
        ]);
        
        if ($request->hasFile('cover_image')) {
            //get image name with extension
            $fileNameWithExtension = $request->file('cover_image')->getClientOriginalName();
            //get file name
            $fileName = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            //get file extenstion
            $fileExtension = $request->file('cover_image')->getClientOriginalExtension();
            //to uploade to database
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExtension;
            //save image
            $path = $request->file('cover_image')->storeAs('public/images',$fileNameToStore);
        }else {
            $fileNameToStore = 'withoutImage.jpg';
        }

        //create post 
        $post = new Post;
        $post->title = $request->input('title'); 
        $post->body = $request->input('body');
        $post->user_id=auth()->user()->id;//get currently logged user id
        $post->cover_image = $fileNameToStore;
        $post->save();

        Alert::message('Robots are working!');
        return redirect('posts')->with('success','Post Created');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        if (auth()->user()->id !=$post->user_id) {
            return redirect('posts')->with('error','not allowed to access this post');
        }
        return view('posts.edit')->with('post',$post);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'body' =>'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('cover_image')) {
            $fileNameWithExtension = $request->file('cover_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $fileExtension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExtension;
            $path = $request->file('cover_image')->storeAs('public/images',$fileNameToStore);
        }

        $post = Post::find($id);
        $post->title = $request->input('title'); 
        $post->body = $request->input('body');
        if ($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }
        
        $post->save();

        return redirect('/posts')->with('success','Post Updated');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if (auth()->user()->id !=$post->user_id) {
            return redirect('posts')->with('error','not allowed to access this post');
        }

        if ($post->cover_image !='withoutImage.jpg') {
            Storage::delete('public/images/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/posts')->with('success','Post Deleted');
    }
}
