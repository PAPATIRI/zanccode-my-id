<?php

namespace App\Livewire\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;

class EditPost extends Component
{
    public $title;
    public $slug;
    public $body;
    public $image;
    public $published_at;
    public $featured;
    public $user_id;
    public $selectedCategories = [];
    public $status;
    public $postId;
    public $isDirty = false;
    public $featuredChanged = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
        'body' => 'required|string',
        'image' => 'required|string',
        'published_at' => 'nullable|date',
        'featured' => 'boolean',
        'user_id' => 'exists:users,id',
        'selectedCategories' => 'array',
        'selectedCategories.*' => 'exists:categories,id',
        'status' => 'required|string',
    ];

    public function mount($postId)
    {
        $this->postId = request()->route('postId');
        $post = Post::findOrFail($postId);
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->body = $post->body;
        $this->image = $post->image;
        $this->published_at = $post->published_at;
        $this->featured = $post->featured;
        $this->user_id = $post->user_id;
        $this->selectedCategories = $post->categories->pluck('id')->toArray();
        $this->status = $post->status;
    }

    public function render()
    {
        $this->published_at = $this->published_at !== null ? Carbon::parse($this->published_at)->format('Y-m-d\TH:i') : null;

        return view('livewire.admin.post.edit-post', [
            'categories' => Category::all(),
        ]);
    }

    public function updatePost()
    {
        $validated = $this->validate();
        $post = Post::findOrFail($this->postId);

        $post->update([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'image' => $this->image,
            'body' => $this->body,
            'published_at' => $this->published_at,
            'featured' => $this->featured,
            'status' => $this->status
        ]);

        $post->categories()->sync($this->selectedCategories);

        $this->redirect('/admin/posts/');
        session()->flash('success', 'Berhasil Memperbarui Data Artikel yang ditulis');
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'title' || $propertyName === 'body' || $propertyName === 'image' ||
            $propertyName === 'published_at' || $propertyName === 'featured' || $propertyName === 'status' ||
            $propertyName === 'selectedCategories') {
            $this->isDirty = true;
        }
    }

}
