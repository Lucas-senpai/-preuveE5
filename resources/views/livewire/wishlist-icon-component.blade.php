<div class="header-action-icon-2">
    <a href="{{route('shop.wishlist')}}">
        <img class="header-logo" alt="wishlist" src="{{asset('assets/imgs/theme/icons/heart.svg')}}">
        @if(Cart::instance('wishlist')->count() > 0)
            <span class="pro-count blue">{{Cart::instance('wishlist')->count()}}</span>
        @endif
    </a>
</div>
