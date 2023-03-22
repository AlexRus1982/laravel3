<div class="py-2 w-100">
    <h2 class="block-title d-flex flex-row w-100 mt-3 mb-1">Хиты продаж</h2>
    @guest
        @php
            //echo "Гость";
            //Log::log('notice', 'Гость');
        @endphp
    @endguest

    {{-- 
    @auth
        @php
            echo Auth::user()->id;
            echo Auth::user()->name;
            echo Auth::user()->email;
        @endphp
    @endauth
    --}}

    @php
        // generate data by accessing properties https://github.com/fzaninotto/Faker
        /*
        $faker = Faker\Factory::create();
        echo $faker->name;
        echo $faker->address;
        echo $faker->sentence($nbWords = 600, $variableNbWords = true);
        //*/

        $hits = DB::table('catalog')->inRandomOrder()->take(4)->get();
    @endphp

    <div class="d-flex flex-row w-100 justify-content-start flex-wrap pb-3" style="border-bottom: 1px solid #000000;">
        @foreach($hits as $key=>$value)
            @include('includes.products.card', ['value' => $value])
        @endforeach
    </div>
</div>