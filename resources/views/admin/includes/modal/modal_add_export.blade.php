<div 
    class="modal fade" 
    id="addExport" 
    data-bs-backdrop="static" 
    data-bs-keyboard="false" 
    tabindex="-1" 
    aria-labelledby="addExportLabel" 
    aria-hidden="true" 
    style="background: #FFFFFF00; backdrop-filter: blur(8px) grayscale(1.0);">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow rounded-3" style="transform: rotateZ(0deg);">
            <div class="modal-header bg-primary bg-gradient text-white rounded-top-3 py-2">
                <h1 class="modal-title fs-3 fw-bold" id="addExportLabel">Новая выгрузка</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-5">
                <div class="section-item d-flex flex-row">
                    <div class="section-item-title need-to-fill">Название</div>
                    <div class="section-item-input">
                        <input class="px-2" type="text" table-data table-column-name="export_name">
                    </div>
                </div>

                <div class="section-item d-flex flex-row">
                    <div class="section-item-title">Формат</div>
                    <div class="section-item-input">
                        <select class="form-select rounded-0 p-0 ps-2" aria-label="Default select example" table-data table-column-name="export_format">
                            <option value="yml">Яндекс маркет (yml, xml)</option>
                            <option value="csv">CSV</option>
                        </select>
                    </div>
                </div>

                <div class="section-item d-flex flex-row">
                    <div class="section-item-title">Описание</div>
                    <div class="section-item-input">
                        <textarea class="p-2" table-data table-column-name="export_desc"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-2">
                <button id="export-accept-button" type="button" class="btn btn-primary">Добавить</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<style>
    #roomModal.show {
        z-index: 1000000;
    }

    .modal-backdrop {
        background-color: #FFFFFF00;
    }

    .modal-body input[type="date"] {
        width: 75%;
    }

    .modal-body input[type="time"] {
        width: 24%;
    }

    .modal-body .label {
        width: 25px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
    }

    input[type="date"],
    input[type="time"] {
        border-color: #7F7F7F1F;
        border-radius: 10px;
    }

    input[type="date"]:focus,
    input[type="time"]:focus {
        outline: none;
    }

</style>