<div class="search-style-1">
    <form action="{{route('product.search')}}">
        <input type="text" name="q" placeholder="Rechercher un produit" value="{{$q}}">
        <button class="nothing" type="submit"><i class="fi-rs-search"></i></button>
    </form>
</div>
