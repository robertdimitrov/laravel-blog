<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	// @TODO: filters

    	$posts = Post::get();

    	return view('posts.index', compact('posts'));
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {
    	$this->validate(request(), [
    		'title' => 'required|min:2|max:99',
    		'content_md' => 'required'
    	]);

    	// @TODO: create html from markdown
    	$content_html = '';

    	// @TODO: generate tokens string from content
    	$tokens = '';

    	$post = new Post;
    	$post->title = request('title');
    	$post->content_md = request('content_md');
    	$post->content_html = $content_html;
    	$post->tokens = $tokens;
    	$post->save();

    	return redirect()->home();
    }

    public function showRandom()
    {
    	// @TODO: filters

    	$post = Post::inRandomOrder()->first();

    	return view('posts.show', compact('post'));
    }

    public function show(Post $post)
    {
    	return view('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
    	$post->delete();
    	
    	return redirect()->home();		
    }

    public function edit(Post $post)
    {
    	return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
    	$this->validate(request(), [
    		'title' => 'required|min:2|max:99',
    		'content_md' => 'required'
    	]);

    	// @TODO: create html from markdown
    	$content_html = '';

    	// @TODO: generate tokens string from content
    	$tokens = '';

    	$post->title = request('title');
    	$post->content_md = request('content_md');
    	$post->content_html = $content_html;
    	$post->tokens = $tokens;

    	$post->save();

    	return redirect()->home();
    }
}