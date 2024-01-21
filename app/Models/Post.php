<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeFeatured($query)
    {
        $query->where('featured', true);
    }

    public function getReadingTime()
    {
        $minutes = round(str_word_count($this->body) / 250);
        return ($minutes<1) ? 1 : $minutes;
    }

    public function getExcerpt(){
        return Str::limit(strip_tags($this->body), 150);
    }

}
