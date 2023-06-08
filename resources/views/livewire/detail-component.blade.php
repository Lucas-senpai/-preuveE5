<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Accueil</a>
                <span></span> <a href="/shop" rel="nofollow">Magasin</a>
                <span></span> {{$product->name}}
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <div class="product-image-slider">
                                        <figure>
                                            <img class="default-img" src="{{ asset('assets/imgs/products/')}}/{{$product->image}}" alt="{{$product->name}}">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info">
                                    <h2 class="title-detail">{{$product->name}}</h2>
                                    <div class="product-detail-rating">
                                        <div class="pro-details-brand">
                                            <span> Catégorie :
                                                @if(is_null($product->cat_id))
                                                    Sans catégorie
                                                @else
                                                    <a href="{{route('product.category',['slug'=>$product->category->slug])}}">{{$product->category->name}}</a>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <ins><span class="text-brand">{{$product->price}} €</span></ins>
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        <p>{{$product->short_description}}</p>
                                        <p>Stock restant : {{$product->quantity}}</p>
                                        <p>Produit : {{$stockRestant}}</p>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                    <div class="detail-extralink">
                                        <div class="product-extra-link2">
                                            @auth
                                                @php
                                                    /*Pluck permet de prendre qu'une colonne et pas tout la table*/
                                                    $witems = Cart::instance('wishlist')->content()->pluck('id');
                                                @endphp
                                                @if($stockRestant === 'Disponible')
                                                    <button class="button button-add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->price}})">Ajouter au panier</button>
                                                @endif
                                                @if($witems->contains($product->id))
                                                    <a aria-label="Retirer des favoris" class="action-btn hover-up wishlisted" href="#" wire:click.prevent="removeFromWishlist({{$product->id}})"><i class="fi-rs-heart"></i></a>
                                                @else
                                                    <a aria-label="Ajouter aux favoris" class="action-btn hover-up" href="#" wire:click.prevent="addToWishlist({{$product->id}},'{{$product->name}}',{{$product->price}})"><i class="fi-rs-heart"></i></a>
                                                @endif
                                            @else
                                                <h5 class="mt-4">Connectez-vous afin d'ajouter le produit dans le panier !</h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#">Description</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                        <p>{{$product->description}}</p>
                                        <h4 class="mt-30">Emballage et livraison</h4>
                                        <hr class="wp-block-separator is-style-wide">
                                        <p>Les puzzles sont en bois mais nos emballages aussi afin d'assurer que nos colis arrivent bien en bon état
                                            et que nos valeur écologiques sont respectés tout du long de notre processus de satisfaction clients,
                                            de la fabrication des puzzles à leurs livraisons.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h3 class="section-title style-1 mb-30">Produits relatifs</h3>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">
                                    @foreach($rproducts as $rproduct)
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap small hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{ route('product.details',['slug'=>$rproduct->slug]) }}" tabindex="0">
                                                        <img class="default-img" src="{{ asset('assets/imgs/products/')}}/{{$rproduct->image}}" alt="{{$rproduct->name}}">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="{{ route('product.details',['slug'=>$rproduct->slug]) }}" tabindex="0">{{$rproduct->name}}</a></h2>
                                                <div class="mt-2"></div>
                                                <div class="product-price">
                                                    <span>{{$rproduct->price}} €</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
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
