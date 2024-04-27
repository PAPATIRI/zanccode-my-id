<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;

    public $title;
    public $text_color;
    public $slug;

    public $showModal;
    public $modalType;
    public $selectedCategory;
    public $selectedCategoryId;

    #[Url(history: true)]
    public $search;
    #[Url()]
    public $perPage;
    public $textColors = [];

    protected $rules = [
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
        'text_color' => 'required|string|max:255'
    ];

    public function mount()
    {
        $this->perPage = 5;
        $this->search = '';
        $this->showModal = false;
        $this->modalType = '';
        $this->slug = Str::slug($this->title);
        $this->textColors = [
            'blue',
            'blue-light',
            'red',
            'red-light',
            'yellow',
            'yellow-light',
            'green',
            'green-light',
            'indigo',
            'indigo-light',
            'cyan',
            'cyan-light'
        ];
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }

    public function createCategory()
    {
        $this->modalType = 'create';
        $this->showModal = true;
    }

    public function editCategory(Category $category)
    {
        $this->modalType = 'edit';
        $this->showModal = true;
        $this->selectedCategoryId = $category->id;
        $this->selectedCategory = $category;

        $category = Category::findOrFail($category->id);
        $this->title = $category->title;
        $this->text_color = $category->text_color;
    }

    public function deleteCategory(Category $category)
    {
        $this->selectedCategory = $category;
        $this->modalType = 'delete';
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.admin.category.category-list', [
            'categories' => Category::search($this->search)
                ->latest()
                ->paginate($this->perPage),
        ]);
    }

    public function create()
    {
        $validated = $this->validate();

        Category::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'text_color' => $this->text_color
        ]);
        $this->reset();
        $this->showModal = false;
    }

    public function update()
    {
        $validated = $this->validate([
            'title' => 'required|string',
            'text_color' => 'required|string',
            'selectedCategoryId' => 'required|integer',
        ]);
        Category::updateOrCreate([
            'id' => $validated['selectedCategoryId']
        ], $validated);
        $this->reset();
        $this->showModal = false;
    }

    public function delete()
    {
        $this->selectedCategory->forceDelete();
        $this->showModal = false;
    }
}
