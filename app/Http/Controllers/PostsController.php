<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use \App\Utilities\Tokenizer\Tokenizer;
use League\CommonMark\Converter;

class PostsController extends Controller
{
	protected $converter;
	protected $tokenizer;

    public function __construct(Converter $converter)
    {
    	$this->middleware('auth');
    	$this->converter = $converter;
    	$this->tokenizer = new Tokenizer();
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

    	$post = new Post;

    	$this->persistPost($post);

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

    	$this->persistPost($post);

    	return redirect()->home();
    }

    private function persistPost(Post $post)
    {
		$title = request('title');
    	$content_md = request('content_md');

    	$tokens = $this->tokenizer->tokenize($title . $content_md);

    	$post->title = $title;
    	$post->content_md = $content_md;
    	$post->content_html = $this->converter->convertToHtml($content_md);
    	$post->tokens = implode(' ', $tokens);
    	$post->save();
    }
}