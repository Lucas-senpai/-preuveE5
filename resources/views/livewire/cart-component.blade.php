<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Accueil</a>
                    <span></span> <a href="/shop" rel="nofollow">Magasin</a>
                    <span></span> Panier
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            @if(Session::has('success_message'))
                                <div class="alert alert-success">
                                    <strong>{{Session::get('success_message')}}</strong>
                                </div>
                            @endif
                            @if(Cart::instance('cart')->count() > 0)
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                <tr class="main-heading">
                                    <th scope="col">Image</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach(Cart::instance('cart')->content() as $item)
                                    <tr>
                                        <td class="image product-thumbnail"><img src="{{ asset('assets/imgs/products/')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></td>
                                        <td class="product-des product-name">
                                            <h5 class="product-name"><a href="{{ route('product.details',['slug'=>$item->model->slug]) }}">{{$item->model->name}}</a></h5>
                                        </td>
                                        <td class="price" data-title="Prix"><span>{{$item->model->price}} €</span></td>
                                        <td class="text-center" data-title="Quantité">
                                            <div class="detail-qty border radius  m-auto">
                                                <a href="#" class="qty-down" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"><i class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val">{{$item->qty}}</span>
                                                @if($item->model->quantity > 0)
                                                    <a href="#" class="qty-up" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"><i class="fi-rs-angle-small-up"></i></a>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-right" data-title="Total">
                                            <span>{{$item->subtotal}} €</span>
                                        </td>
                                        <td class="action" data-title="Supprimer"><a href="#" class="text-muted" wire:click.prevent="destroy('{{$item->rowId}}', '{{$item->model->id}}', {{$item->qty}})"><i class="fi-rs-trash"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                            <div class="cart-action text-end">
                                <a class="btn" href="{{route('shop.checkout')}}">Commander</a>
                            </div>

                        @else
                            <h2 class="text-center">Aucun produit dans le panier</h2>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
