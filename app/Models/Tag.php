<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['name'];

    /**
     * The has Many Relationship
     *
     * @var array
     */

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }


    public function getRouteKeyName(){
        return 'name';
    }
}
