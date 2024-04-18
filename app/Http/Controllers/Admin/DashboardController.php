<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        $users = User::all();
        $categories = Category::all();
        $comments = Comment::all();

        return view('admin.dashboard', [
            'posts' => $posts,
            'users' => $users,
            'categories' => $categories,
            'comments' => $comments
        ]);
    }
}
