{{-- требует входную переменную $export --}}
{{-- Выбор товара --}}
<div class="section w-100 d-flex flex-column my-3 p-2 border">
    
    <div class="section-header d-flex ms-0 fw-bold">Натсройки экспорта столбцов таблицы</div>

    {{-- Разделитель столбцов --}}
    <div class="section-item d-flex flex-row ps-2">
        <div class="section-item-title need-to-fill">Разделитель столбцов</div>
        <div class="section-item-input d-flex flex-row">
            <input export_id="{{$export->export_id}}" table-data table-column-name="export_csv_delimetr" type="text" value="{{$export->export_csv_delimetr}}">
        </div>
    </div>
    
    <div class="nav nav-tabs d-flex flex-column ps-2">
        <div id="tab-export-{{$export->export_id}}" class="d-flex flex-row py-2 px-0 btn-group" data-bs-toggle="buttons-radio">
            @php
                $checked1 = ($export->export_csv_all_columns == '1') ? "checked" : "";
                $checked2 = ($export->export_csv_all_columns == '0') ? "checked" : "";

                $active1 = ($export->export_csv_all_columns == '1') ? "active show" : "";
                $active2 = ($export->export_csv_all_columns == '0') ? "active show" : "";

                $selected1 = ($export->export_csv_all_columns == '1') ? "true" : "false";
                $selected2 = ($export->export_csv_all_columns == '0') ? "true" : "false";

            @endphp
            
            <div class="form-check">
                <input class="form-check-input {{ $active1 }}" type="radio" name="export-{{$export->export_id}}-columns-radio" id="export-{{$export->export_id}}-columns-radio1" data-bs-toggle="tab" data-bs-target="#export-{{$export->export_id}}-nav-all-columns" {{$checked1}}>
                <label class="form-check-label" for="export-{{$export->export_id}}-columns-radio1">
                    Все столбцы
                </label>
            </div>
            
            <div class="form-check ms-3">
                <input class="form-check-input {{ $active2 }}" type="radio" name="export-{{$export->export_id}}-columns-radio" id="export-{{$export->export_id}}-columns-radio2" data-bs-toggle="tab" data-bs-target="#export-{{$export->export_id}}-nav-category-columns" {{$checked2}}>
                <label class="form-check-label" for="export-{{$export->export_id}}-columns-radio2">
                    Определенные столбцы
                </label>
            </div>
        </div>

        <div class="tab-content">
            <div class="tab-pane px-0 {{ $active1 }}" id="export-{{$export->export_id}}-nav-all-columns" style="min-height: fit-content; height: fit-content;">
                <div class="d-flex">Экспорт всех столбцов</div>
            </div>
            <div class="tab-pane px-0 {{ $active2 }}" id="export-{{$export->export_id}}-nav-category-columns" style="min-height: fit-content; height: fit-content;">
                <div class="d-flex">Экспорт следующих столбцов</div>
                
                <div class="d-flex w-100 flex-row flex-wrap border mt-2 p-2 pb-0">
                    @php
                        $columns = explode(';', $export->export_csv_columns);
                        
                        $tableColumnNames = DB::getSchemaBuilder()
                        ->getColumnListing('catalog');
                    @endphp
                    @foreach ($tableColumnNames as $tableColumnName)
                        @php
                            $checked = in_array($tableColumnName, $columns) ? "checked" : "";
                        @endphp
                        <div class="export-columns m-2" style="width: 350px; min-width: 350px;">
                            <input type="checkbox" class="btn-check" id="export-columns-{{$export->export_id}}-btn-check-{{$loop->index}}" {{$checked}} autocomplete="off">
                            <label class="w-100 btn btn-outline-primary p-1 mb-2 rounded-0" for="export-columns-{{$export->export_id}}-btn-check-{{$loop->index}}">{{$tableColumnName}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>