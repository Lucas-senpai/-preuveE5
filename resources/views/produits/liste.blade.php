<x-app-layout>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nos Produits') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="p-5 pt-0">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @foreach($products as $unChamps)
                <div class="card text-center border-white p-2 mr-1 ml-1" style="width: 18rem; display: inline-block">
                    <img class="card-img-top" src="{{ $unChamps->image }}" alt="{{ $unChamps->image }}">
                    <div class="card-body">
                        <h5 class="card-title"><a class="stretched-link text-dark" href="{{ url('produits/'.$unChamps->id) }}" style="text-decoration: none">{{ $unChamps->name }}</a></h5>
                        <p class="card-text">{{ $unChamps->description }}</p>
                        <h6 class="card-text">{{ $unChamps->price }}</h6>
                    </div>

                    <form action="{{ url('produits/'.$unChamps->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ url('produits/'.$unChamps->id.'/edit') }}" class="btn btn-warning">Modifier</a>

                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
