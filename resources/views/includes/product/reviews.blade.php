<div class="reviews-block py-2 w-100 d-flex flex-column justify-content-start" style="border-top: 1px solid var(--block-divider-liner-color);">
    <h2 class="block-title d-flex flex-row mt-3">Отзывы</h2>
    <button id="make-review-button" type="button" class="make-review btn btn-dark border-0 py-3 px-5 btn-sm my-4 fw-bold" style="height: 55; width: 200px; white-space: nowrap;">Написать отзыв</button>
    <style>
        .reviews-block .make-review {
            border-radius: 3px;
        }

        .reviews-block .make-review {
            background: #26F;
        }
        
        .reviews-block .make-review:hover {
            background: #00F;
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

    <div class="offcanvas-body d-flex flex-nowrap flex-column py-2">

        <div class="input-group my-2">
            <span class="input-group-text rounded-0" id="order-phone" style="color: #000; font-size: 14px; width: 140px;">Имя</span>
            <input id="input-order-phone1" type="text" style="font-size: 14px;" class="form-control rounded-0" aria-label="Username" aria-describedby="order-phone1">
        </div>

        <div class="input-group my-2">
            <span class="input-group-text rounded-0" id="order-phone" style="color: #000; font-size: 14px; width: 140px;">Эл. почта</span>
            <input id="input-order-mail" type="text" style="font-size: 14px;" class="form-control rounded-0" aria-label="Username" aria-describedby="order-phone1">
        </div>

        <div class="input-group my-2" style="font-size: 14px; text-align: left;">
            Ваша оценка
            <span class="ms-4 text-warning">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FC0" class="bi bi-star" viewBox="0 0 16 16">
                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FC0" class="bi bi-star" viewBox="0 0 16 16">
                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FC0" class="bi bi-star" viewBox="0 0 16 16">
                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FC0" class="bi bi-star" viewBox="0 0 16 16">
                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FC0" class="bi bi-star" viewBox="0 0 16 16">
                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                </svg>
            </span>
        </div>

        <div id="add-review-photo" class="input-group my-2" style="font-size: 14px; text-align: left;">
            Прикрепить фото
        </div>
        <style>
            #add-review-photo:hover {
                cursor: pointer;
                color: var(--accent-color1);
            }
        </style>

        <div id="order-form-adress" class="input-group my-2">
            <span class="input-group-text rounded-0" style="color: #000; font-size: 14px; width: 140px;">Отзыв</span>
            <textarea id="input-order-adress" class="form-control rounded-0" aria-label="With textarea" style="height: 80px; max-height: 160px; font-size: 14px;"></textarea>
        </div>

        <button id="make-review-button" type="button" class="btn btn-dark border-0 py-3 px-5 btn-sm my-2 fw-bold" style="width: fit-content;">Опубликовать отзыв</button>
        <style>
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

</style>