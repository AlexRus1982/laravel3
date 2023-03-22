<!-- 15.01.2023 New disign -->

@extends('layouts.base')

@section('page.title', 'Хлам')

@section('content')
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
    ?>
    
    <div class="container d-flex justify-content-start flex-wrap mobile-padding-10" style="max-width: 100%; padding: 0px 60px 0px 60px;">

        @include('includes.products.banner')

        @include('includes.products.sponsors')

        @include('includes.products.company')

    </div>
    <style>
        .main-content {
            overflow-x: hidden;
        }
    </style>

    {{--dd(Route::is('main'))--}}

@endsection

@push('js')
    <script type="text/javascript" src="/public/js/products.js"></script>
@endpush