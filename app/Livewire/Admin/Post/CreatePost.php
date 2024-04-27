<?php

namespace App\Livewire\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Component;

class CreatePost extends Component
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

    protected $rules = [
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
        'body' => 'required|string',
        'image' => 'required|string',
        'published_at' => 'nullable|date',
        'featured' => 'boolean|nullable',
        'user_id' => 'exists:users,id',
        'selectedCategories' => 'array',
        'selectedCategories.*' => 'exists:categories,id',
        'status' => 'required|string',
    ];

    public function mount()
    {
        $this->user_id = auth()->id();
        $this->slug = Str::slug($this->title);
    }

    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }

    public function createPost()
    {
        $validated = $this->validate();
        if($this->featured === null){
            $value = 0;
        }else{
            $value = 1;
        }
        $post = Post::create([
            'title' => $this->title,
            'user_id' => auth()->user()->id,
            'slug' => Str::slug($this->title),
            'image' => $this->image,
            'body' => $this->body,
            'published_at' => $this->published_at,
            'featured' => $value,
            'status' => $this->status
        ]);

        $post->categories()->attach($this->selectedCategories);
        $this->redirect('/admin/posts');
        session()->flash('success', 'Berhasil Menyimpan Data Artikel yang ditulis');
    }

    public function render()
    {
        return view('livewire.admin.post.create-post', [
            'categories' => Category::all(),
        ]);
    }
}
