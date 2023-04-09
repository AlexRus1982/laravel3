<template>
    <div>
        <span class="container-data__row__text container-data__row__text_left">Единый телефон</span>
        <h1 class="shourum__title">
            8 (800) 511−1075</h1>
        <City city="Москва" />
        <City city="Москва" />
        <City city="Санкт-Петербург" />
        <Contacts/>
        <Requisites/>
           <Map/>
    </div>
</template>
<style scoped>
.container-data__row__text_left {
    text-align: left;
    display: flex;
    width: 100%;
}
</style>
<script>
import City from '../components/City.vue';
import Contacts from '../components/Contacts.vue';
import Requisites from '../components/Requisites.vue';
import Map from '../components/Map.vue';
import Sklad from '../components/Sklad.vue';
export default {

    components: {
        Contacts,
        Requisites,
        Map,
       City
    },


}

</script>