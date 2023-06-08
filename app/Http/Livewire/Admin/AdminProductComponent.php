<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function destroy($id)
    {
        $products = Product::query()->findOrFail($id);
        $products->delete();
        session()->flash('message','Produit supprimé');
    }

    public function render()
    {
        $products = Product::orderBy('id')->paginate(8);
        return view('livewire.admin.admin-product-component',['products'=>$products]);
    }
}
