
<template >
    <div  >
       

            <ul  class="container-data__city">
           <li class="shourum__content-grey" style="list-style: none;"> 
            <div class="container__row">
    <div  class="shourum__container-data">
        <h3 class="container-data__city">{{ city }}</h3>

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
            <img  class="shourum__icon" src="https://static.tildacdn.com/tild3161-3562-4635-a538-303432663238/exclamation_circle_i.svg" alt="картинка">
            <span class="container-data__row__text">Ежедневно с 10:00 до 21:00</span>
        </div>
    </div>
   
    <a href="/shourum"><button class="shourum__button" type="submit">Подробнее</button></a>

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
   
</div>
<div class="container__image"><span class="metr"> 256м</span><img  class="image" src="https://static.tildacdn.com/tild3165-6231-4261-b236-373132656435/artfabric_furniture_.jpg" alt="картинка"></div>
</li>
</ul>
<Contacts></Contacts>
<Requisites></Requisites>
<Map></Map>
<Sklad></Sklad>
</div>
</template>
 
<script>
 import Contacts from '../components/Contacts.vue'; 
 import Requisites from '../components/Requisites.vue';
 import Map from '../components/Map.vue';
 import Sklad from '../components/Sklad.vue';
    export default {
        props:{
city:String
    }
}
</script>