<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;

    public $product_id;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $price;
    public $quantity;
    public $image;
    public $cat_id;
    public $newimage;


    public function mount($product_id){
        $product = Product::find($product_id);
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->cat_id = $product->cat_id;
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function updateProduct(){
        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'short_description' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'required',
            'cat_id' => 'required'
        ]);
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->price = $this->price;
        $product->quantity = $this->quantity;
        if($this->newimage){
            unlink('assets/imgs/products/'.$product->image);
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('products',$imageName);
            $product->image = $imageName;
        }
        $product->cat_id = $this->cat_id;
        $product->save();
        session()->flash('message','Produit modifier');
    }

    public function render()
    {
        $categories = Category::orderBy('id','ASC')->get();
        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories]);
    }
}
