<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $posts = Post::all();
        //error_log($posts);
        return view('index', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $categories = Category::all();
        return view('create',compact('categories'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

    	$request->validate([
            'title'=>'required',
            'body'=>'required',
            'category_id'=>'required',
        ]);

        $input = $request->all();

        $input['user_id'] = auth()->user()->id;

        Post::create($input);

        return redirect()->route('home');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $post = Post::find($id);

        $post->visits = $post->visits+1;

        $post->save();

        return view('show', compact('post'));
    }

}
