<div 
    class="offcanvas offcanvas-end shadow"
    tabindex="-1"
    parent_id=""
    item-id=""
    id="tagEdit"
    aria-labelledby="tagEditLabel">
  
    <div class="offcanvas-header border-bottom bg-primary text-white">
        <h1 class="offcanvas-title fs-5 w-100 d-flex flex-row" id="tagEditLabel">Тэг<div class="px-2">-</div><div id="tagName" class="offcanvas-header-name"></div></h1>
        <span class="tag-go-link me-2">
            <svg class="link" width="24" height="24" fill="currentColor" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="ReplyAllTwoToneIcon" tabindex="-1" title="ReplyAllTwoTone">
                <path d="M7 8V5l-7 7 7 7v-3l-4-4 4-4zm6 1V5l-7 7 7 7v-4.1c5 0 8.5 1.6 11 5.1-1-5-4-10-11-11z"></path>
            </svg>
        </span>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">

        <div class="input-group mb-3">
            <span class="input-group-text" style="width: min(190px, 14vw); font-size: min(1vw, 16px);">Название для тэга</span>
            <input type="text" class="base-data form-control" id="nameForTag" style="font-size: min(1vw, 16px);">
        </div>

        {{-- <div class="input-group mb-3">
            <span class="input-group-text" style="width: min(190px, 14vw); font-size: min(1vw, 16px);">Заголовок H1 для тэга</span>
            <input type="text" class="base-data form-control" id="h1ForTag" style="font-size: min(1vw, 16px);">
        </div> --}}

        <div class="input-group mb-3">
            <span class="input-group-text" style="width: min(190px, 14vw); font-size: min(1vw, 16px);">ЧПУ</span>
            <input type="text" class="base-data form-control" id="urlForTag" style="font-size: min(1vw, 16px);" disabled readonly>
        </div>

        <div class="form-floating my-3">
            <textarea class="base-data form-control" placeholder="Leave a comment here" id="tagDescription" style="height: 100px; min-height:100px;"></textarea>
            <label for="categoryDescription">Описание</label>
        </div>

        <div>
            <div class="mb-3">
                <input class="form-control form-control-sm" id="tag-image-file" type="file">
            </div>
            <button id="tag-image-button" type="button" class="btn btn-primary me-3">Загрузить картинку</button>
            <div class="pt-3">
                <img id="tag-image" src="/public/images/no-photo.svg" style="width: 300px; height:300px; object-fit: contain;">
            </div>
        </div>

        {{-- tags default --}}
        <div class="form-check mt-3 d-flex align-items-center">
            <input class="meta-checkbox form-check-input" type="checkbox" value="" id="TagUseDefaultMeta" use-for="tags-meta-section" table-data-tagtable-column-name="tag_use_default_meta" checked>
            <label class="form-check-label ms-2" for="TagUseDefaultMeta" style="margin-top: 4px;">Использовать Meta по умолчанию</label>
        </div>

        <div id="tags-meta-section" class="section w-100 flex-column my-3 p-2 border">
            <div class="section-header d-flex ms-0 fw-bold">Тэг</div>
            
            <div class="section-item d-flex flex-row">
                <div class="section-item-title need-to-fill">Title страницы</div>
                <div class="section-item-input">
                    <input type="text" table-data-tag table-column-name="tags_default_title" id="tags-default-title">
                </div>
            </div>

            <div class="section-item d-flex flex-row">
                <div class="section-item-title need-to-fill">Заголовок H1</div>
                <div class="section-item-input">
                    <input type="text" table-data-tag table-column-name="tags_default_title_h1" id="tags-default-title-H1">
                </div>
            </div>

            {{-- <div class="section-item d-flex flex-row">
                <div class="section-item-title">Ключевые слова</div>
                <div class="section-item-input">
                    <textarea table-data-tag table-column-name="tags_default_keywords" id="tags-default-keywords"></textarea>
                </div>
            </div> --}}

            <div class="section-item d-flex flex-row">
                <div class="section-item-title">Мета описание</div>
                <div class="section-item-input">
                    <textarea table-data-tag table-column-name="tags_default_meta" id="tags-default-meta"></textarea>
                </div>
            </div>

            <div class="section-item d-flex flex-row">
                <div class="section-item-title"></div>
                <div class="section-item-input">
                    <div>Для всех полей доступны переменные:</div>
                    <div>#STORE_NAME# - название магазина</div>
                    <div>#TAG_NAME# - название тега</div>
                    <div>#CATEGORY_NAME# - название категории</div>
                    <div>#PAGE# - текущая страница пагинации</div>
                    <div>Переменные при выводе на старницу будут заменены на соответствующие переменные.</div>
                    <br>
                    <div>Сбросить мета информацию для всех тегов.</div>
                </div>
            </div>

        </div>

    </div>

    <div class="offcanvas-footer p-3 border-top d-flex justify-content-end">
        <button id="tag-save-button" type="button" class="btn btn-primary me-3">Сохранить</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">Закрыть</button>
    </div>

</div>

<style>
    #tagEdit {
        min-width: 50%;
    }

    #tagEdit .offcanvas-body {
        overflow-x: hidden;
    }

    #tagEdit .section-item-input input, 
    #tagEdit .section-item-input textarea {
        width: 100%;
        border: 1px solid #DDD;
    }
</style>