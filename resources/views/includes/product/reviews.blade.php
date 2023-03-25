<?php
$faker = Faker\Factory::create();
?>
<div class="reviews-block py-2 w-100 d-flex flex-column justify-content-start" style="border-top: 1px solid var(--block-divider-liner-color);">
    <h2 class="block-title d-flex flex-row mt-3">Отзывы</h2>
    <button id="make-review-button" type="button" class="make-review btn btn-dark border-0 py-3 px-5 btn-sm my-4 fw-bold" style="height: 55; width: 200px; white-space: nowrap;">Написать отзыв</button>
    <style>
        .reviews__title {
            display: flex;
            font-size: 30px;
            font-weight: 900;
            justify-content: center;
            width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        .reviews__container-image {
            display: flex;
            width: 1400px;
            height: 300px;
            background-color: #bbb;
            margin-left: auto;
            margin-right: auto;
        }

        .reviews__container {

            width: 600px;
        }

        .reviews__line {

            width: 600px;
        }

        .reviews-block .make-review {
            border-radius: 3px;
        }

        .reviews-block .make-review {
            background: #26F;
        }

        .reviews-block .make-review:hover {
            background: #00F;
        }

        /*ОТЗЫВ*/

        .review__container {
            display: flex;
            width: 50%;
            flex-direction: column;
            justify-content: flex-start;
            align-content: flex-start;
        }

        .review__name {
            display: flex;
            width: 100%;
            text-align: left;
            justify-content: start;
        }

        .review__text {
            display: flex;
            width: 100%;
            text-align: left;
            justify-content: start;
        }

        .review__container-image {
            margin-bottom: 30px;
            width: 200px;
            height: 200px;
        }

        /*Звездочки*/

        .rating-area {

            overflow: hidden;
            width: 265px;
            margin: 0 auto;
        }

        .rating-area:not(:checked)>input {
            display: none;
        }

        .rating-area:not(:checked)>label {
            float: right;
            width: 42px;
            padding: 0;
            cursor: pointer;
            font-size: 32px;
            line-height: 32px;
            color: lightgrey;
            text-shadow: 1px 1px #bbb;
        }

        .rating-area:not(:checked)>label:before {
            content: '★';
        }

        .rating-area>input:checked~label {
            color: gold;
            text-shadow: 1px 1px #c60;
        }

        .rating-area:not(:checked)>label:hover,
        .rating-area:not(:checked)>label:hover~label {
            color: gold;
        }

        .rating-area>input:checked+label:hover,
        .rating-area>input:checked+label:hover~label,
        .rating-area>input:checked~label:hover,
        .rating-area>input:checked~label:hover~label,
        .rating-area>label:hover~input:checked~label {
            color: gold;
            text-shadow: 1px 1px goldenrod;
        }

        .rate-area>label:active {
            position: relative;
        }

        /*Вывод рейтинга*/
        .rating-mini {
            display: flex;
            justify-content: start;
            font-size: 0;
        }

        .rating-mini span {
            padding: 0;
            font-size: 20px;
            line-height: 1;
            color: lightgrey;
        }

        .rating-mini>span:before {
            content: '★';
        }

        .rating-mini>span.activation {
            color: gold;
        }


        .reviews__answer {
            display: flex;
            font-size: 14px;
            color: #bbb;
            justify-content: flex-start;
            width: 20%;
        }

        .reviews__like {
            display: flex;
            width: 80%;
        }

        .reviews__like-image {
            fill: grey;
            cursor: pointer;
        }

        .reviews__like-image:hover {
            fill: #00F;
        }

        .heading {
            display: flex;
            width: 100%;
            justify-content: flex-start;
            text-align: left;
            font-size: 25px;
            margin-right: 25px;
            margin-bottom: 0px;
        }

        .fa {
            font-size: 25px;
        }

        .checked {
            color: orange;
        }

        /* Три колонки макет */
        .side {
            float: left;
            width: 15%;
            text-align: left;
        }

        .middle {
            float: left;
            width: 70%;
            margin-top: 10px;
        }

        /* Разместить текст справа */
        .right {
            text-align: right;
        }

        /* Очистить поплавки после столбцов */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Бар контейнер */
        .bar-container {
            width: 100%;
            background-color: #f1f1f1;
            text-align: center;
            color: white;
        }

        /* Индивидуальные бары */
        .bar-5 {
            width: 60%;
            height: 15px;
            background-color: #ff9800;
        }

        .bar-4 {
            width: 30%;
            height: 15px;
            background-color: #ff9800;
        }

        .bar-3 {
            width: 10%;
            height: 15px;
            background-color: #ff9800;
        }

        .bar-2 {
            width: 4%;
            height: 15px;
            background-color: #ff9800;
        }

        .bar-1 {
            width: 15%;
            height: 15px;
            background-color: #ff9800;
        }

        /* Адаптивный макет - заставьте столбцы складываться друг на друга, а не рядом друг с другом */
        @media (max-width: 400px) {

            .side,
            .middle {
                width: 100%;
            }

            /* Скрыть правую колонку на маленьких экранах */
            .right {
                display: none;
            }
        }

        .box__row {
            margin-left: auto;
            margin-right: auto;
            width: 1400px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
    </style>

    {{--
    @php
        // generate data by accessing properties https://github.com/fzaninotto/Faker

        $faker = Faker\Factory::create();

        $qcount = $faker->numberBetween($min = 1, $max = 9);
        for ($i = 0; $i < $qcount; $i++) {
            echo "
                <div class='fw-bold mt-3' style='width: fit-content;'>{$faker->name}:</div>
                <div style='width: fit-content;'>{$faker->sentence($nbWords = 10, $variableNbWords = true)}</div>
            ";
        }
    @endphp
    --}}
</div>

<!-- Форма отзыва -->
<div class="offcanvas offcanvas-end" style="width: 600px; box-shadow: 0px 0px 4px #000000;" tabindex="-1" id="reviewOffcanvas" aria-labelledby="reviewOffcanvasLabel">

    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="reviewOffcanvasLabel" style="font-size: 20px; font-weight: 600;">Написать отзыв</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div id="reviews" class="d-flex flex-nowrap flex-column py-2">

        <form class="row g-3 needs-validation">
            <div class="col-md-12 mt-10">
                <div class="form-outline">
                    <input type="text" class="form-control" name="validationCustom01" id="validationCustom03" required />
                    <label for="validationCustom03" class="form-label">Имя</label>
                    <div class="invalid-feedback">Введите имя</div>
                </div>
            </div>
            <div class="col-md-12 mt-10">
                <div class="form-outline">
                    <input type="text" class="form-control" name="validationCustom02" id="validationCustom02" required />
                    <label for="validationCustom03" class="form-label">Эл.почта</label>
                    <div class="invalid-feedback">Введите эл.почту</div>
                </div>
            </div>

            <div class="input-group my-2" style="font-size: 14px; text-align: left;">
                <span style="font-size:20px;color: rgba(0,0,0,.6);">Ваша оценка</span>
                <div class="rating-area">
                    <input type="radio" id="star-5" name="rating" value="5" required>
                    <label for="star-5" title="Оценка «5»"></label>
                    <input type="radio" id="star-4" name="rating" value="4" required>
                    <label for="star-4" title="Оценка «4»"></label>
                    <input type="radio" id="star-3" name="rating" value="3" required>
                    <label for="star-3" title="Оценка «3»"></label>
                    <input type="radio" id="star-2" name="rating" value="2" required>
                    <label for="star-2" title="Оценка «2»"></label>
                    <input type="radio" id="star-1" name="rating" value="1" required>
                    <label for="star-1" title="Оценка «1»"></label>
                </div>
            </div>

            <div class="col-md-12 mt-10">

                <div class="form-outline">

                    <input type="file" class="form-control" name="validationCustom03" id="file" required />

                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <style>
                #add-review-photo:hover {
                    cursor: pointer;
                    color: var(--accent-color1);
                }
            </style>
            <div class="col-md-12 mt-10">
                <div class="form-outline">
                    <textarea type="text" class="form-control" name="validationCustom04" id="validationCustom04" required></textarea>
                    <label for="validationCustom03" class="form-label">Ваш отзыв</label>
                    <div class="invalid-feedback">Введите отзыв</div>
                </div>
            </div>
            <div class="form-outline d-flex flex-start">
                <button id="button-reviews" type="button" class="btn btn-dark border-0 py-3 px-5 btn-sm my-2 fw-bold" style="width: fit-content;">Опубликовать отзыв</button>
            </div>
        </form>
        <style>
            #button-reviews {
                background: #26F;
                border-radius: 3px;
            }

            #button-reviews:hover {
                background: #00F;
            }

            #make-review-button {
                background: #26F;
                border-radius: 3px;
            }

            #make-review-button:hover {
                background: #00F;
            }
        </style>
    </div>

