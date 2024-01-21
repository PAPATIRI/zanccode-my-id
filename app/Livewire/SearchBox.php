<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBox extends Component
{
    public $search = '';

//live search di form input menggunakan wire:model.live.debounce.300ms='search'
//    public function updatedSearch(){
//        $this->dispatch('search', search:$this->search);
//    }

    public function searchPost()
    {
        $this->dispatch('search', search: $this->search);
    }

    public function render()
    {
        return view('livewire.search-box');
    }
}
