<?php
$cookieUuid = Cookie::get('cookie-uuid');

$list = DB::table('wish_list')
    ->where('cookie_uuid', $cookieUuid)
    ->select('product_id')
    ->get();

$wishList = [];
foreach ($list as $item) {
    array_push($wishList, $item->product_id);
}

$SEO_PARAMS = [];

$seoParams = DB::table('seo_params')
    ->get()[0];

$SEO_PARAMS['#STORE_NAME#'] = $seoParams->store_name;
$SEO_PARAMS['#PRODUCT_NAME#'] = $product['Наименование'];
$SEO_PARAMS['#CATEGORY_NAME#'] = '';
$SEO_PARAMS['#BRAND_NAME#'] = '';

$formatedPrice = $product['Цена'];
try {
    $formatedPrice = number_format($product['Цена'], 0, '.', ' ');
} catch (Exception $e) {
    // Log::debug($e);
}
$SEO_PARAMS['#PRICE#'] = $formatedPrice;
$SEO_PARAMS['#TAGS#'] = '';
$SEO_PARAMS['#PRODUCT_ARTNO#'] = $product['Артикул'];
$SEO_PARAMS['#OFFER_ARTNO#'] = '';

if ($product['products_use_default_meta'] == 1) {
    $PAGE_TITLE = $seoParams->products_title;
    $PAGE_TITLE_H1 = $seoParams->products_title_h1;
    $PAGE_META = $seoParams->products_meta;
    $PAGE_ADD_DESC = $seoParams->products_desc;
} else {
    $PAGE_TITLE = $product['products_title'];
    $PAGE_TITLE_H1 = $product['products_title_h1'];
    $PAGE_META = $product['products_meta'];
    $PAGE_ADD_DESC = $product['products_desc'];
}

foreach ($SEO_PARAMS as $key => $value) {
    $PAGE_TITLE = str_replace($key, $value, $PAGE_TITLE);
}

foreach ($SEO_PARAMS as $key => $value) {
    $PAGE_TITLE_H1 = str_replace($key, $value, $PAGE_TITLE_H1);
}

foreach ($SEO_PARAMS as $key => $value) {
    $PAGE_META = str_replace($key, $value, $PAGE_META);
}

foreach ($SEO_PARAMS as $key => $value) {
    $PAGE_ADD_DESC = str_replace($key, $value, $PAGE_ADD_DESC);
}

?>

@extends('layouts.base')

@section('page.title', $PAGE_TITLE)
@section('page.description', $PAGE_META)

@section('content')

<meta name="product-id" content="{{ $product['id'] }}">
<meta name="category-id" content="{{ $product['category_id'] }}">

<div class="container product-container w-100 d-flex justify-content-center flex-column align-self-center" style="align-items: start; max-width: 100%;">

    @include('includes.product.card-desc-images', ['product' => $product])
    @include('includes.product.card-desc-properties', ['product' => $product])
    @include('includes.product.questions')
    @include('includes.product.reviews')
    @include('includes.product.like')
    @include('includes.product.additions')
    @include('includes.product.see-before')

</div>
<style>
    @media (min-width: 768px) {

        .desktop-block,
        .card-desc-block-desktop {
            display: flex;
        }

        .mobile-block,
        .card-desc-block-mobile {
            display: none;
        }

        .product-container {
            padding: 0px 60px 0px 60px;
        }

        .product-card-desc,
        .card-properties .item-property {
            font-size: 16px;
        }
    }

    @media (min-width: 0px) and (max-width: 767px) {

        .desktop-block,
        .card-desc-block-desktop {
            display: none;
        }

        .mobile-block,
        .card-desc-block-mobile {
            display: flex;
        }

        .product-container {
            padding: 0px;
        }

        #make-question-button,
        #make-review-button {
            margin-left: 10px;
            font-size: calc((100vw - 320px)/(768 - 320) * (14 - 10) + 10px);
            padding: 0 !important;
            width: calc((100vw - 320px)/(768 - 320) * (200 - 100) + 100px) !important;
            height: calc((100vw - 320px)/(768 - 320) * (55 - 30) + 30px) !important;
        }

        .questions-list,
        .product-card-desc,
        .card-properties {
            padding-left: 10px;
            padding-right: 10px;
        }

        .questions-list span,
        .questions-list .text-success,
        .questions-list .text-danger,
        .product-card-desc,
        .card-properties .item-property {
            font-size: calc((100vw - 320px)/(768 - 320) * (16 - 10) + 10px);
        }
    }
</style>

{{--dd(Route::is('main'))--}}

@endsection

@push('js')

<script type="text/javascript" src="/public/js/product.js"></script>
@endpush