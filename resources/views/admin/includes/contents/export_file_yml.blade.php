{{-- требует входную переменную $export_id --}}
@php
    use Carbon\Carbon;

    $current = Carbon::now();

    $seoParams = DB::table('seo_params')
    ->first();

    echo '<?xml version="1.0" encoding="UTF-8"?>';
@endphp

<yml_catalog date="{{$current}}">
    <shop>

        <name>{{$seoParams->store_name}}</name>
        <company>Smith and co</company>
        <url>{{url("/")}}</url>
        <platform>Alex CMS</platform>

        <currencies>
            <currency id="RUR" rate="1"/>
            {{-- <currency id="USD" rate="72.1306"/>
            <currency id="EUR" rate="76.6446"/> --}}
        </currencies>

        <categories>
            @php
                $categories = DB::table('categories')
                ->get();
            @endphp
            @foreach ($categories as $category)
                <category id="{{$category->category_id}}">{{$category->category_name}}</category>
            @endforeach
        </categories>

        <offers>
            @foreach ($categories as $category)
                
                @php
                    $hierarchy_products = DB::table('hierarchy_products')
                    ->where('parent_id', $category->category_id)
                    ->join('catalog', 'catalog.id', '=', 'hierarchy_products.product_id')
                    ->get();
                @endphp

                @foreach ($hierarchy_products as $hierarchy_product)
                    @include('admin.includes.contents.export_offer', ['category' => $category, 'offer' => $hierarchy_product])
                @endforeach
            @endforeach
        </offers>
    </shop>
</yml_catalog>