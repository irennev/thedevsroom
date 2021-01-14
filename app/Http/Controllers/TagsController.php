<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Category;

class TagsController extends Controller
{
    public function index(Tag $tag){

        $categories = Category::withCount('posts')->orderByDesc('posts_count')->get()->take(5);
        $posts = $tag->posts()->paginate(5);
        $tags = Tag::has('posts')->pluck('name');
        

        return view('home', compact('posts', 'categories', 'tags'));
    }

          /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('createTags');
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
            'name' => 'required'
        ]);


        $input = $request->all();
        

        Tag::create($input);


        return redirect()->route('managetags');
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
         'name' => 'required'
        ]);



        $tag= Tag::find($id);


        $tag->name = $request->name;

        if ($tag->save()){
            error_log("Updaaateeeeed");
            return redirect()->back()->with('success','Update Successfully');
        }else{
            return 'Failed to update Tag';
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        
        Tag::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Deleted');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminManageTags()
    {
        $tags = Tag::all();

        return view('managetags', compact('tags'));
    }

}
