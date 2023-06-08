<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Cart;

class DetailComponent extends Component
{
    public $slug;

    public function mount($slug){
        $this->slug = $slug;
    }

    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        Product::where('id', $product_id)->decrement('quantity', 1);
        $this->emitTo('cart-icon-component','refreshComponent');
    }

    public function addToWishlist($product_id,$product_name,$product_price){
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-icon-component','refreshComponent');
    }

    public function removeFromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem){
            if($witem->id == $product_id){
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-icon-component','refreshComponent');
                return;
            }
        }
    }

    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        $rproducts = Product::where('cat_id',$product->cat_id)->inRandomOrder()->limit(4)->get();
        $nouv_products = Product::orderBy('created_at', 'DESC')->get()->take(4);
        $categories = Category::orderBy('name','ASC')->get();
        $stockRestant = $product->quantity === 0 ? 'Indisponible' : 'Disponible';
        return view('livewire.detail-component',['product'=>$product,'rproducts'=>$rproducts,'nouv_products'=>$nouv_products,'categories'=>$categories,'stockRestant'=>$stockRestant]);
    }
}
