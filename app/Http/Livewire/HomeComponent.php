<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $nproducts = Product::orderBy('created_at', 'DESC')->get()->take(8);
        $products = Product::inRandomOrder()->limit(8)->get();
        return view('livewire.home-component',['nproducts'=>$nproducts, 'products'=>$products]);
    }
}
