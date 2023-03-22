{{-- требует входную переменную $export --}}
{{-- Параметры экспорта--}}
<div class="section w-100 d-flex flex-column my-3 p-2 border">

    {{-- Параметры выгрузки --}}
    <div class="section-header d-flex ms-0 fw-bold">Параметры выгрузки</div>
    
    <div class="section-item d-flex flex-row ps-2">
        <div class="section-item-title need-to-fill">Имя файла</div>
        <div class="section-item-input d-flex flex-row">
            <input export_id="{{$export->export_id}}" type="text" table-data table-column-name="export_file_name" value="{{$export->export_file_name}}">
            <input export_id="{{$export->export_id}}" class="ms-2" type="text" table-data table-column-name="export_file_ext" value="{{$export->export_file_ext}}" style="width: 70px;">
        </div>
    </div>

    {{-- <div class="section-item d-flex flex-row ps-2">
        <div class="section-item-title">Путь к файлу</div>
        <div class="d-flex flex-row" style="font-size: min(1vw, 16px);">
            <div id="export-{{$export->export_id}}-path-site">{{url("/")}}/export/file/</div>
            <div id="export-{{$export->export_id}}-path-name">{{$export->export_file_name}}</div>.
            <div id="export-{{$export->export_id}}-path-ext">{{$export->export_file_ext}}</div>
            <div export_id="{{$export->export_id}}" class="copy-clipboard ms-3" title="Скопировать в буфер обмена">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                </svg>
            </div>

            <div export_id="{{$export->export_id}}" class="go-sitelink ms-3" title="Перейти по ссылке">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                    <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                    <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                </svg>
            </div>

        </div>
    </div> --}}

    {{-- Настройки магазина --}}
    <div class="section-header d-flex ms-0 mt-3 fw-bold">Настройки магазина</div>
    
    <div class="section-item d-flex flex-row ps-2">
        <div class="section-item-title need-to-fill">Название магазина</div>
        <div class="section-item-input">
            <input export_id="{{$export->export_id}}" type="text" table-data table-column-name="export_shop_name" value="{{$export->export_shop_name}}">
        </div>
    </div>

    <div class="section-item d-flex flex-row ps-2">
        <div class="section-item-title"></div>
        <div class="section-item-input">
            {{-- <div>Для всех полей доступны переменные:</div> --}}
            <div>#STORE_NAME# - название магазина</div>
            {{-- <div>#CATEGORY_NAME# - название категории</div> --}}
            {{-- <div>#EXPORT_NAME# - имя выгрузки</div> --}}
            {{-- <div>#DATE# - текущая дата</div> --}}
            {{-- <div>Переменные при выводе на старницу будут заменены на соответствующие переменные.</div> --}}
            {{-- <br> --}}
            {{-- <div>Сбро
            сить мета информацию для всех тегов.</div> --}}
        </div>
    </div>

</div>