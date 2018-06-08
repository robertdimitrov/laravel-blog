<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use \App\Category;

class HomeController extends Controller
{
    public function show()
    {
    	$postsToShow = 3;

    	$latestPosts = Post::latest()
    		->take($postsToShow)
    		->get();

    	$homePage = true;

    	$categories = Category::whereHas('posts')->orderBy('name')->get();

    	return view('home', compact('latestPosts', 'homePage', 'categories'));
    }
}
