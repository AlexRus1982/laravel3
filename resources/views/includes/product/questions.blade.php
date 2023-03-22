<div class="block-wrapper w-100" style="border-top: 1px solid var(--block-divider-liner-color);">
    <div class="questions-block py-2 w-100 d-flex flex-column justify-content-start" style="max-width: 800px;">
        <h2 class="block-title d-flex flex-row mt-3">Вопросы и ответы</h2>
        {{--
        @php
            // generate data by accessing properties https://github.com/fzaninotto/Faker

            $faker = Faker\Factory::create();

            $qcount = $faker->numberBetween($min = 1, $max = 9);
            for ($i = 0; $i < $qcount; $i++) {
                echo "
                    <div class="mt-3">
                        <span class='fw-bold' style='width: fit-content;'>Вопрос:</span>
                        <span style='width: fit-content;'>{$faker->sentence($nbWords = 10, $variableNbWords = true)}</span>
                    </div>

                    <div class='fw-bold mt-1' style='width: fit-content;'>Ответ:</div>
                    <div style='width: fit-content;'>{$faker->sentence($nbWords = 10, $variableNbWords = true)}</div>
                    <div class='d-flex flex-row'>
                        <div class='mx-1 text-primary'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-caret-up-fill' viewBox='0 0 16 16'>
                                <path d='m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z'/>
                            </svg>
                        </div>
                        <div class='mx-1'>{$faker->numberBetween($min = 1, $max = 9)}</div>
                        <div class='mx-1 text-primary'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-caret-down-fill' viewBox='0 0 16 16'>
                                <path d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/>
                            </svg>
                        </div>
                        <div class='mx-1'>{$faker->numberBetween($min = 1, $max = 9)}</div>
                    </div>
                ";
            }
        @endphp
        --}}

        <?php
            $faker = Faker\Factory::create();
            ?>
                <div class="questions-list">
                    <div class="d-flex justify-content-start mt-3">
                        <span class='fw-bold d-flex justify-content-start' style='min-width: 80px;'>Вопрос:</span>
                        <span style='width: fit-content; text-align: left;'>Можно сделать покупку как юрлицо?</span>
                    </div>

                    <div class="d-flex justify-content-start mt-3">
                        <span class='fw-bold d-flex justify-content-start' style='min-width: 80px;'>Ответ:</span>
                        <span style='width: fit-content; text-align: left;'>Да, конечно. Укажите реквизиты при оформлении или сообщите менеджеру.</span>
                    </div>

                    <div class='d-flex flex-row mt-3'>
                        <span style='min-width: 80px;'></span>
                        <div class='mx-1 text-secondary'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-caret-up-fill' viewBox='0 0 16 16'>
                                <path d='m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z'/>
                            </svg>
                        </div>
                        <div class='mx-1 text-success'>{{$faker->numberBetween($min = 1, $max = 9)}}</div>
                        <div class='mx-1 text-secondary'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-caret-down-fill' viewBox='0 0 16 16'>
                                <path d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/>
                            </svg>
                        </div>
                        <div class='mx-1 text-danger'>{{$faker->numberBetween($min = 1, $max = 9)}}</div>
                    </div>

                    <div class="d-flex justify-content-start mt-3">
                        <span class='fw-bold d-flex justify-content-start' style='min-width: 80px;'>Вопрос:</span>
                        <span style='width: fit-content; text-align: left;'>Нужна ли предоплата заказа?</span>
                    </div>

                    <div class="d-flex justify-content-start mt-3">
                        <span class='fw-bold d-flex justify-content-start' style='min-width: 80px;'>Ответ:</span>
                        <span style='width: fit-content; text-align: left;'>Да. Из-за повышенного спроса на товары и нестабильного курса валют с 24.02.22 все товары отгружаются только по предоплате.</span>
                    </div>

                    <div class='d-flex flex-row mt-3'>
                        <span style='min-width: 80px;'></span>
                        <div class='mx-1 text-secondary'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-caret-up-fill' viewBox='0 0 16 16'>
                                <path d='m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z'/>
                            </svg>
                        </div>
                        <div class='mx-1 text-success'>{{$faker->numberBetween($min = 1, $max = 9)}}</div>
                        <div class='mx-1 text-secondary'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-caret-down-fill' viewBox='0 0 16 16'>
                                <path d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/>
                            </svg>
                        </div>
                        <div class='mx-1 text-danger'>{{$faker->numberBetween($min = 1, $max = 9)}}</div>
                    </div>
                </div>
            <?
        ?>

        <button id="make-question-button" type="button" class="make-question btn btn-dark border-0 py-3 px-5 btn-sm my-4 fw-bold" style="height: 55; width: 200px;">Задать вопрос</button>
        <style>
            #make-question-button {
                border-radius: 3px;
                background: #26F;
            }

            #make-question-button:hover {
                background: #00F;
            }
        </style>
    </div>
</div>

<!-- Форма вопроса -->
<div class="offcanvas offcanvas-end" style="width: 600px; box-shadow: 0px 0px 4px #000000;" tabindex="-1" id="questionOffcanvas" aria-labelledby="questionOffcanvasLabel">
    
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="questionOffcanvasLabel" style="font-size: 20px; font-weight: 600;">Ваш вопрос</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body d-flex flex-nowrap flex-column py-2">
        <div id="order-form-adress" class="input-group my-2">
            <span class="input-group-text rounded-0" style="color: #000; font-size: 14px; width: 140px;">Текст вопроса</span>
            <textarea id="input-order-adress" class="form-control rounded-0" aria-label="With textarea" style="height: 80px; max-height: 160px; font-size: 14px;"></textarea>
        </div>

        <div class="input-group my-2" style="font-size: 14px; line-height: 1.5; text-align: left;">
            После проверки мы опубликуем ответ на вопрос на этой странице.<br>
            Если Вы хотите персонализированный ответ, то напишите свой телефон или адрес электронной почты для ответа.
        </div>

        <div class="input-group my-2">
            <span class="input-group-text rounded-0" id="order-phone" style="color: #000; font-size: 14px; width: 140px;">Телефон</span>
            <input id="input-order-phone1" type="text" style="font-size: 14px;" class="form-control rounded-0" aria-label="Username" aria-describedby="order-phone1">
        </div>

        <div class="input-group my-2">
            <span class="input-group-text rounded-0" id="order-phone" style="color: #000; font-size: 14px; width: 140px;">Эл. почта</span>
            <input id="input-order-mail" type="text" style="font-size: 14px;" class="form-control rounded-0" aria-label="Username" aria-describedby="order-phone1">
        </div>

        <button id="ask-question-button" type="button" class="btn btn-dark border-0 py-3 px-5 btn-sm my-2 fw-bold" style="width: fit-content;">Задать вопрос</button>
        <style>
            #ask-question-button {
                border-radius: 3px;
                background: #26F;
            }

            #ask-question-button:hover {
                background: #00F;
            }
        </style>
    </div>

</div>

<style>
    #questionOffcanvas {
        font-size: 20px;
        padding: 0px 40px 0px 40px;
    }

    #questionOffcanvas .btn-close {
        position: absolute;
        margin-left: -85px;
        margin-top: -10px;
    }

    #questionOffcanvas .offcanvas-body {
        padding-top: 0px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        line-height: 2;
        padding: 0px 0px 0px 0px;
    }

    #questionOffcanvas .offcanvas-body a {
        color: #000000;
        text-decoration: none;
    }

    #questionOffcanvas .offcanvas-header {
        padding: 11px 0px 11px 0px;
    }

</style>