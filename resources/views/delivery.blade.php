@extends('layouts.base')
@section('content')
<style>
    .delivery__bread-crumps {
        font-size: 14px;
        max-width: 1400px;
        display: flex;
        justify-content: flex-start;

    }

    .delivery__title {

        margin-bottom: 50px;
        color: #000000;
        font-size: 30px;
        font-family: 'TildaSans', Arial, sans-serif;
        line-height: 1.55;
        font-weight: bold;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
        display: flex;
        justify-content: flex-start;

    }

    .delivery {
        display: flex;
        max-width: 1400px;
        flex-direction: column;
        justify-content: flex-start;
    }

    .delivery__bread-crumps__link {
        color: #000;
        text-decoration: none;
    }

    .delivery__container {
        display: flex;

    }


    .delivery__block1 {
        width: 30%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        padding: 0;
        list-style: none;

    }

    .delivery__block2 {
        width: 70%;
        display: flex;
        flex-direction: column;

    }

    .delivery__item {
        margin-bottom: 10px;
        color: #000000;
        font-size: 20px;
        font-family: 'TildaSans', Arial, sans-serif;
        font-weight: 700;
        opacity: 0.3;
    }

    .link__title {
        text-decoration: none;
        color: #000000;
        font-family: 'TildaSans', Arial, sans-serif;
        font-weight: 700;
        opacity: 0.3;
        cursor: pointer;
    }

    .link__title_end {
        opacity: 1;
    }

    .delivery__pickup {
        margin-bottom: 30px;
        display: flex;
        flex-direction: column;
        border-radius: 20px;
        background-color: #f1f2f2;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
        padding-left: 20px;
        padding-top: 20px;
    }

    .pickup__addres {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    .text-left {
        text-align: left;
    }

    .pickup__title {
        margin-bottom: 10px;
        color: #000000;
        font-size: 20px;
        font-family: 'TildaSans', Arial, sans-serif;
        font-weight: 700;
        font-weight: bold;
        display: flex;
        width: 100%;
        justify-content: flex-start;
    }

    .pickup__text {
        text-align: left;
    }

    /*Правила*/

    .rules__img {
        margin-right: 10px;
        width: 30px;
        height: 27px;
    }

    .list__rules {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
    }

    .list__item-rules {
        display: flex;
        text-align: left;
        margin-top: 10px;
    }

    .list__item-rules:last-child {
        margin-top: 30px;
    }

    /*НЕОБХОДИМЫЕ ДОКУМЕНТЫ*/
    .list__document {
        display: flex;
        flex-direction: column;
        justify-items: flex-start;
        text-align: left;
    }

    .pickup__title-small {
        margin-top: 30px;
    }

    .pickup__title_blue {
        margin-top: 10px;
        color: #5516f5;
    }

    .pickup__list {
        text-align: left;
    }

    .delivery__wrapper {
        margin-top: 0px;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
    }

    .t976__list-item {
        display: flex;
        text-decoration: none;
        color: #000000;
        position: relative;
        padding: 0 10px 10px 0;
        max-width: 100%;
        font-size: 12px;
        font-weight: 400;
        opacity: 0.7;
    }

    .link {
        text-decoration: none;
        color: #000000;
        padding: 10px;
        border-radius: 30px;
    }

    .delivery__title_links {
        margin-top: 20px;
    }

    .bold {
        font-weight: bold;
        margin-bottom: 20px;
    }

    .pickup__image {
        width: 100%;
    }
</style>
<div id="app" class="delivery px-5 ">
    <div class="delivery__bread-crumps">
        <span style="color:black;"><a class="delivery__bread-crumps__link" href="/products">Каталог</a> / Покупателям / Доставка</span>
    </div>

    <h1 class="delivery__title">Доставка</h1>

    <div class="delivery__container">

        <ul class="delivery__block1">
            <a href="#pickup" class="link__title">
                <li class="delivery__item text-left">Самовывоз</li>
            </a>
            <a href="#delivery-moscow" class="link__title">
                <li class="delivery__item text-left">Доставка по Москве</li>
            </a>
            <a href="#delivery-snktp" class="link__title">
                <li class="delivery__item text-left">Доставка по Санкт-Петербургу</li>
            </a>
            <a href="#receipt" class="link__title link__title_end">
                <li class="delivery__item text-left">Получение товара</li>
            </a>
        </ul>

        <div class="delivery__block2">
            <div id="pickup" class="delivery__pickup">
                <h3 class="pickup__title">Самовывоз</h3>
                <div class="pickup__addres">
                    <div class="text-left" style="line-height: 31px;"><strong>Адрес склада:</strong> Санкт-Петербург, Витебский пр., 13 <span style="color: rgb(20, 20, 227);">(Карта проезда)</span><br><strong>Режим работы:</strong> Пн-Пт с 11:00 до 20:00<br><strong>Контакты:</strong> +7 (958) 400−9907, почта support@artfc.ru</div>
                </div>

                <ul class="list__rules">
                    <li class="list__item-rules"><img class="rules__img" src="https://thumb.tildacdn.com/tild3133-3435-4138-a636-346539356564/-/resize/60x/-/format/webp/weather_warning_sign.png">Обязательно заранее согласуйте дату и время приезда с менеджером по телефону 8 (958) 400−9907</li>
                    <li class="list__item-rules"><img class="rules__img" src="https://thumb.tildacdn.com/tild3133-3435-4138-a636-346539356564/-/resize/60x/-/format/webp/weather_warning_sign.png"><strong>Мы не осущевстляем</strong>продажу и самовывоз товаров из шоурумов</li>
                    <li class="list__item-rules"><img class="rules__img" src="https://thumb.tildacdn.com/tild3133-3435-4138-a636-346539356564/-/resize/60x/-/format/webp/weather_warning_sign.png">Отнеситесь ответственно к транспортировочной упаковке хрупких товаров: зеркал, люстр, декора.<br>
                        Для мебели рекомендуем заказывать дополнительную жесткую обрешетку (паллет-борт).
                    </li>
                </ul>
                <div class="list__document" field="tn_text_1681993487629" style="line-height: 25px;"><strong>Для получения товара при себе необходимо иметь</strong><br><strong><span class="ql-cursor">﻿</span></strong><br>
                    <ul>
                        <li>Документ, подтверждающий оплату товара.</li>
                        <li>Для юридических лиц необходима печать компании-плательщика или доверенность на право получения товара для подписания отгрузочных документов. </li>
                        <li>В случае отсутствия печати или доверенности передача товара будет невозможна.</li>
                        <li>Если груз забирает не покупатель, а курьер / водитель / транспортная компания, нанятая клиентом, то у водителя должен быть также оригинал доверенности от плательщика на забор груза. <span style="color: rgb(94, 23, 237);">(Образец)</span></li>
                    </ul>⠀<br><strong>Вместе с товаром вы получаете</strong> УПД (универсальный передаточный документ), и при необходимости товарный чек.
                </div>
            </div>

            <div id="delivery-snktp" class="delivery__pickup">
                <h3 class="pickup__title">Доставка по Санкт-Петербургу и Лен. области</h3>
                <div class="pickup__text">
                    Стоимость доставки рассчитывается индивидуально в зависимости от адреса,
                    количества позиций и объема груза. Если нет лифта,
                    подъем на этаж также рассчитывается отдельно.
                    Оплата услуг доставки, подъема, сборки и т. д. производится наличными курьеру на месте по факту. Время доставки оговаривается индивидуально.
                    <br>
                    <br>
                    <img class="pickup__image" data-original="https://static.tildacdn.com/tild3163-3737-4637-b730-616562613436/IJmazLJ3.jpg" imgfield="tn_img_1681995109600" src="https://thumb.tildacdn.com/tild3163-3737-4637-b730-616562613436/-/format/webp/IJmazLJ3.jpg">
                </div>

            </div>
            <div id="delivery-moscow" class="delivery__pickup">
                <h3 class="pickup__title">Доставка по Москве</h3>
                <div class="pickup__text">
                    Стоимость доставки рассчитывается индивидуально в зависимости от адреса,
                    количества позиций и объема груза. Наш логист может вам помочь в оформлении доставки транспортной компанией.
                    <br>
                    Все заказы изначально поставляются с основного склада в Санкт-Петербурге.
                    <br>
                    <br>
                    <br>
                    <strong><span class="pickup__title-small">﻿</span>Бесплатная доставка до транзитного склада в Москве</strong>
                    <br>
                    Мы можем своими силами доставить заказ до склада наших партнеров при соблюдении следующих условий:
                    <ul>
                        <li>Общая сумма заказа от 50 000 р.

                        </li>
                        <li>заказ включает в себя мебель⠀

                        </li>
                        <li>Обратите внимание, заказ необходимо получить или передать в транспортную компанию в течении 2 дней после поступления на терминал пункта выдачи.</li>
                    </ul>
                </div>
            </div>

            <div class="delivery__pickup">
                <h3 id="receipt" class="pickup__title">Получение товара</h3>
                <h3 class="pickup__title pickup__title_blue">Самовывозом</h3>

                <strong class="text-left"></strong>
                <span class="text-left bold">Для получения товара при себе необходимо иметь</span>
                <br>
                <ul class="pickup__list">
                    <li>Документ, подтверждающий оплату товара.</li>
                    <li>Для юридических лиц необходима печать компании-плательщика или доверенность на право получения товара для подписания отгрузочных документов. </li>
                    <li>В случае отсутствия печати или доверенности передача товара будет невозможна.</li>
                    <li>Если груз забирает не покупатель, а курьер / водитель / транспортная компания, нанятая клиентом, то у водителя должен быть также оригинал доверенности от плательщика на забор груза. <span style="color: rgb(94, 23, 237);">(Образец)</span></li>
                </ul>
                <br>
                <strong class="text-left">Вместе с товаром вы получаете</strong><span class="text-left">
                    УПД (универсальный передаточный документ), и при необходимости товарный чек.
                </span>
                <h3 class="pickup__title pickup__title_blue">Доставкой</h3>
                <strong></strong>
                <span class="text-left bold">Для получения товара при себе необходимо иметь</span>
                <ul class="pickup__list">
                    <li>Документ, подтверждающий оплату товара.</li>
                    <li>Для юридических лиц необходима печать компании-плательщика или доверенность на право получения товара для подписания отгрузочных документов. </li>
                    <li>В случае отсутствия печати или доверенности передача товара будет невозможна.</li>
                    <li>Если груз забирает не покупатель, а курьер / водитель / транспортная компания, нанятая клиентом, то у водителя должен быть также оригинал доверенности от плательщика на забор груза. <span style="color: rgb(94, 23, 237);">(Образец)</span></li>
                </ul>
            </div>

        </div>
    </div>

    <h3 class="delivery__title delivery__title_links">Полезные ссылки</h3>
    <div class="delivery__wrapper">
        <div class="t976__list-item"><a class="link" style=" background-color: #E6E6E6; border-color:transparent; border-width:1px;" href="" data-menu-submenu-hook="">ОПЛАТА</a></div>
        <div class="t976__list-item"><a class="link" style=" background-color: #E6E6E6; border-color:transparent; border-width:1px;" href="" data-menu-submenu-hook="">ПОДАРОЧНЫЕ СЕРТИФИКАТЫ</a></div>
        <div class="t976__list-item"><a class="link" style=" background-color: #E6E6E6; border-color:transparent; border-width:1px;" href="" data-menu-submenu-hook="">КАК СДЕЛАТЬ ЗАКАЗ</a></div>
        <div class="t976__list-item"><a class="link" style=" background-color: #E6E6E6; border-color:transparent; border-width:1px;" href="" data-menu-submenu-hook="">ОБМЕН И ВОЗВРАТ ТОВАРА</a></div>
        <div class="t976__list-item"><a class="link" style=" background-color: #E6E6E6; border-color:transparent; border-width:1px;" href="" data-menu-submenu-hook="">ПРАВИЛА ЭКСПЛУАТАЦИИ</a></div>
        <div class="t976__list-item"><a class="link" style=" background-color: #E6E6E6; border-color:transparent; border-width:1px;" href="" data-menu-submenu-hook="">УСЛОВИЯ ГАРАНТИИ</a></div>
    </div>
</div>
@stop