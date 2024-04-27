<?php

namespace App\Livewire\Admin\Post;

use App\Models\Post;
use Livewire\Component;

class ShowPost extends Component
{
    public $post;

    public function mount(Post $post){
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.admin.post.show-post');
    }
}
