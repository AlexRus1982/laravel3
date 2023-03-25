class ProductsScript {

    constructor(){
        console.log(this.constructor.name);
        this.MakeKeys();
        this.CheckShowMoreButton();

        $.fn.attachDragger = function(){
            var attachment = false, lastPosition, position, difference;
            $( $(this).selector ).on("mousedown mouseup mousemove",function(e){
                if( e.type == "mousedown" ) attachment = true, lastPosition = [e.clientX, e.clientY];
                if( e.type == "mouseup" ) attachment = false;
                if( e.type == "mousemove" && attachment == true ){
                    position = [e.clientX, e.clientY];
                    difference = [ (position[0]-lastPosition[0]), (position[1]-lastPosition[1]) ];
                    $(this).scrollLeft( $(this).scrollLeft() - difference[0] );
                    $(this).scrollTop( $(this).scrollTop() - difference[1] );
                    lastPosition = [e.clientX, e.clientY];
                }
            });
            $(window).on("mouseup", function(){
                attachment = false;
            });
        }
        
        $(".tags-list-item").attachDragger();

        const updateFiltrSortElementPosition = function() {

            let viewHeight = document.body.clientHeight; // Высота экрана 
            let viewWidth = document.body.clientWidth; // Ширина экрана

            let elementHeight = $('#filtr-sort-container').height();
            let elementWidth = $('#filtr-sort-container').width();

            const showMoreButtonTop = $("#show-more-button").first().offset().top - $(this).scrollTop();
            const diffHeight = showMoreButtonTop - viewHeight;

            let elementTop = viewHeight - elementHeight - 40;
            if (diffHeight < 0) {
                elementTop += diffHeight;
            }
            let elementLeft = (viewWidth - elementWidth) * 0.5;

            $('#filtr-sort-container').css('top', `${elementTop}px`);
            $('#filtr-sort-container').css('left', `${elementLeft}px`);

            // $('#sortDialog').css('margin-left', `${(elementLeft + 70)}px`);
            // $('#sortDialog').css('margin-top', `${(elementTop - 640)}px`);

            // console.debug(sortDialogHeight);
        };
        updateFiltrSortElementPosition($(window));

        $(window).on('scroll', updateFiltrSortElementPosition);
        $(window).on('resize', updateFiltrSortElementPosition);
    }

    MakeKeys(){
        $('tbody').off('click');
        $('tbody').click(event => {
            const tableLine = $(event.target).parent();
            const url = tableLine.attr('link');
            window.open(url, '_blank').focus();
        });

        $('.filter-list-icon-button').off('click');
        $('.filter-list-icon-button').on('click', ()=>{
            $('#filterEdit').offcanvas('show');
        });

        $('#filter-show-button').off('click');
        $('#filter-show-button').on('click', ()=>{
            $('#filterEdit').offcanvas('hide');
        });

        $('.sort-list-icon-button').off('click');
        $('.sort-list-icon-button').on('click', ()=>{
            let x = $('.sort-list-icon-label').offset().left - 225 - $(document).scrollLeft();
            let y = $('.sort-list-icon-label').offset().top + 30 - $(document).scrollTop();
            $('#sortDialog.modal .modal-dialog').css('margin-left', x);
            $('#sortDialog.modal .modal-dialog').css('margin-top', y);

            $('#sortDialog').modal('show');
        });

        $('#show-more-button').off('click');
        $('#show-more-button').on('click', ()=>{
            const pageItems = $('.page-item');
            let pageItemActive = null;
            pageItems.each((index, element) => {
                if ($(element).hasClass('active')){
                    pageItemActive = $(element);
                    console.debug(index);
                    return false;
                }
            });

            if (pageItemActive) {
                const link = pageItemActive?.next()?.find('.page-link').attr('href');
                
                if (!link) {
                    return;
                }

                $.ajax({
                    url : link,
                    type : "GET",
                    success : (response) => {
                        const newPage = $().add(response);
                        
                        const newPaggination = newPage.find('.paggination').first();
                        $('.paggination').replaceWith(newPaggination);
                        
                        const newList4InLine = newPage.find('.list-4-in-line').first();
                        $('.list-4-in-line').append(newList4InLine.prop('innerHTML'));

                        const newList3InLine = newPage.find('.list-3-in-line').first();
                        $('.list-3-in-line').append(newList3InLine.prop('innerHTML'));
                        
                        const newList2InLine = newPage.find('.list-2-in-line').first();
                        $('.list-2-in-line').append(newList2InLine.prop('innerHTML'));
                        
                        const newList1InLine = newPage.find('.list-1-in-line').first();
                        $('.list-1-in-line').append(newList1InLine.prop('innerHTML'));

                        this.CheckShowMoreButton();
                    },
                });
            }
        });
    }

    CheckShowMoreButton() {
        const lastPage = $('.page-item').last().hasClass('disabled');
        if (lastPage) {
            $('#show-more-button').hide();
        }
    }

}

new ProductsScript();