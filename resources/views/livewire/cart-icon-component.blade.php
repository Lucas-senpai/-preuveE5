<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="{{ route('shop.cart') }}">
        <img class="header-logo" alt="cart" src="{{ asset('assets/imgs/theme/icons/cart.svg') }}">
        @if(Cart::instance('cart')->count() > 0)
            <span class="pro-count blue">{{Cart::instance('cart')->count()}}</span>
        @endif
    </a>
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        <ul>
            @foreach(Cart::instance('cart')->content() as $item)
            <li>
                <div class="shopping-cart-img">
                    <a href="{{route('product.details', ['slug'=>$item->model->slug])}}"><img src="{{ asset('assets/imgs/products/')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></a>
                </div>
                <div class="shopping-cart-title">
                    <h4><a href="{{route('product.details', ['slug'=>$item->model->slug])}}" class="marge"> {{$item->model->name}}</a></h4>
                    <h4 class="margePlus"><span class="margePlus"> {{$item->qty}} x</span> {{$item->model->price}}€</h4>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="shopping-cart-footer">
            <div class="shopping-cart-total">
                <h4>Total <span>{{Cart::instance('cart')->total()}}€</span></h4>
            </div>
            <div class="shopping-cart-button">
                <a href="{{route('shop.cart')}}" class="outline">Panier</a>
                <a href="{{route('shop.checkout')}}">Commander</a>
            </div>
        </div>
    </div>
</div>
