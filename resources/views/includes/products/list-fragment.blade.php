<style>
    .product__cards-col-6{
        margin-left: auto;
        margin-right: auto;
        width: 1400px;
        display: grid;
        grid-template-columns: repeat(2, 1fr 1fr 1fr);
        justify-items: auto;
        gap: 2% 3%;
    }

    .product__cards-col-5{
        margin-left: auto;
        margin-right: auto;
        width: 1400px;
        display: grid;
        grid-template-columns: repeat(1, 2.4fr 2.4fr 2.4fr 2.4fr 2.4fr);
        justify-items: auto;
        gap: 2% 3%;
    }


    .product__cards-col-3{
        margin-left: auto;
        margin-right: auto;
        width: 1400px;
        display: grid;
        grid-template-columns: repeat(1, 3.5fr 3.5fr 3.5fr);
        justify-items: auto;
        gap: 1% 7%;
    }
    .product__cards-col-2{
        margin-left: auto;
        margin-right: auto;
        width: 1400px;
        display: grid;
        grid-template-columns: repeat(2, 5.5fr );
        justify-items: auto;
        gap: 1% 7%;
    }



    .product__cards-col-4{
        margin-left: auto;
        margin-right: auto;
        width: 1400px;
        display: grid;
        grid-template-columns: repeat(2, 1fr 1fr);
        justify-items: auto;
        gap: 30px;
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
    
   
    .card__like{
        position: absolute;
        top: 76%;
        left: 3%;
        
    }
    .card__like:hover{
        fill:red;
    }
    .button-handler{
        background-color: green;
    }
  </style>
<button id="but_6" class="button-handler">6 колонок</button>
<button id="but_5" class="button-handler">5 колонок</button>
<button id="but_3" class="button-handler">3 колонок</button>
<button id="but_4" class="button-handler">4 колонок</button>
<button id="but_2" class="button-handler">2 колонок</button>
<div id="col" class="product__cards-col-4">
    <?php
    $cardCounter = 0;
    $breakCounter = 0;
    $count = count($products);
    ?>


<script>
  



   document.querySelector('#but_2').addEventListener('click', function(){
    
    document.querySelector('#col').classList.remove('product__cards-col-6');
    document.querySelector('#col').classList.remove('product__cards-col-3');
    document.querySelector('#col').classList.remove('product__cards-col-5');
    document.querySelector('#col').classList.remove('product__cards-col-4');
    document.querySelector('#col').classList.add('product__cards-col-2');
});  
document.querySelector('#but_5').addEventListener('click', function(){
    
        document.querySelector('#col').classList.remove('product__cards-col-6');
        document.querySelector('#col').classList.remove('product__cards-col-3');
        document.querySelector('#col').classList.add('product__cards-col-5');
        document.querySelector('#col').classList.remove('product__cards-col-4');
        document.querySelector('#col').classList.remove('product__cards-col-2');
});
document.querySelector('#but_6').addEventListener('click', function(){
   
        document.querySelector('#col').classList.remove('product__cards-col-3');
        document.querySelector('#col').classList.remove('product__cards-col-5');
        document.querySelector('#col').classList.add('product__cards-col-6');
        document.querySelector('#col').classList.remove('product__cards-col-4');
        document.querySelector('#col').classList.remove('product__cards-col-2');
});
document.querySelector('#but_3').addEventListener('click', function(){
    
        document.querySelector('#col').classList.remove('product__cards-col-6');
        document.querySelector('#col').classList.remove('product__cards-col-5');
        document.querySelector('#col').classList.add('product__cards-col-3');
        document.querySelector('#col').classList.remove('product__cards-col-4');
        document.querySelector('#col').classList.remove('product__cards-col-2');
});
document.querySelector('#but_4').addEventListener('click', function(){
    
    document.querySelector('#col').classList.remove('product__cards-col-6');
    document.querySelector('#col').classList.remove('product__cards-col-5');
    document.querySelector('#col').classList.add('product__cards-col-3');
    document.querySelector('#col').classList.add('product__cards-col-4');
    document.querySelector('#col').classList.remove('product__cards-col-2');
});


</script>
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

