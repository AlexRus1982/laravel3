<?php
    $item = (array)$value;
    $item_id = $item['id'];
    $photos = explode(';', $item['Фото товара']);
    $image = $photos[0];
    
    $imageURL = getImageUrl($image); // function from helpers
    
    $formatedPrice = $item['Цена'];
    try {
        $formatedPrice = number_format($item['Цена'], 0, '.', ' ');
    }
    catch (Exception $e) {
        // Log::debug($e);
    }

    $wished = (in_array($item_id, $wishList)) ? 'wishset' : '';
?>
<a class="card normal-card me-2" target="_blank" rel="noopener noreferrer" href="/products/{{$item['category_url']}}/{{$item['URL адрес']}}" style="text-decoration: none; color: #000000; border:none; background: none; border-radius: 0px;">
<div class="similar-product__card">
<div class="similar-product__card-image">
    <img class="similar-product__img" src="{{$imageURL}}" alt="{{$item['Наименование']}}">
</div>
<div class="box similar-product__card-text">
  <p class="card__title">{{$item['Наименование']}}</p> 
  <p class="card__price">{{$formatedPrice}} ₽

  </p> 
</div> 
</div>
</a>


