<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', \App\Http\Controllers\HomeController::class)->name('home'); // invokable controller jadi tanpa [] dan nama method class nya
Route::get('/blog', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/about-me', function () {
    return view('about');
})->name('about-me');
Route::get('/blog/{post:slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
Route::get('/language/{locale}', function ($locale) {
    if (array_key_exists($locale, config('app.supported_locales'))) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('locale');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin/dashboard',[\App\Http\Controllers\Admin\DashboardController::class, 'index'] )->name('admin.dashboard');
    Route::get('/admin/posts', [\App\Http\Controllers\Admin\PostController::class, 'index'])->name('admin.posts');
    Route::get('/admin/posts/create', \App\Livewire\Admin\Post\CreatePost::class)->name('admin.posts.create');
    Route::get('/admin/posts/{post}', \App\Livewire\Admin\Post\ShowPost::class)->name('admin.posts.show');
    Route::get('/admin/posts/{postId}/edit', \App\Livewire\Admin\Post\EditPost::class)->name('admin.posts.edit');
    Route::get('/admin/categories', \App\Livewire\Admin\Category\CategoryList::class)->name('admin.categories');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified', 'web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});