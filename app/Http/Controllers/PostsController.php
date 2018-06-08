<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use \App\Category;
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
        $posts = Post::latest()
            ->filter(request(['search', 'category']))
            ->distinct();

        $postsCount = $posts->count();

        $posts = $posts->filter(request(['page']))
            ->get()
            ->toArray();

        $search = request('search') ?: '';
        $page = request('page') ?: '';
        $category = request('category') ?: '';

    	return view('posts.index', compact('posts', 'search', 'page', 'category', 'postsCount'));
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

    	return redirect()->route('post', ['post' => $post]);
    }

    public function showRandom()
    {
    	$post = Post::inRandomOrder()
    		->filter(request(['category']))
    		->first();

        if ($post) {
            return view('posts.show', compact('post'));
        }

        return redirect()->home();
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
    	$categories = implode(' ', $post->categories->pluck('name')->toArray());
    	return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Post $post)
    {
    	$this->validate(request(), [
    		'title' => 'required|min:2|max:99',
    		'content_md' => 'required'
    	]);

    	$this->persistPost($post);

        return redirect()->route('post', ['post' => $post]);
    }

    private function persistPost(Post $post)
    {
		$title = request('title');
    	$content_md = request('content_md');
    	$inputCategories = preg_split('/\s+/', request('categories'));
        // get rid of empty strings in categories array
        $inputCategories = array_diff($inputCategories, ['']);

    	$tokens = $this->tokenizer->tokenize($title . $content_md);

    	$post->title = $title;
    	$post->content_md = $content_md;
    	$post->content_html = $this->converter->convertToHtml($content_md);
    	$post->tokens = implode(' ', $tokens);

    	$post->save();

    	$postCategories = $post->categories->pluck('name')->toArray();

    	foreach ($inputCategories as $inputCategory)
    	{
    		if (!in_array($inputCategory, $postCategories))
    		{
    			$category = $this->findOrCreateCategory(strtolower($inputCategory));
    			$post->categories()->attach($category);
    		}
    	}

    	foreach ($postCategories as $postCategory)
    	{
    		if (!in_array($postCategory, $inputCategories))
    		{
    			$category = $this->findOrCreateCategory(strtolower($postCategory));
    			$post->categories()->detach($category);
    		}
    	}
    }

    private function findOrCreateCategory($name)
    {
    	$existingCategory = Category::where('name', $name)->first();
    	if ($existingCategory)
    	{
    		return $existingCategory;
    	}

    	$newCategory = new Category;
    	$newCategory->name = $name;
    	$newCategory->save();

    	return $newCategory;
    }
}