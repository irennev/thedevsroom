<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

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
            'tagsList' => 'required'
        ]);

        $input = $request->all();

        $input['user_id'] = auth()->user()->id;

        $post = Post::create($input);

        $tagsList = explode(',', $request->tagsList);

        foreach($tagsList as $tag)
        {
            if($tag = Tag::firstOrCreate([
                'name' => strtolower(trim($tag))
            ])){
                $newTags[] = $tag->id;
            }
        }

        $post->tags()->attach($newTags);

        return redirect()->route('home');

    }

    /**
     * Update a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate([
         'title' => 'required',
         'body' => 'required',
         'category_id' => 'required'
        ]);

        $post = Post::find($id);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;


        if ($post->save()){
            return redirect()->back()->with('success','Update Successfully');
        }else{
            return 'Failed to update Post';
        }

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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        
        Post::where('id', $id) -> delete();

        return redirect()->back()->with('success', 'Deleted');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminManagePosts()
    {
        $posts = Post::all();
        $categories = Category::all();

        return view('manageposts', compact('posts', 'categories'));
    }
}
