<?php


foreach ($products as $key => $value) {
    //print_r($value);

    $item = (array)$value;
    // print_r($item);
    $item_id = $item['id'];
    $photos = explode(';', $item['Фото товара']);
    $image = $photos[0];

    $imageURL = getImageUrl($image); // function from helpers

    $formatedPrice = $item['Цена'];
    try {
        $formatedPrice = number_format($item['Цена'], 0, '.', ' ');
    } catch (Exception $e) {
        // Log::debug($e);
    }
}
?>
@extends('layouts.base')
@section('content')



<style>
    /*Добавить в public*/
    .image-bold {
        width: 100%;
        margin-bottom: 105px;
    }

    .content__text_weight-200 {
        font-weight: 200;
        line-height: 31px;
    }

    .container__row {
        display: flex;
        align-items: center;
    }

    .container__images {
        margin-bottom: 20px;
        display: flex;
        width: 250px;
        justify-content: space-between;
    }

    /*конец*/
    .projects__text {
        max-width: 560px;
        font-size: 20px;
        line-height: 1.55;
        font-family: 'TildaSans', Arial, sans-serif;
        font-weight: 300;
        color: #000000;
        display: flex;
        text-align: left;
    }

    .projects {
        display: flex;
        max-width: 1400px;
        height: auto;
        flex-direction: column;
        justify-content: flex-start;
    }

    .projects__title {
        margin-left: 0px;
        margin-bottom: 15px;
        color: #000000;
        font-size: 30px;
        font-family: 'TildaSansBold', Arial, sans-serif;
        line-height: 1.55;
        font-weight: 900;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
        display: flex;
        justify-content: flex-start;
    }



    .projects__image {
        margin-right: 20px;
        width: 50px;
        height: 50px;
        border-width: 1px;
        border-radius: 3000px;
        background-color: #fff705;
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        border-color: #b5b5b5;
        border-style: solid;
        background-image: url('https://thumb.tildacdn.com/tild3737-6233-4336-b233-663632656562/-/cover/60x60/center/center/-/format/webp/wwwGetBg_net_2017Gir.jpg');
    }

    .projects__content {
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: flex-start;
    }

    .content__text {
        width: 100%;
        text-align: left;
        color: #000000;
        font-size: 18px;
        font-family: 'TildaSans', Arial, sans-serif;
        line-height: 1.55;
        font-weight: 400;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
    }

    .content__text_bold {
        font-weight: 700;
        margin-top: 10px;
    }

    .projects__image_Max {

        background-image: url('https://static.tildacdn.com/tild3636-3132-4938-a465-376634306132/12.jpg');
    }


    .container__row {
        display: flex;
    }

    .projects__gallery-col-3 {
       margin-bottom: 50px;
        margin-left: auto;
        margin-right: auto;
        width: 100%;
        display: grid;
        grid-template-columns: 3.9fr 3.9fr 3.9fr;
        gap: 10px;
    }

    .projects__gallery-col-2 {
       
        margin-left: auto;
        margin-right: auto;
        width: 100%;
        display: grid;
        grid-template-columns: 5.5fr 5.5fr;
        gap: 10px;
    }

    .projects__gallery {

        margin-bottom: 50px;
        margin-left: auto;
        margin-right: auto;
        width: 100%;
        display: grid;

        grid-template-columns: 5.5fr 5.5fr;
        gap: 10px;
    }

    .gallery__image {
        width: 100%;
        height: 100%;
    }

    .gallery__image-small {
        width: 50%;
    }

    .project__product-name {
        min-height: 50px;
        margin-left: 0px;
        margin-bottom: 15px;
        color: #000000;
        font-size: 18px;
        font-family: 'TildaSans', Arial, sans-serif;
        line-height: 1.55;
        font-weight: 700;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
        display: flex;
        justify-content: flex-start;

    }

    .projects__container-content {
        display: flex;
        flex-direction: column;
        margin-top: 50px;
    }

    .contain {
        display: flex;
        flex-direction: column;
    }

    .project__content-name {
        color: #000000;
        font-size: 26px;
        font-family: 'Arial', Arial, sans-serif;
        line-height: 1.55;
        font-weight: 900;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
        text-align: left;
    }

    .project__content-job {
        text-align: left;
        color: #7a7a7a;
        font-size: 16px;
        font-family: 'Arial', Arial, sans-serif;
        line-height: 1.6;
        font-weight: 400;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
    }

    .projects__button {

        height: 60px;
        width: 160px;
        color: #ffffff;
        font-size: 14px;
        font-family: 'Arial', Arial, sans-serif;
        line-height: 1.55;
        font-weight: 600;
        border-radius: 3px;
        background-color: #0009ff;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
        transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    }