</div>
<!-- Тут будет блок отзывов-->

<h2 class="reviews__title">Отзывы</h2>
<h3 class="reviews__title">Фото от покупателей</h3>
<div id="reviews__container-image" class="reviews__container-image">

</div>



<!--Здесь карточка и рейтинг-->
<div class="box__row">
    <div id="reviews__container" class="reviews__container">
        <div class="review__container">
            <hr class="reviews__line">
            <span class="review__name">Администратор</span>
            <div class="rating-mini">
                <span class="activation"></span>
                <span class="activation"></span>
                <span class="activation"></span>
                <span></span>
                <span></span>
            </div>
            <span class="review__text">Диван просто шикарный! Обивка очень благородная и приятная, цвет красивый, в общем, всем довольны!</span>
            <div class="col-md-12 row">
                <span class="reviews__answer">Ответить</span>
                <div class="reviews__like">
                    <span style='min-width: 80px;'></span>
                    <svg class="reviews__like-image" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                        <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                    </svg>
                    <div class='mx-1 text-success'>{{$faker->numberBetween($min = 1, $max = 9)}}</div>
                    <svg class="reviews__like-image" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16">
                        <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z" />
                    </svg>
                    <div class='mx-1 text-danger'>{{$faker->numberBetween($min = 1, $max = 9)}}</div>
                </div>
            </div>
            <hr class="reviews__line">
        </div>



    </div>
    <!--РЕЙТИНГ КОНТЕЙНЕР-->
    <div class="rating__container">
        <div class="rating__box-col">
            <span class="rating__number">4.9</span>
            <div class="rating__box">
                <div class="rating-mini">
                    <span class="activation"></span>
                    <span class="activation"></span>
                    <span class="activation"></span>
                    <span class="activation"></span>
                    <span></span>
                </div>
                <span class="rating__title">Всего отзывов:17</span>
            </div>
        </div>
        <span class="heading">Рейтинг отзывов</span>


        <div class="row">
            <div class="side">
                <div>5 звезд</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-5"></div>
                </div>
            </div>
            <div class="side">
                <div>150%</div>
            </div>
            <div class="side">
                <div>4 звезд</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-4"></div>
                </div>
            </div>
            <div class="side">
                <div>63%</div>
            </div>
            <div class="side">
                <div>3 звезд</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-3"></div>
                </div>
            </div>
            <div class="side">
                <div>15%</div>
            </div>
            <div class="side">
                <div>2 звезд</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-2"></div>
                </div>
            </div>
            <div class="side">
                <div>6%</div>
            </div>
            <div class="side">
                <div>1 звезд</div>
            </div>
            <div class="middle">
                <div class="bar-container">
                    <div class="bar-1"></div>
                </div>
            </div>
            <div class="side">
                <div>20%</div>
            </div>
        </div>
    </div>
    <!--Конец РЕЙТИНГ КОНТЕЙНЕР-->
