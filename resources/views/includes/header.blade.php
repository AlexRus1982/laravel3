<nav class="w-100 {{--start--}}" style="height: 50px; border-bottom: 1px solid #000000;">
  <div class="w-100 p-0" {{--style="max-width: 1200px;"--}}>
    
    {{--<button class="navbar-toggler me-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>--}}
    
    <div class="{{--collapse navbar-collapse--}} d-flex flex-row w-100 px-5 mobile-padding-10" id="navbarSupportedContent">
      
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
        ->join('hierarchy_category', 'categories.category_id', '=', 'hierarchy_category.category_id')
        ->where('parent_id', $parentId)
        ->orderBy('order_place')
        ->get();

        $dropToggle = (count($categories) > 0) ? "dropdown-toggle" : "";
        $dropMenu = (count($categories) > 0) ? true : false;
      ?>

      <div class="nav-item" style="margin-left: -14px;" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
        {{-- <svg width="32" height="32" focusable="false" aria-hidden="true" viewBox="0 0 24 24" tabindex="-1" fill="currentColor">
          <path d="M20 9H4v2h16V9zM4 15h16v-2H4v2z"></path>
        </svg> --}}

        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="50" height="13" viewBox="0 0 50 13" fill="none"> 
          <line y1="0.5" x2="50" y2="0.5" stroke="black"></line>
          <line y1="12.5" x2="50" y2="12.5" stroke="black"></line>
        </svg>  --}}
      </div>

      {{--
      <div class="nav-item desktop-element" style="margin-left: -14px;" data-bs-toggle="offcanvas" data-bs-target="#headerCatalog" aria-controls="headerCatalog">
        Товары
      </div>

      <div class="nav-item desktop-element" data-bs-toggle="offcanvas" data-bs-target="#headerServices" aria-controls="headerServices">
        Услуги
      </div>--}}

      <a class="navbar-brand d-flex flex-grow-1 justify-content-center align-items-center" href="/" style="height:50px;">
          @php
            $logoBase = DB::table('seo_params')->pluck('store_logo')->first();
            $logoPath = isset($logoBase) ? "/public/{$logoBase}" : "/public/images/logo_20201215105638.png";
          @endphp
          <img src="{{$logoPath}}" alt="logo" style="height: 22px;"/>
      </a>

      {{--
      <div class="nav-item desktop-element" data-bs-toggle="offcanvas" data-bs-target="#headerSearching" aria-controls="headerSearching">
        Поиск
      </div>

      <div class="nav-item desktop-element" style="margin-right: -14px;" data-bs-toggle="offcanvas" data-bs-target="#headerContacts" aria-controls="headerContacts">
        Контакты
      </div>
      --}}

      <div class="nav-item mobile-element" style="margin-right: -10px;" data-bs-toggle="offcanvas" data-bs-target="#headerSearching" aria-controls="headerSearching">
        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
          <line x1="0.646447" y1="26.253" x2="10.5459" y2="16.3536" stroke="black"></line>
          <circle cx="17" cy="10" r="9.5" stroke="black"></circle>
        </svg>
      </div>

      <div class="nav-item desktop-element" style="margin-right: 0px;" data-bs-toggle="offcanvas" data-bs-target="#headerSearching" aria-controls="headerSearching">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
        {{-- <svg width="32" height="32" focusable="false" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor" style="transform: scaleX(-1);">
          <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
        </svg> --}}
        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
          <line x1="0.646447" y1="26.253" x2="10.5459" y2="16.3536" stroke="black"></line>
          <circle cx="17" cy="10" r="9.5" stroke="black"></circle>
        </svg> --}}
      </div>

      <div class="nav-item desktop-element" style="margin-right: -10px;" data-bs-toggle="offcanvas" data-bs-target="#headerContacts" aria-controls="headerContacts">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
          <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
        </svg>
        {{-- <img src="/public/images/bubble-chat.png"> --}}
      </div>

    </div>

  </div>
