<?php
$item = (array)$value;
$item_id = $item['id'];
$photos = explode(';', $item['Фото товара']);
$image = $photos[0];

$imageURL = getImageUrl($image); // function from helpers

$formatedPrice = $item['Цена'];
try {
    $formatedPrice = number_format($item['Цена'], 0, '.', ' ');
} catch (Exception $e) {
    // Log::debug($e);
}

$wished = (in_array($item_id, $wishList)) ? 'wishset' : '';
?>
<style>
    .bg-container {
        position: relative;
        display: flex;
        min-height: 400px;
    }

    .card-title {
        font-size: 14px;
        color: #000000;
        text-align: start;
        height: 40;
        margin: 0;
        line-height: 20px;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
    }

    .card-title:hover {
        color: #0000FF;
    }

    #grid {
        display: grid;
        grid-template-rows: 1fr 1fr 1fr;
        grid-template-columns: 1fr 1fr 1fr;
        grid-gap: 2vw;
    }

    #grid>div {
        font-size: 5vw;
        padding: .5em;
        background-color: #0000FF;
        text-align: center;
    }

    .pos {
        position: relative;

    }

    .card__heart {
        position: absolute;
        top: 85%;
        left: 6%;
    }

    .card__heart:hover {
        fill: red;
    }

  .card-grid {
        display: flex;
        flex-direction: column;
    }
</style>
<a class="card normal-card" target="_blank" rel="noopener noreferrer" href="/products/{{$item['category_url']}}/{{$item['URL адрес']}}" style="text-decoration: none; color: #000000; border:none; background: none; border-radius: 0px;">
    <div class="card-grid card-wrapper border-0 p-0" >
        <div class="pos">
       
                <img src="{{$imageURL}}" class="card-img-top" alt="{{$item['Наименование']}}" loading="lazy" style="height: 100%; width: 100%; object-fit: contain; border-radius: 0px;">
                <svg class="card__heart" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000" class="bi bi-heart" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                </svg>
            
        </div>
        <div class="card-body d-flex flex-column p-0">
            <p class="card-text" style="text-align: start; font-size: 14px; font-weight: 600; margin: 0; margin-top: 15px; color: #000000;">{{$formatedPrice}} ₽
                {{--<strike class="ms-3">20 000 руб</strike>--}}
            </p>

            <h6 class="card-title mb-auto">{{$item['Наименование']}}</h6>

            {{--<!-- <button type="button" class="basketButton btn btn-dark" item_id="{{ $item_id }}" style="border-color: white; white-space: nowrap; font-weight: 600;">
            Купить
            </button> -->--}}
        </div>
    </div>

</a>