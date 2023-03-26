<?php
    $cookieUuid = Cookie::get('cookie-uuid');
    //$list = DB::table('visited_list')
    //->leftJoin('catalog', 'catalog.id', '=', 'visited_list.product_id')
    //->where('visited_list.cookie_uuid', $cookieUuid)
    //->inRandomOrder()
    //->take(4)
    //->get();

    $list = DB::table('visited_list')
    ->join('categories', 'categories.category_id', '=', 'visited_list.parent_id')
    ->join('catalog', 'catalog.id', '=', 'visited_list.product_id')
    ->where('visited_list.cookie_uuid', $cookieUuid)
    ->inRandomOrder()
    ->take(4)
    ->get();
?>
@if (count($list))
<h2 class="product__title">Смотрели ранее</h2>
    <div class="product__cards-col-4_1200">
            @foreach($list as $key=>$value)
                @include('includes.products.card', ['value' => $value])
            @endforeach
        </div>

        <!--<div class="mobile-block" style="overflow-x: auto;">
            <div class="d-flex pb-3" style="user-select: none; margin-left: 10px;">
                @foreach($list as $key=>$value)
                    @include('includes.product.mini-card', ['value' => $value])
                @endforeach
            </div>
        </div>
    </div>
@endif-->