<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;

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
        $categoryPostCount = Category::find($id)->posts()->count(); //Suggest:- it will return post counts along with user details

        return $categoryPostCount; // or $userPosts
    }

    public static function tagPosts($id)
    {
        $tagPostCount = Tag::find($id)->posts()->count(); //Suggest:- it will return post counts along with user details

        return $tagPostCount; // or $userPosts
    }

    
    public static function getUser($id){
        $userName = User::find($id)->name;
        return $userName;
    }

}