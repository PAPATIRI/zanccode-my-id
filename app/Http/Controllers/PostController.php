<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    //
    public function index()
    {
        $categories = Cache::remember('categories', Carbon::now()->addDays(1), function () {
            return Category::whereHas('posts', function ($query) {
                $query->published();
            })->take(10)->get();
        });
        return view('posts.index', [
            'categories' => $categories
        ]);
    }

    public function show(Post $post) // $post sesuaikan di web.php route {post:slug}
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
