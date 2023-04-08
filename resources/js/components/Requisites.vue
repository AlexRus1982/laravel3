<template>
    <div class="shourum__content-grey_requisites">
        <h3 class="container-data__requisites">Реквизиты</h3>
        <span class="container-data__row__text container-data__row__text_company">ООО «АРТ ФАБРИК»</span>
        <span class="container-data__row__text">ИНН 7801657697</span>
        <span class="container-data__row__text">КПП 781301001</span>
        <span class="container-data__row__text">ОГРН 1197847005201</span>

        <span class="container-data__row__text container-data__row__text_adress">Юридический адрес: 197022, г. Санкт-Петербург,</span>
        <span class="container-data__row__text container-data__row__text">пр. Медиков 10, к1, лит. А, пом. 57-Н</span>
    </div>
</template>
<style scoped>
.container-data__row__text_adress{
    margin-top:30px;
}

.social__icon {
    width: 50px;
    height: 50px
}

.social__conatiner {
    width: 30%;
    display: flex;
    justify-content: space-between;

}

.shourum__content-grey_requisites {
    min-height: 400px;
    width: 100%;
    display: flex;
    flex-direction: column;
    border-radius: 10px;
    padding-left: 30px;
    padding-right: 30px;
    padding-top: 30px;
    padding-bottom: 30px;
    background-color: #ebebeb;
    background-position: center center;
    border-color: transparent;
    border-style: solid;
    margin-bottom: 40px;
}

.container-data__requisites {
    margin-bottom:0px;
    color: #000000;
    font-size: 20px;
    font-family: 'TildaSans', Arial, sans-serif;
   
    font-weight: 700;
    background-position: center center;
    border-color: transparent;
    border-style: solid;
    text-align: left;

}

.container-data__row__text {
    color: #000000;
    font-size: 16px;
    font-family: 'TildaSans', Arial, sans-serif;
    font-weight: 400;
    background-position: center center;
    border-color: transparent;
    border-style: solid;
    text-align: left;
    line-height: 1;
}
.container-data__row__text_company {
margin-bottom:30px;
}
.container-data__row__text_bold {
    font-weight: 700;
    margin-top: 40px;
}</style>
<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>