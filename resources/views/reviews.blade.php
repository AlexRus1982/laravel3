@extends('layouts.base')
@section('content')

<style>
    @font-face {
        font-family: 'TildaSans';
        src: local('TildaSans'), url("../../public/fonts/vendor/@fortawesome/fontawesome-free/TildaSans-Regular.ttf");
    }

    .reviews {
        display: flex;
        max-width: 1200px;
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
    }

    .reviews__content {
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: flex-start;
      
        

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
        height: 90px;
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
        border: none;
        font-size: 18px;
        font-family: TildaSans, Arial, sans-serif;
        cursor: pointer;
        border-radius: 5px;
    }
    .reviews__button:hover{
        background-color:#000000a1;
    }

    .reviews__link {
        text-decoration: none;
        color: black;
    }

    .input-file {
        position: relative;
        display: flex;
        justify-content: flex-start;
    }

    .input-file span {
        position: relative;
        display: inline-block;
        cursor: pointer;
        outline: none;
        text-decoration: none;
        font-size: 14px;
        vertical-align: middle;

        text-align: center;
        border-radius: 4px;

        line-height: 22px;
        height: 40px;
        padding: 10px 20px;
        box-sizing: border-box;
        border: solid 1px black;
        margin: 0;
        transition: background-color 0.2s;
    }

    .input-file input[type=file] {
        position: absolute;
        z-index: -1;
        opacity: 0;
        display: block;
        width: 0;
        height: 0;
    }

    /* Focus */
    .input-file input[type=file]:focus+span {
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
    }

    /* Hover/active */
    .input-file:hover span {}

    .input-file:active span {}

    /* Disabled */
    .input-file input[type=file]:disabled+span {
        background-color: #eee;
    }



    .img {}

    .container__image:hover img,
    .container__image:hover svg path:not(:last-of-type) {
        fill: blue;
    }
