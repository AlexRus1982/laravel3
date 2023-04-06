@extends('layouts.base')
@section('content')



<style>
    .shourum {
        display: flex;
        max-width: 1400px;
        margin-left: auto;
        margin-right: auto;
        flex-direction: column;
        justify-content: flex-start;
    }

    .shourum__title {
        margin-bottom: 50px;
        color: #000000;
        font-size: 30px;
        font-family: 'TildaSans', Arial, sans-serif;
        line-height: 1.55;
        font-weight: 700;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
        display: flex;
        justify-content: flex-start;
    }

    .shourum__title_get {
        width: 100%;
        text-align: left;

        margin-top: 60px;
        font-size: 20px;
    }

    .shourum__container-data {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }

    .container-data__row {
        width: 450px;
        display: flex;
        flex-direction: row;
        align-items: center;

    }

    .shourum__icon {
        margin-right: 7px;
        width: 18px;
        height: 14px;
    }

    .shourum__image {
        width: 136px;
        height: 136px;
    }

    .container-data__row__text {
        color: #000000;
        font-size: 16px;
        font-family: 'TildaSans', Arial, sans-serif;
        line-height: 2;
        font-weight: 400;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
    }

    .container-data__city {
        color: #000000;
        font-size: 20px;
        font-family: 'TildaSans', Arial, sans-serif;
        line-height: 1.55;
        font-weight: 700;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
        text-align: left;

    }

    .shourum__content-grey {
        min-height: 400px;
        width: 48%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        border-radius: 10px;
        padding-left: 30px;
        padding-top: 30px;
        padding-bottom: 30px;
        background-color: #ebebeb;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
        margin-bottom: 40px;
    }

    .content-grey__title {
        color: #000000;
        font-size: 20px;
        font-family: 'TildaSans', Arial, sans-serif;
        line-height: 1.55;
        font-weight: 700;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
        text-align: left;
    }

    .content-grey__text {
        color: #000000;
        font-size: 20px;
        font-family: 'TildaSans', Arial, sans-serif;
        line-height: 1.55;
        font-weight: 400;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
        text-align: left;
    }

    .shourum__button {
        height: 60px;
        width: 160px;
        margin-top: 20px;
        color: #fff;
        background-color: #000;
        border: none;
        font-size: 18px;
        font-family: TildaSans, Arial, sans-serif;
        cursor: pointer;
        border-radius: 5px;
    }

    .shourum__button:hover {
        background-color: #000000a1;
    }

    .shourum__bread-crumps {
        text-align: left;
    }

    .container-data__row_grey {
        width: 100%;
        justify-content: space-between;
    }

    .shourum__bread-crumps__link {
        color: #000;
        text-decoration: none;
    }

    .shourum__bread-crumps__link:hover {
        color: #0000FF;
    }

    .shourum__bread-crumps {
        font-size: 14px;
        max-width: 1400px;
        display: flex;

        justify-content: flex-start;

    }

    .player {

        width: 50%;
        height: 500px;
        padding: 0;
    }

    .container__gallery {
        margin-left: auto;
        margin-right: auto;
        max-width: 1600px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 10px;

    }

    .metr {
        margin-left: 10px;
        color: #000000;
        font-size: 14px;
        font-family: 'Arial', Arial, sans-serif;
        line-height: 1.55;
        font-weight: 400;
        border-radius: 5px;
        background-color: #ffe419;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
        transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    }

    .gal {}

    .gal-img {
        width: 100%;
    }
