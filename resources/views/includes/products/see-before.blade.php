<?php
    $cookieUuid = Cookie::get('cookie-uuid');
    $list = DB::table('visited_list')
    ->leftJoin('catalog', 'catalog.id', '=', 'visited_list.product_id')
    ->where('visited_list.cookie_uuid', $cookieUuid)
    ->inRandomOrder()
    ->take(4)
    ->get();
?>
<style>
       .product__cards-col-4{
        margin-left: auto;
        margin-right: auto;
        width: 1400px;
        display: grid;
        grid-template-columns: repeat(2, 1fr 1fr);
        justify-items: auto;
        gap: 30px;
    }
</style>
@if (count($list))
   
<h2 class="product__title">Дополнительные аксессуары</h2>
    <div class="product__cards-col-4">
            @foreach($list as $key=>$value)
                @include('includes.products.card', ['value' => $value])
            @endforeach
       
    </div>
@endif