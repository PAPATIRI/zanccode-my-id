<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts=Post::published()->with('categories')->latest('published_at')->take(5)->get();
        return new PostResource(true, 'List Data Post', $posts);
    }
}
