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
$parentCategory = null;
if (isset($category)) {
    $category_name = $category->category_name;
    $categoryInfo = DB::table('categories')
    ->join('hierarchy_category', 'categories.category_id', '=', 'hierarchy_category.category_id')
    ->where('categories.category_id', $category->category_id)
    ->first();

    if ($categoryInfo->parent_id != 0){
        $parentCategory = DB::table('categories')
        ->where('category_id', $categoryInfo->parent_id)
        ->first();
    }

    //dump($categoryInfo);
    //dump($parentCategory);
}

$SEO_PARAMS = [];

$seoParams = DB::table('seo_params')
    ->get()[0];

$SEO_PARAMS['#STORE_NAME#'] = $seoParams->store_name;
$SEO_PARAMS['#CATEGORY_NAME#'] = $category_name;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 0;
$SEO_PARAMS['#PAGE#'] = ($page > 1) ? " - {$page}" : '';
$SEO_PARAMS['#TAGS#'] = '';

$PAGE_TITLE = $seoParams->category_title;
$PAGE_TITLE_H1 = $seoParams->category_title_h1;
$PAGE_META = $seoParams->category_meta;

if (isset($category) && $category->category_use_default_meta != 1) {
    $PAGE_TITLE = $category->category_title;
    $PAGE_TITLE_H1 = $category->category_title_h1;
    $PAGE_META = $category->category_meta;
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

?>

@extends('layouts.base')

@section('page.title', $PAGE_TITLE)
@section('page.description', $PAGE_META)

@section('content')

@include('includes.products.filter')
@include('includes.products.sort')
<style>
    .filtr-sort {

        background: #FFF;
        opacity: 0.8;
        left: 0px;
        top: 0px;
        border: 1px solid #939598;
        border-radius: 5px;
        height: 40px;
        padding: 2px 5px;
        font-size: 14px;
    }

    .filter-list-icon-button:hover {
        background-color: #777;
        ;
        color: #ffffff;
    }

    .sort-list-icon-button:hover {
        background-color: #777;
        ;
        color: #ffffff;
    }

    .bread-crumps__link {
        color: #000;
        text-decoration: none;
    }

    .bread-crumps__link:hover {
        color: #0000FF;
    }

    .container__buttons {
        display: flex;
        margin-left: auto;
        margin-right: auto;
        width: 1400px;
        justify-content: space-between;
        align-items: center;
    }

    .bread-crumps {
        font-size: 14px;
        width: 1400px;
        display: flex;
        justify-content: flex-start;
        margin-left: auto;
        margin-right: auto;

    }
</style>


<div class="container products-container w-100 d-flex justify-content-center flex-column align-self-center" style="align-items: start; max-width: 100%; padding: 0px 60px 0px 60px;">
    <div class="bread-crumps">
        @if ($categoryInfo->parent_id == 0)
            <span><a class="bread-crumps__link" href="/">Главная</a></span>
        @else
            <span><a class="bread-crumps__link" href="/categories/{{$parentCategory->category_url}}">{{$parentCategory->category_name}}</a></span>
        @endif
        @if ($category_name != '')
            <span style="color: #000;">/</span>
            <span style="color: #000;">{{$category_name}}</span>
        @endif
    </div>

    <div class="container__buttons">
        <h1 class="block-title " style="margin-left: -4px;">{{$PAGE_TITLE_H1}}</h1>
        <div id="filtr-sort-container" class="filtr-sort d-flex flex-nowrap">
            <div class="filter-list-icon-button px-3 d-flex justify-content-center align-items-center h-100" style="border-right: 1px solid #939598; min-width:100px; " data-bs-toggle="offcanvas" data-bs-target="#filterEdit" aria-controls="filterEdit">Фильтр</div>
            <div class="sort-list-icon-button px-3 d-flex justify-content-center align-items-center h-100" style="min-width:100px;" data-bs-toggle="offcanvas" data-bs-target="#sortDialog" aria-controls="sortDialog">Сортировка</div>
        </div>
    </div>

    @include('includes.products.tags')
    
    @include('includes.products.subcategories', ['categoryInfo' => $categoryInfo])

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