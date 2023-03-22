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

    // echo json_encode($category);
    $category_name = '';
    if (isset($category)) {
        $category_name = $category->category_name;
    }

    $SEO_PARAMS = [];
    
    $seoParams = DB::table('seo_params')
    ->get()[0];

    $SEO_PARAMS['#STORE_NAME#'] = $seoParams->store_name;
    $SEO_PARAMS['#CATEGORY_NAME#'] = $category_name;

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 0;
    $SEO_PARAMS['#PAGE#'] = ($page > 1) ? "{$page}" : '';
    $SEO_PARAMS['#TAG_NAME#'] = ($tag->tag_alias != null) ? $tag->tag_alias : $tag->property_value;
    $SEO_PARAMS['#TAGS#'] = '';

    if ($tag->tag_use_default_meta == 1) {
        $PAGE_TITLE = $seoParams->tags_default_title;
        $PAGE_TITLE_H1 = $seoParams->tags_default_title_h1;
        $PAGE_META = $seoParams->tags_default_meta;
    }
    else {
        $PAGE_TITLE = $tag->tags_default_title;
        $PAGE_TITLE_H1 = $tag->tags_default_title_h1;
        $PAGE_META = $tag->tags_default_meta;
    }

    foreach($SEO_PARAMS as $key => $value) {
        $PAGE_TITLE = str_replace($key, $value, $PAGE_TITLE);
    }

    foreach($SEO_PARAMS as $key => $value) {
        $PAGE_TITLE_H1 = str_replace($key, $value, $PAGE_TITLE_H1);
    }

    foreach($SEO_PARAMS as $key => $value) {
        $PAGE_META = str_replace($key, $value, $PAGE_META);
    }

?>

@extends('layouts.base')

@section('page.title', $PAGE_TITLE)
@section('page.description', $PAGE_META)

@section('content')

    @include('includes.products.filter')
    @include('includes.products.sort')

    <div id="filtr-sort-container" class="d-flex flex-nowrap" style="position: fixed; z-index: 1000; background: #FFF; opacity: 0.8; left: 0px; top: 0px;  border: 1px solid #939598; border-radius: 5px; height: 40px; width: 200px; padding: 2px 5px; font-size: 14px;">
        <div 
            class="filter-list-icon-button px-3 d-flex justify-content-center align-items-center h-100" 
            style="border-right: 1px solid #939598; "
            data-bs-toggle="offcanvas" 
            data-bs-target="#filterEdit" 
            aria-controls="filterEdit">Фильтр</div>
        <div 
            class="sort-list-icon-button px-3 d-flex justify-content-center align-items-center h-100"
            data-bs-toggle="offcanvas" 
            data-bs-target="#sortDialog" 
            aria-controls="sortDialog">Сортировка</div>
    </div>

    <div class="container products-container w-100 d-flex justify-content-center flex-column align-self-center" style="align-items: start; max-width: 100%; padding: 0px 60px 0px 60px;">
        <div class="bread-cramps pt-3" style="font-size: 14px;">
            <span><a href="/products" style="color: #000;">Каталог</a></span>
            @if ($category_name != '')
                <span style="color: #000;">/</span>
                <span style="color: #000;">{{$category_name}}</span>
            @endif
        </div>
        
        <h1 class="block-title d-flex flex-row w-100 my-4" style="margin-left: -4px;">{{$PAGE_TITLE_H1}}</h1>

        @include('includes.products.tags')
        @include('includes.products.list', ['products' => $products])
        
        <div class="bread-cramps bread-cramps-mobile py-3" style="font-size: 14px;">
            <span><a href="/products" style="color: #000;">Каталог</a></span>
            @if ($category_name != '')
                <span style="color: #000;">/</span>
                <span style="color: #000;">{{$category_name}}</span>
            @endif
        </div>

        <style>

            .main-content {
                overflow-x: hidden;
            }

            .filter-list-icon-button:hover {
                cursor: pointer;
            }

            .sort-list-icon-button:hover {
                cursor: pointer;
            }

            .bread-cramps,
            .bread-cramps.bread-cramps-mobile {
                display: none;
            }

            @media (min-width: 940px) {
                .bread-cramps {
                    display: block;
                }

                .bread-cramps.bread-cramps-mobile {
                    display: none;
                }

                .card-wrapper {
                    margin-top: 13px; 
                    margin-bottom: 13px; 
                   
                }
            }

            @media (min-width: 0px) and (max-width: 939px) {
                .bread-cramps {
                    display: none;
                }

                .bread-cramps.bread-cramps-mobile {
                    display: block;
                    padding-left: 10px;
                }

                .card-wrapper {
                    margin: 0px 0px 0px 10px;
                }

                .products-container {
                    padding-left: 0 !important;
                    padding-right: 0 !important;
                }
            }
        </style>
    </div>

    {{--dd(Route::is('main'))--}}

@endsection

@push('js')
    <script type="text/javascript" src="/public/js/products.js"></script>
@endpush