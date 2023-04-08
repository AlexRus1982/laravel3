<template>
    <div class="shourum__content-grey_contact">
        <h3 class="container-data__city">Контакты</h3>
        <span class="container-data__row__text">Менеджер по рекламациям: support@artfc.ru⠀</span>
        <span class="container-data__row__text">По общим вопросам: info@artfc.ru</span>
        <span class="container-data__row__text container-data__row__text_bold">Подписывайтесь на наши соцсети:</span>
        <div class="social__conatiner">
            <img class="social__icon"
                src="https://thumb.tildacdn.com/tild6465-3538-4931-b938-613762313634/-/resize/60x/-/format/webp/1491580635-yumminkys.png"
                alt="">
            <img class="social__icon"
                src="https://thumb.tildacdn.com/tild3132-3061-4430-b265-656334346562/-/resize/60x/-/format/webp/1486147202-social-me.png"
                alt="">
            <img class="social__icon"
                src="https://thumb.tildacdn.com/tild3137-6135-4563-b263-643839303865/-/resize/60x/-/format/webp/1491580651-yumminkys.png"
                alt="">
            <img class="social__icon"
                src="https://thumb.tildacdn.com/tild3164-6164-4638-a131-613063386431/-/resize/60x/-/format/webp/telegram_logo_icon_1.png"
                alt="">
        </div>
    </div>
</template>
<style scoped>
.social__icon {
    width: 50px;
    height: 50px
}

.social__conatiner {
    width: 30%;
    display: flex;
    justify-content: space-between;

}

.shourum__content-grey_contact {
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

.container-data__city {
    color: #000000;
    font-size: 20px;
    font-family: 'TildaSans', Arial, sans-serif;
    line-height: 1.55;
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