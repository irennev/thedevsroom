<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::paginate(5);

        $categories = Category::withCount('posts')->orderByDesc('posts_count')->get()->take(5);

        //error_log($posts);
        return view('home', compact('posts', 'categories'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $users = User::all();
        $posts = Post::all();
        //$categories = Category::all();

        $categories = Category::withCount('posts')->orderByDesc('posts_count')->get()->take(5);

        

        $comments = Comment::all();

        return view('dashboard', compact('users', 'posts', 'categories', 'comments'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userProfile()
    {
        $users = User::all();
        $posts = Post::all();
        //$categories = Category::all();

        $categories = Category::withCount('posts')->orderByDesc('posts_count')->get()->take(5);

        

        $comments = Comment::all();

        return view('profile', compact('users', 'posts', 'categories', 'comments'));
    }
    

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('body', 'LIKE', "%{$search}%")
            ->get();     

        $categories = Category::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('searchPage', compact('posts', 'categories', 'search'));
    }

}
