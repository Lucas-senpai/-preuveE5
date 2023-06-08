<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Cart;
use Livewire\Component;
use Livewire\WithPagination;

class SearchComponent extends Component
{
    use WithPagination;

    public $pageSize = 9;
    public $orderBy = "Défault";
    public $q;
    public $search_term;

    protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->fill(request()->only('q'));
        $this->search_term = '%'.$this->q.'%';
    }

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

    public function render()
    {
        if($this->orderBy == 'Prix: croissant'){
            $products = Product::where('name','like',$this->search_term)->orderBy('price','ASC')->paginate($this->pageSize);
        }
        else if($this->orderBy == 'Prix: décroissant'){
            $products = Product::where('name','like',$this->search_term)->orderBy('price','DESC')->paginate($this->pageSize);
        }
        else if($this->orderBy == 'Nouveautées'){
            $products = Product::where('name','like',$this->search_term)->orderBy('created_at','ASC')->paginate($this->pageSize);
        }
        else{
            $products = Product::where('name','like',$this->search_term)->paginate($this->pageSize);
        }
        // Requete qui stock les noms des catégories //
        $categories = Category::orderBy('name','ASC')->get();
        $nouv_products = Product::orderBy('created_at', 'DESC')->get()->take(4);
        return view('livewire.search-component', ['products'=>$products,'categories'=>$categories,'nouv_products'=>$nouv_products]);
    }
}