</nav>

<!-- Мобильное меню -->
<div class="offcanvas offcanvas-start" style="max-width: 275px; box-shadow: 0px 0px 4px #000000;" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="mobileMenuLabel"></h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="accordion w-100" id="accordionExample">

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Каталог
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <div><a class='dropdown-item d-flex flex-row w-100 justify-content-start' href='/categories/'>Все товары</a></div>
            @php
              foreach($categories as $category){
                echo "<div><a class='dropdown-item d-flex flex-row w-100 justify-content-start' href='/categories/{$category->category_url}'>{$category->category_name}</a></div>";
              }
            @endphp
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Услуги
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            @php
              $items = DB::table('services')->get();
              foreach($items as $key => $value){
                $value = (array)$value;
                $pageUrl = "/service/{$value['url']}";
                $pageName = $value['page_name'];
                echo "<div class='d-flex flex-row w-100 justify-content-start'><a href='{$pageUrl}'>{$pageName}</a></div>";
              }
            @endphp
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Каталог -->
<div class="offcanvas offcanvas-start" style="max-width: 300px; box-shadow: 0px 0px 4px #000000;" tabindex="-1" id="headerCatalog" aria-labelledby="headerCatalogLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="headerCatalogLabel"></h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div><a class='dropdown-item' href='/categories/'>Каталог</a></div>
    @php
      foreach($categories as $category){
        echo "<div><a class='dropdown-item' href='/categories/{$category->category_url}'>{$category->category_name}</a></div>";
      }
    @endphp
  </div>
</div>

<!-- Услуги -->
<div class="offcanvas offcanvas-start" style="max-width: 300px; box-shadow: 0px 0px 4px #000000;" tabindex="-1" id="headerServices" aria-labelledby="headerServicesLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="headerServicesLabel"></h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    @php
      $items = DB::table('services')->get();
      foreach($items as $key => $value){
        $value = (array)$value;
        $pageUrl = "/service/{$value['url']}";
        $pageName = $value['page_name'];
        echo "<div><a href='{$pageUrl}'>{$pageName}</a></div>";
      }
    @endphp
  </div>
</div>

<!-- Поиск -->
<div class="offcanvas offcanvas-top" style="max-height: 120px; background: #AAA;" tabindex="-1" id="headerSearching" aria-labelledby="headerSearchingLabel">
  <div class="offcanvas-header" style="padding: 12px 15px 12px 15px;">
    <h5 class="offcanvas-title" id="headerSearchingLabel"></h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body py-1">
    <form class="d-flex justify-content-center mb-0" role="search" method="GET" action="{{route('search')}}">
      <input class="form-control rounded-0" type="search" placeholder="Поиск" aria-label="Поиск" style="height: 40px; max-width: 50%; padding: 0px 5px 0px 5px; border-radius: 3px;" name="searchProducts">
      <button class="btn btn-outline-primary" type="submit" style="margin: 3px 0px 0px 5px; padding: 2px 10px 5px 10px; height: 34px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
      </button>
    </form>
  </div>
</div>

