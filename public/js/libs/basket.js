export class Basket {

    orderSumm  = 0;
    orderCount = 0;

    order_hash = null;

    constructor() {
        $('.info-panel').append($('.basket-icon'));
        this.MakeKeys();

        this.tooltip = new bootstrap.Tooltip($('#basket-main-div')[0]);

        if ($('.basket-icon').length == 0) return;
        this.UpdateBasket();
        this.OrderCheck();
    }

    OrderCheck(){
        let isSimple = $('#simpleOrder').prop('checked');
        if (isSimple) {
            $('#order-form-name').hide();
            $('#order-form-adress').hide();
        }
        else {
            $('#order-form-name').show();
            $('#order-form-adress').show();
        }
    }

    UpdateBasket() {
        try {
            window.query.Post(
                "/api/order/hash",
                { token: window.api_token, session_id : window.session_id },
                (data) => {
                    if(data.indexOf('Ошибка') < 0) {
                        this.order_hash = data;
                        // console.debug("order-hash --->", data);
                    }
                    this.GetCount();
                },
                false
            );
        } catch (e) {
            console.warn(e);
        }

        // setInterval(()=>{
        //     this.UpdateBasket();
        // }, 10000);
    }

    RenderList(list){

        let that = this;

        if (list.length == 0) {
            $('#basketOffcanvas').offcanvas('hide');
            return;
        }

        let orderSumm = 0;
        let orderCount = 0;
        let itemsHTML = '';

        for(const key in list){
            const item = list[key];
            orderSumm += parseInt(item['quantity']) * parseInt(item['Цена']);
            orderCount += parseInt(item['quantity']);

            const photoList = item['Фото товара'];
            let photoURL = "https://fakeimg.pl/128x128/EEEEEE/7F7F7F/?text=NO IMAGE&font=kelson";
            if (photoList != ""){
                let photo = photoList.split(';')[0];
                // let idx = photo.lastIndexOf(".");
                // if (idx > -1)
                //     photo = photo.substr(0, idx) + "_small" + photo.substr(idx);

                //photoURL = `http://konsol-stol.ru/${photo}`;
                photoURL = `${photo}`;
            }
            
            // console.info(item);

            let formatedPrice = utils.NumberWithSpaces(item['Цена']);
            const props = {
                'item-title'    : item['Наименование'],
                'item_id'       : item['product_id'],
                'item_category' : item['category'],
                'item-url'      : item['URL адрес'],
                'item-img'      : photoURL,
                'item-desc'     : item['Описание'],
                'item-quantity' : item['quantity'],
                'item-price'    : formatedPrice,
            };
            
            let orderItem = componentsManager.GetHtmlComponent('orderItem', props);
            orderItem = $(orderItem);
            let option = orderItem.find(`option[value="${item['quantity']}"]`);
            option.attr('selected', '');
            itemsHTML += orderItem[0].outerHTML;
        }
        
        this.orderSumm = orderSumm;
        this.orderCount = orderCount;

        $('#orders-list').empty().append(itemsHTML);
        $('#basketOffcanvas .orderSumm').empty().append(utils.NumberWithSpaces(orderSumm));
        $('#basketOffcanvas .orderCount').empty().append(orderCount);


        $('.orderItem-close-button svg').off('click');
        $('.orderItem-close-button svg').on('click', function(){
            const item_id = $(this).parent().attr('item_id');
            try {
                window.query.Post(
                    "/api/basket/remove",
                    { 
                        order_hash : that.order_hash,
                        itemId : item_id,
                    },
                    () => {
                        that.UpdateList(); 
                        that.GetCount();
                    },
                    false
                );
            } catch (e) {
                console.warn(e);
            }
        });

        $('select').off('change');
        $('select').on('change', function(){
            const item_id = $(this).attr('item_id');
            const quantity = $(this).val();
            $.ajax({
                url     : "/api/basket/set",
                type    : "POST",
                data    : {
                    order_hash : that.order_hash,
                    itemId     : item_id,
                    quantity   : quantity,
                },
                success : response => {
                    that.UpdateList(); 
                    that.GetCount();
                },
                error   : e => console.debug("Ошибка", e)
            });
        });

    }

    UpdateList(){
        try {
            window.query.Post(
                "/api/basket/list",
                { token: window.api_token, order_hash : `${this.order_hash}`, },
                (data) => {
                    this.RenderList(JSON.parse(data));
                },
                false
            );
        } catch (e) {
            console.warn(e);
        }
    }

    MakeList(){
        try {
            window.query.Post(
                "/api/basket/list",
                { token: window.api_token, order_hash : `${this.order_hash}`, },
                (data) => {
                    this.RenderList(JSON.parse(data));
                    // $('#basketModal').modal('show');
                    $('#basketOffcanvas').offcanvas('show');
                },
                false
            );
        } catch (e) {
            console.warn(e);
        }
    }

    MakeKeys(){
        let that = this;
        $('.basketButton').off('click');
        $('.basketButton').on('click', function(event){
            const item_id = $(this).attr('item_id');
            const item_category = $(this).attr('item_category');
            // basket.AddItem(item_id);
            // this.MakeList();

            $.ajax({
                url     : "/api/basket/add",
                type    : "POST",
                data    : { 
                    order_hash : `${that.order_hash}`,
                    itemId     : item_id,
                    category   : item_category,
                },
                success : response => {
                    that.GetCount();
                    that.MakeList();
                },
                error   : (e)=>console.warn('error', e),
            });

            event.stopPropagation();
            event.preventDefault();
        });

        $('.basket-icon').off('click');
        $('.basket-icon').on('click', ()=>{
            this.MakeList();
        });

        $('#basketModal .modal-body').off('click');
        $('#basketModal .modal-body').on('click', (event)=>{
            const target = $(event.target);
            if (target.hasClass('card-close-button')){
                const item_id = target.attr('item_id');
                if (item_id != ""){
                    try {
                        window.query.Post(
                            "/api/basket/remove",
                            { 
                                order_hash : `${this.order_hash}`,
                                itemId : item_id,
                            },
                            (data) => {
                                this.UpdateList(); 
                                this.GetCount();
                            },
                            false
                        );
                    } catch (e) {
                        console.warn(e);
                    }
                }
            }
        });

        $('#input-order-phone1').off('keyup');
        $('#input-order-phone1').on('keyup', ()=>{
            const phoneVal = $('#input-order-phone1').val();
        });

        $('#order-button').off('click');
        $('#order-button').on('click', ()=>{
            $('#basketModal').modal('hide');
            setTimeout(()=>{
                try {
                    window.query.Post(
                        "/api/order/close",
                        { 
                            'token'        : `${window.api_token}`, 
                            'session_id'   : `${window.session_id}`,
                            'order_hash'   : `${this.order_hash}`, 
                            'city'         : 'Москва',
                            'phone_number' : $('#input-order-phone1').val(),
                            'name'         : $('#input-order-name').val(),
                            'adress'       : $('#input-order-adress').val(),
                            'order_summ'   : this.orderSumm,
                        },
                        (data) => {
                            window.gestId = data;
                            this.GetCount();
                            alert(`Заказ принят`);
                        },
                        false
                    );
                } catch (e) {
                    console.warn(e);
                }
            }, 300);
        });

        $('#simpleOrder').off('input');
        $('#simpleOrder').on('input', ()=>{
            this.OrderCheck();
        });

    }

    GetCount() {
        if (this.order_hash == null) return;
        try {
            window.query.Post(
                "/api/basket/getcount",
                { token: window.api_token, order_hash : `${this.order_hash}`, },
                (responce) => {
                    responce = JSON.parse(responce);
                    $('.basket-count')[0].innerHTML = responce.count;
                    
                    const tooltip = bootstrap.Tooltip.getInstance('#basket-main-div');
                    const sumPrice = utils.NumberWithSpaces(responce.sumPrice);
                    tooltip.setContent({ '.tooltip-inner': `= ${sumPrice} руб` });

                    if (parseInt(responce.count) > 0) {
                        $('.basket-icon').removeClass('hidden');
                    }
                    else {
                        $('.basket-icon').addClass('hidden');
                    }
                },
                false
            );
        } catch (e) {
            //console.warn(e);
        }
    }

    UpdateResultOrder() {
        try {
            window.query.Post(
                "/api/basket/list",
                { token: window.api_token, order_hash : `${this.order_hash}`, },
                (data) => {
                    const list = JSON.parse(data);
                    let orderSumm = 0;
                    let orderCount = 0;
            
                    for(const key in list){
                        const item = list[key];
                        orderSumm += parseInt(item['quantity']) * parseInt(item['Цена']);
                        orderCount += parseInt(item['quantity']);
                    }
                    
                    $('#basketModal .orderSumm').empty().append(orderSumm);
                    $('#basketModal .orderCount').empty().append(orderCount);
                },
                false
            );
        } catch (e) {
            console.warn(e);
        }
    }

    AddItem(itemId) {
        if (this.order_hash == null) return;
        try {
            window.query.Post(
                "/api/basket/add",
                { 
                    order_hash : `${this.order_hash}`,
                    itemId : itemId,
                },
                (data) => {
                    this.GetCount();
                },
                false
            );
        } catch (e) {
            console.warn(e);
        }
    }
}