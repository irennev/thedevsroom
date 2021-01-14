<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;

class ServiceProvider extends Controller
{
    public static function userPosts($id)
    {
        
        $userPostCount = User::find($id)->posts()->count(); //Suggest:- it will return post counts along with user details

        // or if you want to count with post also
        // $userPosts = User::where('id', $userId)->with('posts')->withCount('posts')->first(); // it will return user posts and post counts along with user data

        return $userPostCount; // or $userPosts
    }


    public static function categoryPosts($id)
    {
        $categoryPostCount = Category::find($id)->posts()->count(); 

        return $categoryPostCount; 
    }

    public static function tagPosts($id)
    {
        $tagPostCount = Tag::find($id)->posts()->count(); 

        return $tagPostCount; 
    }

    
    public static function getUser($id){
        $userName = User::find($id)->name;
        return $userName;
    }

    public static function getPost($id){
        $postTitle = Post::find($id)->title;
        return $postTitle;
    }

    public static function getComment($id){

        $comment = Comment::find($id);

        if($comment!=null){
            return $comment->body;
        }else{
            return '-';
        }

        
    }
}