</style>
<div class="px-5 shourum">
    <div class="shourum__bread-crumps">
        <span style="color:black;"><a class="shourum__bread-crumps__link" href="/products">Каталог</a>/шоурум</span>

    </div>
    <h1 class="shourum__title">Шоу-рум на Шелепихина</h1>
    <div class="shourum__container-data">
        <h3 class="container-data__city">Москва</h3>
        <div class="container-data__row">
            <img class="shourum__icon" src="https://thumb.tildacdn.com/tild6435-6232-4065-b664-356666393761/-/format/webp/f2dfb1d3d8632126dab0.png" alt="картинка">
            <span class="container-data__row__text">м. Шелепиха (≈450 метров)</span>
        </div>
        <div class="container-data__row">
            <img class="shourum__icon" src="https://static.tildacdn.com/tild3065-3432-4364-b761-353062303034/geo_icon_160074.svg" alt="картинка">
            <span class="container-data__row__text">Шелепихинская набережная, дом 34, корпус 2</span>
        </div>
        <div class="container-data__row">
            <img class="shourum__icon" src="https://static.tildacdn.com/tild3230-3664-4639-b036-353335636561/building_icon_160353.svg" alt="картинка">
            <span class="container-data__row__text">Центр модных интерьеров THE DOM</span>
        </div>
        <div class="container-data__row">
            <img class="shourum__icon" src="https://static.tildacdn.com/tild3161-3562-4635-a538-303432663238/exclamation_circle_i.svg" alt="картинка">
            <span class="container-data__row__text">Ежедневно с 10:00 до 21:00</span>
        </div>
    </div>


    <div class="container-data__row">
        <img class="shourum__icon" src="https://static.tildacdn.com/tild3931-3938-4632-b261-313935666236/telephone_icon_15981.svg" alt="картинка">
        <span class="container-data__city">8 (499) 877-1320</span>
    </div>
    <div class="container-data__row">
        <img class="shourum__icon" src="https://static.tildacdn.com/tild6438-6132-4137-b133-316264323063/whatsapp-logo_icon-i.svg" alt="картинка">
        <span class="container-data__row__text">Написать в ватсап</span>
    </div>
    <div class="container-data__row">
        <img class="shourum__icon" src="https://static.tildacdn.com/tild3163-3934-4662-b864-656466396165/123.svg" alt="картинка">
        <span class="container-data__row__text">Написать в телеграм</span>
    </div>
    <div class="container-data__row">
        <img class="shourum__icon" src="https://static.tildacdn.com/tild6238-3764-4933-b131-643263376333/phone_call_icon_1287.svg" alt="картинка">
        <span class="container-data__row__text">Заказать обратный звонок</span>
    </div>


    <h2 class="shourum__title shourum__title_get">Легко добраться</h2>
    <div class="container-data__row container-data__row_grey">
        <div class="shourum__content-grey ">
            <img class="shourum__image" src="https://thumb.tildacdn.com/tild3763-3337-4939-b835-653438303732/-/resize/163x/-/format/webp/ExecutiveCar_Black_i.png" alt="картинка">
            <span class="content-grey__title">На машине</span>
            <p class="content-grey__text">Тыры-пыры, текст о том как можно к нам доехать.
                Обязательный текст о парковке.</p>
            <button class="shourum__button" type="submit">Отправить</button>
        </div>

        <div class="shourum__content-grey ">
            <img class="shourum__image" src="https://thumb.tildacdn.com/tild3830-3335-4163-b665-346532323663/-/resize/163x/-/format/webp/SubwayTrain_Green_ic.png" alt="картинка">
            <span class="content-grey__title">На метро + пешком</span>
            <p class="content-grey__text">Выходите на станции метро ..... идете ......., переходите улицу и 10 этажное здание.
                Рядом находятсмя ....... и .......</p>
        </div>

    </div>
    <h2 class="shourum__title shourum__title_get">Адрес на карте</h2>
    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A6bd30890beb68bcec831a78234411f10ad6b2ba1851168b7c20b985573aefb69&amp;source=constructor" max-width="1200" height="400" frameborder="0"></iframe>
    <h2 class="shourum__title shourum__title_get">Фото входной группы</h2>
    <div id="player1" class="player"></div>


    <h2 class="shourum__title shourum__title_get">Фото шоу-рума <span class="metr"> 256м</span></h2>
