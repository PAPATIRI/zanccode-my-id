<?php

namespace App\Livewire\Admin\Post;

use App\Models\Post;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;
    #[Url(history: true)]
    public $sortBy = 'created_at';
    #[Url(history: true)]
    public $sortDir = 'DESC';
    #[Url(history: true)]
    public $search = '';

    #[Url()]
    public $perPage = 5;

    public function updatedSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::search($this->search)
            ->with('author', 'categories')
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);

        return view('livewire.admin.post.post-list', [
            'posts' => $posts
        ]);
    }
}
