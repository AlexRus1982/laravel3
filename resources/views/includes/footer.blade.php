<footer class="d-flex flex-column border-top mobile-padding-10" style="padding: 0px 60px 0px 60px; overflow-x: hidden; margin-top:40px">
    <div class="footer-logo w-100" style="padding: 50px 0px 70px 0px; overflow: hidden;"><div class="footer-logo-text" style="transform: scaleX(1.0) scaleY(1.0); margin-left: -10px;">LEGER.MARKET</div></div>

    <div class="footer__container footer__container-desktop py-5">
        <div class="fot">
            <div class="stolbs">
                <ul class="ps-0 me-5">
                    <li class="stb__head">КАТАЛОГ</li>

                    @if (Route::is('main'))
                    <? $parentId = 0; ?>
                    @else
                    <? 
                        if(isset($id)) {
                        $parentId = $id; 
                        }
                        else {
                        $parentId = 0;
                        }
                    ?>
                    @endif

                    <?php
                        $categories = DB::table('categories')
                        ->join('hierarchy_category', 'categories.category_id', '=', 'hierarchy_category.id')
                        ->where('parent_id', $parentId)
                        ->orderBy('order_place')
                        ->get();
                        foreach($categories as $category){
                            ?>
                                <a class="stb__item" href="/categories/{{$category->category_url}}">{{$category->category_name}}</a>
                            <?
                        }
                    ?>
                    
                </ul>
                
                <ul class="ps-0 me-5">
                    <li class="stb__head">КОМПАНИЯ</li>
                    @php
                        $items = DB::table('services')->get();
                        foreach($items as $key => $value){
                            $value = (array)$value;
                            $pageUrl = "/service/{$value['url']}";
                            $pageName = $value['page_name'];
                            echo "<li><a class='stb__item' href='{$pageUrl}'>{$pageName}</a></li>";
                        }
                    @endphp
                </ul>

                <ul class="ps-0 me-5">
                    <li class="stb__head">Информация</li>
                    <li class="stb__item">О компании</li>
                    <li class="stb__item">Политика конфиденциальности</li>
                    <li class="stb__item">Предупреждение о цветопередаче</li>
                    <li class="stb__item">Рекомендации по уходу и чистке</li>
                    <li class="stb__item">Вакансии</li>
                    <li class="stb__item">Сотрудничество</li>
                </ul>

            </div>
            <div class="stolbs justify-content-end" style="min-width: 200px";>
                {!! DB::table('seo_params')->pluck('footer_contacts')->first() !!}
            </div>
        </div>
    </div>

    <div class="accordion footer__container footer__container-mobile pt-2 pb-0 w-100 flex-column">
        
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button collapsed stb__head" style="padding: 5px 10px; margin: 0px;" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                КАТАЛОГ
            </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    @if (Route::is('main'))
                    <? $parentId = 0; ?>
                    @else
                    <? 
                        if(isset($id)) {
                        $parentId = $id; 
                        }
                        else {
                        $parentId = 0;
                        }
                    ?>
                    @endif

                    <?php
                        $categories = DB::table('categories')
                        ->join('hierarchy_category', 'categories.category_id', '=', 'hierarchy_category.id')
                        ->where('parent_id', $parentId)
                        ->orderBy('order_place')
                        ->get();
                        foreach($categories as $category){
                            ?>
                                <a class="stb__item" href="/categories/{{$category->category_url}}">{{$category->category_name}}</a>
                            <?
                        }
                    ?>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button collapsed stb__head" style="padding: 5px 10px; margin: 0px;" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                КОМПАНИЯ
            </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                <div class="accordion-body">
                    @php
                        $items = DB::table('services')->get();
                        foreach($items as $key => $value){
                            $value = (array)$value;
                            $pageUrl = "/service/{$value['url']}";
                            $pageName = $value['page_name'];
                            echo "<a class='stb__item' href='{$pageUrl}'>{$pageName}</a>";
                        }
                    @endphp
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
            <button class="accordion-button collapsed stb__head align-items-center" style="padding: 5px 10px; margin: 0px;" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                ИНФОРМАЦИЯ
            </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                <div class="accordion-body">
                    <li class="stb__item">О компании</li>
                    <li class="stb__item">Политика конфиденциальности</li>
                    <li class="stb__item">Предупреждение о цветопередаче</li>
                    <li class="stb__item">Рекомендации по уходу и чистке</li>
                    <li class="stb__item">Вакансии</li>
                    <li class="stb__item">Сотрудничество</li>
                </div>
            </div>
        </div>

    </div>

    <div class="contact__container-mobile stolbs justify-content-start pt-3 me-auto" style="min-width: 200px; margin-left: 12px;";>
        {!! DB::table('seo_params')->pluck('footer_contacts')->first() !!}
    </div>

    <style>
        @media (min-width: 940px) {
            .footer__container-desktop {
                display: block;
            }

            .contact__container-mobile,
            .footer__container-mobile {
                display: none;
            }
        }

        @media (min-width: 0px) and (max-width: 939px) {
            .footer-logo {
                display: none;
            }

            .footer__container-desktop {
                display: none;
            }

            .contact__container-mobile,
            .footer__container-mobile {
                display: block;
            }
        }
    </style>

    <div class="logo-and-c-devider w-100 p-0 m-0"></div>
    <div class="d-flex flex-row logo-and-c w-100 p-0 m-0">
        <span class="c p-0 py-3 m-0">
            {{-- © 2016 - 2023 Leger Market - магазин эксклюзивных товаров для дома --}}
            {{ DB::table('seo_params')->pluck('footer_co_text')->first() }}
        </span>
        <span class="social-icons c p-0 py-3 ps-3 m-0 ms-auto" style="min-width: 150px;">
            {{--<span class="me-2">ИНСТ</span>
            <span class="me-2">ВК</span>
            <span class="me-2">ЮТ</span>
            <span>ОК</span>--}}
            <?php
                $seo_params = DB::table('seo_params')->first();

                foreach($seo_params as $key => $value) {
                    $file_link = null;
                    $file_store = null;

                    if (strpos($key, 'social_link_') !== false && strpos($key, '_store') === false) {
                        $file_link = $value;
                        $file_store = $seo_params->{"{$key}_store"};
                        $file_store = ($file_store != "") ? "/public/{$file_store}" : "";
                    }

                    if (isset($file_link) && isset($file_store)) {
                        ?>
                            <a href="{{$file_link}}">
                                <span class="social me-2">
                                    <?//echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . $file_store)?>
                                </span>
                            </a>
                        <?
                    }
                }

            ?>

            {{-- <span class="me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                </svg>
            </span>
            <span class="me-2">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" zoomAndPan="magnify" viewBox="0 0 30 30.000001" height="24" preserveAspectRatio="xMidYMid meet" version="1.0">
                    <defs>
                        <clipPath id="id1">
                            <path d="M 2.371094 2.394531 L 26 2.394531 L 26 26 L 2.371094 26 Z M 2.371094 2.394531 " clip-rule="nonzero" fill="currentColor"></path>
                        </clipPath>
                    </defs>
                    <g clip-path="url(#id1)">
                        <path fill="currentColor" d="M 13.496094 2.597656 C 10.730469 2.804688 8.210938 3.941406 6.230469 5.875 C 3.625 8.414062 2.375 12.011719 2.839844 15.625 C 3.414062 20.140625 6.601562 23.902344 10.976562 25.234375 C 14.359375 26.265625 18.125 25.652344 20.992188 23.613281 C 24.515625 21.101562 26.347656 16.9375 25.804688 12.675781 C 25.230469 8.15625 22.042969 4.394531 17.667969 3.0625 C 16.304688 2.660156 14.914062 2.503906 13.496094 2.601562 Z M 14.378906 9.773438 C 14.96875 9.832031 15.265625 9.925781 15.398438 10.097656 C 15.433594 10.144531 15.488281 10.261719 15.523438 10.359375 C 15.589844 10.5625 15.59375 10.792969 15.550781 12.527344 C 15.523438 13.609375 15.539062 13.945312 15.628906 14.183594 C 15.726562 14.460938 15.960938 14.585938 16.164062 14.480469 C 16.347656 14.382812 16.777344 13.914062 17.058594 13.492188 C 17.707031 12.53125 18.101562 11.789062 18.574219 10.640625 C 18.671875 10.414062 18.800781 10.261719 18.933594 10.226562 C 18.984375 10.210938 19.742188 10.199219 20.667969 10.195312 L 22.308594 10.191406 L 22.449219 10.25 C 22.632812 10.304688 22.714844 10.429688 22.695312 10.621094 C 22.695312 10.980469 22.320312 11.722656 21.675781 12.625 C 21.585938 12.75 21.253906 13.195312 20.933594 13.613281 C 20.230469 14.535156 20.078125 14.75 19.972656 14.976562 C 19.835938 15.257812 19.871094 15.492188 20.082031 15.765625 C 20.140625 15.84375 20.453125 16.15625 20.769531 16.460938 C 21.65625 17.3125 22.058594 17.757812 22.386719 18.246094 C 22.621094 18.601562 22.714844 18.859375 22.675781 19.085938 C 22.65625 19.207031 22.535156 19.355469 22.394531 19.425781 C 22.230469 19.511719 21.976562 19.527344 20.582031 19.546875 L 19.261719 19.5625 L 19.046875 19.492188 C 18.503906 19.3125 18.140625 19.007812 17.316406 18.054688 C 16.859375 17.527344 16.519531 17.265625 16.285156 17.265625 C 16.070312 17.265625 15.789062 17.550781 15.679688 17.910156 C 15.597656 18.148438 15.570312 18.335938 15.542969 18.75 C 15.515625 19.246094 15.457031 19.355469 15.15625 19.480469 C 15.046875 19.53125 13.683594 19.546875 13.324219 19.507812 C 12.601562 19.429688 11.933594 19.199219 11.269531 18.8125 C 10.304688 18.25 9.714844 17.742188 9.082031 16.9375 C 7.984375 15.53125 7.234375 14.335938 6.324219 12.535156 C 5.976562 11.832031 5.558594 10.925781 5.492188 10.707031 C 5.425781 10.484375 5.519531 10.300781 5.738281 10.230469 C 5.8125 10.207031 6.234375 10.195312 7.191406 10.179688 L 8.539062 10.167969 L 8.695312 10.226562 C 8.941406 10.320312 9.042969 10.445312 9.214844 10.851562 C 9.359375 11.195312 10.136719 12.753906 10.378906 13.191406 C 10.628906 13.628906 10.890625 14 11.121094 14.214844 C 11.402344 14.492188 11.527344 14.558594 11.726562 14.542969 C 11.894531 14.527344 11.9375 14.488281 12.042969 14.261719 C 12.296875 13.714844 12.335938 11.867188 12.109375 11.140625 C 11.980469 10.726562 11.785156 10.570312 11.246094 10.453125 C 11.152344 10.433594 11.152344 10.398438 11.238281 10.273438 C 11.445312 9.976562 11.816406 9.832031 12.523438 9.773438 C 12.910156 9.742188 14.058594 9.738281 14.375 9.773438 Z M 14.378906 9.773438 " fill-opacity="1" fill-rule="nonzero"></path>
                    </g>
                </svg>
            </span>
            <span class="me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                    <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                </svg>
            </span>
            <span>
                <svg viewBox="0 0 152 152" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                    <g id="Layer_2" data-name="Layer 2">
                        <g id="_61.odnoklassniki" data-name="61.odnoklassniki">
                            <path d="m76 0a76 76 0 1 0 76 76 76 76 0 0 0 -76-76zm.08 38a19.24 19.24 0 1 1 -19.3 19.19 19.25 19.25 0 0 1 19.3-19.19zm21.54 46a23.13 23.13 0 0 1 -8.33 5.38 39.41 39.41 0 0 1 -9.45 2.12c.49.52.72.78 1 1.09 4.4 4.41 8.79 8.81 13.16 13.22a4.33 4.33 0 0 1 1 5.11 5.16 5.16 0 0 1 -4.86 3 4.69 4.69 0 0 1 -3.14-1.54c-3.31-3.32-6.67-6.59-9.91-10-.94-1-1.39-.8-2.22 0-3.33 3.43-6.7 6.79-10.1 10.14a4.22 4.22 0 0 1 -5.11.92 5.17 5.17 0 0 1 -3-4.76 4.74 4.74 0 0 1 1.6-3.2q6.49-6.48 13-13c.29-.29.55-.59 1-1-5.89-.61-11.2-2.06-15.75-5.62a20 20 0 0 1 -1.66-1.36 4.72 4.72 0 0 1 5.34-7.7 8.09 8.09 0 0 1 1.3.77 25.82 25.82 0 0 0 28.63.26 8 8 0 0 1 2.79-1.44 4.37 4.37 0 0 1 5 2c1.26 2.08 1.24 4.06-.29 5.61zm-21.57-17.35a9.42 9.42 0 1 0 -9.47-9.32 9.35 9.35 0 0 0 9.47 9.32z" fill="currentColor"></path>
                        </g>
                    </g>
                </svg>
            </span> --}}
        </span>
    </div>
</footer>