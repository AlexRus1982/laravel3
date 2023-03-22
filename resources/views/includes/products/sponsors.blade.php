<div class="py-2 w-100">
    <h2 class="block-title d-flex flex-row w-100 mt-3 mb-3">Бренды</h2>
    <div class="d-flex flex-row w-100 justify-content-start flex-wrap pb-3">
        @for($i=0; $i < 9; $i++)
            @include('includes.products.sponsor-card', ['value' => $i])
        @endfor
    </div>
</div>