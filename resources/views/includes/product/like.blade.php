
    
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
    <style>
       .product__cards-col-4_1200{
        margin-left: auto;
        margin-right: auto;
        width: 1200px;
        display: grid;
        grid-template-columns: repeat(2, 1fr 1fr);
        justify-items: auto;
        gap: 30px;
    }
    .product__cards-col-4_1400{
        margin-left: auto;
        margin-right: auto;
        width: 1400px;
        display: grid;
        grid-template-columns: repeat(2, 1fr 1fr);
        justify-items: auto;
        gap: 30px;
    }
 </style>


    <h2 class="product__title">Похожие</h2>
     <div class="product__cards-col-4_1400">
    
        @foreach($hits as $key=>$value)
            @include('includes.products.card', ['value' => $value])
        @endforeach
    </div>

    <div class="mobile-block" style="overflow-x: auto;">
        <div class="d-flex pb-3" style="user-select: none; margin-left: 10px;">
            @foreach($hits as $key=>$value)
                @include('includes.product.mini-card', ['value' => $value])
            @endforeach
        </div>
    </div>

