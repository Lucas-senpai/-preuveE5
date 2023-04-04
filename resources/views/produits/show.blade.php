<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <table>
                    <tr>
                        <th>Son ID :</th>
                        <td>{{ $products->id }}</td>
                    </tr>

                    <tr>
                        <th>Sa Catégorie :</th>
                        <td>{{ $products->name }}</td>
                    </tr>

                    <tr>
                        <th>Son Nom :</th>
                        <td>{{ $products->name }}</td>
                    </tr>

                    <tr>
                        <th>Sa Description :</th>
                        <td>{{ $products->description }}</td>
                    </tr>
                    <tr>
                        <th>Son Image :</th>
                        <td>{{ $products->image }}</td>
                    </tr>

                    <tr>
                        <th>Son Prix :</th>
                        <td>{{ $products->price }}</td>
                    </tr>

                    <tr>
                        <th>La Quantité :</th>
                        <td>{{ $products->quantity }}</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
