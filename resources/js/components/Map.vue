<template>
      <div>
        <h2 class="shourum__title shourum__title_get">Шоу-румы на карте</h2>   
   <img class="image__map" src="https://thumb.tildacdn.com/tild6338-6133-4866-b061-656436326234/-/format/webp/4xxbwofQ.jpg">
</div>
</template>
  

<style>
.image__map{
    width: 100%;
}
  .shourum__title {
        margin-bottom: 15px;
        color: #000000;
        font-size: 30px;
        font-family: 'TildaSans', Arial, sans-serif;
        line-height: 1.55;
        font-weight: 700;
        background-position: center center;
        border-color: transparent;
        border-style: solid;
        display: flex;
        justify-content: flex-start;
    }

    .shourum__title_get {
        width: 100%;
        text-align: left;

        margin-top: 60px;
        font-size: 20px;
    }
</style>
<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>