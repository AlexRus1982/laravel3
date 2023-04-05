@extends('layouts.base')
@section('content')

<style>
    @font-face {
        font-family: 'TildaSans';
        src: local('TildaSans'), url("../../public/fonts/vendor/@fortawesome/fontawesome-free/TildaSans-Regular.ttf");
    }

    .reviews {
        display: flex;
        width: 659px;
        flex-direction: column;

    }

    .reviews__title {
        text-align: left;
        width: 207px;
        margin-top: 20px;
        margin-bottom: 40px;
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

    .content__text_small {
        font-size: 14px;
        background-position: center center;
        border-color: transparent;

    }

    .content__text_black {
        font-size: 14px;
        text-align: left;

    }

    .container-reviews__row {
        display: flex;
        justify-content: space-between;
    }

    .reviews__image {
        margin-right: 40px;
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
    }

    .reviews__content {
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: flex-start;
        margin-top: 30px;
        margin-bottom: 30px;

    }

    .reviews__content-grey {

        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        border-radius: 5px;
        padding-left: 30px;
        padding-top: 30px;
        padding-bottom: 30px;
      background-color: #ebebeb;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
        margin-bottom: 40px;
    }



    .reviews__content_small {
        width: 300px;
        flex-direction: column;
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

    .container__image {

        display: flex;
        height: 100px;

        flex-direction: column;
        justify-content: space-between;
    }

    .reviews__label {
        width: 100%;
        text-align: left;
    }

    .reviews__textarea {
        width: 95%;
        color: rgb(0, 0, 0);
        border: 1px solid rgb(0, 0, 0);
        background-color: rgb(255, 255, 255);
        border-radius: 3px;
        font-size: 16px;
        font-weight: 400;
        height: 210px;
        resize: none;
    }

    .content__text_weight-200 {
        font-weight: 200;
        line-height: 31px;
    }

    .reviews__button {
        height: 60px;
        width: 160px;
        margin-top: 20px;
        color: #fff;
        background-color: #000;
        border-radius: 0px;
        font-size: 14px;
        font-family: TildaSans, Arial, sans-serif;
        cursor: pointer;
    }

    .reviews__link {
        text-decoration: none;
        color: black;
    }

    .img {}

    .container__image:hover {
        background: blue;
        opacity: 0.5;
    }
</style>
<div class="px-5 reviews">
    <img class="reviews__title" src="https://static.tildacdn.com/tild3031-3262-4638-a631-663633366262/logo_art_fabric.svg" alt="logo">
    <div class="reviews__content">
        <p class="content__text">В ежедневном режиме мы работаем над повышением качества обслуживания.</p>
        <p class="content__text">Будем признательный если поделитесь отзывом о нашей работе и качестве мебели.</p>
    </div>

    <div class="container__row">
        <div class="reviews__image " data-original="https://static.tildacdn.com/tild6265-3630-4634-b935-366435646230/69685661_24824674275.jpg" style="background-image: url(&quot;https://thumb.tildacdn.com/tild6265-3630-4634-b935-366435646230/-/cover/57x57/center/center/-/format/webp/69685661_24824674275.jpg&quot;);"></div>
        <div class="reviews__content reviews__content_small">
            <span class="content__text">Андрей Хэзэхзекович</span>
            <span class="content__text content__text_small">Директор по продажам</span>
        </div>
    </div>

    <div class="reviews__content-grey ">
        <p class="content__text">Если вам все понравилось, просим оставить отзыв на одной из этих площадок.</p>
        <div class="container__images">
            <a class="reviews__link" href="https://reviews.yandex.ru/ugcpub/cabinet">
                <div class="container__image">
                    <img class="img" src="https://static.tildacdn.com/tild3835-3864-4631-a336-323562643836/01.svg">
                    <span class="content__text_small">Яндекс</span>
                </div>
            </a>
            <a class="reviews__link" href="https://www.google.com/maps">
                <div class="container__image">
                    <img class="img" class="img" src="https://static.tildacdn.com/tild3030-6430-4466-a230-376632616439/02.svg">
                    <span class="content__text_small">Гугл</span>
                </div>
            </a>
            <a class="reviews__link" href="https://otzovik.com/">
                <div class="container__image">
                    <img class="img" src="https://static.tildacdn.com/tild6639-6365-4261-b236-393131633765/07.svg">
                    <span class="content__text_small">Отзовик</span>
                </div>
            </a>
        </div>
        <p class="content__text content__text_black">Ваш отзыв поможет другим покупателям сделать правильный выбор.</p>
    </div>

    <div class="reviews__content-grey ">
        <p class="content__text content__text_weight-200">При негативном опыте просим максимально подробно описать детали случившегося и отправить письмо непосредственно генеральному деректору компании.</p>
        <p class="content__text content__text_weight-200">Все сообщения фиксируются и вы получите развёрнутый ответ по вашей ситуации.</p>
        <label class="reviews__label">Комментарий</label>
        <textarea class="reviews__textarea"></textarea>
        <span class="content__text content__text_weight-200">Прикрепить фото</span>
        <div class="form-group">

            <input type="file" class="content__text content__text_weight-200" id="exampleFormControlFile1">
        </div>
        <button class="reviews__button" type="submit">Отправить</button>
    </div>
</div>
@stop