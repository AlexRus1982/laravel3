
    
    @php
        // generate data by accessing properties https://github.com/fzaninotto/Faker
        /*
        $faker = Faker\Factory::create();
        echo $faker->name;
        echo $faker->address;
        echo $faker->sentence($nbWords = 600, $variableNbWords = true);
        //*/
    
        //$hits = DB::table('catalog')->inRandomOrder()->take(4)->get();
        
        $hits = DB::table('hierarchy_products')
        ->join('categories', 'categories.category_id', '=', 'hierarchy_products.parent_id')
        ->join('catalog', 'catalog.id', '=', 'hierarchy_products.product_id')
        ->inRandomOrder()
        ->take(4)
        ->get();
    @endphp
    
    <h2 class="product__title">Похожие</h2>
     <div class="container__similar-product">
    
        @foreach($hits as $key=>$value)
            @include('includes.products.card2', ['value' => $value])
        @endforeach
    </div>

    <div class="mobile-block" style="overflow-x: auto;">
        <div class="d-flex pb-3" style="user-select: none; margin-left: 10px;">
            @foreach($hits as $key=>$value)
                @include('includes.product.mini-card', ['value' => $value])
            @endforeach
        </div>
    </div>

