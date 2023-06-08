<div>
    <style>
        .btn-danger{
            background-color: #d9534f !important;
            border: 1px solid #d9534f !important;
        }
        .btn-danger:hover{
            background-color: #b54643 !important;
            border: 1px solid #b54643 !important;
        }

        .btn-primary{
            background-color: #0275d8 !important;
            border: 1px solid #0275d8 !important;
        }
        .btn-primary:hover{
            background-color: #025bd8 !important;
            border: 1px solid #025bd8 !important;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Accueil</a>
                    <span></span> Produits
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Tous les produits</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.product.add')}}" class="btn float-end">Ajouter un produit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <table class="table table-striped text-center">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Nom</th>
                                        <th>Prix</th>
                                        <th>Catégorie</th>
                                        <th>Stock</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td><a href="{{route('product.details',['slug'=>$product->slug])}}">
                                                    <img src="{{ asset('assets/imgs/products/')}}/{{$product->image}}" alt="{{$product->name}}" width="60">
                                                </a>
                                            </td>
                                            <td><a href="{{route('product.details',['slug'=>$product->slug])}}">{{$product->name}}</a></td>
                                            <td>{{$product->price}}</td>
                                            <td>
                                                @if(is_null($product->cat_id))
                                                    Sans catégorie
                                                @else
                                                    <a href="{{route('product.category',['slug'=>$product->category->slug])}}">{{$product->category->name}}</a>
                                                @endif
                                            </td>
                                            <td>{{$product->quantity}}</td>
                                            <td>
                                                <a href="{{route('admin.product.edit',['product_id'=>$product->id])}}" class="btn btn-sm btn-primary">Modifier</a>
                                                <a href="{{route('admin.product.delete',['product_id'=>$product->id])}}" class="btn btn-sm btn-danger" wire:click.prevent="destroy({{$product->id}})">Supprimer</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                                    {{$products->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
