<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{



        /**
     * Update a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        $request->validate([
            'body' => 'required'
        ]);

        $comment = Comment::find($id);


        $comment->body = $request->body;

        if ($comment->save()){
            return redirect()->back()->with('success','Update Successfully');
        }else{
            return 'Failed to update Comment';
        }

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
            'body' => 'required'
        ]);


        $input = $request->all();
        
        $input['user_id'] = auth()->user()->id;

        Comment::create($input);

        return back();
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        
        Comment::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Deleted');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminManageComments()
    {
        $comments = Comment::all();

        return view('managecomments', compact('comments'));
    }

}
