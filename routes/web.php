<?php
    // Auth::routes();
    // Route::get('/home', 'HomeController@index')->name('home');

    #region main requests
    Route::get   ('/', 'Products@showMain')->name('main');

    Route::get   ('/products', 'Products@showAll')->name('products');
    Route::get   ('/categories/{url}', 'Products@showCategory')->name('category');
    Route::get   ('/tags/{url}', 'Products@showTags')->name('products.tags');

    Route::get   ('/products/{category}/{url}', 'Products@show')->name('product');
    Route::put   ('/visited', 'Products@visited')->name('product.visited');
    Route::put   ('/wished', 'Products@wished')->name('product.wished');
    Route::delete('/wished/delete', 'Products@wishedDelete')->name('product.wished.delete');
    Route::get   ('/wished/list', 'Products@wishedList')->name('product.wished.list');

    Route::get   ('/service/{url}', 'Services@show')->name('service');

    Route::get   ('/search', 'Search@showSearchResult')->name('search');

    Route::get   ('/basket/index', 'BasketController@index')->name('basket.index');
    Route::get   ('/basket/checkout', 'BasketController@checkout')->name('basket.checkout');
    #endregion

    #region test requests
    Route::post('/test/get', function() {
        return '{"server_answer" : "success"}';
    });

    Route::get('/hlam', function() {
        return response()->view('hlam')->cookie('cookie-uuid', Config::get('cookie-uuid'), 1);
    })->name('hlam');

    Route::get('/test', function() {
        $cookieUuid = Cookie::get('cookie-uuid');
        $uuid = ($cookieUuid != '') ? $cookieUuid : (string) Str::uuid();
        Config::set('cookie-uuid', $uuid);

        // $cookie = Cookie::make('hagi-vagi-uuid', $uuid, 2 /* $minutes = 60 * 24 * 365 * 10; // 10 years */);
        return response()->view('test')->cookie('cookie-uuid', Config::get('cookie-uuid'), 1);
    })->name('test');
    #endregion

    #region parser
    Route::prefix('parser')->group(function(){

        Route::get('/images/prepair', function() {
            return response()->view('parser.prepair-images');
        })->name('parser.prepairImages');

        Route::get('/images/load', function() {
            return response()->view('parser.load-images');
        })->name('parser.loadimages');

        Route::get('/images/build/paths', function() {
            $catalogItems = DB::table('catalog')
            ->select('id')
            // ->take(5)
            ->get();

            foreach ($catalogItems as $item) {
                $imagePaths = DB::table('parsing_images')
                ->select('new_path')
                ->where('id', $item->id)
                ->get()
                ->implode('new_path', ';');

                // logger("{$item->id} - {$imagePaths}");
        
                DB::table('catalog')
                ->where('id', $item->id)
                ->update(['Фото товара' => $imagePaths]);
            }


            return "Пути картинок скорректированы.";
        })->name('parser.build.paths');

        Route::get('/url/translit', function() {
            $catalogItems = DB::table('catalog')
            ->select('id', 'Наименование', 'URL адрес')
            // ->take(5)
            ->get();

            foreach ($catalogItems as $item) {
                $itemURL = $item->{'URL адрес'};

                $itemURL = TranslitURL($item->{'Наименование'});
        
                // logger($itemURL);
                DB::table('catalog')
                ->where('id', $item->id)
                ->update(['URL адрес' => $itemURL]);
            }


            return "URL пути транслитирированы.";
        })->name('parser.build.paths');


        Route::post('/image/save', function() {

            set_time_limit(0);

            function SaveImageAsWebp($imageId, $source, $quality = 100) {
                $dir = pathinfo($source, PATHINFO_DIRNAME);
                $dir = str_replace('https://st.dg-home.ru/', '', $dir);
                $name = pathinfo($source, PATHINFO_FILENAME);
                $destination = $dir . '/' . $name . '.webp';
                
                // logger("{$source} - {$destination}");

                $info = getimagesize($source);
                $isAlpha = false;
                if ($info['mime'] == 'image/jpeg')
                    $image = imagecreatefromjpeg($source);
                elseif ($isAlpha = $info['mime'] == 'image/gif') {
                    $image = imagecreatefromgif($source);
                } elseif ($isAlpha = $info['mime'] == 'image/png') {
                    $image = imagecreatefrompng($source);
                } else {
                    return $source;
                }

                if ($isAlpha) {
                    imagepalettetotruecolor($image);
                    imagealphablending($image, true);
                    imagesavealpha($image, true);
                }

                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }

                imagewebp($image, $destination, $quality);

                DB::table('parsing_images')
                ->where('path', $source)
                ->update([
                    'new_path' => $destination,
                ]);
        
                return $destination;
            }

            $imageId = $_POST['imageId'];
            $imagePath = $_POST['imagePath'];

            $path = SaveImageAsWebp($imageId, $imagePath);

            return response()->json([ 'saved' => 'true', 'imageId' => $imageId, 'path' => $path ]);
        })->name('parser.saveimage');

    });
    #endregion

    #region admin requests
    Route::view('/adminpanel', 'admin.adminpanel');

    Route::prefix('admin')->group(function(){

        //--------------------------------------------------------------------------------------------------------
        // перед всеми командами должно стоять /admin
        // во всех командах должно присутствовать поле 'token' со значением токена

        Route::put('/robots/save', 'WebController@Robots_TXT_Save')->name('robots.save');
        Route::put('/seo/save', 'WebController@SEO_ParamsSave')->name('seo.save');
        Route::get('/seo/load', 'WebController@SEO_ParamsLoad')->name('seo.load');
        Route::post('/seo/icon/save', 'WebController@SEO_IconSave')->name('seo.icon.save');
        Route::post('/seo/file/save', 'WebController@SEO_FileSave')->name('seo.file.save');
        Route::get('/seo/root/load', 'WebController@SEO_RootLoad')->name('seo.root.load');
            
        Route::prefix('tags')->group(function(){
            Route::put   ('/', 'WebController@AddTags')->name('tags.add');
            Route::delete('/', 'WebController@DelTags')->name('tags.del');
            Route::put   ('/orders', 'WebController@SetTagsOrder')->name('tags.order');
            Route::put   ('/save/{url}', 'WebController@TagSave')->name('tag.save');
            Route::get   ('/info/{url}', 'WebController@TagInfo')->name('tag.info');
            Route::post  ('/image/upload', 'WebController@TagImageUpload')->name('tag.image.upload');
        });

        Route::prefix('condition')->group(function(){
            Route::get ('/activetab', 'WebController@GetActiveTab')->name('condition.getActiveTab');
            Route::put ('/activetab', 'WebController@SetActiveTab')->name('condition.setActiveTab');
        });

        Route::prefix('categories')->group(function(){
            Route::post  ('/', 'WebController@categories')->name('categories.list');
            Route::post  ('/new', 'WebController@CreateCategory')->name('category.create');
            Route::put   ('/orders', 'WebController@SetCategoriesOrder')->name('categories.orders');
        });

        Route::prefix('category')->group(function(){
            Route::post  ('/parent/{id}', 'WebController@categoryParent')->name('category.parent');
            Route::post  ('/info/{id}', 'WebController@categoryInfo')->name('category.info');
            Route::put   ('/save/{id}', 'WebController@SaveCategory')->name('category.save');
            Route::delete('/delete/{id}', 'WebController@DeleteCategory')->name('category.delete');
            Route::post  ('/image/upload', 'WebController@CategoryImageUpload')->name('category.image.upload');
        });
        
        Route::prefix('products')->group(function(){
            Route::put   ('/orders', 'WebController@SetProductsOrder')->name('products.orders');
            Route::get   ('/list', 'WebController@GetProductsList')->name('products.list');
            Route::get   ('/short', 'WebController@ProductsShortList')->name('products.shortlist');
            Route::get   ('/notcategory', 'WebController@ProductsShortListNotCategory')->name('products.shortlist.notcategory');
            Route::get   ('/info/{id}', 'WebController@ProductInfo')->name('products.productInfo');
            Route::put   ('/save/{id}', 'WebController@ProductSave')->name('products.productSave');
            Route::get   ('/parent/{id}', 'WebController@ItemsForParent')->name('products.forparent');
            Route::put   ('/add', 'WebController@ProductsAddToCategory')->name('products.add_to_category');
            Route::delete('/category/delete', 'WebController@ProductsDeleteFromCategory')->name('products.delete_from_category');
        });
        

        Route::prefix('properties')->group(function(){
            // Route::get   ('/check', 'WebController@PropertiesCheck')->name('properties.check');
            Route::get   ('/list', 'WebController@PropertiesList')->name('properties.list');
            Route::get   ('/values', 'WebController@PropertiesValuesList')->name('properties.valuesList');
            Route::get   ('/valuesForm', 'WebController@PropertiesValuesForm')->name('properties.valuesForm');
            Route::put   ('/orders', 'WebController@SetPropertiesOrder')->name('properties.order');
            Route::put   ('/add', 'WebController@AddProperty')->name('properties.add');
            Route::put   ('/rename', 'WebController@RenameProperty')->name('properties.rename');
            Route::put   ('/filter/{id}', 'WebController@PropertySetFilter')->name('properties.inFilter');
            Route::put   ('/card/{id}', 'WebController@PropertySetCard')->name('properties.inCard');
            Route::delete('/delete', 'WebController@DelProperty')->name('properties.del');
        });

        Route::delete('/product/category/delete', 'WebController@ProductDeleteFromCategory')->name('product.delete_from_category');
        Route::post('/product/edit/form', function (Request $request) {
            return view('admin.includes.offcanvas.product_edit');
        });
        //--------------------------------------------------------------------------------------------------------
    });
    #endregion

    #region sitemap requests
    Route::prefix('sitemap')->group(function(){
        Route::get('/', 'SitemapController@index');
        // Route::get('/posts', 'SitemapController@posts');
        // Route::get('/products', 'SitemapController@products');
        // Route::get('/tags', 'SitemapController@tags');
    });
    #endregion

    #region export
    Route::prefix('export')->group(function(){

        Route::post('/add', 'ExportController@CreateExport')->name('export.new');
        Route::delete ('/delete', 'ExportController@DeleteExport')->name('export.delete');
        Route::put ('/save', 'ExportController@SaveExport')->name('export.save');
        Route::get ('/file/{file}', 'ExportController@FileExport')->name('export.file');

    });
    #endregion
?>