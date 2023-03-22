<?php
    $cookieUuid = Cookie::get('cookie-uuid');
    $list = DB::table('visited_list')
    ->leftJoin('catalog', 'catalog.id', '=', 'visited_list.product_id')
    ->where('visited_list.cookie_uuid', $cookieUuid)
    ->inRandomOrder()
    ->take(4)
    ->get();
?>
@if (count($list))
   
<h2 class="product__title">Дополнительные аксессуары</h2>
    <div class="container__similar-product">
            @foreach($list as $key=>$value)
                @include('includes.products.card2', ['value' => $value])
            @endforeach
       
    </div>
@endif