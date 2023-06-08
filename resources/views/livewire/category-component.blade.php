<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Accueil</a>
                    <span></span> <a href="/shop" rel="nofollow">Magasin</a>
                    <span></span> {{$category_name}}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> Nous avons trouvé <strong class="text-brand">{{$products->total()}}</strong> produit(s) dans la catégorie <strong class="text-brand">{{$category_name}}</strong> !</p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Voir:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{$pageSize}} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{ $pageSize==9 ? 'active': ''}}" href="#" wire:click.prevent="changePageSize(9)">9</a></li>
                                            <li><a class="{{ $pageSize==15 ? 'active': ''}}" href="#" wire:click.prevent="changePageSize(15)">15</a></li>
                                            <li><a class="{{ $pageSize==21 ? 'active': ''}}" href="#" wire:click.prevent="changePageSize(21)">21</a></li>
                                            <li><a class="{{ $pageSize==30 ? 'active': ''}}" href="#" wire:click.prevent="changePageSize(30)">30</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Trier par:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{$orderBy}} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{ $orderBy=='Défault' ? 'active': ''}}" href="#" wire:click.prevent="changeOrderBy('Défault')">Défault</a></li>
                                            <li><a class="{{ $orderBy=='Prix: croissant' ? 'active': ''}}" href="#" wire:click.prevent="changeOrderBy('Prix: croissant')">Prix: croissant</a></li>
                                            <li><a class="{{ $orderBy=='Prix: décroissant' ? 'active': ''}}" href="#" wire:click.prevent="changeOrderBy('Prix: décroissant')">Prix: décroissant</a></li>
                                            <li><a class="{{ $orderBy=='Nouveautées' ? 'active': ''}}" href="#" wire:click.prevent="changeOrderBy('Nouveautées')">Nouveautés</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row product-grid-3">
                            @php
                                $witems = Cart::instance('wishlist')->content()->pluck('id');
                            @endphp
                            @foreach($products as $product)
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('product.details',['slug'=>$product->slug]) }}">
                                                    <img class="default-img" src="{{ asset('assets/imgs/products/')}}/{{$product->image}}" alt="{{$product->name}}">
                                                </a>
                                            </div>
                                            @if($product->quantity > 0)
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="disponible">Disponible</span>
                                                </div>
                                            @endif
                                            @if($product->quantity === 0)
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="indisponible">Indisponible</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                @if(is_null($product->cat_id))
                                                    Sans catégorie
                                                @else
                                                    <a href="{{route('product.category',['slug'=>$product->category->slug])}}">{{$product->category->name}}</a>
                                                @endif
                                            </div>
                                            <h2><a href="{{ route('product.details',['slug'=>$product->slug]) }}">{{$product->name}}</a></h2>
                                            <div class="mt-3"></div>
                                            <div class="product-price mb-2">
                                                <span>{{$product->price}}€</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                @auth
                                                    @if($witems->contains($product->id))
                                                        <a aria-label="Retirer des favoris" class="action-btn hover-up wishlisted" wire:click.prevent="removeFromWishlist({{$product->id}})"><i class="fi-rs-heart"></i></a>
                                                    @else
                                                        <a aria-label="Ajouter aux favoris" class="action-btn hover-up" wire:click.prevent="addToWishlist({{$product->id}},'{{$product->name}}',{{$product->price}})"><i class="fi-rs-heart"></i></a>
                                                    @endif
                                                    @if($product->quantity > 0)
                                                        <a aria-label="Ajouter au panier" class="panier action-btn hover-up" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->price}})"><i class="fi-rs-shopping-bag-add"></i></a>
                                                    @else
                                                        <a aria-label="Produit indisponible" class="panier action-btn outOfStock"><i class="fi-rs-shopping-bag-add"></i></a>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--pagination-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            {{$products->links()}}
                        </div>
                    </div>

                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
                        </div>
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Les Catégories</h5>
                            <ul class="categories">
                                @foreach($categories as $category)
                                    <li><a href="{{route('product.category',['slug'=>$category->slug])}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">Nouveaux produits</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            @foreach($nouv_products as $nouv_product)
                                <div class="single-post clearfix">
                                    <a class="image" href="{{ route('product.details',['slug'=>$nouv_product->slug]) }}">
                                        <img src="{{ asset('assets/imgs/products/')}}/{{$nouv_product->image}}" alt="{{$nouv_product->name}}">
                                    </a>
                                    <div class="content pt-10">
                                        <h5><a href="{{ route('product.details',['slug'=>$nouv_product->slug]) }}">{{$nouv_product->name}}</a></h5>
                                        <p class="price mb-0 mt-5">{{$nouv_product->price}}€</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
