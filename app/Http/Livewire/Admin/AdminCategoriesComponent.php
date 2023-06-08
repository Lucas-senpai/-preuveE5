<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoriesComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function destroy($category_id)
    {
        $category = Category::query()->findOrFail($category_id);
        $category->delete();
        session()->flash('message','Catégorie supprimée');
    }

    public function render()
    {
        $categories = Category::orderBy('id','ASC')->paginate(8);
        return view('livewire.admin.admin-categories-component',['categories'=>$categories]);
    }
}
