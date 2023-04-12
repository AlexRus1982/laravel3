<?php
    makeGestId();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <style type="text/css">
            * {
                font-family: Arial, sans-serif;
            }
        </style>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Cookie uuid для идентификации просмотренных товаров и списка желаний -->
        <meta name="cookie-uuid" content="{{ Config::get('cookie-uuid') }}">
        <!-- id сессии -->
        <meta name="session-id" content="{{ Config::get('session_id') }}">
        <!-- order hash сессии -->
        <meta name="order-hash" content="{{ Config::get('order_hash') }}">

        @php
            $faviconBase = DB::table('seo_params')->pluck('store_favicon')->first();
            $faviconPath = isset($faviconBase) ? "/public/{$faviconBase}" : "/public/images/favicon.ico";
        @endphp

        <link rel="icon" href="{{$faviconPath}}" type="image/x-icon">

        <title>@yield('page.title', 'Ларавел')</title>
        <meta name="description" content="@yield('page.description', 'Описание')">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        <link href="/public/css/site.css" rel="stylesheet">
        <link href="/public/css/mobile.css" rel="stylesheet">
        <link href="/public/css/variables.css" rel="stylesheet">
        <link href="/public/css/footer.css" rel="stylesheet">
        <link href="/public/css/basket.css" rel="stylesheet">
        <link href="/public/css/wishes.css" rel="stylesheet">
        <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
  rel="stylesheet"
/>
<link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
          />
 
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Clamp.js/0.5.1/clamp.min.js"></script>
             <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
             <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
        @stack('css')
    </head>

    <body>
        @include('includes.preloader')

        <div class="info-panel"></div>
        <style>
            .info-panel {
                position: fixed;
                top: 75px;
                left: calc(100% - 80px);
                display: flex;
                flex-direction: column;
                z-index: 1000;
            }
        </style>

        @include('includes.basket')
        @include('includes.wishes')

        <div class="main-content d-flex flex-column justify-content-between min-vh-100 text-center">
            @include('includes.header')
    
            <main class="d-flex flex-column " > 
                @yield('content')
          
            </main>
    
            @include('includes.footer')
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
       
        <script type="module" src="/public/js/init.js"></script>
        <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
      window.onload = function(){
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      effect: "fade",
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });}
  </script>  
@stack('js')

        <!-- preloader script -->
        <script>
            $(document).ready(function() { 
                setTimeout(() => {
                    $('.start').removeClass('start');
                }, 0);
                setTimeout(() => {
                    $('.preloader').remove();
                }, 1000);
            });

</script>

    </body>

</html>