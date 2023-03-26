<style>
    .product__width-1920.product__width-1920.product__width-1920 {
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    .product__width-1400.product__width-1400.product__width-1400 {
        max-width: 1400;
        margin-left: auto;
        margin-right: auto;
    }

    .product__width-1200.product__width-1200.product__width-1200 {
        width: 1200;
        margin-left: auto;
        margin-right: auto;
    }

    .product__cards-col-6 {
        margin-left: auto;
        margin-right: auto;
        width: 1400px;
        display: grid;
        grid-template-columns: repeat(2, 1fr 1fr 1fr);
        justify-items: auto;
        gap: 30px;
    }

    .product__cards-col-5 {
        margin-left: auto;
        margin-right: auto;
        width: 1400px;
        display: grid;
        grid-template-columns: repeat(1, 2.4fr 2.4fr 2.4fr 2.4fr 2.4fr);
        justify-items: auto;
        gap: 30px;
    }


    .product__cards-col-3 {
        margin-left: auto;
        margin-right: auto;
        width: 1400px;
        display: grid;
        grid-template-columns: repeat(1, 3.5fr 3.5fr 3.5fr);
        justify-items: auto;
        gap: 30px 30px;
    }

    .product__cards-col-2 {
        margin-left: auto;
        margin-right: auto;
        width: 1400px;
        display: grid;
        grid-template-columns: repeat(2, 5.5fr);
        justify-items: auto;
        gap: 30px 30px;
    }



    .product__cards-col-4 {
        margin-left: auto;
        margin-right: auto;
        width: 1400px;
        display: grid;
        grid-template-columns: repeat(2, 1fr 1fr);
        justify-items: auto;
        gap: 30px;
    }

    .product__cards-col-2-mobile.product__cards-col-2-mobile.product__cards-col-2-mobile {
        margin-left: auto;
        margin-right: auto;
        width: 90%;
        display: grid;
        grid-template-columns: repeat(2, 5.5fr);
        justify-items: auto;
        gap: 30px 20px;
    }

    .product__cards-col-1-mobile {
        margin-left: auto;
        margin-right: auto;
        width: 96%;
        display: grid;
        grid-template-columns: repeat(1, 11fr);
        justify-items: auto;
        gap: 30px 30px;
    }

    .product__card {
        display: flex;

        flex-direction: column;
        justify-content: center;
        align-content: center;
        align-self: center;
        margin-left: auto;
        margin-right: auto;
    }

    .list-cards {
        display: flex;
        justify-content: space-between;
    }


    .card__like {
        position: absolute;
        bottom: 5px;
        left: 5px;

    }

    .card__like:hover {
        fill: red;
    }

    .button-handler {
        background-color: green;
    }

    .control-mobile {
        display: none;
    }

    .control {
        display: flex;
    }

    @media (min-width: 425px) and (max-width: 768px) {
        .product__width-1920.product__width-1920.product__width-1920 {
            width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        .control-mobile {
            display: flex;
            margin-left: auto;
            margin-right: auto;
        }

        .control {
            display: none;
        }

        .product__width-1400.product__width-1400.product__width-1400 {
            width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        .product__width-1200.product__width-1200.product__width-1200 {
            width: 90%;
            margin-left: auto;
            margin-right: auto;
        }


        .product__cards-col-6 {
            margin-left: auto;
            margin-right: auto;
            display: grid;
            width: 90%;
            grid-template-columns: 5.5fr 5.5fr;
            justify-items: auto;
            gap: 30px;
        }

        .product__cards-col-5 {
            margin-left: auto;
            margin-right: auto;
            display: grid;
            width: 90%;
            grid-template-columns: 5.5fr 5.5fr;
            justify-items: auto;
            gap: 30px;
        }


        .product__cards-col-3 {
            margin-left: auto;
            margin-right: auto;
            display: grid;
            width: 90%;
            grid-template-columns: 5.5fr 5.5fr;
            justify-items: auto;
            gap: 30px 30px;
        }

        .product__cards-col-2 {
            margin-left: auto;
            margin-right: auto;
            display: grid;
            width: 90%;
            grid-template-columns: 5.5fr 5.5fr;
            justify-items: auto;
            gap: 30px 30px;
        }



        .product__cards-col-4 {
            margin-left: auto;
            margin-right: auto;
            display: grid;
            width: 90%;
            grid-template-columns: 5.5fr 5.5fr;
            justify-items: auto;
            gap: 30px;
        }

    }

    @media (min-width: 0px) and (max-width: 425px) {
        .control-mobile {
            display: flex;
        }

        .control {
            display: none;
        }
        .product__width-1920.product__width-1920.product__width-1920 {
            width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        .product__width-1400.product__width-1400.product__width-1400 {
            width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        .product__width-1200.product__width-1200.product__width-1200 {
            width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        .product__cards-col-6 {
            margin-left: auto;
            margin-right: auto;
            display: grid;
            width: 90%;
            grid-template-columns: 100%;
            justify-items: auto;
            gap: 30px;
        }

        .product__cards-col-5 {
            margin-left: auto;
            margin-right: auto;
            display: grid;
            width: 90%;
            grid-template-columns: 100%;
            justify-items: auto;
            gap: 30px;
        }


        .product__cards-col-3 {
            margin-left: auto;
            margin-right: auto;
            display: grid;
            width: 90%;
            grid-template-columns: 100%;
            justify-items: auto;
            gap: 30px 30px;
        }

        .product__cards-col-2 {
            margin-left: auto;
            margin-right: auto;
            display: grid;
            width: 90%;
            grid-template-columns: 100%;
            justify-items: auto;
            gap: 30px 30px;
        }



        .product__cards-col-4 {
            margin-left: auto;
            margin-right: auto;
            display: grid;
            width: 96%;
            grid-template-columns: 100%;
            justify-items: auto;
            gap: 30px;
        }


    }
</style>
<div class="control ">
    <div class="buttons__col  " style="flex-direction: column;margin-right:20px;align-items:center">
        <h2>Количество колонок</h2>
        <button id="but_6" class="button-handler">6 колонок</button>
        <button id="but_5" class="button-handler">5 колонок</button>
        <button id="but_4" class="button-handler">4 колонок</button>
        <button id="but_3" class="button-handler">3 колонок</button>
        <button id="but_2" class="button-handler">2 колонок</button>
    </div>
    <div class="buttons__col d-flex" style="flex-direction: column;margin-right:20px">
        <h2>Ширина макета</h2>
        <button id="width_button-1920" class="button-handler">Ширина с отступами 60</button>
        <button id="width_button-1400" class="button-handler">Ширина 1400</button>
        <button id="width_button-1200" class="button-handler">Ширина 1200</button>
    </div>
    <div class="buttons__col d-flex" style="flex-direction: column;margin-right:20px">
        <h2>Вишлист</h2>
        <button id="heart_position_center" class="button-handler">Вишлист по центру снизу</button>
        <button id="heart_position_left" class="button-handler">Вишлист слева снизу</button>
        <button id="heart_position_left_top" class="button-handler">Вишлист слева сверху</button>
        <button id="heart_position_center_top" class="button-handler">Вишлист по центру сверху </button>
    </div>
    <div class="buttons__col d-flex" style="flex-direction: column;margin-right:20px">
        <h2>Расположение фильтра</h2>
        <button id="filtr_right" class="button-handler">Фильтр справа</button>
        <button id="filtr_center" class="button-handler">Фильтр в центре</button>
    </div>

    <div class="buttons__col d-flex" style="flex-direction: column;margin-right:20px">
        <h2>Расположение текста</h2>
        <button id="text_center" class="button-handler">Текст по центру</button>
        <button id="text_left" class="button-handler">Текст по левому краю</button>
    </div>

  
</div>
<div class="control-mobile ">
    <div class="buttons__col d-flex" style="flex-direction: column;">
        <h2>Количество колонок для мобильной версии</h2>
        <button id="mobile_but_1" class="button-handler">1 колонка</button>
        <button id="mobile_but_2" class="button-handler">2 колонки</button>
    </div>
</div>
<div id="col" class="col product__cards-col-4">
    <?php
    $cardCounter = 0;
    $breakCounter = 0;
    $count = count($products);
    ?>



    <?

    foreach ($products as $key => $value) {
    ?>@include('includes.products.card', ['value' => $value])<?

                                                                $cardCounter++;
                                                                $breakCounter++;
                                                                if ($breakCounter > ($fragment - 1) && $cardCounter < $count) {
                                                                    $breakCounter = 0;
                                                                ?>
<?
                                                                }
                                                            }
?>

</div>