<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $feturedPost = Cache::remember('featuredPost', Carbon::now()->addDays(3), function () {
            return Post::published()->featured()->with('categories')->latest('published_at')->take(3)->get();
        });
        $latestPost = Cache::remember('latestPost', Carbon::now()->addDays(3), function () {
            return Post::published()->with('categories')->latest('published_at')->take(6)->get();
        });

        return view('home', [
            'featuredPost' => $feturedPost,
            'latestPost' => $latestPost
        ]);
    }
}
