<?php
    use Carbon\Carbon;

    $current = Carbon::now()->toDateString();

    $services = DB::table('services')
    ->get();

    $categories = DB::table('categories')
    ->get();

    $products = DB::table('catalog')
    ->get();

    echo '<?xml version="1.0" encoding="UTF-8"?>'; 
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{url("/")}}</loc>
        <lastmod>{{ $current }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>1.0</priority>
    </url>

    @foreach ($services as $service)
        <url>
            <loc>{{url("/")}}/service/{{ $service->url }}</loc>
            <lastmod>{{ $current }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>1.0</priority>
        </url>
    @endforeach

    @foreach ($categories as $category)
        <url>
            <loc>{{url("/")}}/categories/{{ $category->category_url }}</loc>
            <lastmod>{{ $current }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>1.0</priority>
        </url>
    @endforeach

    @foreach ($products as $product)
        <url>
            <loc>{{url("/")}}/product/{{ $product->{'URL адрес'} }}</loc>
            <lastmod>{{ $current }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>1.0</priority>
        </url>
    @endforeach    

</urlset>