</style>
<div class="px-5 projects">
    <div class="bread-crumps">
        <span style="color:black;"><a class="bread-crumps__link" href="/products">Каталог</a>/шоурум</span>

    </div>
    <h1 class="projects__title">Ресторан Марчелис | Санкт-Петербург, Невский 43</h1>
    <div class="container__row mb-4">
        <div class="projects__image " data-original="https://thumb.tildacdn.com/tild3737-6233-4336-b233-663632656562/-/cover/60x60/center/center/-/format/webp/wwwGetBg_net_2017Gir.jpg"></div>
        <div class="projects__content reviews__content_small">
            <span class="content__text">Дизайн: Евгения Иванова</span>
        </div>
    </div>
</div>

<img class="image-bold" src="https://static.tildacdn.com/tild3233-3034-4938-b833-643536653534/1602828200_20-p-diza.jpg" alt="картинка">
<div class="px-5 projects">
    <h2 class="projects__title">О проекте</h2>
    <p class="projects__text">Стильный дизайн: угловая кухня-гостиная среднего размера в стиле шебби-шик с врезной мойкой, фасадами с выступающей филенкой, зелеными фасадами, деревянной столешницей, коричневым фартуком, фартуком из дерева, техникой под мебельный фасад, островом, коричневым полом, коричневой столешницей и потолком с обоями - последний тренд — Houzz</p>
    <div class="projects__gallery" style="margin-top:105px">
        <img class="gallery__image" src="https://static.tildacdn.com/tild3663-3062-4365-a165-653965623839/SKALA-ARMCHAIR-March.jpg" class="gallery__image">
        <img class="gallery__image" src="https://thumb.tildacdn.com/tild6237-6436-4237-a566-613830623533/-/format/webp/SKALA-ARMCHAIR-March.jpg" class="gallery__image">
        <img class="gallery__image" src="https://thumb.tildacdn.com/tild3239-6464-4737-b030-373636643331/-/format/webp/SKALA-ARMCHAIR-March.jpg" class="gallery__image">
        <img class="gallery__image" src="https://thumb.tildacdn.com/tild3664-6332-4731-b966-653764376435/-/format/webp/5.jpg" class="gallery__image">
        <img class="gallery__image" src="https://thumb.tildacdn.com/tild3566-6339-4161-a234-656232636131/-/format/webp/2_1.jpg" class="gallery__image">
    </div>
    <h2 class="projects__title">Товары использованные в интерьере</h2>
    <div class="projects__gallery-col-3">
        <? foreach ($products as $key => $value) {
            $item = (array)$value; ?>
            <div class="contain">
                <img class="gallery__image" src="<?= $item['Фото товара'] ?>" class="gallery__image" alt="<?= $item['Наименование'] ?>">
                <div class="project__product-name"><?= $item['Наименование'] ?></div>
                <span class="project__product-price"><?= $item['Цена'] ?>р</span>
            </div>
        <? } ?>
    </div>

    <div class="projects__container-content">
        <div class="projects__image projects__image_Max"></div>
        <span class="project__content-name">Max Holden</span>
        <span class="project__content-job">Founder & Art Director</span>
        <hr style="width:100px; border: 2px solid">
        </hr>
        <p class="projects__text">Max invented our company. He is the father of our main goals and values. He has founded first core members of our team and helped them to show their unique talents in work process. He made a really important first steps.</p>
    </div>
    <h2 class="projects__title" style="margin-top:70px">До/После</h2>
    <div class="projects__gallery-col-2">
        <img class="gallery__image" src="https://static.tildacdn.com/tild3630-3463-4633-b739-643631313364/remcaf88.jpg" class="gallery__image">
        <img class="gallery__image" src="https://static.tildacdn.com/tild3834-6563-4536-b731-393861636639/5.jpg" class="gallery__image">
    </div>
    <h2 class="projects__title" style="margin-top:70px">Отзывы заказчика</h2>
    <img class="gallery__image-small" src="https://thumb.tildacdn.com/tild3065-6661-4430-b536-376337323933/-/format/webp/-.jpg" class="gallery__image">

    <h2 class="projects__title"style="margin-top:70px" >Похожие проекты</h2>
    <div class="projects__gallery-col-2">
        <div class="contain">
            <img class="gallery__image" src="https://thumb.tildacdn.com/tild3739-3861-4230-b661-333763393062/-/cover/550x400/center/center/-/format/webp/SKALA-ARMCHAIR-March.jpg" alt="">
            <span class="content__text content__text_bold">Марчелис</span>
            <span class="content__text">Санкт-Петербург, Невский 43</span>
            <button class="projects__button">Подробнее</button>
        </div>
        <div class="contain">
            <img class="gallery__image" src="https://thumb.tildacdn.com/tild3265-3738-4536-b765-383133633232/-/cover/550x400/center/center/-/format/webp/2.jpg" alt="">
            <span class="content__text content__text_bold">Марчелис</span>
            <span class="content__text">Санкт-Петербург, Невский 43</span>
            <button class="projects__button">Подробнее</button>
        </div>
    </div>
</div>

@stop