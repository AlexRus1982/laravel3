<?php
    $item = (array)$value;
    $item_id = $item['id'];
    $photos = $item['Фото товара'];
    $photos = explode(';', $photos);
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

<a class="mini-card" target="_blank" rel="noopener noreferrer" href="/products/{{$item['category_url']}}/{{$item['URL адрес']}}" style="min-width: 152px; text-decoration: none; color: #000000; border:none; background: none; margin-right: 10px!important;">
    <div class="mini-card m-2 ms-0 p-0 rounded-0" style="min-width: 152px; width: 152px; height: 230px;">
        <div class="card-image d-flex justify-content-center flex-column" style="min-height: 150px; height: 150px;">
            <img src="{{$imageURL}}" class="card-img-top" alt="{{$item['Наименование']}}" loading="lazy" style="height: 100%; width: 100%; object-fit: contain;">
        </div>
        <div class="card-body d-flex flex-column p-2 text-secondary">            
            <h5 class="card-title mb-auto" style="color: #000; font-size: 14px; height: 40px; line-height: 20px; display: flex; text-align: left; align-items: flex-end; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">{{$item['Наименование']}}</h5>
            <div class="btn-group d-flex align-items-center" role="group">
                <p class="card-text mb-0 fw-bold" style="font-size: 14px; text-align: left; color: #000;">{{$formatedPrice}} ₽</p>
                <button type="button" class="basketButton btn btn-dark" item_id="{{ $item_id }}" item_category="{{$item['category_url']}}" style="font-size: 14px; border-color: white; white-space: nowrap;">В корзину</button>
                <button type="button" class="wishButton ms-auto btn btn-dark {{$wished}}" style="max-width: 40px; border-color: white; background: none;" item_id="{{ $item_id }}" item_category="{{$item['category_url']}}" title="В желания">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000" class="bi bi-heart" viewBox="0 0 16 16">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F00" class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</a>