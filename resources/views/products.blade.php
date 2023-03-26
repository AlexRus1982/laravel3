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
        position: fixed;
        z-index: 1000;
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

    .filtr-sort-nofixed {
        background: #FFF;
        opacity: 0.8;
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

    .container__buttons {
        display: flex;
        margin-left: auto;
        margin-right: auto;
        width: 1400px;
        justify-content: space-between;
        align-items: center;
    }

    .sort-list-icon-button:hover {
        background-color: #777;
        ;
        color: #ffffff;
    }

    .bread-crumps__link_black {
        color: #000;
        text-decoration: none;
    }

    .bread-crumps__link {
        color: #000;
        text-decoration: none;
    }

    .bread-crumps__link:hover {
        color: #0000FF;
    }

    .bread-crumps {
        font-size: 14px;
        width: 1400px;
        display: flex;
        margin-left: auto;
        margin-right: auto;
        justify-content: flex-start;

    }

    .display__none.display__none.display__none {
        display: none;
    }

    .filtr-sort-nofixed {
        background: #FFF;
        opacity: 0.8;
        border: 1px solid #939598;
        border-radius: 5px;
        height: 40px;
        padding: 2px 5px;
        font-size: 14px;
    }

    .filtr-sort {
        display: flex;
        flex-wrap: nowrap;
    }

    .block-title-1 {
        display: flex;
        width: 1400px;
        margin-left: auto;
        margin-right: auto;
    }

    .block-title {
        display: flex;
        width: 1400px;
        margin-left: auto;
        margin-right: auto;
    }
</style>
<div id="filtr-sort-container" class="filtr-sort ">
    <div class="filter-list-icon-button px-3 d-flex justify-content-center align-items-center h-100" style="border-right: 1px solid #939598; min-width:100px; " data-bs-toggle="offcanvas" data-bs-target="#filterEdit" aria-controls="filterEdit">Фильтр</div>
    <div class="sort-list-icon-button px-3 d-flex justify-content-center align-items-center h-100" style="min-width:100px;" data-bs-toggle="offcanvas" data-bs-target="#sortDialog" aria-controls="sortDialog">Сортировка</div>
</div>

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
    <h1 id="block-title" class="block-title   my-4">{{$PAGE_TITLE_H1}}</h1>

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
                margin: 0px 0px 0px 0px;
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
<script>
    const col = document.querySelector('.col');
    const but_6 = document.querySelector('#but_6');
    const but_5 = document.querySelector('#but_5');
    const but_4 = document.querySelector('#but_4');
    const but_3 = document.querySelector('#but_3');
    const but_2 = document.querySelector('#but_2');
    //heart_position_left_top
    
    const width_button1920 = document.querySelector('#width_button-1920');
    const width_button1400 = document.querySelector('#width_button-1400');
    const width_button1200 = document.querySelector('#width_button-1200');
    const heart_position_center = document.querySelector('#heart_position_center');
    const heart_position_left = document.querySelector('#heart_position_left');
    const heart_position_center_top= document.querySelector('#heart_position_center_top');
    const heart_position_left_top= document.querySelector('#heart_position_left_top');
    const text_center = document.querySelector('#text_center');
    const text_left = document.querySelector('#text_left');
    const mobile_but_2 = document.querySelector('#mobile_but_2');
    const mobile_but_1 = document.querySelector('#mobile_but_1');
    const card_title = document.querySelectorAll('.card-title');
    const card_text = document.querySelectorAll('.card__text');
    const block_title = document.querySelector('.block-title');
    const bread_crumps = document.querySelector('.bread-crumps');
    const container__buttons = document.querySelector('.container__buttons');
    const tags_list = document.querySelector('.tags-list');
    const show_more = document.querySelector('.show-more-button-wrapper');
    const card_heart = document.querySelectorAll('.card__heart');
    const filtr_right = document.querySelector('#filtr_right');
    const filtr_center = document.querySelector('#filtr_center');
    const filtr_sort = document.querySelector('.filtr-sort');
    const paggination = document.querySelector('.paggination');

    class ConsructorMaket {
        constructor() {}
        //количество колонок
        addColumn(
            col,
            button,
            classNameAdd,
            classNameRemove_1,
            classNameRemove_2,
            classNameRemove_3,
            classNameRemove_4,
            mobileclassNameRemove_1,
            mobileclassNameRemove_2
            
            ) {

            button.addEventListener('click', function() {
                col.classList.remove(this.classNameRemove_1);
                col.classList.remove(classNameRemove_2);
                col.classList.remove(classNameRemove_3);
                col.classList.remove(classNameRemove_4);
                col.classList.remove(classNameRemove_4);
                col.classList.remove(mobileclassNameRemove_1);
                col.classList.remove(mobileclassNameRemove_2);
                col.classList.add(classNameAdd);
            });
        }
        //ширина макета
        widthMaket(
            button,
            container__buttons,
            col,
            bread_crumps,
            tags_list,
            show_more,
            block_title,
            paggination,
            classNameAdd,
            classNameRemove_1,
            classNameRemove_2,
            mobileclassNameRemove_1,
            mobileclassNameRemove_2

        ) {
            button.addEventListener('click', function() {
                
               block_title.classList.add(classNameAdd);
                container__buttons.classList.add(classNameAdd);
                bread_crumps.classList.add(classNameAdd);
                tags_list.classList.add(classNameAdd);
                show_more.classList.add(classNameAdd);
                paggination.classList.add(classNameAdd);
                col.classList.remove(classNameRemove_1);
                col.classList.add(classNameAdd);
                col.classList.remove(mobileclassNameRemove_1);
                col.classList.remove(mobileclassNameRemove_2);
                paggination.classList.remove(classNameRemove_1);
                block_title.classList.remove(classNameRemove_1);
                container__buttons.classList.remove(classNameRemove_1);
                bread_crumps.classList.remove(classNameRemove_1);
                tags_list.classList.remove(classNameRemove_1);
                show_more.classList.remove(classNameRemove_1);
                col.classList.remove(classNameRemove_2);
                paggination.classList.remove(classNameRemove_2);
                container__buttons.classList.remove(classNameRemove_2);
                bread_crumps.classList.remove(classNameRemove_2);
                tags_list.classList.remove(classNameRemove_2);
                show_more.classList.remove(classNameRemove_2);
                block_title.classList.remove(classNameRemove_2);
            });
        }
        heartPosition(button, classNameAdd, classNameRemove,classNameRemove1,classNameRemove2) {
            button.addEventListener('click', function() {
                card_heart.forEach(function(el) {
                    el.classList.add(classNameAdd);
                    el.classList.remove(classNameRemove);
                    el.classList.remove(classNameRemove1);
                    el.classList.remove(classNameRemove2);
                })

            });
        }

        filtrPositionRight(button, el1, el2, el3, classNameAdd) {
            button.addEventListener('click', function() {
                el1.classList.add(classNameAdd);
                el2.classList.remove(classNameAdd);
                el3.classList.add(classNameAdd);

            });

        }

        filtrPositionCenter(button, el1, el2, el3, classNameAdd) {
            button.addEventListener('click', function() {
                el1.classList.add(classNameAdd);
                el2.classList.remove(classNameAdd);
                el3.classList.remove(classNameAdd);
            });
        }
        textPosition(button, classNameAdd, classNameRemove, classNameAdd2, classNameRemove2) {
            button.addEventListener('click', function() {
                card_title.forEach(function(el) {
                    el.classList.add(classNameAdd);
                    el.classList.remove(classNameRemove);
                });
                card_text.forEach(function(el) {
                    el.classList.add(classNameAdd2);
                    el.classList.remove(classNameRemove2);
                });

            });
        }

        widthMaketMobile(
            button,
            container__buttons,
            col,
            bread_crumps,
            tags_list,
            show_more,
            block_title,
            paggination,
            classNameAdd,
            classNameRemove_1,
            classNameRemove_2,
            colclassNameAdd,
            colclassNameRemove_1,
            colclassNameRemove_2,
            colclassNameRemove_3,
            colclassNameRemove_4,
            mobileclassNameRemove,
            

        ) {
            button.addEventListener('click', function() {
                col.classList.add(colclassNameAdd);
                col.classList.remove(colclassNameRemove_1);
                col.classList.remove(colclassNameRemove_2);
                col.classList.remove(colclassNameRemove_3);
                col.classList.remove(colclassNameRemove_4);
                col.classList.add(colclassNameAdd);
                block_title.classList.add(classNameAdd);
                container__buttons.classList.add(classNameAdd);
                bread_crumps.classList.add(classNameAdd);
                tags_list.classList.add(classNameAdd);
                show_more.classList.add(classNameAdd);
                paggination.classList.add(classNameAdd);
                col.classList.remove(classNameRemove_1);
                col.classList.remove(mobileclassNameRemove);
                paggination.classList.remove(classNameRemove_1);
                block_title.classList.remove(classNameRemove_1);
                container__buttons.classList.remove(classNameRemove_1);
                bread_crumps.classList.remove(classNameRemove_1);
                tags_list.classList.remove(classNameRemove_1);
                show_more.classList.remove(classNameRemove_1);
                col.classList.remove(classNameRemove_2);
                paggination.classList.remove(classNameRemove_2);
                container__buttons.classList.remove(classNameRemove_2);
                bread_crumps.classList.remove(classNameRemove_2);
                tags_list.classList.remove(classNameRemove_2);
                show_more.classList.remove(classNameRemove_2);
                block_title.classList.remove(classNameRemove_2);
            });
        }
    }



    const consructorMaket = new ConsructorMaket();
    consructorMaket.addColumn(
        col,
        but_6,
        'product__cards-col-6',
        'product__cards-col-5',
        'product__cards-col-4',
        'product__cards-col-3',
        'product__cards-col-2',
        'product__cards-col-1-mobile',
        'product__cards-col-2-mobile'
        );
    consructorMaket.addColumn(
        col,
        but_5,
        'product__cards-col-5',
        'product__cards-col-6',
        'product__cards-col-4',
        'product__cards-col-3',
        'product__cards-col-2',
        'product__cards-col-1-mobile',
        'product__cards-col-2-mobile'
        );

    consructorMaket.addColumn(
        col,
        but_4,
        'product__cards-col-4',
        'product__cards-col-6',
        'product__cards-col-5',
        'product__cards-col-3',
        'product__cards-col-2',
        'product__cards-col-1-mobile',
        'product__cards-col-2-mobile'
        );
    consructorMaket.addColumn(
        col,
        but_3,
        'product__cards-col-3',
        'product__cards-col-6',
        'product__cards-col-4',
        'product__cards-col-5',
        'product__cards-col-2',
        'product__cards-col-1-mobile',
        'product__cards-col-2-mobile');
    consructorMaket.addColumn(
        col,
        but_2,
        'product__cards-col-2',
        'product__cards-col-6',
        'product__cards-col-4',
        'product__cards-col-5',
        'product__cards-col-3',
        'product__cards-col-1-mobile',
        'product__cards-col-2-mobile');

    consructorMaket.widthMaket(
        width_button1920,
        container__buttons,
        col,
        bread_crumps,
        tags_list,
        show_more,
        block_title,
        paggination,
        'product__width-1920',
        'product__width-1400',
        'product__width-1200',
        'product__cards-col-1-mobile',
        'product__cards-col-2-mobile'
    );

    consructorMaket.widthMaket(
        width_button1400,
        container__buttons,
        col,
        bread_crumps,
        tags_list,
        show_more,
        block_title,
        paggination,
        'product__width-1400',
        'product__width-1920',
        'product__width-1200',
        'product__cards-col-1-mobile',
        'product__cards-col-2-mobile'
    );

    consructorMaket.widthMaket(
        width_button1200,
        container__buttons,
        col,
        bread_crumps,
        tags_list,
        show_more,
        block_title,
        paggination,
        'product__width-1200',
        'product__width-1400',
        'product__width-1920',
        'product__cards-col-1-mobile',
        'product__cards-col-2-mobile'
    );
    //card__heart_center
    //вишлист
    consructorMaket.heartPosition(heart_position_center, 'card__heart-center', 'card__heart','card__heart-top','card__heart-center-top');
    consructorMaket.heartPosition(heart_position_left, 'card__heart', 'card__heart-center','card__heart-top','card__heart-center-top');
    consructorMaket.heartPosition(heart_position_left_top, 'card__heart-top', 'card__heart-center','card__heart','card__heart-center-top');
    consructorMaket.heartPosition(heart_position_center_top,'card__heart-center-top', 'card__heart-center','card__heart','card__heart-top');
    //Фильтр и сортировка
   
    consructorMaket.filtrPositionRight(
        filtr_right,
        filtr_sort,
        container__buttons,
        block_title,
        'display__none');

    consructorMaket.filtrPositionCenter(
        filtr_center,
        container__buttons,
        filtr_sort,
        block_title,
        'display__none');

    consructorMaket.textPosition(
        text_center,
        'card-title-center',
        'card-title-left',
        'card__text-center',
        'card__text-left',
    );
    consructorMaket.textPosition(
        text_left,
        'card-title-left',
        'card-title-center',
        'card__text-left',
        'card__text-center'
    );

    consructorMaket.widthMaketMobile(
        mobile_but_2,
        container__buttons,
        col,
        bread_crumps,
        tags_list,
        show_more,
        block_title,
        paggination,
        'product__width-1920',
        'product__width-1400',
        'product__width-1200',
        'product__cards-col-2-mobile',
        'product__cards-col-5',
        'product__cards-col-4',
        'product__cards-col-3',
        'product__cards-col-6',
        'product__cards-col-1-mobile',
    );
    consructorMaket.widthMaketMobile(
        mobile_but_1,
        container__buttons,
        col,
        bread_crumps,
        tags_list,
        show_more,
        block_title,
        paggination,
        'product__width-1920',
        'product__width-1400',
        'product__width-1200',
        'product__cards-col-1-mobile',
        'product__cards-col-5',
        'product__cards-col-4',
        'product__cards-col-3',
        'product__cards-col-6',
        'product__cards-col-2-mobile',
    );
</script>
@endpush