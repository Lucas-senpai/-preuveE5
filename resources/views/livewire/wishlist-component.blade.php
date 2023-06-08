<div>
    <style>
        .wishlisted{
            background-color: #F15412 !important;
            border: 1px solid transparent !important;
        }
        .wishlisted i{
            color: #FFF !important;
        }
        .product-cart-wrap .product-action-1 a.action-btn::after{
            left: -32%;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Accueil</a>
                    <span></span> Favoris
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row product-grid-4">
                    @if(Cart::instance('wishlist')->count() > 0)
                        @foreach(Cart::instance('wishlist')->content() as $item)
                            <div class="col-lg-3 col-md-3 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product.details',['slug'=>$item->model->slug]) }}">
                                                <img class="default-img" src="{{ asset('assets/imgs/products/')}}/{{$item->model->image}}" alt="{{$item->model->name}}">
                                            </a>
                                        </div>
                                        @if($item->model->quantity > 0)
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="disponible">Disponible</span>
                                            </div>
                                        @endif
                                        @if($item->model->quantity === 0)
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="indisponible">Indisponible</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            @if(is_null($item->model->cat_id))
                                                Sans catégorie
                                            @else
                                                <a href="{{route('product.category',['slug'=>$item->model->category->slug])}}">{{$item->model->category->name}}</a>
                                            @endif
                                        </div>
                                        <h2><a href="{{ route('product.details',['slug'=>$item->model->slug]) }}">{{$item->model->name}}</a></h2>
                                        <div class="mt-3"></div>
                                        <div class="product-price mb-2">
                                            <span>{{$item->model->price}}€</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Retirer des favoris" class="action-btn hover-up wishlisted" href="#" wire:click.prevent="removeFromWishlist({{$item->model->id}})"><i class="fi-rs-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h2 class="text-center">Aucun produit dans les favoris</h2>
                    @endif
                </div>
            </div>
        </section>
    </main>
</div>
