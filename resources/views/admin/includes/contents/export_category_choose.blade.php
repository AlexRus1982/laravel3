{{-- требует входную переменную $export->export_id --}}
{{-- Выбор товара --}}
<div class="section w-100 d-flex flex-column my-3 p-2 border">
    <div class="section-header d-flex ms-0 fw-bold">Выбор товара</div>
    
    <div class="nav nav-tabs d-flex flex-column ps-2">
        <div id="tab-export-{{$export->export_id}}" class="d-flex flex-row py-2 px-0 btn-group" data-bs-toggle="buttons-radio">
            <div class="form-check">
                <input class="form-check-input active" type="radio" name="export-{{$export->export_id}}-radio" id="export-{{$export->export_id}}-radio1" data-bs-toggle="tab" data-bs-target="#export-{{$export->export_id}}-nav-all-products" checked>
                <label class="form-check-label" for="export-{{$export->export_id}}-radio1">
                    Все товары
                </label>
            </div>
            
            <div class="form-check ms-3">
                <input class="form-check-input" type="radio" name="export-{{$export->export_id}}-radio" id="export-{{$export->export_id}}-radio2" data-bs-toggle="tab" data-bs-target="#export-{{$export->export_id}}-nav-category-products">
                <label class="form-check-label" for="export-{{$export->export_id}}-radio2">
                    Определенные категории
                </label>
            </div>
        </div>

        <div class="tab-content">
            <div class="tab-pane px-0 active" id="export-{{$export->export_id}}-nav-all-products" style="min-height: fit-content; height: fit-content;">
                <div class="d-flex">Экспорт всех товаров</div>
            </div>
            <div class="tab-pane px-0" id="export-{{$export->export_id}}-nav-category-products" style="min-height: fit-content; height: fit-content;">
                <div class="d-flex">Экспорт следующих категорий</div>
                
                <div class="d-flex flex-column border mt-2 p-2 pb-0" style="max-width: 350px;">
                    <input type="checkbox" class="btn-check" id="export-{{$export->export_id}}-btn-check-1" checked autocomplete="off">
                    <label class="btn btn-outline-primary p-1 mb-2 rounded-0" for="export-{{$export->export_id}}-btn-check-1">Консоли</label>

                    <input type="checkbox" class="btn-check" id="export-{{$export->export_id}}-btn-check-2" autocomplete="off">
                    <label class="btn btn-outline-primary p-1 mb-2 rounded-0" for="export-{{$export->export_id}}-btn-check-2">Другие</label>

                    <input type="checkbox" class="btn-check" id="export-{{$export->export_id}}-btn-check-3" autocomplete="off">
                    <label class="btn btn-outline-primary p-1 mb-2 rounded-0" for="export-{{$export->export_id}}-btn-check-3">Другие</label>
                </div>
            </div>
        </div>
    </div>

</div>