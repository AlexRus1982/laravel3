class ProductScript {

    constructor(){
        console.log(this.constructor.name);
        this.MakeKeys();
        // this.MakeImages();
        this.SetVisited();
        this.MakeSlider();
    }

    SetVisited() {
        $.ajax({
            url : '/visited',
            type : "PUT",
            data : {
                _token      : $('meta[name="csrf-token"]').attr('content'),
                cookie_uuid : $('meta[name="cookie-uuid"]').attr('content'),
                product_id  : $('meta[name="product-id"]').attr('content'),
                parent_id   : $('meta[name="category-id"]').attr('content'),
            },
            success : (response) => {
                console.debug(response);
            },
        });
    }

    MakeKeys(){
        $('.make-question').off('click');
        $('.make-question').on('click', ()=>{
            $('#questionOffcanvas').offcanvas('show');
        });

        $('.make-review').off('click');
        $('.make-review').on('click', ()=>{
            $('#reviewOffcanvas').offcanvas('show');
        });
    }

    MakeImages(){
        let imagesHTML = `
            <div>
                <style>
                    .preloader {
                        position: fixed;
                        top: 0px;
                        left: 0px;
                        bottom: 0px;
                        right: 0px;
                        background: #FFFFFFFF;
                        opacity: 1.0;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        transition: 1.0s;
                        z-index: 100000;
                    }

                    .preloader.off {
                        opacity: 0.0;
                    }

                    .preloader svg {
                        animation-name: rotation;
                        animation-duration: 2s;
                        animation-iteration-count: infinite;
                        animation-timing-function: linear;
                    }

                    @keyframes rotation {
                        0% {
                            transform:rotate(0deg);
                        }
                        100% {
                            transform:rotate(360deg);
                        }
                    }
                </style>
        `;
        
        const preloaderHTML = `
            <div class="preloader">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-yin-yang" viewBox="0 0 16 16">
                    <path d="M9.167 4.5a1.167 1.167 0 1 1-2.334 0 1.167 1.167 0 0 1 2.334 0Z"/>
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM1 8a7 7 0 0 1 7-7 3.5 3.5 0 1 1 0 7 3.5 3.5 0 1 0 0 7 7 7 0 0 1-7-7Zm7 4.667a1.167 1.167 0 1 1 0-2.334 1.167 1.167 0 0 1 0 2.334Z"/>
                </svg>
            </div>
        `;

        const imagesList = $('lazy_image');
        let images = ``;

        console.log(imagesList);
        
        $(imagesList).each((index, element) => {
            const url = $(element).attr('src');
            console.log($(element));
            images += `
                <img src="${url}">
            `;
        });
        imagesList.remove();

        imagesHTML += images;
        imagesHTML += `</div>`;

        $('table').after(imagesHTML);
    }

    MakeSlider() {
        this.slider = $('#card-images-mobile');
        this.isDown = false;
        this.startX;
        this.scrollLeft;
        this.scrollTo;
    
        console.debug('MakeSlider', this.slider);
        
        this.slider.on('mousedown', (e) => {
          this.isDown = true;
          this.slider.addClass('active');
          this.startX = e.pageX - this.slider.offset().left;
          this.scrollLeft = this.slider.scrollLeft();
          console.debug('Slider mouse down');
        });

        this.slider.on('mouseleave', () => {
            this.isDown = false;
            this.slider.removeClass('active');
        });

        this.slider.on('mouseup', () => {
            this.isDown = false;
            this.slider.removeClass('active');
        });

        this.slider.on('mousemove', (e) => {
            if(!this.isDown) return;
            e.preventDefault();
            const x = e.pageX - this.slider.offset().left;
            const walk = (x - this.startX) * 3; //scroll-fast
            this.slider.scrollLeft(this.scrollLeft - walk);
        });
    }

}

new ProductScript();