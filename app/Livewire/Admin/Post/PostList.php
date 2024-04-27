<?php

namespace App\Livewire\Admin\Post;

use App\Models\Post;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $sortBy;
    #[Url(history: true)]
    public $sortDir;
    #[Url(history: true)]
    public $search = '';
    #[Url()]
    public $perPage;

    public $selectedPost;
    public $showModal = false;

    public function mount()
    {
        $this->sortBy = 'created_at';
        $this->sortDir = 'desc';
        $this->perPage = 5;
    }

    public function openModal(Post $post)
    {
        $this->selectedPost = $post;
        $this->selectedPostId = $post->id;
        $this->showModal = true;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function delete()
    {
        $this->selectedPost->forceDelete();
        $this->showModal = false;
    }

    public function setSortBy($sortByField)
    {
        if ($this->sortBy == $sortByField) {
            $this->sortDir = ($this->sortDir === 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    public function render()
    {
        $user = auth()->user();
        if ($user->hasRole('ADMIN')) {
            $posts = Post::search($this->search)
                ->with('author', 'categories')
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage);
        } else {
            $posts = $user->posts()
                ->search($this->search)
                ->with('author', 'categories')
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage);
        }
        return view('livewire.admin.post.post-list', [
            'posts' => $posts,
        ]);
    }
}
