<div 
    id="basket-main-div" 
    class="basket-icon hidden" 
    data-bs-toggle="tooltip" 
    data-bs-placement="left" 
    data-bs-title="Tooltip on left">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#FFF" class="bi bi-bag" viewBox="0 0 16 16">
        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
    </svg>
    <div class="basket-count"></div>
</div>

<!-- Корзина -->
<div class="offcanvas offcanvas-end" style="width: 600px; box-shadow: 0px 0px 4px #000000;" tabindex="-1" id="basketOffcanvas" aria-labelledby="basketOffcanvasLabel">
    
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="basketOffcanvasLabel" style="font-size: 20px; font-weight: 600;">Ваш заказ</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body d-flex flex-nowrap flex-column py-2">
        <!-- список товаров -->
        <div id="orders-list" class="w-100"></div>
        <div class="w-100 d-flex flex-nowrap justify-content-end border-top" style="font-size: 14px; font-weight: 900;">
            <div>Сумма:</div>
            <div><span class="orderSumm ms-1">3380</span><span class="ms-1">₽</span></div>
        </div>
        <!-- форма заказа -->
        <div class="order-form w-100" style="font-size: 14px; line-height: 1.2;">
            <div class="form-check pt-3">
                <input class="form-check-input" style="width: 16px; height: 16px; border-radius: 3px; border-color: #CCC;" type="checkbox" value="" id="simpleOrder" checked>
                <style>
                  .form-check {
                      transition: .3s!important;
                  }
                  .form-check-input:checked {
                      background-color: #26F;
                      border-color: #000;
                      transition: .3s!important;
                  }
                  .form-check-input:hover {
                      cursor: pointer;
                  }
                </style>
                <label class="form-check-label" for="simpleOrder" style="padding-top: 3px;">Быстрый заказ</label>
                <style>
                  .form-check-label:hover {
                      cursor: pointer;
                  }
                  .form-check:hover .form-check-input {
                      border-color: #26F!important;
                  }

                  .form-check .form-check-input {
                      transition: .3s!important;
                  }
                </style>
            </div>

            <div class="input-group my-2">
                <span class="input-group-text rounded-0" id="order-phone" style="color: #000; font-size: 14px; width: 140px;">Телефон</span>
                <input id="input-order-phone1" type="text" style="font-size: 14px;" class="form-control rounded-0" aria-label="Username" aria-describedby="order-phone1">
            </div>

            <div id="order-form-name" class="input-group my-2">
                <span class="input-group-text rounded-0" id="order-name" style="color: #000; font-size: 14px; width: 140px;">Имя</span>
                <input id="input-order-name" type="text" style="font-size: 14px;" class="form-control rounded-0" aria-label="Username" aria-describedby="order-name">
            </div>

            <div id="order-form-adress" class="input-group my-2">
                <span class="input-group-text rounded-0" style="color: #000; font-size: 14px; width: 140px;">Адрес доставки</span>
                <textarea id="input-order-adress" class="form-control rounded-0" aria-label="With textarea" style="height: 80px; max-height: 160px; font-size: 14px;"></textarea>
            </div>

            <button id="order-button" type="button" class="w-100 btn btn-dark my-2 mt-0 fw-bold py-3 px-5" style="font-size: 14px; white-space: nowrap;">Заказать</button>
            <style>
              #order-button {
                  border-radius: 3px;
                  background: #26F;
                  border-color: #26F;
              }
              #order-button:hover {
                  background: #00F;
                  border-color: #00F;
              }
            </style>

        </div>
    </div>

</div>

<style>
  #basketOffcanvas {
    font-size: 20px;
    padding: 0px 40px 0px 40px;
  }

  #basketOffcanvas .btn-close {
    position: absolute;
    margin-left: -85px;
    margin-top: -10px;
  }

  #basketOffcanvas .offcanvas-body {
    padding-top: 0px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    line-height: 2;
    padding: 0px 0px 0px 0px;
  }

  #basketOffcanvas .offcanvas-body a {
    color: #000000;
    text-decoration: none;
  }

  #basketOffcanvas .offcanvas-header {
    padding: 11px 0px 11px 0px;
  }

  .offcanvas-body li {
    text-decoration: none;
    text-align: left;
    list-style-type: none;
  }

</style>