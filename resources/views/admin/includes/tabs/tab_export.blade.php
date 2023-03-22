{{--<!-- Панель Экспорт -->--}}
@php
    $exports = DB::table('exports_params')
    ->get();
@endphp

@include('admin.includes.modal.modal_add_export')

<div class="mb-3 tab-pane fade" id="nav-export" role="tabpanel" aria-labelledby="nav-export-tab" tabindex="0">
    <div id="export-panel" class="d-flex flex-column w-100 p-2 py-4 mb-2 bg-white shadow">
        <div class="area-title fw-bold ms-2 me-auto pb-3 d-flex w-100">
            <div id="export-title">Экспорт</div>
            <div title="Новый экспорт" class="ms-auto me-3" data-bs-toggle="modal" data-bs-target="#addExport"><img class="add-button add-export" src="/public/images/round-plus.svg"></div>
        </div>
        <div class="export-content d-flex flex-row flex-wrap">
            <div class="accordion w-100" id="accordionExample">
                @foreach ($exports as $export)
                    @include('admin.includes.tabs.tab_export_file', ['export' => $export])
                @endforeach
            </div>
        </div>
    </div>
</div>
<style>
    .section-header {
        margin-bottom: 10px; 
    }

    .section-item {
        margin-bottom: 10px;
    }

    #export-panel .section-item-title {
        min-width: min(20%, 250px);
        display: flex;
    }

    .section-item-title.need-to-fill:after {
        content: '*';
        margin-left: 5px;
        color: #F00;
    }

    .section-item-input {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        flex-grow: 1;
    }

    #robots-text,
    .section-item-input input,
    .section-item-input textarea {
        width: 100%;
        border: 1px solid #DDD;
    }

    .accordion-button:focus {
        box-shadow: none;
    }

    .export-to-trash svg {
        transition: .3s;
    }

    .export-to-trash svg:hover {
        color: #F77;
        transform: scale(1.3);
        filter: drop-shadow(0px 0px 2px #F77);
    }

    .go-sitelink svg,
    .copy-clipboard svg {
        transition: .3s;
    }

    .go-sitelink:hover svg,
    .copy-clipboard:hover svg {
        cursor: pointer;
        color: #77F;
        transform: scale(1.3);
        filter: drop-shadow(0px 0px 4px #77F);
    }

</style>