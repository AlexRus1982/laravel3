{{--<!-- Панель SEO -->--}}
<?php
?>

<div class="tab-pane fade" id="nav-SEO" role="tabpanel" aria-labelledby="nav-SEO-tab" tabindex="0">
    <div id="SEO-panel" class="d-flex flex-column w-100 p-2 bg-white shadow">
        <div class="area-title fw-bold ms-2 me-auto py-2 d-flex w-100">
            <div id="SEO-title">SEO</div>
        </div>
        <div class="SEO-content d-flex flex-row flex-wrap" style="min-height: 75vh;">

            <div class="accordion w-100" id="accordionExample">

                {{-- Параметры --}}
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading_SEO_Params">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_SEO_Params" aria-expanded="false" aria-controls="collapse_SEO_Params">
                            Параметры
                        </button>
                    </h2>
                    <div id="collapse_SEO_Params" class="accordion-collapse collapse" aria-labelledby="heading_SEO_Params" data-bs-parent="#accordionExample">
                        <div class="accordion-body w-100 d-flex flex-column px-5">

                            {{-- Настройки магазина --}}
                            <div class="section w-100 d-flex flex-column my-3 p-2 border">
                                <div class="section-header d-flex ms-0 fw-bold">Магазин</div>
                                
                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title need-to-fill">Название магазина</div>
                                    <div class="section-item-input">
                                        <input type="text" table-data table-column-name="store_name" id="store-name">
                                    </div>
                                </div>

                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title"></div>
                                    <div class="section-item-input">
                                        <div>#STORE_NAME#</div>
                                    </div>
                                </div>

                            </div>

                            {{-- main page --}}
                            <div class="section w-100 d-flex flex-column my-3 p-2 border">
                                <div class="section-header d-flex ms-0 fw-bold">Главная страница</div>
                                
                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title need-to-fill">Title страницы</div>
                                    <div class="section-item-input">
                                        <input type="text" table-data table-column-name="main_page_title" id="main-page-title">
                                    </div>
                                </div>

                                {{-- <div class="section-item d-flex flex-row">
                                    <div class="section-item-title">Ключевые слова</div>
                                    <div class="section-item-input">
                                        <textarea table-data table-column-name="main_page_keywords" id="main-page-keywords"></textarea>
                                    </div>
                                </div> --}}

                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title">Мета описание</div>
                                    <div class="section-item-input">
                                        <textarea table-data table-column-name="main_page_meta" id="main-page-meta" ></textarea>
                                    </div>
                                </div>

                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title"></div>
                                    <div class="section-item-input">
                                        <div>Для всех полей доступны переменные:</div>
                                        <div>#STORE_NAME# - название магазина</div>
                                        <div>Переменные при выводе на старницу будут заменены на соответствующие переменные.</div>
                                    </div>
                                </div>

                            </div>
                            
                            {{-- category --}}
                            <div class="section w-100 d-flex flex-column my-3 p-2 border">
                                <div class="section-header d-flex ms-0 fw-bold">Категории (мета по умолчанию)</div>
                                
                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title need-to-fill">Title страницы</div>
                                    <div class="section-item-input">
                                        <input type="text" table-data table-column-name="category_title" id="category-title">
                                    </div>
                                </div>

                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title need-to-fill">Заголовок H1</div>
                                    <div class="section-item-input">
                                        <input type="text" table-data table-column-name="category_title_h1" id="category-title-H1">
                                    </div>
                                </div>

                                {{-- <div class="section-item d-flex flex-row">
                                    <div class="section-item-title">Ключевые слова</div>
                                    <div class="section-item-input">
                                        <textarea table-data table-column-name="category_keywords" id="category-keywords"></textarea>
                                    </div>
                                </div> --}}

                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title">Мета описание</div>
                                    <div class="section-item-input">
                                        <textarea table-data table-column-name="category_meta" id="category-meta"></textarea>
                                    </div>
                                </div>

                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title"></div>
                                    <div class="section-item-input">
                                        <div>Для всех полей доступны переменные:</div>
                                        <div>#STORE_NAME# - название магазина</div>
                                        <div>#CATEGORY_NAME# - название категории</div>
                                        <div>#PAGE# - текущая страница пагинации</div>
                                        <div>#TAGS# - теги</div>
                                        <div>Переменные при выводе на старницу будут заменены на соответствующие переменные.</div>
                                        <br>
                                        <div>Сбросить мета информацию для всех тегов.</div>
                                    </div>
                                </div>

                            </div>

                            {{-- tags default --}}
                            <div class="section w-100 d-flex flex-column my-3 p-2 border">
                                <div class="section-header d-flex ms-0 fw-bold">Тэги (мета по умолчанию)</div>
                                
                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title need-to-fill">Title страницы</div>
                                    <div class="section-item-input">
                                        <input type="text" table-data table-column-name="tags_default_title" id="tags-default-title">
                                    </div>
                                </div>

                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title need-to-fill">Заголовок H1</div>
                                    <div class="section-item-input">
                                        <input type="text" table-data table-column-name="tags_default_title_h1" id="tags-default-title-H1">
                                    </div>
                                </div>

                                {{-- <div class="section-item d-flex flex-row">
                                    <div class="section-item-title">Ключевые слова</div>
                                    <div class="section-item-input">
                                        <textarea table-data table-column-name="tags_default_keywords" id="tags-default-keywords"></textarea>
                                    </div>
                                </div> --}}

                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title">Мета описание</div>
                                    <div class="section-item-input">
                                        <textarea table-data table-column-name="tags_default_meta" id="tags-default-meta"></textarea>
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

                            {{-- products --}}
                            <div class="section w-100 d-flex flex-column my-3 p-2 border">
                                <div class="section-header d-flex ms-0 fw-bold">Товары (мета по умолчанию)</div>
                                
                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title need-to-fill">Title страницы</div>
                                    <div class="section-item-input">
                                        <input type="text" table-data table-column-name="products_title" id="products-title">
                                    </div>
                                </div>

                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title need-to-fill">Заголовок H1</div>
                                    <div class="section-item-input">
                                        <input type="text" table-data table-column-name="products_title_h1" id="products-title-H1">
                                    </div>
                                </div>

                                {{-- <div class="section-item d-flex flex-row">
                                    <div class="section-item-title">Ключевые слова</div>
                                    <div class="section-item-input">
                                        <textarea table-data table-column-name="products_keywords" id="products-keywords"></textarea>
                                    </div>
                                </div> --}}

                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title">Мета описание</div>
                                    <div class="section-item-input">
                                        <textarea table-data table-column-name="products_meta" id="products-meta"></textarea>
                                    </div>
                                </div>

                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title">Дополнительное описание</div>
                                    <div class="section-item-input">
                                        <input type="text" table-data table-column-name="products_desc" id="products-desc">
                                    </div>
                                </div>

                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title"></div>
                                    <div class="section-item-input">
                                        <div>Для всех полей доступны переменные:</div>
                                        <div>#STORE_NAME# - название магазина</div>
                                        <div>#PRODUCT_NAME# - название продукта</div>
                                        <div>#CATEGORY_NAME# - название категории</div>
                                        <div>#BRAND_NAME# - название производителя</div>
                                        <div>#PRICE# - цена товара</div>
                                        <div>#TAGS# - теги</div>
                                        <div>#PRODUCT_ARTNO# - артикул товара</div>
                                        <div>#OFFER_ARTNO# - артикул модификаций</div>
                                        <div>Переменные при выводе на старницу будут заменены на соответствующие переменные.</div>
                                        <br>
                                        <div>Сбросить мета информацию для всех тегов.</div>
                                    </div>
                                </div>

                            </div>

                            <button id="seo-params-save-button" type="button" class="btn btn-primary ms-auto" style="width: fit-content;">Сохранить</button>
                        </div>
                    </div>
                </div>

                {{-- Верстка --}}
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading_Layout_Params">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_Layout_Params" aria-expanded="false" aria-controls="collapse_Layout_Params">
                            Верстка
                        </button>
                    </h2>
                    <div id="collapse_Layout_Params" class="accordion-collapse collapse" aria-labelledby="heading_Layout_Params" data-bs-parent="#accordionExample">
                        <div class="accordion-body w-100 d-flex flex-column px-5">

                            {{-- Фавиконка --}}
                            <div class="section w-100 d-flex flex-column my-3 p-2 pb-0 border">
                                <div class="section-header d-flex ms-0 fw-bold">
                                    <div class="section-header-label">Фавиконка</div>
                                    <div class="ms-auto section-header-collapse down">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                
                                <div class="my-3 section-item flex-row align-items-center py-2 {{--hide--}}">
                                    <div class="section-item-title need-to-fill">Выбрать фавиконку</div>
                                    {{-- <div class="section-item-input">
                                        <input type="text" table-data table-column-name="store_favicon">
                                    </div> --}}
                                    <label role="button" class="input-icon" table-data="image" store-path="icons" table-column-name="store_favicon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#AAA" class="bi bi-question-square-fill" viewBox="0 0 16 16">
                                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z"/>
                                        </svg>
                                        <img src="" style="display: none; width: 32px; height: 32px;">
                                        <input accept="image/x-icon" type="file" hidden />
                                    </label>
                                </div>

                            </div>

                            {{-- Логотип --}}
                            <div class="section w-100 d-flex flex-column my-3 p-2 border">
                                <div class="section-header d-flex ms-0 fw-bold">Логотип</div>
                                
                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title need-to-fill">Выбрать логотип</div>
                                    <label role="button" class="input-icon" table-data="image" store-path="logos" table-column-name="store_logo">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#AAA" class="bi bi-question-square-fill" viewBox="0 0 16 16">
                                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z"/>
                                        </svg>
                                        <img src="" style="display: none; width: auto; height: 32px; object-fit: contain;">
                                        <input accept="image/*" type="file" hidden />
                                    </label>
                                </div>

                            </div>

                            {{-- Текст правообладателя --}}
                            <div class="section w-100 d-flex flex-column my-3 p-2 border">
                                <div class="section-header d-flex ms-0 fw-bold">Текст правообладателя</div>
                                
                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title need-to-fill">Содержание</div>
                                    <div class="section-item-input">
                                        <input type="text" table-data table-column-name="footer_co_text">
                                    </div>
                                </div>

                            </div>
                            
                            {{-- Блок контакты --}}
                            <div class="section w-100 d-flex flex-column my-3 p-2 border">
                                <div class="section-header d-flex ms-0 fw-bold">Блок контакты</div>
                                
                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title">Содержание</div>
                                    <div class="section-item-input">
                                        <textarea table-data table-column-name="footer_contacts"></textarea>
                                    </div>
                                </div>

                            </div>

                            {{-- Социальные сети --}}
                            <div class="section w-100 d-flex flex-column my-3 p-2 border">
                                <div class="section-header d-flex ms-0 fw-bold">Социальные сети</div>
                                
                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title d-flex align-items-center">Ссылка на Вконтакте</div>
                                    <div class="py-2 section-item-input align-items-center">
                                        <input type="text" table-data social-link table-column-name="social_link_vk">
                                    </div>
                                    <label role="button" class="d-flex input-icon align-items-center" table-data="image" store-path="socials" table-column-name="social_link_vk_store">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#AAA" class="bi bi-question-square-fill" viewBox="0 0 16 16">
                                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z"/>
                                        </svg>
                                        <img src="" style="display: none; width: 32px; height: 32px;">
                                        <input accept="image/*" type="file" hidden />
                                    </label>
                                </div>

                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title d-flex align-items-center">Ссылка на Одноклассники</div>
                                    <div class="py-2 section-item-input align-items-center">
                                        <input type="text" table-data social-link table-column-name="social_link_ok">
                                    </div>
                                    <label role="button" class="d-flex input-icon align-items-center" table-data="image" store-path="socials" table-column-name="social_link_ok_store">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#AAA" class="bi bi-question-square-fill" viewBox="0 0 16 16">
                                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z"/>
                                        </svg>
                                        <img src="" style="display: none; width: 32px; height: 32px;">
                                        <input accept="image/*" type="file" hidden />
                                    </label>
                                </div>

                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title d-flex align-items-center">Ссылка на Youtube</div>
                                    <div class="py-2 section-item-input align-items-center">
                                        <input type="text" table-data social-link table-column-name="social_link_youtube">
                                    </div>
                                    <label role="button" class="d-flex input-icon align-items-center" table-data="image" store-path="socials" table-column-name="social_link_youtube_store">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#AAA" class="bi bi-question-square-fill" viewBox="0 0 16 16">
                                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z"/>
                                        </svg>
                                        <img src="" style="display: none; width: 32px; height: 32px;">
                                        <input accept="image/*" type="file" hidden />
                                    </label>
                                </div>

                                <div class="section-item d-flex flex-row">
                                    <div class="section-item-title d-flex align-items-center">Ссылка на Instagram</div>
                                    <div class="py-2 section-item-input align-items-center">
                                        <input type="text" table-data social-link table-column-name="social_link_instagram">
                                    </div>
                                    <label role="button" class="d-flex input-icon align-items-center" table-data="image" store-path="socials" table-column-name="social_link_instagram_store">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#AAA" class="bi bi-question-square-fill" viewBox="0 0 16 16">
                                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z"/>
                                        </svg>
                                        <img src="" style="display: none; width: 32px; height: 32px;">
                                        <input accept="image/*" type="file" hidden />
                                    </label>
                                </div>

                            </div>

                            <button id="layout-save-button" type="button" class="btn btn-primary ms-auto" style="width: fit-content;">Сохранить</button>
                        </div>
                    </div>
                </div>

                {{-- Вебмастер --}}
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading_WebMaster_Params">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_WebMaster_Params" aria-expanded="false" aria-controls="collapse_WebMaster_Params">
                            Вебмастер
                        </button>
                    </h2>
                    <div id="collapse_WebMaster_Params" class="accordion-collapse collapse" aria-labelledby="heading_WebMaster_Params" data-bs-parent="#accordionExample">
                        <div class="accordion-body w-100 d-flex flex-column px-5">

                            {{-- Ключи SSL --}}
                            <div class="section w-100 d-flex flex-column my-3 p-2 pb-0 border">
                                <div class="section-header d-flex ms-0 fw-bold">
                                    <div class="section-header-label">Ключи SSL</div>
                                    <div class="ms-auto section-header-collapse">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="my-3 section-item flex-row align-items-center py-2 hide">
                                    <div class="section-item-title">Вставте ключи SSL</div>
                                    <textarea class="flex-grow-1" table-data table-column-name="keys_ssl"></textarea>
                                </div>
                            </div>

                            {{-- Код ЯМ --}}
                            <div class="section w-100 d-flex flex-column my-3 p-2 pb-0 border">
                                <div class="section-header d-flex ms-0 fw-bold">
                                    <div class="section-header-label">Код яндекс метрики</div>
                                    <div class="ms-auto section-header-collapse">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="my-3 section-item flex-row align-items-center py-2 hide">
                                    <div class="section-item-title">Вставте код ЯМ</div>
                                    <textarea class="flex-grow-1" table-data table-column-name="yandex_metrika_code"></textarea>
                                </div>
                            </div>

                            {{-- Код счетчик ВК --}}
                            <div class="section w-100 d-flex flex-column my-3 p-2 pb-0 border">
                                <div class="section-header d-flex ms-0 fw-bold">
                                    <div class="section-header-label">Код счетчик ВК</div>
                                    <div class="ms-auto section-header-collapse">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="my-3 section-item flex-row align-items-center py-2 hide">
                                    <div class="section-item-title">Вставте код счетчика ВК</div>
                                    <textarea class="flex-grow-1" table-data table-column-name="vk_counter_code"></textarea>
                                </div>
                            </div>
                            
                            {{-- Файлы в корне --}}
                            <div class="section w-100 d-flex flex-column my-3 p-2 pb-0 border">
                                <div class="section-header d-flex ms-0 fw-bold">
                                    <div class="section-header-label">Файлы в корне</div>
                                    <div class="ms-auto section-header-collapse">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="my-3 section-item flex-row align-items-center hide">
                                    @include('admin.includes.contents.root_files')
                                </div>
                            </div>

                            <button id="webmaster-save-button" type="button" class="btn btn-primary ms-auto" style="width: fit-content;">Сохранить</button>
                        </div>
                    </div>
                </div>

                {{-- Robots.txt --}}
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Robots.txt
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body w-100 d-flex flex-column">
                            <textarea id="robots-text" style="min-height: 50vh; margin-bottom: 10px;"></textarea>
                            <button id="robots-save-button" type="button" class="btn btn-primary ms-auto" style="width: fit-content;">Сохранить</button>
                        </div>
                    </div>
                </div>

                {{-- Sitemap --}}
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSitemap">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSitemap" aria-expanded="false" aria-controls="collapseSitemap">
                            Sitemap
                        </button>
                    </h2>
                    <div id="collapseSitemap" class="accordion-collapse collapse" aria-labelledby="headingSitemap" data-bs-parent="#accordionExample">
                        <div class="accordion-body w-100 d-flex flex-column">
                            <a href="{{url("/")}}/sitemap" target="_blank">Sitemap</a>
                        </div>
                    </div>
                </div>

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

    .section-item-title {
        min-width: 20%;
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
    .section-item textarea,
    .section-item-input input,
    .section-item-input textarea {
        width: 100%;
        border: 1px solid #DDD;
    }

    .accordion-button:focus {
        box-shadow: none;
    }

    .input-icon {
        padding-left: 10px;
        transition: 0.3s;
    }

    .input-icon:hover {
        cursor: pointer;
        transform: scale(1.2);
        filter: drop-shadow(0px 0px 4px #0000007F);
    }

    #root-files-list.highlight {
        background: #00FF004F;
    }
</style>