<!-- Контакты -->
<div class="offcanvas offcanvas-end" style="min-width: 600px; box-shadow: 0px 0px 4px #000000;" tabindex="-1" id="headerContacts" aria-labelledby="headerContactsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="headerContactsLabel"></h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="image" style="width: 100px; height: 100px; border-radius: 50%;">
      <img src="/public/images/photo_2023-02-20_12-13-17.jpg" alt="logo" style="width: 100px; height: 100px; border-radius: 50%; border: 1px solid #00F; overflow: hidden;">
    </div>
    <div class="image" style="position: absolute; width: 15px; height: 15px; border-radius: 50%; background: #0F0; margin: 80px 0px 0px 75px;"></div>
    <div class="fw-bold my-4" style="font-size: 20px; text-align: left; line-height: 31px;">
      Никаких автоответчиков и роботов<br>
      Только живое общение
    </div>
    <div class="mb-4" style="text-align: left; font-size:14px; line-height: 22px;">
      Меня зовут Сергей, и я знаю почти все о товарах на сайте.<br>
      Помогу вам с выбором идеальной консоли, отвечу на все вопросы.<br>
      Просто напишите мне в мессенджеры.
    </div>
    <button type="button" class="btn btn-primary w-100 my-3">Написать в ватсап</button>
    <button type="button" class="btn btn-primary w-100 my-3">Написать в Телеграм</button>
    <button type="button" class="btn btn-primary w-100 my-3">Заказать обратный звонок</button>

    <div class="mt-5" style="text-align: left; font-size:14px; line-height: 22px;">
      Емейл: smit21@list.ru
    </div>

    {{-- <ul style="margin-left: -30px;">
      <li><a href="#">Telegram</a></li>
      <li><a href="#">WhatsApp</a></li>
      <li><a href="#">E-mail</a></li>
    </ul> --}}
  </div>
</div>

<style>
  #headerCatalog,
  #headerServices, 
  #headerContacts {
    font-size: 20px;
  }

  #mobileMenu {
    font-size: 16px;
  }

  #headerCatalog .btn-close,
  #headerServices .btn-close {
    position: absolute;
    margin-left: 295px;
    margin-top: 10px;
  }

  #mobileMenu .btn-close {
    position: absolute;
    margin-left: 270px;
    margin-top: 10px;
  }  

  #headerContacts .btn-close {
    position: absolute;
    margin-left: -55px;
    margin-top: 10px;
  }

  #mobileMenu .offcanvas-body,
  #headerCatalog .offcanvas-body,
  #headerServices .offcanvas-body, 
  #headerContacts .offcanvas-body {
    padding-top: 0px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    line-height: 2;
    padding: 15px 20px 20px 40px;
  }

  #mobileMenu .offcanvas-body {
    line-height: 1.75;
    padding: 15px 10px 10px 10px;
  }

  #mobileMenu .offcanvas-body a,
  #headerCatalog .offcanvas-body a,
  #headerServices .offcanvas-body a, 
  #headerContacts .offcanvas-body a {
    color: #000;
    text-decoration: none;
  }

  #mobileMenu .offcanvas-body a:hover,
  #headerCatalog .offcanvas-body a:hover,
  #headerServices .offcanvas-body a:hover, 
  #headerContacts .offcanvas-body a:hover {
    color: var(--accent-color1);
  }

  #mobileMenu .offcanvas-header,
  #headerCatalog .offcanvas-header,
  #headerServices .offcanvas-header, 
  #headerContacts .offcanvas-header {
    padding: 11px 12px 11px 10px;
  }

  .navbar-brand:hover {
    cursor: pointer;
  }

  a.nav-link {
    color: #000;
  }

  .nav-item {
    height: 50px;
    display: flex;
    align-items: center;
    padding: 0px 10px 0px 10px;
    transition: 0.3s;
  }

  .nav-item:hover {
    cursor: pointer;
    /*background: #00F;*/
    color: #FFF;
  }

  .nav-item:hover path {
      color: #00F;
  }

  .nav-item:hover .nav-link {
    color: #FFF;
  }

  .dropdown:hover .dropdown-menu {
    display: block;
    margin-top: 0;
  }

  .offcanvas-body li {
    text-decoration: none;
    text-align: left;
    list-style-type: none;
  }

  #headerSearching.show {
    margin-top: 49px;
  }

  #headerContacts .btn {
    height: 55px;
  }

  #headerContacts .offcanvas-body {
      padding: 20px 40px 20px 40px;
  }

  @media (min-width: 0px) and (max-width: 767px) {
    .mobile-element {
      display: flex;
    }

    .desktop-element {
      display: none;
    }
  }

  @media (min-width: 768px) {
    .mobile-element {
      display: none;
    }

    .table-element {
      display: flex;
    }
  }
</style>