</div>
<style>
    #reviewOffcanvas {
        font-size: 20px;
        padding: 0px 40px 0px 40px;
    }

    #reviewOffcanvas .btn-close {
        position: absolute;
        margin-left: -85px;
        margin-top: -10px;
    }

    #reviewOffcanvas .offcanvas-body {
        padding-top: 0px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        line-height: 2;
        padding: 0px 0px 0px 0px;
    }

    #reviewOffcanvas .offcanvas-body a {
        color: #000000;
        text-decoration: none;
    }

    #reviewOffcanvas .offcanvas-header {
        padding: 11px 0px 11px 0px;
    }

    .rating__box {
        display: flex;
        flex-direction: column;
    }

    .rating__box-col {
        display: flex;
        align-items: center;
    }

    .rating__number {
        font-size: 40px;
        font-weight: bold;
    }

    .rating__container {
        display: block;
        width: 600px;
    }
</style>




@push('js')



<script>
    const review_button = document.querySelector("#button-reviews");
    // создадим пустой объект
    var $data = {};

    review_button.addEventListener('click', function() {
       let selected = 0;
        if (document.querySelector('input[name="rating"]:checked')) {
            selected = document.querySelector('input[name="rating"]:checked').value;
        }
       
        $('#reviews').find('input, textarea, select').each(function() {
            $data[this.name] = $(this).val();

        });


        function save() {
            const f2 = document.querySelector("#file").value;
            const f = document.querySelector("#file").files[0];
            if (f) {
                const image = URL.createObjectURL(f);
                localStorage.setItem(`myImage`, image);
            }

        }
        save();

        function func(n) {
            if (!n || isNaN(+n) || n < 1 || n > 5) n = 0;
            return `<span class="activation"></span>\n`.repeat(n) + `<span></span>\n`.repeat(5 - n);
        }

        function handlerImage() {
            if (document.querySelector("#file").value) {
                let element = ` <div class="review__container-image" style="border:none;">
        <img style="width:100%;height:100%; border:none;" src="${localStorage.getItem('myImage')}"></div> `

                return element;
            } else {
                return "";
            }
        }

        function handlerImage2() {
            if (document.querySelector("#file").value) {
                let element = ` <div class="review__container-image" style="border:none;margin-left:10px;margin-right:5px;margin-top:auto;margin-bottom:auto;">
        <img style="width:100%;height:100%; border:none;" src="${localStorage.getItem('myImage')}"></div> `

                return element;
            } else {
                return "";
            }
        }

        $(document).ready(function() {
            $('#reviews__container').append(`
           
            <div class="review__container">
    <span class="review__name">${$data.validationCustom01}</span>
    <div id="rating-mini" class="rating-mini">
${func(selected)}
       </div>
      
       ${handlerImage()}
       
       <span class="review__text">${$data.validationCustom04}</span>
<div class="col-md-12 row">
    <span class="reviews__answer">Ответить</span>
    <div class="reviews__like">
                        <span  style='min-width: 80px;'></span>
                        <svg class="reviews__like-image" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
  <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
</svg>
<div class='mx-1 text-success'>{{$faker->numberBetween($min = 1, $max = 9)}}</div>
<svg class="reviews__like-image" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16">
  <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z"/>
</svg>
<div class='mx-1 text-danger'>{{$faker->numberBetween($min = 1, $max = 9)}}</div>
                    </div>
</div>
</div>
<hr class="reviews__line">
`);


            $('#reviews__container-image').append(handlerImage2());

        });


    });

  


  

 






</script>

@endpush