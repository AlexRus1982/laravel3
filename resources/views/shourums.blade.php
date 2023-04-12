@extends('layouts.base')
@section('content')
<style>
  .metr {
    position: absolute;
    top: 20px;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    align-content: center;
    padding-bottom: auto;
    padding-top: auto;
    width: 70px;
    height: 30px;
    text-align: center;
    margin-left: 10px;
    color: #000000;
    font-size: 14px;
    font-family: 'Arial', Arial, sans-serif;
    line-height: 1.55;
    font-weight: 400;
    border-radius: 5px;
    background-color: #ffe419;
    background-position: center center;
    border-color: transparent;
    border-style: solid;
    transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
  }

  .shourum__container-data {
    display: flex;
    flex-direction: column;
    margin-bottom: 60px;
  }

  .shourum__content-grey {
    min-height: 400px;
    width: 100%;
    display: flex;
    justify-content: space-between;
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

  .container__image {
    width: 50%;
    position: relative;
  }

  .image {
    width: 100%;
  }

  .container__row {
    display: flex;
    flex-direction: column;
  }

  .container-data__row {
    width: 450px;
    display: flex;
    flex-direction: row;
    align-items: center;

  }

  .shourum__icon {
    margin-right: 7px;
    width: 18px;
    height: 14px;
  }

  .shourum__image {
    width: 136px;
    height: 136px;
  }

  .shourum__image_car {
    width: 136px;
    height: 136px;
    position: absolute;
    top: 7px;
    left: 0;

  }

  .container-data__row__text {
    color: #000000;
    font-size: 16px;
    font-family: 'TildaSans', Arial, sans-serif;
    line-height: 2;
    font-weight: 400;
    background-position: center center;
    border-color: transparent;
    border-style: solid;
  }

  .shourum__button {
    height: 60px;
    width: 160px;
    margin-left: 25px;
    margin-bottom: 60px;
    color: #fff;
    background-color: #000;
    border: none;
    font-size: 18px;
    font-family: TildaSans, Arial, sans-serif;
    cursor: pointer;
    border-radius: 5px;
  }

  .shourum__button:hover {
    background-color: #000000a1;
  }


  a {
    color: black;
    width: 16.66%;
  }

  a:hover {
    color: #000;
  }

  .shourums__bread-crumps__link {
    color: #000;
    text-decoration: none;
  }

  .shourums__bread-crumps__link:hover {
    color: #0000FF;
  }

  .shourums__bread-crumps {
    font-size: 14px;
    max-width: 1400px;
    display: flex;

    justify-content: flex-start;

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
    margin-left: 0;
    padding-left: 0;
  }

  .shourums__title {
    margin-bottom: 30px;
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

  .shourums {
    display: flex;
    max-width: 1400px;
    flex-direction: column;
    justify-content: flex-start;
  }

  .shourums__panel {
    display: flex;
   max-width: 1400;
    margin: 0;
    padding: 0;
  
  
  }

  .panel__table {
    display: flex;
    max-width: 1400px;
    padding: 0;
    margin-bottom:40px;
    
  }

  .active.active.active {
    background-color: black;
    color: white;
  }

  .table__col {
    
   
    display: flex;
    justify-content: center;
    vertical-align: middle;
    position: relative;
  
    border: 1px solid #222222;
  
    border-right: none;
    cursor: pointer;
    padding-top: 14px;
    padding-bottom: 14px;
  }

  .table__col_end.table__col_end.table__col_end {
    border-right: 1px solid #222222;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
  }
  .table__col_start.table__col_start.table__col_start {

    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px;
  }
  .router-link-active {}

  .router-link-exact-active {
    color: white;
    background-color: black;
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
  }

  .router-link-exact-active:hover {
    color: white;
  }
</style>

<div id="app" class="px-5 shourums">
  <div class="shourums__bread-crumps">
    <span style="color:black;"><a class="shourums__bread-crumps__link" href="/products">Каталог</a>/шоурумы</span>
  </div>
  <h1 class="shourums__title">Наши шоу-румы и контакты</h1>
  
    <navigation1></navigation1>



  <router-view></router-view>

</div>
<script>

</script>

@stop