</style>
<div class="px-5 reviews">
    <img class="reviews__title" src="https://static.tildacdn.com/tild3031-3262-4638-a631-663633366262/logo_art_fabric.svg" alt="logo">
    <div class="reviews__content">
        <p class="content__text">В ежедневном режиме мы работаем над повышением качества обслуживания.</p>
        <p class="content__text">Будем признательный если поделитесь отзывом о нашей работе и качестве мебели.</p>
    </div>

    <div class="container__row mb-4">
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M33.524 22.142l9.574-4.362c0 7.637-5.276 15.529-9.956 23.047l-8.023 11.91 3.51-21.746 4.896-8.849z" fill="#E00000" />
                        <path d="M26.955 33.48c8.947 0 16.2-7.254 16.2-16.2 0-8.947-7.253-16.2-16.2-16.2s-16.2 7.253-16.2 16.2c0 8.946 7.253 16.2 16.2 16.2z" fill="#F33" />
                        <path d="M26.955 23.734a6.454 6.454 0 100-12.909 6.454 6.454 0 000 12.91z" fill="#fff" />
                    </svg>
                    <span class="content__text_small">Яндекс</span>
                </div>
            </a>
            <a class="reviews__link" href="https://www.google.com/maps">
                <div class="container__image">
                    <svg class="img" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="56" height="54" fill="none">
                        <g clip-path="url(#clip0_1_238)">
                            <path d="M25.378 29.572l22.13-24.258a3.972 3.972 0 00-1.155-.171H4.403C2.24 5.143.471 6.879.471 9v41.143c0 .394.06.774.174 1.133L25.378 29.57z" fill="#0F9D58" />
                            <path d="M25.378 29.572L3.248 53.829c.366.111.754.171 1.155.171h41.95c.401 0 .79-.06 1.155-.17l-22.13-24.258z" fill="#4285F4" />
                            <path d="M25.378 29.571l24.734 21.705a3.77 3.77 0 00.174-1.133V9a3.76 3.76 0 00-.174-1.133L25.378 29.571z" fill="#E1E1E1" />
                            <path opacity=".5" d="M25.378 29.571l24.734 21.705a3.77 3.77 0 00.174-1.133V9a3.76 3.76 0 00-.174-1.133L25.378 29.571z" fill="#C2C2C2" />
                            <path d="M50.286 50.143L26.689 27l-4.588 3.857L45.698 54h.655c2.163 0 3.933-1.736 3.933-3.857z" fill="#F1F1F1" />
                            <path d="M46.353 5.143l-45.882 45C.47 52.264 2.24 54 4.403 54h.656L50.286 9.643V9c0-2.121-1.77-3.857-3.933-3.857z" fill="#FFEB3B" />
                            <path opacity=".5" d="M46.353 5.143l-45.882 45C.47 52.264 2.24 54 4.403 54h.656L50.286 9.643V9c0-2.121-1.77-3.857-3.933-3.857z" fill="#FFCD40" />
                            <path d="M46.353 5.143H4.403C2.24 5.143.471 6.879.471 9v.321c0-2.121 1.77-3.857 3.932-3.857h41.95c2.163 0 3.933 1.736 3.933 3.857V9c0-2.121-1.77-3.857-3.933-3.857z" fill="#fff" fill-opacity=".2" />
                            <path d="M46.353 53.679H4.403c-2.163 0-3.932-1.736-3.932-3.858v.322C.47 52.264 2.24 54 4.403 54h41.95c2.163 0 3.933-1.736 3.933-3.857v-.322c0 2.122-1.77 3.858-3.933 3.858z" fill="#263238" fill-opacity=".1" />
                            <path d="M11.614 14.785v2.739h3.88c-.308 1.626-1.763 2.81-3.88 2.81-2.354 0-4.268-1.955-4.268-4.256 0-2.302 1.914-4.256 4.268-4.256 1.061 0 2.005.36 2.759 1.054l2.065-2.025C15.186 9.701 13.56 9 11.614 9c-3.986 0-7.21 3.162-7.21 7.071s3.224 7.072 7.21 7.072c4.162 0 6.921-2.874 6.921-6.911 0-.502-.046-.984-.13-1.447h-6.792z" fill="#EEE" />
                            <path fill="url(#pattern0)" d="M24.067-5.143h41.95v57.857h-41.95z" opacity=".2" />
                            <path d="M42.42 0c-7.243 0-13.109 5.754-13.109 12.857 0 9.688 11.031 14.734 12.336 28.562.04.386.373.688.773.688s.74-.302.774-.688c1.304-13.828 12.335-18.874 12.335-28.562C55.53 5.754 49.663 0 42.42 0z" fill="#DB4437" />
                            <path d="M42.42 17.357c2.534 0 4.588-2.014 4.588-4.5 0-2.485-2.054-4.5-4.588-4.5-2.534 0-4.588 2.015-4.588 4.5 0 2.486 2.054 4.5 4.588 4.5z" fill="#7B231E" />
                            <path d="M42.421.321c7.178 0 13.005 5.658 13.103 12.671 0-.045.006-.09.006-.135C55.53 5.754 49.664 0 42.421 0S29.312 5.754 29.312 12.857c0 .045.006.09.006.135.1-7.012 5.927-12.67 13.104-12.67z" fill="#fff" fill-opacity=".2" />
                            <path d="M43.194 41.098a.77.77 0 01-.774.688.77.77 0 01-.773-.688c-1.291-13.764-12.225-18.83-12.33-28.428 0 .065-.006.123-.006.187 0 9.688 11.031 14.734 12.336 28.562.04.386.373.688.773.688s.74-.302.774-.688c1.304-13.828 12.335-18.874 12.335-28.562 0-.064-.006-.122-.006-.187-.105 9.598-11.032 14.67-12.33 28.428z" fill="#3E2723" fill-opacity=".2" />
                            <path d="M42.42 0a13.174 13.174 0 00-10.487 5.143H4.403C2.24 5.143.471 6.879.471 9v41.143C.47 52.264 2.24 54 4.403 54h41.95c2.163 0 3.933-1.736 3.933-3.857v-25.18c2.753-3.948 5.243-7.503 5.243-12.106C55.53 5.754 49.663 0 42.42 0z" fill="url(#paint0_radial_1_238)" />
                        </g>
                        <defs>
                            <radialGradient id="paint0_radial_1_238" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="matrix(67.1495 0 0 65.8581 1.837 6.207)">
                                <stop stop-color="#fff" stop-opacity=".1" />
                                <stop offset="1" stop-color="#fff" stop-opacity="0" />
                            </radialGradient>
                            <clipPath id="clip0_1_238">
                                <path fill="#fff" transform="translate(.47)" d="M0 0h55.059v54H0z" />
                            </clipPath>
                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_1_238" />
                            </pattern>
                            <image id="image0_1_238" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAABUCAYAAADeW1RFAAAACXBIWXMAAAAnAAAAJwEqCZFPAAAA" />
                        </defs>
                    </svg>
                    <span class="content__text_small">Гугл</span>
                </div>
            </a>
            <a class="reviews__link" href="https://otzovik.com/">
                <div class="container__image">
                    <svg class="img" xmlns="http://www.w3.org/2000/svg" width="54" height="54" fill="none">
                        <g clip-path="url(#clip0_1_293)">
                            <path d="M0 54.085v-54h54.107v54H0zm6.317-26.34c.022 5.379 2.293 10.644 6.773 14.682 4.686 4.229 10.432 6.157 16.771 5.265 4.244-.594 8.077-2.43 11.247-5.425 4.335-4.092 6.629-9.128 6.667-15.087.06-11.414-9.266-20.77-20.65-20.794-11.429-.015-20.793 9.266-20.808 21.358z" fill="#962F2C" />
                            <path d="M25.761 20.405c-2.11.496-3.688 1.738-4.785 3.559-1.135 1.89-.724 5.509.64 7.322 1.318 1.745 3.048 2.629 5.189 2.72 2.949.122 5.501-1.379 6.614-3.977 1.196-2.796.747-5.372-1.288-7.65-.945-1.06-2.202-1.585-3.528-1.966.008-2.293.008-4.595.015-6.888 2.69.267 5.128 1.22 7.178 2.964 5.821 4.96 6.69 12.74 2.537 18.622-4.503 6.37-13.204 7.566-19.285 3.086-5.996-4.42-7.116-12.603-3.444-18.302 2.073-3.215 4.892-5.25 8.58-6.119.518-.121 1.044-.167 1.57-.251-.008 2.286 0 4.58.007 6.88z" fill="#962F2C" />
                            <path d="M27.148 12.382a2.408 2.408 0 100-4.815 2.408 2.408 0 000 4.815z" fill="#96302D" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1_293">
                                <path fill="#fff" d="M0 0h54v54H0z" />
                            </clipPath>
                        </defs>
                    </svg>
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
        <label class="input-file">
            <input type="file" name="file">
            <span>Выберите файл</span>
        </label>
        <button class="reviews__button" type="submit">Отправить</button>
    </div>
</div>
@stop