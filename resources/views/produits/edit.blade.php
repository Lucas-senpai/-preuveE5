<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier un Produit') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ url('produits/'. $products->id) }}">
                    @method('PATCH')
                    @csrf

                    <div class="form-group mb-3">
                        <label for="cat_id">Catégorie :</label>
                        <input type="number" class="form-control" id="cat_id" placeholder="Date" name="cat_id"
                               value="{{ $products->cat_id }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Nom :</label>
                        <input type="text" class="form-control" id="name" placeholder="Entrer le cours" name="name"
                               value="{{ $products->name }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Description :</label>
                        <input type="text" class="form-control" id="description" placeholder="Oral ou Ecrit" name="description"
                               value="{{ $products->description }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Image :</label>
                        <input type="text" class="form-control" id="image" placeholder="Specialite ou Tronc commun" name="image"
                               value="{{ $products->image }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="price">Prix :</label>
                        <input type="number" class="form-control" id="price" placeholder="Date" name="price"
                               value="{{ $products->price }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="quantity">Quantité :</label>
                        <input type="number" class="form-control" id="quantity" placeholder="Date" name="quantity"
                               value="{{ $products->quantity }}">
                    </div>

                    <button type="submit">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
