<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    // public function index()
    // {

    //     $posts=Post::latest();

    //     if(request('search')){
    //         $posts
    //             ->where('title','like','%'.request('search').'%')
    //             ->orWhere('body','like','%'.request('search').'%');
    //     }

    //     return view('posts',[
    //         'posts' => Post::latest('id')->get()
    //             ]);
    // }
    public function index()
    {
        return view('posts', [
            'posts' => Post::latest()->filter(
                        request(['search'])
                    )->paginate(9)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('post',[
            'post'=>$post
        ]);
    }

    public function create(){

        return view('posts.create');
    }

    public function store(){

        $attributes=request()->validate([
            'title'=>'required',
            'slug'=>['required',Rule::unique('posts','slug')],
            'excerpt'=>'required',
            'thumbnail'=>'required|image',
            'body'=>'required'
        ]);

        $attributes['user_id']=auth()->id();
        $attributes['thumbnail']=request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);
        return redirect('/');
    }
}
