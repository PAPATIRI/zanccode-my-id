<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'text_color'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function scopeSearch($query, $search=''){
        $query->where('title', 'like', "%$search%");
    }

    public function forceDelete()
    {
        $this->posts()->detach();
        parent::forceDelete();
    }
}
