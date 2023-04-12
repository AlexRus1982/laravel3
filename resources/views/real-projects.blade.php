@extends('layouts.base')
@section('content')
<style>
    .projects__button {
        width: 150px;
        height: 50px;
        color: #ffffff;
        font-size: 14px;
        font-family: 'Arial', Arial, sans-serif;
        line-height: 1.55;
        font-weight: 600;
        border-radius: 3px;
        background-color: #5199ff;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
        transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    
    }
    .projects__button-bold{
        margin-top: 70px;
        width: 100%;
        height: 80px;
        color: #ffffff;
        font-size: 14px;
        font-family: 'Arial', Arial, sans-serif;
        line-height: 1.55;
        font-weight: 600;
        border-radius: 3px;
        background-color: #5199ff;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
        transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    
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

        font-weight: 900;

    }

    .panel__table {
        display: flex;
        width: 50%;
        padding: 0;
        margin-bottom: 40px;
        justify-content: space-between;
        list-style: none;
    }

    .nav-link {
        display: flex;
        align-items: center;
        height: 40px;
        color: #000000;
        font-size: 14px;
        font-family: 'Arial', Arial, sans-serif;
        line-height: 1.55;
        font-weight: 600;
        border-radius: 30px;
        background-color: #dbdbdb;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
        transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        padding-right: 30px;
        padding-left: 30px;
    }


    .router-link-exact-active {
        color: white;
        background-color: red;

    }

    .nav-link.active {
        background-color: #6b6b6b;
    }

    .router-link-exact-active:hover {
        color: white;
        background-color: red;
    }

    .swiper {
        width: 49%;
        height: 100%;
    }

    .swiper-slide {
        position: relative;
        background-position: center;
        background-size: cover;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
    }

    .crug-right {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border-radius: 30px;
        position: absolute;
        background-color: white;
        top: 40%;
        right: 4%;

    }

    .crug-right {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border-radius: 30px;
        position: absolute;
        background-color: white;
        top: 40%;
        right: 4%;

    }

    .crug-left {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border-radius: 30px;
        position: absolute;
        background-color: white;
        top: 40%;
        left: 4%;

    }

    .swiper-button-prev,
    .swiper-button-next {
        color: #000000;
        font-size: 10px;
        left: 2px;
    }

    .swiper-button-next:after {
        font-size: 15px;
    }

    .swiper-button-prev:after {
        font-size: 15px;
    }

    .swiper-prev-next {
        color: #000000;
        font-size: 10px;
        right: 2px;
    }

    .swiper-prev-next:after {
        font-size: 15px;
        color: #000000;
    }

    .sliders__container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin-top: 60px;
    }

    .slider__contents {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .slider__text {
        display: flex;
        flex-direction: column;
    }

    .swiper-wrapper {
        position: relative;
    }
</style>
<div class="px-5 projects">
    <div class="bread-crumps">
        <span style="color:black;"><a class="bread-crumps__link" href="/products">Каталог</a>/проекты</span>

    </div>
    <h1 class="projects__title">Реализованные проекты</h1>

    <div id="app">

        <ul class="panel__table">

            <router-link class="nav-link" to="/">
                <li>Все</li>
            </router-link>
            <router-link class="nav-link" to="/Mo">
                <li>Хорека</li>
            </router-link>
            <router-link class="nav-link" to="/Sa">
                <li>Частные интерьеры</li>
            </router-link>
            <router-view name="a"></router-view>

        </ul>
        <div class="sliders__container">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://thumb.tildacdn.com/tild3032-3034-4731-b437-323162363065/-/cover/560x400/center/center/-/format/webp/SKALA-ARMCHAIR-March.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://static.tildacdn.com/tild3535-6661-4565-b661-626465626632/SKALA-ARMCHAIR-March.jpg" />
                    </div>
                    <div class="crug-right">
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="crug-left">
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="slider__contents ">
                    <div class="slider__text">
                        <span class="content__text content__text_bold">Марчелис</span>
                        <span class="content__text">Санкт-Петербург, Невский 43</span>
                    </div>
                    <button class="projects__button">Подробнее</button>
                </div>
            </div>

            <!---->

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://thumb.tildacdn.com/tild3464-3534-4762-b731-623137366234/-/cover/560x400/center/center/-/format/webp/5.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://thumb.tildacdn.com/tild6333-3362-4730-b535-343534393466/-/cover/560x400/center/center/-/format/webp/2_1.jpg" />
                    </div>
                    <div class="crug-right">
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="crug-left">
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="slider__contents ">
                    <div class="slider__text">
                        <span class="content__text content__text_bold">Марчелис</span>
                        <span class="content__text">Санкт-Петербург, Невский 43</span>
                    </div>
                    <button class="projects__button">Подробнее</button>
                </div>
            </div>

        </div>

        <!--КОНТЕЙНЕР-->
        <div class="sliders__container">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://thumb.tildacdn.com/tild3032-3034-4731-b437-323162363065/-/cover/560x400/center/center/-/format/webp/SKALA-ARMCHAIR-March.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://static.tildacdn.com/tild3535-6661-4565-b661-626465626632/SKALA-ARMCHAIR-March.jpg" />
                    </div>
                    <div class="crug-right">
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="crug-left">
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="slider__contents ">
                    <div class="slider__text">
                        <span class="content__text content__text_bold">Марчелис</span>
                        <span class="content__text">Санкт-Петербург, Невский 43</span>
                    </div>
                    <button class="projects__button">Подробнее</button>
                </div>
            </div>

            <!---->

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://thumb.tildacdn.com/tild3464-3534-4762-b731-623137366234/-/cover/560x400/center/center/-/format/webp/5.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://thumb.tildacdn.com/tild6333-3362-4730-b535-343534393466/-/cover/560x400/center/center/-/format/webp/2_1.jpg" />
                    </div>
                    <div class="crug-right">
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="crug-left">
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="slider__contents ">
                    <div class="slider__text">
                        <span class="content__text content__text_bold">Марчелис</span>
                        <span class="content__text">Санкт-Петербург, Невский 43</span>
                    </div>
                    <button class="projects__button">Подробнее</button>
                </div>
            </div>

        </div>

        <!--КОНТЕЙНЕР-->
        <div class="sliders__container">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://thumb.tildacdn.com/tild3032-3034-4731-b437-323162363065/-/cover/560x400/center/center/-/format/webp/SKALA-ARMCHAIR-March.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://static.tildacdn.com/tild3535-6661-4565-b661-626465626632/SKALA-ARMCHAIR-March.jpg" />
                    </div>
                    <div class="crug-right">
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="crug-left">
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="slider__contents ">
                    <div class="slider__text">
                        <span class="content__text content__text_bold">Марчелис</span>
                        <span class="content__text">Санкт-Петербург, Невский 43</span>
                    </div>
                    <button class="projects__button">Подробнее</button>
                </div>
            </div>

            <!---->

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://thumb.tildacdn.com/tild3464-3534-4762-b731-623137366234/-/cover/560x400/center/center/-/format/webp/5.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://thumb.tildacdn.com/tild6333-3362-4730-b535-343534393466/-/cover/560x400/center/center/-/format/webp/2_1.jpg" />
                    </div>
                    <div class="crug-right">
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="crug-left">
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="slider__contents ">
                    <div class="slider__text">
                        <span class="content__text content__text_bold">Марчелис</span>
                        <span class="content__text">Санкт-Петербург, Невский 43</span>
                    </div>
                    <button class="projects__button">Подробнее</button>
                </div>
            </div>

        </div>


        <!--КОНТЕЙНЕР-->
        <div class="sliders__container">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://thumb.tildacdn.com/tild3032-3034-4731-b437-323162363065/-/cover/560x400/center/center/-/format/webp/SKALA-ARMCHAIR-March.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://static.tildacdn.com/tild3535-6661-4565-b661-626465626632/SKALA-ARMCHAIR-March.jpg" />
                    </div>
                    <div class="crug-right">
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="crug-left">
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="slider__contents ">
                    <div class="slider__text">
                        <span class="content__text content__text_bold">Марчелис</span>
                        <span class="content__text">Санкт-Петербург, Невский 43</span>
                    </div>
                    <button class="projects__button">Подробнее</button>
                </div>
            </div>

            <!---->

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://thumb.tildacdn.com/tild3464-3534-4762-b731-623137366234/-/cover/560x400/center/center/-/format/webp/5.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://thumb.tildacdn.com/tild6333-3362-4730-b535-343534393466/-/cover/560x400/center/center/-/format/webp/2_1.jpg" />
                    </div>
                    <div class="crug-right">
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="crug-left">
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="slider__contents ">
                    <div class="slider__text">
                        <span class="content__text content__text_bold">Марчелис</span>
                        <span class="content__text">Санкт-Петербург, Невский 43</span>
                    </div>
                    <button class="projects__button">Подробнее</button>
                </div>
            </div>

        </div>

        <!--КОНТЕЙНЕР-->
        <div class="sliders__container">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://thumb.tildacdn.com/tild3032-3034-4731-b437-323162363065/-/cover/560x400/center/center/-/format/webp/SKALA-ARMCHAIR-March.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://static.tildacdn.com/tild3535-6661-4565-b661-626465626632/SKALA-ARMCHAIR-March.jpg" />
                    </div>
                    <div class="crug-right">
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="crug-left">
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="slider__contents ">
                    <div class="slider__text">
                        <span class="content__text content__text_bold">Марчелис</span>
                        <span class="content__text">Санкт-Петербург, Невский 43</span>
                    </div>
                    <button class="projects__button">Подробнее</button>
                </div>
            </div>

            <!---->

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://thumb.tildacdn.com/tild3464-3534-4762-b731-623137366234/-/cover/560x400/center/center/-/format/webp/5.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="https://thumb.tildacdn.com/tild6333-3362-4730-b535-343534393466/-/cover/560x400/center/center/-/format/webp/2_1.jpg" />
                    </div>
                    <div class="crug-right">
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="crug-left">
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="slider__contents ">
                    <div class="slider__text">
                        <span class="content__text content__text_bold">Марчелис</span>
                        <span class="content__text">Санкт-Петербург, Невский 43</span>
                    </div>
                    <button class="projects__button">Подробнее</button>
                </div>
            </div>

        </div>


    </div>

<button class="projects__button-bold">Добавить свой проект</button>
    </div>
@stop