<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    /**
     * Affiche la liste des chapitres
     */
    public function liste()
    {
        $products = Products::all();
        return view('produits.liste', compact('products'));
    }


    /**
     * Affiche le formulaire de creation d'un chapitre
     */
    public function create()
    {
        return view('produits.create');
    }


    /**
     * Enregistre un nouveau chapitre dans la base de données
     */
    public function store(Request $request)
    {
        $request->validate([
            'cat_id'=>'required',
            'name'=> 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);


        $products= new products([
            'cat_id' => $request->get('cat_id'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'image' => $request->get('image'),
            'price' => $request->get('price'),
            'quantity' => $request->get('quantity')
        ]);
        $products->save();
        return redirect('produits/liste')->with('success', 'Produits ajouté avec succès');
    }


    /**
     * Affiche les détails d'un chapitre
     */

    public function show($id)
    {
        $products = Products::query()->findOrFail($id);
        return view('produits.show', compact('products'));
    }


    /**
     * Affiche le formulaire de modification d'un chapitre
     */

    public function edit($id)
    {
        $products = products::query()->findOrFail($id);
        return view('produits.edit', compact('products'));
    }


    /**
     * Enregistre la modification dans la base de données
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cat_id'=>'required',
            'name'=> 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
            'quantity' => 'required'

        ]);

        $products = Products::query()->findOrFail($id);
        $products->cat_id = $request->get('cat_id');
        $products->name = $request->get('name');
        $products->description = $request->get('description');
        $products->image = $request->get('image');
        $products->price = $request->get('price');
        $products->quantity = $request->get('quantity');


        $products->update();

        return redirect('produits/liste')->with('success', 'Produit modifié avec succès');

    }




    /**
     * Supprime le chapitre dans la base de données
     */
    public function destroy($id)
    {

        $products = Products::query()->findOrFail($id);
        $products->delete();

        return redirect('produits/liste')->with('success', 'Produit supprimé avec succès');

    }

}
