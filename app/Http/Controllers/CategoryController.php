<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //$categories = Category::all();

        //return view('home', compact('categories'));
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('createCategories');
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
        

        Category::create($input);


        return redirect()->route('managecategories');
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

        error_log("Geets Heereee?");

        $category= Category::find($id);

        $category->name = $request->name;

        if ($category->save()){
            error_log("Updaaateeeeed");
            return redirect()->back()->with('success','Update Successfully');
        }else{
            return 'Failed to update Category';
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        
        Category::where('id', $id) -> delete();

        return redirect()->back()->with('success', 'Deleted');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminManageCategories()
    {
        $categories = Category::all();

        return view('managecategories', compact('categories'));
    }

}
