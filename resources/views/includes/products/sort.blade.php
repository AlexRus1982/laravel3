<div 
    class="offcanvas offcanvas-end shadow"
    tabindex="-1"
    parent_id=""
    item-id=""
    id="sortDialog"
    aria-labelledby="sortDialogLabel"
    style="width: 600px; box-shadow: 0px 0px 4px #000000;">

    <div class="offcanvas-header border-bottom text-white" style="height: 50px;">
        <div class="offcanvas-title fs-5 w-100 d-flex flex-row justify-content-center" id="sortDialogLabel">Сортировка</div>
    </div>

    <div class="offcanvas-body p-0">
        <ul class="list-group">
            <li class="list-group-item border-0">
                <input class="form-check-input me-2" type="radio" name="listGroupRadio" value="" id="popular" checked>
                <label class="form-check-label" for="popular">Сначала популярные</label>
            </li>
            <li class="list-group-item border-0">
                <input class="form-check-input me-2" type="radio" name="listGroupRadio" value="" id="priceUp" {{--disabled--}}>
                <label class="form-check-label" for="priceUp">Сначала дорогие</label>
            </li>
            <li class="list-group-item border-0">
                <input class="form-check-input me-2" type="radio" name="listGroupRadio" value="" id="pariceDown">
                <label class="form-check-label" for="pariceDown">Сначала дешевые</label>
            </li>
        </ul>
    </div>


</div>

<style>
    #sortDialog .input-group span:first-child {
        min-width: 120px;
    }
</style>