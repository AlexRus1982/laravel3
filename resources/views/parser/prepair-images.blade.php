@php
    $imagesList = DB::table('catalog')
    ->select('id', 'Фото товара')
    ->get();

    use Illuminate\Database\Schema\Blueprint;

    Schema::dropIfExists('parsing_images');
    Schema::create('parsing_images', function (Blueprint $table) {
        //$table->id();
        $table->string('id', 100);
        $table->text('path');
        $table->text('new_path');
    });

    foreach($imagesList as $image) {
        $photos = $image->{'Фото товара'};
        $photos = ($photos != "") ? explode(';', $photos) : [];
        foreach($photos as $photo) {
            DB::table('parsing_images')
            ->insert([
                'id' => $image->id,
                'path' => $photo,
                'new_path' => '',
            ]);
        }
    }

@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="cookie-uuid" content="{{ Config::get('cookie-uuid') }}">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        <title>Подготовка изображений</title>
    </head>
    <body>
        Таблица изображений создана.
    </body>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    {{-- 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/test.js"></script>
    --}}
</html>
