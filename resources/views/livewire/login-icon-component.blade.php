<div class="header-action-icon-2">
    <img class="header-logo" alt="user" src="{{ asset('assets/imgs/theme/icons/user.svg') }}">
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        @auth
            <ul>
                @if(Auth::user()->utype == 'ADM')
                    <a href="{{ route('admin.product.add') }}">
                        <li>
                            <div class="shopping-cart-img">
                                <img alt="produit" src="{{ asset('assets/imgs/theme/icons/product-add.svg')}}" style="height: 30px;">
                            </div>
                            <div>
                                <h4 class="text-brand">Ajouter</h4>
                                <h4><span>Un produit</span></h4>
                            </div>
                        </li>
                    </a>
                    <div class="mt-3 mb-3"></div>
                    <a href="{{ route('admin.category.add') }}">
                        <li>
                            <div class="shopping-cart-img">
                                <img alt="category" src="{{ asset('assets/imgs/theme/icons/category-plus.svg')}}" style="height: 30px;">
                            </div>
                            <div>
                                <h4 class="text-brand">Ajouter</h4>
                                <h4><span>Une catégorie</span></h4>
                            </div>
                        </li>
                    </a>
                    <div class="mt-3 mb-3"></div>
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                            <li>
                                <div class="shopping-cart-img">
                                    <img alt="login" src="{{ asset('assets/imgs/theme/icons/log-out.svg')}}" style="height: 30px;">
                                </div>
                                <div>
                                    <h4 class="text-brand">Se déconnecter</h4>
                                    <h4><span>De votre compte</span></h4>
                                </div>
                            </li>
                        </a>
                    </form>
                @else
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                            <li>
                                <div class="shopping-cart-img">
                                    <img alt="login" src="{{ asset('assets/imgs/theme/icons/log-out.svg')}}" style="height: 40px;">
                                </div>
                                <div>
                                    <h4 class="text-brand">Se déconnecter</h4>
                                    <h4><span>De votre compte</span></h4>
                                </div>
                            </li>
                        </a>
                    </form>
                @endif
            </ul>
        @else
            <ul>
                <a href="{{ route('login') }}">
                    <li>
                        <div class="shopping-cart-img">
                            <img alt="login" src="{{ asset('assets/imgs/theme/icons/log-in.svg')}}" style="height: 40px;">
                        </div>
                        <div>
                            <h4 class="text-brand">Se connecter</h4>
                            <h4><span>À votre compte</span></h4>
                        </div>
                    </li>
                </a>

                <div class="mt-3 mb-3"></div>

                <a href="{{ route('register') }}">
                    <li>
                        <div class="shopping-cart-img">
                            <img alt="login" src="{{ asset('assets/imgs/theme/icons/user-plus.svg')}}" style="height: 40px;">
                        </div>
                        <div>
                            <h4 class="text-brand">S'enregistrer</h4>
                            <h4><span>Sur le site</span></h4>
                        </div>
                    </li>
                </a>
            </ul>
        @endif
    </div>
</div>
