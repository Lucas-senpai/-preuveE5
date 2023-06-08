<!DOCTYPE html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <title>Woody4Shop</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/logo/logo.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @livewireStyles
</head>

<body>
<header class="header-area header-style-1 header-height-2">
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="/"><img src="{{asset('assets/imgs/logo/logo.jpg')}}" alt="logo"></a>
                </div>
                <div class="header-right">
                    @livewire('header-search-component')
                    <div class="header-action-right">
                        <div class="header-action-2">
                            @auth
                                @livewire('wishlist-icon-component')
                                @livewire('cart-icon-component')
                            @endif
                            @livewire('login-icon-component')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="/"><img src="{{asset('assets/imgs/logo/logo.jpg')}}" alt="logo"></a>
                </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block mx-auto">
                        <nav>
                            <ul>
                                <li ><a href="/">Accueil</a></li>
                                <li><a href="{{route('shop')}}">Magasin</a></li>
                                @auth
                                    <li><a href="#">Mon compte<i class="fi-rs-angle-down"></i></a>
                                            @if(Auth::user()->utype == 'ADM')
                                                <ul class="sub-menu">
                                                    <li><a href="{{route('admin.products')}}">Produits</a></li>
                                                    <li><a href="{{route('admin.categories')}}">Catégories</a></li>
                                                    <li><a href="{{route('admin.user')}}">Utilisateurs</a></li>
                                                    <li>
                                                        <form method="POST" action="{{route('logout')}}">
                                                            @csrf
                                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Se Déconnecter</a>
                                                        </form>
                                                    </li>
                                                </ul>
                                            @else
                                                <ul class="sub-menu">
                                                    <li><a href="{{route('shop.wishlist')}}">Mes Favoris</a></li>
                                                    <li><a href="{{route('shop.cart')}}">Mon Panier</a></li>
                                                    <li>
                                                        <form method="POST" action="{{route('logout')}}">
                                                            @csrf
                                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Se Déconnecter</a>
                                                        </form>
                                                    </li>
                                                </ul>
                                            @endif
                                    </li>
                                @endif
                                <li><a href="{{route('contact')}}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>

                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        @auth
                            @livewire('wishlist-icon-component')
                            @livewire('cart-icon-component')
                        @endif
                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="/"><img src="{{asset('assets/imgs/logo/logo.jpg')}}" alt="logo"></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                @livewire('header-search-component')
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="/">Accueil</a></li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="/shop">Magasin</a></li>
                        @auth
                            <li><a href="#">Mon compte</a>
                                @if(Auth::user()->utype == 'ADM')
                                    <ul class="sub-menu">
                                        <li><a href="{{route('admin.products')}}">Produits</a></li>
                                        <li><a href="{{route('admin.categories')}}">Catégories</a></li>
                                        <li><a href="{{route('admin.user')}}">Utilisateurs</a></li>
                                        <li>
                                            <form method="POST" action="{{route('logout')}}">
                                                @csrf
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Se Déconnecter</a>
                                            </form>
                                        </li>
                                    </ul>
                                @else
                                    <ul class="sub-menu">
                                        <li><a href="{{route('shop.wishlist')}}">Mes Favoris</a></li>
                                        <li><a href="{{route('shop.cart')}}">Mon Panier</a></li>
                                        <li>
                                            <form method="POST" action="{{route('logout')}}">
                                                @csrf
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Se Déconnecter</a>
                                            </form>
                                        </li>
                                    </ul>
                                @endif
                            </li>
                        @endif
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="/contact">Contact</a></li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            @auth
                <div class="mobile-header-info-wrap mobile-header-border"></div>
            @else
                <div class="mobile-header-info-wrap mobile-header-border">
                    <div class="single-mobile-header-info">
                        <a href="{{route('login')}}">Se connecter </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="{{route('register')}}">S'enregistrer</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

{{$slot}}

<footer class="main">
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20 separa">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="widget-about font-md mb-md-5 mb-lg-0">
                        <div class="logo logo-width-1 wow fadeIn animated">
                            <a href="/"><img src="{{asset('assets/imgs/logo/logo.jpg')}}" alt="logo"></a>
                        </div>
                        <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                        <p class="wow fadeIn animated">
                            <strong>Adresse: </strong>8 Rue de Grange Burlat, 42800 Rive-de-Gier
                        </p>
                        <p class="wow fadeIn animated">
                            <strong>Téléphone: </strong>06.43.42.41.40
                        </p>
                        <p class="wow fadeIn animated">
                            <strong>Email: </strong>sav@woody4shop.fr
                        </p>
                    </div>
                </div>

                <div class="col-lg-7 col-md-6">
                    <h5 class="widget-title wow fadeIn animated text-center">Nos valeurs</h5>
                    <p class="text-center">Tous nos puzzles sont fabriqués en France à partir de bois provenant de forêts françaises.</p>
                    <p class="text-center">Profitez des meilleurs prix avec un service 100% français.</p>
                    <p class="text-center">Depuis 1977 !</p>
                </div>

                <div class="col-lg-2  col-md-3">
                    <h5 class="widget-title wow fadeIn animated">Notre Magasin</h5>
                    <ul class="footer-list wow fadeIn animated">
                        <li><a href="{{route('shop')}}">Nos Produits</a></li>
                        @auth
                            <li><a href="{{route('shop.wishlist')}}">Mes Favoris</a></li>
                            <li><a href="{{route('shop.cart')}}">Mon Panier</a></li>
                        @endif
                        <li><a href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</footer>
<!-- Vendor JS-->
<script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/slick.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.syotimer.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/wow.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/js/plugins/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/waypoints.js') }}"></script>
<script src="{{ asset('assets/js/plugins/counterup.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/images-loaded.js') }}"></script>
<script src="{{ asset('assets/js/plugins/isotope.js') }}"></script>
<script src="{{ asset('assets/js/plugins/scrollup.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.vticker-min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.theia.sticky.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.elevatezoom.js') }}"></script>
<!-- Template  JS -->
<script src="{{ asset('assets/js/main.js?v=3.3') }}"></script>
<script src="{{ asset('assets/js/shop.js?v=3.3') }}"></script>
@livewireScripts
</body>
</html>
