<?php
$item_id = $product['id'];
$photos = $product['Фото товара'];
$photos =  ($photos != "") ? explode(';', $photos) : [];
$wished = (in_array($item_id, $wishList)) ? 'wishset' : '';
?>
<?php
$tags = DB::table('tags')
    ->get();
?>

<style>
    .display-none {
        display: none;
    }

    .container-prod {
        display: flex;
        margin-left: auto;
        margin-right: auto;
        flex-direction: column;
        padding: 0;
        width: 1400px;
        margin-top: 30px;
    }

    .block__sum-price {
        display: flex;
        width: 150px;
        height: 55px;
        border: solid black 2px;
        justify-content: space-around;
        align-items: center;
    }

    .figure {
        font-size: 30px;
        font-weight: bold;
        cursor: pointer;
    }

    .number {
        font-size: 14px;
    }

    /*Похожие товары*/
    .container__similar-product {
        display: flex;
        width: 1600px;
        justify-content: space-between;
        flex-wrap: wrap;
        margin-left: auto;
        margin-right: auto;
        margin-top: 30px;
    }

    .similar-product__card {
        width: 260px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

    }

    .similar-product__card-image {
        display: flex;
        width: 100%;
        height: 200px;
        justify-content: center;
        align-items: center;


    }

    .similar-product__img {
        width: 70%;
        height: 70%;
    }

    .similar-product__card-text {
        display: block;
        flex-direction: column;
        margin-top: 10px;
        margin-left: auto;
        margin-right: auto;
        width: 200px;


    }

    .card__price {
        display: flex;
        font-family: Arial, Helvetica, sans-serif;
        text-align: left;
        width: 200px;
        justify-content: center;
    }

    .card__title {
        display: flex;
        font-family: Arial, Helvetica, sans-serif;
        text-align: left;
        width: 200px;
        font-weight: 700;

    }

    .card__title:hover {
        color: #0000FF;

    }

    /*ОБЗОР*/
    .container__review {
        margin-top: 30px;
        width: 400px;
        margin-left: 50px;
    }

    .review {
        display: flex;
        flex-direction: column;
        width: 80%;
    }

    .review__block-info {
        font-size: 14px;
        text-align: left;
        margin-top: 30px;
    }

    .review__bread-crumbs {
        width: 100%;
        font-size: 14px;
        text-align: left;
        margin-bottom: 20px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .review__title {
        width: 100%;
        margin-top: 30px;
        font-size: 24px;
        text-align: left;
        margin-bottom: 10px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .review__button {
        width: 200px;
        height: 55px;
        color: #ffffff;
        font-size: 14px;
        font-family: 'Arial', Arial, sans-serif;
        line-height: 1.55;
        font-weight: 300;
        border-radius: 5px;
        background-color: #000000;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
        transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;

    }

    .review__container-row {
        width:370px;
        display: flex;
        margin-top: 50px;
        justify-content: space-between;
    }

    .review__price {
        width: 100%;
        text-align: left;
        margin-bottom: 10px;
        font-family: Arial, Helvetica, sans-serif;
    }

    /*Линии и шевроны*/
    .line {
        position: relative;
    }

    .line-characteristics {
        margin-top: 50px;
        position: relative;
    }

    .chevron__down {
        position: absolute;
        right: 0;
        top: 21px;
        cursor: pointer;
    }

    .chevron__up {
        position: absolute;
        right: 0;
        top: 21px;
        cursor: pointer;
    }

    .chevron__down-characteristics {
        position: absolute;
        right: 0;
        top: 21px;
        cursor: pointer;
    }

    .chevron__up-characteristics {
        position: absolute;
        right: 0;
        top: 21px;
        cursor: pointer;
    }

    .bi-heart {
        border: red;
    }


    /*Изображения продукта*/


    .container__image {
        width: 100%;
        position: relative;

    }

    .container__image-small {
        display: flex;
        justify-content: left;
        margin-top: 20px;
    }

    .image__big {

        width: 100%;
        height: 700px;
    }

    .image__small {
        cursor: pointer;
        width: 50px;
        height: 50px;
        margin-right: 10px;
    }

    /*ОПИСАНИЕ*/
    .description__container-row {
        display: flex;
        justify-content: space-between;
    }

    .description__title {
        font-family: Arial, Helvetica, sans-serif;
        text-align: left;
        font-size: 20px;
    }

    .description__text {
        text-align: left;
    }

    /*ХАРАКТЕРИСТИКИ*/
    .container-characteristics {

        width: 100%;
        margin-bottom: 30px;
    }

    .characteristics__property {
        width: 300px;
        display: flex;
        text-align: left;
        font-size: 14px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .characteristics__name {
        width: 200px;
        display: flex;
        text-align: left;
        font-size: 14px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .characteristics__container-row {
        display: flex;
    }

    .characteristics__title {
        text-align: left;
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .bi-heart:hover {
        fill: red;
    }

    a {
        text-decoration: none;
    }

    .container__row {
        width: 1200px;
        margin-left: auto;
        margin-right: auto;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .product__title {
        display: flex;
        font-size: 20px;
        width: 1400px;
        text-align: left;
        margin-left: auto;
        margin-right: auto;
        margin-top: 30px;
    }




    /*ИНФОРМАЦИЯ */
    .info__nal {
        position: relative;

    }

    .info__delivery {
        position: relative;
    }

    .info__img-circle {
        position: absolute;
        top: 6;
        left: 75;
    }

    .info__img-arrought {
        position: absolute;
        top: 0;
        left: 305px;
    }

    .info__img-arrought:hover {
        width: 100%;
        transition: all 2s ease;
    }

    /*КНОПКИ СЛАЙДЕРА*/
    .slider__button-left {
        position: absolute;
        width: 100px;
        height: 100px;
        top: 300px;
        left: 50px;
        cursor: pointer;
        opacity: 0.1;
    }

    .slider__button-left:hover {
        opacity: 1;
    }

    .slider__button-right {
        position: absolute;
        width: 100px;
        height: 100px;
        top: 300px;
        right: 50px;
        cursor: pointer;
        opacity: 0.1;
    }

    .slider__button-right:hover {
        opacity: 1;
    }



    .box p {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /*Стрелка */

    .line-right {
        position: absolute;
        top: -7px;
        right: 4px;
        opacity: 1;
        width: 15px;
    }

    .line-right-delivery {
        position: absolute;
        top: -7px;
        right: 4px;
        opacity: 1;
        width: 15px;
    }

    .line-right-bold-delivery.line-right-bold-delivery.line-right-bold-delivery {
        position: absolute;
        top: -7px;
        right: 4px;
        opacity: 1;
        width: 30px;
        transition: all 0.2s ease;
    }

    .line-right-bold.line-right-bold.line-right-bold {
        position: absolute;
        top: -7px;
        right: 4px;
        opacity: 1;
        width: 30px;
        transition: all 0.2s ease;
    }

    i {
        position: absolute;
        top: 6px;
        right: 4px;
        border: solid black;
        border-width: 0 1px 1px 0;
        display: inline-block;
        padding: 3px;
    }

    .right {
        transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
    }

    .bread-crumps:hover {
        color: #0000FF;
    }

    .bread-crumps__link {
        color: #000
    }

    .active {
        border: solid grey 2px;
    }

    .bread-crumps__link:hover {
        color: #0000FF;
    }
</style>

<div class="container-prod">

    <div style="font-size: 14px; text-align: left; margin-bottom: 20px;"><span class=""><a class="bread-crumps__link" href="/categories/{{$product['category_url']}}">{{$product['category_name']}}</a> / Арт:{{$product['Артикул']}}</span></div>
    <div class="container__image photo-box" data-gallary>
        <img class="image__big" src="http://konsol-stol.ru/{{$photos[0]}}" alt="картинка">
        <div class="flex control-row">
            <img class="slider__button-right" data-control="next" src="{{asset('images/chevron-compact-right.svg')}}">
            <img class="slider__button-left" data-control="prev" src="{{asset('images/chevron-compact-left.svg')}}">
        </div>
        <div class="container__image-small thumbs">
            @if (count($photos) > 0)
            <?
            $index = 1;
            foreach ($photos as $photo) {
                if ($photo != "") {
                    $imageURL = "http://konsol-stol.ru/{$photo}";
                    $active = ($index == 1) ? " active" : "";
                    $imageHTML = "<img class='image__small {$active}' src='{$imageURL}'>";
                    echo $imageHTML;
                }
                $index++;
            }
            ?>
            <style>

            </style>
            @else
            <img src='https://fakeimg.pl/600x600/EEEEEE/7F7F7F/?text=NO IMAGE&font=kelson' class='class="carousel-inner border rounded-2 shadow mb-4"' alt=''>
            @endif

        </div>
    </div>
    <h1 class="review__title">{{$PAGE_TITLE_H1}}</h1>
    <span class="review__price">Цена:{{$SEO_PARAMS['#PRICE#']}} ₽</span>

    <div class="review__container-row">
    <div class="block__sum-price">
        <span id="minus" class="figure">-</span>
        <span id="col" class="number">1</span>
        <span id="plus" class="figure">+</span>
    </div>
    <button class="review__button  btn btn-dark fw-bold py-3 px-5" item_id="{{ $item_id }}" item_category="{{$product['category_url']}}">купить</button>
    </div>
    
    <div class="container-characteristics">
        <div class="line-characteristics">
            <hr>
            <img class="chevron__down-characteristics" src="{{asset('images/chevron-down.svg')}}">
            <img class="chevron__up-characteristics display-none" src="{{asset('images/chevron-up.svg')}}">
        </div>
        <h2 class="characteristics__title">Характеристики</h2>
        <div class="container__characteristics ">


            @foreach($product as $key=>$value)
            @if ((mb_strpos($key, 'Свойство: ') !== false) && ($value != ""))
            <?php
            $valuesArray = [];
            $splitValues = explode(';', $value);

            foreach ($splitValues as $splitValue) {
                $pushValue = $splitValue;

                foreach ($tags as $tag) {
                    if ($tag->property_value == $splitValue) {
                        $pushValue = "<a href='/tags/{$tag->property_url}'>{$tag->property_value}</a>";
                        break;
                    }
                }

                array_push($valuesArray, $pushValue);
            }
            ?>

            <div class="characteristics__container-row ">
                <span class="characteristics__name"><?= str_replace('Свойство: ', '', $key) ?>:</span>
                <span class="characteristics__property">{!!implode(', ', $valuesArray)!!}</span>
            </div>
            @endif
            @endforeach
        </div>
        <div class="line">
            <hr>

            <img class="chevron__down" src="{{asset('images/chevron-down.svg')}}">
            <img class="chevron__up display-none" src="{{asset('images/chevron-up.svg')}}">
        </div>
        <h2 class="description__title">Описание</h2>
        <div class="container__description display-none">
            <div class="description__container-row">
                @if ($product['Описание'] != "")
                <p class="description__text">{!! $product['Описание'] !!}</p>
                @endif
            </div>
        </div>
    </div>

</div>



<!--<div class="container__review">
        <div style="font-size: 14px; text-align: left; margin-bottom: 20px;"><span class="bread-crumps__link"><a class="bread-crumps__link" href="/categories/{{$product['category_url']}}">{{$product['category_name']}}</a> / Арт:{{$product['Артикул']}}</span></div>

        <h1 class="review__title">{{$PAGE_TITLE_H1}}</h1>
        <div class="review">
            <div class="review__container-row">
                <span class="review__price">{{$SEO_PARAMS['#PRICE#']}} ₽</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                </svg>
            </div>

            <button class="review__button basketButton btn btn-dark fw-bold py-3 px-5" item_id="{{ $item_id }}" item_category="{{$product['category_url']}}">Заказать</button>
            <div class="review__block-info">
                <hr>
                <div class="info__nal">В наличии <svg class="info__img-circle" background="green" width="25px" height="25px">
                        <circle cx="5" cy="5" r="5" fill="green" />
                    </svg>

                    <hr class="line-right">
                    <i class="right"></i>
                </div>
                <hr>
                <div class="info__delivery">Доставка и оплата
                    <hr class="line-right-delivery">
                    <i class="right"></i>
                </div>
                <hr>
                <span class="bread-crumps__link">Обратный звонок | Написать в ватсап</span>
            </div>
        </div>
    </div>-->






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>

    
   $('#plus').on('click', function () {
    let num = +$('#col').text();
    $('#col').text(num + 1);
});
$('#minus').on('click', function () {
    let num = +$('#col').text();
    if (num > 1) $('#col').text(num - 1);
});
 
(function() {
        'use strict';

        class Gallery {
            constructor(gallery) {
                this.thumbsBox = gallery.querySelector('.thumbs');
                this.thumbs = this.thumbsBox.querySelectorAll('img');
                this.image = gallery.querySelector('.photo-box img');
                this.control = gallery.querySelector('.control-row');
                this.count = this.thumbs.length;
                this.current = 0;

                this.registerEventsHandler();
            }

            // регистрация обработчиков событий
            registerEventsHandler(e) {
                this.control.addEventListener('click', this.buttonControl.bind(this));

                document.addEventListener('keydown', this.keyControl.bind(this));
                // клик по тумбе
                this.thumbsBox.addEventListener('click', this.thumbControl.bind(this));
            }

            buttonControl(e) {

                const ctrl = e.target.dataset.control;
                let argControl = {
                    first: 0,
                    last: this.count - 1,
                    prev: (this.count + this.current - 1) % this.count,
                    next: (this.current + 1) % this.count
                };
                const i = argControl[ctrl];
                this.showPhoto(i);
            }

            imageControl(e) {

                this.showPhoto((this.current + 1) % this.count);
            }

            wheelControl(e) {

                e.preventDefault();

                let i = (e.deltaY > 0) ? (this.current + 1) % this.count : (this.count + this.current - 1) % this.count;
                this.showPhoto(i)
            }

            keyControl(e) {

                e.preventDefault();

                const code = e.which;
                if (code != 37 && code != 39) return;


                let argControl = {
                    37: (this.count + this.current - 1) % this.count,
                    39: (this.current + 1) % this.count
                }
                this.showPhoto(argControl[e.which]);
            }

            thumbControl(e) {
                const target = e.target;
                if (target.tagName != 'IMG') return;
                const i = [].indexOf.call(this.thumbs, target);
                this.showPhoto(i);
            }

            showPhoto(i) {

                const src = this.thumbs[i].getAttribute('src');
                this.image.setAttribute('src', src.replace('thumbnails', 'photos'));
                this.current = i;


            }
        }


        const galleries = document.querySelectorAll('[data-gallary]');
        for (let gallery of galleries) {
            const goodsgallery = new Gallery(gallery);
        }
        const thumbsBox = document.querySelector('.thumbs');
        const thumbs = thumbsBox.querySelectorAll('img');


        for (var i = 0; i < thumbs.length; i++) {
            thumbs[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
 })();
</script>