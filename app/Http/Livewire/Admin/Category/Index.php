<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;


class Index extends Component
{
    public $category_id;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function deleteCategory($category_id)
    {
        $this->category_id = $category_id;
    }
    public function destroyCategory()
    {
        $category = Category::find($this->category_id);
        $path = '/public/uploads/category/' . $category->image;
        if (File::exists($path)) {
            File::delete($path);
        }

        $category->delete();
        session()->flash('message', 'Category Delete');
    }

    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }
}