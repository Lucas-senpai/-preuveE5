<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\ContactComponent;

use App\Http\Livewire\User\UserDashboardComponent;

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoriesComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminUserComponent;
use App\Http\Livewire\Admin\AdminEditUserComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',HomeComponent::class)->name('home.index');

Route::get('/shop', ShopComponent::class)->name('shop');

Route::get('/product/{slug}',DetailComponent::class)->name('product.details');

Route::get('/cart', CartComponent::class)->name('shop.cart');

Route::get('/wishlist', WishlistComponent::class)->name('shop.wishlist');

Route::get('/checkout', CheckoutComponent::class)->name('shop.checkout');

Route::get('/product-category/{slug}',CategoryComponent::class)->name('product.category');

Route::get('/search',SearchComponent::class)->name('product.search');

Route::get('/contact',ContactComponent::class)->name('contact');



// Authentification //
Route::middleware(['auth'])->group(function(){
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
});

Route::middleware(['auth','authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');

    Route::get('/admin/categories',AdminCategoriesComponent::class)->name('admin.categories');
    Route::get('/admin/categories/ajout',AdminAddCategoryComponent::class)->name('admin.category.add');
    Route::get('/admin/categories/modifier/{category_id}',AdminEditCategoryComponent::class)->name('admin.category.edit');
    Route::get('/admin/categories/{category_id}', AdminCategoriesComponent::class)->name('admin.category.delete');

    Route::get('/admin/produits',AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/produits/ajout',AdminAddProductComponent::class)->name('admin.product.add');
    Route::get('/admin/produits/modifier/{product_id}',AdminEditProductComponent::class)->name('admin.product.edit');
    Route::get('/admin/produits/{product_id}', AdminProductComponent::class)->name('admin.product.delete');

    Route::get('/admin/utilisateurs', AdminUserComponent::class)->name('admin.user');
    Route::get('/admin/utilisateurs/modifier/{user_id}', AdminEditUserComponent::class)->name('admin.user.edit');
    Route::get('/admin/utilisateurs/delete', AdminUserComponent::class)->name('admin.user.delete');
});

require __DIR__.'/auth.php';
