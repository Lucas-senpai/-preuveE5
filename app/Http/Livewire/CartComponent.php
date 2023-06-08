<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class CartComponent extends Component
{


    public function increaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $stock = $product->model->decrement('quantity', 1);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, ['qty'=>$qty, 'quantity'=>$stock]);
        $this->emitTo('cart-icon-component','refreshComponent');
    }

    public function decreaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $stock = $product->model->increment('quantity', 1);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, ['qty'=>$qty, 'quantity'=>$stock]);
        $this->emitTo('cart-icon-component','refreshComponent');
    }

    public function destroy($rowId, $product_id, $quantity){
        Cart::instance('cart')->remove($rowId);
        Product::where('id', $product_id)->increment('quantity', $quantity);
        $this->emitTo('cart-icon-component','refreshComponent');
        session()->flash('success_message','Produit supprimer');
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
