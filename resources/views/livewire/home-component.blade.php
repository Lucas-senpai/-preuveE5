<div>
    <main class="main">
        <section>
            <div class="container esp">
                <div class="row align-items-center slider-animated-1">
                    <div class="col-lg-5 col-md-6">
                        <div class="hero-slider-content-2">
                            <h4 class="animated">Jouets et loisirs</h4>
                            <h2 class="animated fw-900">Woody4Shop</h2>
                            <h1 class="animated fw-900 text-brand">Expert en bois</h1>
                            <p class="animated">Pour tous les âges et toutes les envies !</p>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="single-slider-img single-slider-img-1">
                            <img class="animated slider-1-2" src="assets/imgs/slider-2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="featured section-padding position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-1.png" alt="">
                            <h4 class="bg-1">Livraison gratuite</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-2.png" alt="">
                            <h4 class="bg-3">Commandez en ligne</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-3.png" alt="">
                            <h4 class="bg-2">Économisez de l'argent</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-4.png" alt="">
                            <h4 class="bg-4">Découvrez nos offres</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-5.png" alt="">
                            <h4 class="bg-5">Produits de qualité</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-6.png" alt="">
                            <h4 class="bg-6">Assistance 24/7</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>Nos</span> Nouveautés</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                    <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                        @foreach($nproducts as $nproduct)
                            <div class="product-cart-wrap small hover-up">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ route('product.details',['slug'=>$nproduct->slug]) }}">
                                            <img class="default-img" src="{{ asset('assets/imgs/products/')}}/{{$nproduct->image}}" alt="{{$nproduct->name}}">
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <h2><a href="{{ route('product.details',['slug'=>$nproduct->slug]) }}">{{$nproduct->name}}</a></h2>
                                    <div class="mt-2"></div>
                                    <div class="product-price">
                                        <span>{{$nproduct->price}}€</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="product-tabs section-padding position-relative wow fadeIn animated">
            <div class="container">
                <h3 class="section-title mb-20"><span>Découvrez</span> nos produits</h3>
                <div class="tab-content wow fadeIn animated" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            @foreach($products as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
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
                                        <div class="product-price">
                                            <span>{{$product->price}}€</span>
                                        </div>
                                    </div>
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
