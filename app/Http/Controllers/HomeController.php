<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $feturedPost = Cache::remember('featuredPost', Carbon::now()->addDays(1), function () {
            return Post::published()->featured()->with('categories')->latest('published_at')->take(3)->get();
        });
        $latestPost = Cache::remember('latestPost', Carbon::now()->addDays(1), function () {
            return Post::published()->with('categories')->latest('published_at')->take(6)->get();
        });
        $quotes = Cache::remember('quotes', Carbon::now()->addDays(1), function () {
            $API_KEY = 'W8H11ixBOMxHM0EwbO9x+w==kxx9xreKFgdqUh4O';
            $cat = 'happiness';
            $response = Http::withHeaders([
                'X-Api-Key' => $API_KEY,
            ])->get("https://api.api-ninjas.com/v1/quotes?category={$cat}");
            return $response->json();
        });

        return view('home', [
            'featuredPost' => $feturedPost,
            'latestPost' => $latestPost,
            'quotes'=>$quotes[0]
        ]);
    }
}
