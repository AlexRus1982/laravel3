{{-- Панель Экспорт --}}
{{-- входной параметр $export --}}
@php
    $export_ext = mb_strtoupper($export->export_format);
    $export_dot_ext = ".{$export->export_format}";
@endphp

<div class="accordion-item">
    <h2 class="accordion-header" id="export-{{$export->export_id}}">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$export->export_id}}" aria-expanded="false" aria-controls="collapse-{{$export->export_id}}">
            {{$export_ext}} - {{$export->export_file_name}}
            
            <div class="section-item d-flex flex-row flex-grow-1 align-items-center justify-content-end p-0 pe-5 m-0">
                <div class="section-item-title px-2" style="min-width: 0px;">Путь к файлу</div>
                <div class="d-flex flex-row" style="font-size: min(1vw, 16px);">
                    <div id="export-{{$export->export_id}}-path-site">{{url("/")}}/export/file/</div>
                    <div id="export-{{$export->export_id}}-path-name">{{$export->export_file_name}}</div>.
                    <div id="export-{{$export->export_id}}-path-ext">{{$export->export_file_ext}}</div>
                    <div export_id="{{$export->export_id}}" class="copy-clipboard ms-3" title="Скопировать в буфер обмена" data-bs-toggle="collapse">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                        </svg>
                    </div>

                    <div export_id="{{$export->export_id}}" class="go-sitelink ms-3" title="Перейти по ссылке" data-bs-toggle="collapse">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                            <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                            <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                        </svg>
                    </div>

                </div>
            </div>

            <div export_id="{{$export->export_id}}" class="export-to-trash d-flex me-3" data-bs-toggle="collapse">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3 ms-auto" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                </svg>
            </div>
        </button>
    </h2>
    <div id="collapse-{{$export->export_id}}" class="accordion-collapse collapse" aria-labelledby="export-{{$export->export_id}}">
        <div class="accordion-body w-100 d-flex flex-column px-3 py-0">

            {{-- Выбор товара --}}
            @include('admin.includes.contents.export_category_choose', [ 'export' => $export ])

            @if ($export->export_format == "csv")
                {{-- Выбор столбцов для экспорта --}}
                @include('admin.includes.contents.export_columns_choose', [ 'export' => $export ])
            @endif

            {{-- Параметры --}}
            @include('admin.includes.contents.export_params', [ 'export' => $export ]);

            <button export_id="{{$export->export_id}}" export_format="{{$export->export_format}}" type="button" class="btn btn-primary export-save-button ms-auto px-5 mb-3 {{--disabled--}}" style="width: fit-content;">Сохранить</button>

        </div>
    </div>
</div>