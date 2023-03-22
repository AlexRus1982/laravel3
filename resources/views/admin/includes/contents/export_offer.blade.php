{{-- требует входную переменную $category, $offer --}}
@php
    $root = url('/');
    $offerUrl = "{$root}/products/{$category->category_url}/{$offer->{'URL адрес'}}";
    $offerPrice = $offer->{'Цена'};
    $offerName = $offer->{'Наименование'};
    $offerDesc = $offer->{'Описание'};
    $offerPictures = $offer->{'Фото товара'};
@endphp

<offer id="{{$offer->id}}" available="true">
    <url>{{$offerUrl}}</url>
    <price>{{$offerPrice}}</price>
    <currencyId>RUR</currencyId>
    <categoryId>{{$offer->parent_id}}</categoryId>

    @php
        $pictures = explode(';', $offerPictures);
    @endphp

    @foreach ($pictures as $picture)
        <picture>{{$root}}/{{$picture}}</picture>
    @endforeach
    
    <name>{{$offerName}}</name>
    <description>
    <![CDATA[ {{$offerDesc}} ]]>
    </description>
    <manufacturer_warranty>true</manufacturer_warranty>

    {{-- <param name="Материал:">Металл</param> --}}

    @foreach($offer as $key=>$value)
        @if ((mb_strpos($key, 'Свойство: ') !== false) && ($value != ""))
            <param name="{{str_replace('Свойство: ', '', $key)}}">{{$value}}</param>
        @endif
    @endforeach

</offer>