<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id', 'title', 'slug', 'image', 'body', 'published_at', 'featured'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->belongsToMany(User::class, 'post_like')->withTimestamps();
    }

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeWithCategory($query, string $category)
    {
        $query->whereHas('categories', function ($query) use ($category) {
            $query->where('slug', $category);
        });
    }

    public function scopeFeatured($query)
    {
        $query->where('featured', true);
    }

    public function scopePopular($query)
    {
        //like count by relationship likes Post had
        $query->withCount('likes')
            //order by like count, likes->relationship name, _ , count->action query
            ->orderBy("likes_count", 'desc');
    }
    public function scopeSearch($query, $search = ''){
        $query->where('title', 'like', "%$search%" );
    }

    public function getReadingTime()
    {
        $minutes = round(str_word_count($this->body) / 250);
        return ($minutes < 1) ? 1 : $minutes;
    }

    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->body), 150);
    }

    public function getThumbnailImage()
    {
        $isUrl = str_contains($this->image, 'http');

        return ($isUrl) ? $this->image : Storage::disk('public')->url($this->image);
    }

}
