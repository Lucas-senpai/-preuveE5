<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nouveau Produit') }}
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

                <form action="{{ url('produits') }}" method="POST">

                    @csrf
                    <div class="form-group mb-3">
                        <label for="cat_id">Catégorie :</label>
                        <input type="number" class="form-control" id="cat_id" placeholder="1 / 2 / 3 ..." name="cat_id" min="0">
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Nom :</label>
                        <input type="text" class="form-control" id="name" placeholder="Son Nom " name="name">
                    </div>


                    <div class="form-group mb-3">
                        <label for="description">Description :</label>
                        <input type="text" class="form-control" id="description" placeholder="Une Description" name="description">
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Image : </label>
                        <input type="text" class="form-control" id="image" placeholder="Une image" name="image">
                    </div>

                    <div class="form-group mb-3">
                        <label for="price">Prix : </label>
                        <input type="number" class="form-control" id="price" placeholder="Un prix" name="price" step="0.01" min="0">
                    </div>

                    <div class="form-group mb-3">
                        <label for="quantity">Quantité : </label>
                        <input type="number" class="form-control" id="quantity" placeholder="Une quantité" name="quantity" step="0.01" min="0">
                    </div>


                    <button type="submit">Enregister</button>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>
