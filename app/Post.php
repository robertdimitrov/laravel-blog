<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Category;

class Post extends Model
{
    protected $guarded = [];

    public function categories()
    {
    	return $this->belongsToMany(Category::class);
    }
}