</div>
<div class="container__gallery">
    <div class="gal">
        <a data-fancybox="gallery" data-src="https://thumb.tildacdn.com/tild3733-3239-4530-a634-303030366338/-/resize/465x/-/format/webp/artfabric_furniture_.jpg">

            <img class="gal-img" src="https://thumb.tildacdn.com/tild3733-3239-4530-a634-303030366338/-/resize/465x/-/format/webp/artfabric_furniture_.jpg" />
        </a>
    </div>
    <div class="gal">
        <a data-fancybox="gallery" data-src="https://thumb.tildacdn.com/tild3136-6338-4361-b563-623839346638/-/resize/465x/-/format/webp/artfabric_furniture_.jpg">
            <img class="gal-img" src="https://thumb.tildacdn.com/tild3136-6338-4361-b563-623839346638/-/resize/465x/-/format/webp/artfabric_furniture_.jpg" />
        </a>
    </div>
    <div class="gal">
        <a data-fancybox="gallery" data-src="https://thumb.tildacdn.com/tild3561-6530-4563-b432-623837633230/-/resize/465x/-/format/webp/artfabric_furniture_.jpg">
            <img class="gal-img" src="https://thumb.tildacdn.com/tild3561-6530-4563-b432-623837633230/-/resize/465x/-/format/webp/artfabric_furniture_.jpg" />
        </a>
    </div>
    <div class="gal">
        <a data-fancybox="gallery" data-src="https://thumb.tildacdn.com/tild3561-6530-4563-b432-623837633230/-/resize/465x/-/format/webp/artfabric_furniture_.jpg">
            <img class="gal-img" src="https://thumb.tildacdn.com/tild3561-6530-4563-b432-623837633230/-/resize/465x/-/format/webp/artfabric_furniture_.jpg" />
        </a>
    </div>
    <div class="gal">
        <a data-fancybox="gallery" data-src="https://thumb.tildacdn.com/tild3561-6530-4563-b432-623837633230/-/resize/465x/-/format/webp/artfabric_furniture_.jpg">
            <img class="gal-img" src="https://thumb.tildacdn.com/tild3561-6530-4563-b432-623837633230/-/resize/465x/-/format/webp/artfabric_furniture_.jpg" />
        </a>
    </div>
</div>

<h2 class="shourum__title shourum__title_get px-5">Панорама шоурума</h2>
<div id="player2" class="player player_1600 px-5"></div>


<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind('[data-fancybox="gallery"]', {
        //
    });
</script>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=2ca7f88e-79a8-4b7f-bd55-b47b2bf5f3fd"></script>







<script>
    ymaps.ready(function() {
        // Для начала проверим, поддерживает ли плеер браузер пользователя.
        if (!ymaps.panorama.isSupported()) {
            // Если нет, то просто ничего не будем делать.
            return;
        }

        // Ищем панораму в переданной точке.
        ymaps.panorama.locate([55.763194, 37.508607]).done(
            function(panoramas) {
                // Убеждаемся, что найдена хотя бы одна панорама.
                if (panoramas.length > 0) {
                    // Создаем плеер с одной из полученных панорам.
                    var player = new ymaps.panorama.Player(
                        'player1',
                        // Панорамы в ответе отсортированы по расстоянию
                        // от переданной в panorama.locate точки. Выбираем первую,
                        // она будет ближайшей.
                        panoramas[0],
                        // Зададим направление взгляда, отличное от значения
                        // по умолчанию.
                        {
                            direction: [256, 16]
                        }
                    );
                }
            },
            function(error) {
                // Если что-то пошло не так, сообщим об этом пользователю.
                alert(error.message);
            }
        );

        // Для добавления панорамы на страницу также можно воспользоваться
        // методом panorama.createPlayer. Этот метод ищет ближайщую панораму и
        // в случае успеха создает плеер с найденной панорамой.
        ymaps.panorama.createPlayer(
                'player2',
                [55.763194, 37.508607],
                // Ищем воздушную панораму.
                {
                    //layer: 'yandex#airPanorama'
                }
            )
            .done(function(player) {
                // player – это ссылка на экземпляр плеера.
            });
    });
</script>

@stop