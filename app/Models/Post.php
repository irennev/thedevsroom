<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //use SoftDeletes;

    //protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['title', 'body', 'category_id', 'user_id'];

    /**
     * The has Many Relationship
     *
     * @var array
     */

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }


    /**
     * The belongs to Relationship
     *
     * @var array
     */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    
    /**
     * The belongs to Relationship
     *
     * @var array
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

}
