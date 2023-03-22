<div class="py-2 w-100">
    <h2 class="block-title d-flex flex-row w-100 mt-3 mb-1">Новинки</h2>

    @php
        $hits = DB::table('catalog')->inRandomOrder()->take(4)->get();
    @endphp

    <div class="d-flex flex-row w-100 justify-content-start flex-wrap pb-3" style="border-bottom: 1px solid #000000;">
        @foreach($hits as $key=>$value)
            @include('includes.products.card', ['value' => $value])
        @endforeach
    </div>
</div>