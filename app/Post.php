<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Category;
use \App\Utilities\Tokenizer\Tokenizer;

class Post extends Model
{
    protected $guarded = [];

    private $tokenizer;

    public function __construct()
    {
    	$this->tokenizer = new Tokenizer();
    }

    public function categories()
    {
    	return $this->belongsToMany(Category::class);
    }

    public function scopeFilter($query, $filters)
    {
    	$postsPerPage = 10;
    	$query->take($postsPerPage);

    	if (array_key_exists('page', $filters))
    	{
    		$page = (int) $filters['page'];

    		$page = gettype($page) === "integer" ? $page : 1;

			$query->skip(($page - 1) * $postsPerPage);
    	}

    	if (array_key_exists('search', $filters))
    	{
    		$searchQuery = $filters['search'];
    		$queryTokens = $this->tokenizer->tokenize($searchQuery);

    		foreach($queryTokens as $token)
			{
				$query->orWhere('tokens', 'like', '%' . $token . '%');
			}
    	}

        if (array_key_exists('category', $filters))
        {
            $category = strtolower($filters['category']);

            $query->whereHas('categories', function($query) use($category){
                $query->where('name', '=', $category);
            });
        }
        
    }
}
