<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Cart;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $pageSize = 9;
    public $orderBy = "Défault";


    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        Product::where('id', $product_id)->decrement('quantity', 1);
        $this->emitTo('cart-icon-component','refreshComponent');
    }

    public function changePageSize($size){
        $this->pageSize = $size;
    }

    public function changeOrderBy($order){
        $this->orderBy = $order;
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
        if($this->orderBy == 'Prix: croissant'){
            $products = Product::orderBy('price','ASC')->paginate($this->pageSize);
        }
        else if($this->orderBy == 'Prix: décroissant'){
            $products = Product::orderBy('price','DESC')->paginate($this->pageSize);
        }
        else if($this->orderBy == 'Nouveautées'){
            $products = Product::orderBy('created_at','DESC')->paginate($this->pageSize);
        }
        else{
            $products = Product::paginate($this->pageSize);
        }
        // Requete qui stock les noms des catégories //
        $categories = Category::orderBy('name','ASC')->get();
        $nouv_products = Product::orderBy('created_at', 'DESC')->get()->take(4);
        return view('livewire.shop-component', ['products'=>$products,'categories'=>$categories,'nouv_products'=>$nouv_products]);
    }
}
