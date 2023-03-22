<!-- 15.01.2023 New disign -->
<?php
    $cookieUuid = Cookie::get('cookie-uuid');

    $SEO_PARAMS = [];
    
    $seoParams = DB::table('seo_params')
    ->get()[0];

    $SEO_PARAMS['#STORE_NAME#'] = $seoParams->store_name;
    
    $PAGE_TITLE = $seoParams->main_page_title;
    foreach($SEO_PARAMS as $key => $value) {
        $PAGE_TITLE = str_replace($key, $value, $PAGE_TITLE);
    }

    $PAGE_META = $seoParams->main_page_meta;
    foreach($SEO_PARAMS as $key => $value) {
        $PAGE_META = str_replace($key, $value, $PAGE_META);
    }
?>

@extends('layouts.base')

@section('page.title', $PAGE_TITLE)
@section('page.description', $PAGE_META)

@section('content')
    
    <div class="container d-flex justify-content-start flex-wrap mobile-padding-0" style="max-width: 100%; padding: 0px;">

        @include('includes.main-tags')

        {{-- @include('includes.products.list', ['products' => $products]) --}}

    </div>
    <style>
        .main-content {
            overflow-x: hidden;
        }
    </style>

    {{--dd(Route::is('main'))--}}

@endsection

{{-- @push('js')
    <script type="text/javascript" src="/js/products.js"></script>
@endpush --}}