<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/accueil', function () {
    $role = config('roles.models.role')::where('name', '=', 'User')->first();
    auth()->user()->attachRole($role);
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('accueil');

Route::controller(ProductsController::class)->group(function (){
    Route::get('/produits/liste', 'liste')->name('listeProduits');
    Route::get('/produits/create', 'create')->name('createProduits');
    Route::get('/produits/{id}', 'show');
    Route::get('/produits/{id}/edit', 'edit');

    Route::post('/produits', 'store');
    Route::patch('/produits/{id}', 'update');
    Route::delete('/produits/{id}', 'destroy');
});

Route::post('/roles', function (){
    return view('layouts.main');
})->middleware('role:admin')->name('droits');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
