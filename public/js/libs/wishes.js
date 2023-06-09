export class Wishes {

    orderSumm  = 0;
    orderCount = 0;

    order_hash = null;

    constructor() {
        $('.info-panel').append($('.wishes-icon'));
        this.MakeKeys();
        
        if ($('.wishes-icon').length == 0) return;
        this.UpdateWishes();
    }

    UpdateWishes() {
        $.ajax({
            url : '/wished/list',
            type : "GET",
            data : {
                _token : $('meta[name="csrf-token"]').attr('content'),
            },
            success : (response) => {
                // console.debug(response.wishedList);
                this.RenderList(response.wishedList);
            },
        });

        // setInterval(()=>{
        //     this.UpdateWishes();
        // }, 10000);
    }

    RenderList(list){

        if (list.length == 0) {
            $('#wishesOffcanvas').offcanvas('hide');
            $('.wishes-icon').addClass('hidden');
            return;
        }

        $('.wishes-icon').removeClass('hidden');

        let orderCount = list.length;
        let itemsHTML = '';

        for(const key in list){
            const item = list[key];
            console.debug(item);

            const photoList = item['Фото товара'];
            // console.debug(photoList);
            let photoURL = "https://fakeimg.pl/128x128/EEEEEE/7F7F7F/?text=NO IMAGE&font=kelson";
            if (photoList != ""){
                let photo = photoList.split(';')[0];
                // let idx = photo.lastIndexOf(".");
                // if (idx > -1)
                //     photo = photo.substr(0, idx) + "_small" + photo.substr(idx);

                photoURL = `http://konsol-stol.ru/${photo}`;
            }
            
            let formatedPrice = utils.NumberWithSpaces(item['Цена']);
            const props = {
                'item-title'    : item['Наименование'],
                'item_id'       : item['id'],
                'item_category' : item['category'],
                'item-url'      : item['URL адрес'],
                'item-img'      : photoURL,
                'item-desc'     : item['Описание'],
                'item-quantity' : item['quantity'],
                'item-price'    : formatedPrice,
            };
            
            itemsHTML += componentsManager.GetHtmlComponent('wishedItem', props);
        }
        
        this.orderCount = orderCount;

        let that = this;
        
        $('#wishes-list').empty().append(itemsHTML);
        $('#wishesOffcanvas .orderCount').empty().append(orderCount);
        $('.wishes-icon .wishes-count').empty().append(orderCount);

        $('.wishItem-close-button').off('click');
        $('.wishItem-close-button').on('click', function(){
            const item_id = $(this).attr('item_id');
            $.ajax({
                url : '/wished/delete',
                type : "DELETE",
                data : {
                    _token      : $('meta[name="csrf-token"]').attr('content'),
                    cookie_uuid : $('meta[name="cookie-uuid"]').attr('content'),
                    product_id  : item_id,
                },
                success : (response) => {
                    that.UpdateWishes();
                },
            });
        });
    }

    MakeKeys(){
        let that = this;
        $('.wishButton').off('click');
        $('.wishButton').on('click', function(event){
            const item_id = $(this).attr('item_id');
            const item_category = $(this).attr('item_category');

            if ($(this).hasClass('wishset')){
                $.ajax({
                    url : '/wished/delete',
                    type : "DELETE",
                    data : {
                        _token      : $('meta[name="csrf-token"]').attr('content'),
                        cookie_uuid : $('meta[name="cookie-uuid"]').attr('content'),
                        product_id  : item_id,
                    },
                    success : (response) => {
                        $(this).removeClass('wishset');
                        that.UpdateWishes();
                    },
                });
            }
            else {
                $.ajax({
                    url : '/wished',
                    type : "PUT",
                    data : {
                        _token      : $('meta[name="csrf-token"]').attr('content'),
                        cookie_uuid : $('meta[name="cookie-uuid"]').attr('content'),
                        category    : item_category,
                        product_id  : item_id,
                    },
                    success : (response) => {
                        $(this).addClass('wishset');
                        that.UpdateWishes();
                    },
                });
            }

            // basket.AddItem(item_id);
            // alert(`${item_id} - wish`);

            // $(this).toggleClass('wishset');

            event.stopPropagation();
            event.preventDefault();
        });

        $('.wishes-icon').off('click');
        $('.wishes-icon').on('click', ()=>{
            this.UpdateWishes();
            $('#wishesOffcanvas').offcanvas('show');
        });

        $('#wishesModal .modal-body').off('click');
        $('#wishesModal .modal-body').on('click', (event)=>{
            const target = $(event.target);
            if (target.hasClass('card-close-button')){
                const item_id = target.attr('item_id');
                if (item_id != ""){
                    $.ajax({
                        url : '/wished/delete',
                        type : "DELETE",
                        data : {
                            _token      : $('meta[name="csrf-token"]').attr('content'),
                            cookie_uuid : $('meta[name="cookie-uuid"]').attr('content'),
                            product_id  : item_id,
                        },
                        success : (response) => {
                            that.UpdateWishes();
                        },
                    });
                }
            }
        });
    }

}