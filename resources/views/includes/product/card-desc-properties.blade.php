<?php
$tags = DB::table('tags')
    ->get();
?>



<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
    
    //const productCards5 = document.querySelector('.product__cards-col-5');
    const lineRightDelivery = document.querySelector('.line-right-delivery');
    const infoDel = document.querySelector('.info__delivery');
    const infoNal = document.querySelector('.info__nal');
    const lineRight = document.querySelector('.line-right');
    const characteristics = document.querySelector('.container__characteristics');
    const description = document.querySelector('.container__description');
    const descriptionTitle = document.querySelector('.description__title');
    const chevron__up = document.querySelector('.chevron__up');
    const chevron__down = document.querySelector('.chevron__down');
    const chevronUp_characteristics = document.querySelector('.chevron__up-characteristics');
    const chevronDown_characteristics = document.querySelector('.chevron__down-characteristics');
    const characteristicsTitle = document.querySelector('.characteristics__title');
    chevron__down.addEventListener('click', descriptionTogglerDown);
    chevron__up.addEventListener('click', descriptionTogglerUp);
    chevronDown_characteristics.addEventListener('click', characteristicsTogglerDown);
    chevronUp_characteristics.addEventListener('click', characteristicsTogglerUp);


    characteristicsTitle.addEventListener('click', characteristicsTogglerDown);
    
     descriptionTitle.addEventListener('click', descriptionTogglerUp);
    //Наведение мышкой
  /* infoNal.addEventListener('mouseover', function(){
        lineRight.classList.remove('line-right');
        lineRight.classList.add('line-right-bold');
    });
    infoNal.addEventListener('mouseout', function(){
        lineRight.classList.remove('line-right-bold');
        lineRight.classList.add('line-right');
    });
    
    infoDel.addEventListener('mouseout', function(){
        lineRightDelivery.classList.remove('line-right-bold-delivery');
        lineRightDelivery.classList.add('line-right-delivery');
    });
    infoDel.addEventListener('mouseover', function(){
        lineRightDelivery.classList.remove('line-right-delivery');
        lineRightDelivery.classList.add('line-right-bold-delivery');
    });

  */


    function descriptionTogglerDown() {
        description.classList.toggle('display-none');
        chevron__up.classList.toggle('display-none');
        chevron__down.classList.toggle('display-none');
    }

    function descriptionTogglerUp() {
        description.classList.toggle('display-none');
        chevron__up.classList.toggle('display-none');
        chevron__down.classList.toggle('display-none');
    }

    function characteristicsTogglerDown() {
        characteristics.classList.toggle('display-none');
        chevronUp_characteristics.classList.toggle('display-none');
        chevronDown_characteristics.classList.toggle('display-none');
    }

    function characteristicsTogglerUp() {
        characteristics.classList.toggle('display-none');
        chevronUp_characteristics.classList.toggle('display-none');
        chevronDown_characteristics.classList.toggle('display-none');
    }
    

    
 
    var module = document.querySelector(".box p");

   /* $clamp(module, {
        clamp: 3
    });*/
</script>