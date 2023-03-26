@php
    //$item = (array)$value;
    //$photos = $item['Фото товара'];
    //$photos = explode(';', $photos);
    //$image = $photos[0];
    //if ($image != ""){
    //    //$imageURL = "http://konsol-stol.ru/{$image}";
    //    $imageURL = "https://fakeimg.pl/300x300/7F7FFF/FFFFFF/?text={$image}&font=kelson";
    //}
    //else {
    //    $imageURL = "https://fakeimg.pl/300x300/EEEEEE/7F7F7F/?text=NO IMAGE&font=kelson";
    //}

    $imageURL = "https://fakeimg.pl/150x100/7F7FFF/FFFFFF/?text=Partner&font=kelson";
@endphp

<div class="card m-2 ms-0 rounded-0 p-1" style="min-width: 11rem; width: 11rem; margin-right: 20px!important; border: 1px solid #000;">
    <div class="card-image d-flex justify-content-center flex-column" style="min-height: 165px; height: 165px;">
        <img src="{{$imageURL}}" class="card-img-top" alt="спонсор" loading="lazy" style="height: 100%; width: 100%; object-fit: contain;">
    </div>
</div>