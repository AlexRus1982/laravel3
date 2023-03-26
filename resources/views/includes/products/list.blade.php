@if (count($products) > 0)

    @include('includes.products.list-fragment', ['products' => $products, 'fragment' => 4])
   <!-- @include('includes.products.list-fragment', ['products' => $products, 'fragment' => 3])
    @include('includes.products.list-fragment', ['products' => $products, 'fragment' => 2])
    @include('includes.products.list-fragment', ['products' => $products, 'fragment' => 1])-->

    <div class="show-more-button-wrapper" style="width:1400px; margin-left:auto;margin-right:auto">
        <button id="show-more-button" type="button" class="w-100 btn btn-dark m-0 fw-bold py-3 px-5">Показать ещё</button>
    </div>

    <div class="paggination pt-3 pb-4 " style="width:1400px; overflow-x: auto;margin-left:auto;margin-right:auto">
        {{ $products->appends(['products' => request()->products])->links() }}
    </div>

    <style>
        .show-more-button-wrapper{
            margin-left: auto;
            margin-right: auto;
            width: 1400px;
        }
        .paggination{
            margin-left: auto;
            margin-right: auto;
            width: 1400px;  
        }

        #show-more-button {
            background: #F1F2F2;
            color: #000;
            height: 100px;
            font-size: 14px;
            border-color: white;
            border-radius: 10px;
            white-space: nowrap;
            transition: 0.3s;
        }
        
        #show-more-button:hover {
            background: #26F;
            color: #FFF;
        }

        .list-4-in-line,
        .list-3-in-line,
        .list-2-in-line,
        .list-1-in-line {
            display: none;
        }

        @media (min-width: 1760px) {
            .list-4-in-line {
                display: block;
            }

            .list-3-in-line,
            .list-2-in-line,
            .list-1-in-line {
                display: none;
            }
        }

        @media (min-width: 1350px) and (max-width: 1759px) {
            .list-4-in-line,
            .list-2-in-line, 
            .list-1-in-line,{
                display: none;
            }

            .list-3-in-line {
                display: block;
            }
        }

        @media (min-width: 940px) and (max-width: 1349px) {
            .list-4-in-line,
            .list-3-in-line,
            .list-1-in-line {
                display: none;
            }

            .list-2-in-line {
                display: block;
            }
        }

        @media (min-width: 0px) and (max-width: 939px) {
            .list-4-in-line,
            .list-3-in-line,
            .list-2-in-line {
                display: none;
            }

            .list-1-in-line {
                display: block;
            }
        }

        @media (min-width: 940px) {
            .product-divider {
                padding-top: 1rem;
                padding-bottom: 1rem;
            }

        }

        @media (min-width: 0px) and (max-width: 939px) {
            .product-divider {
                padding-top: 0;
                padding-bottom: 0;
            }

            .paggination,
            .show-more-button-wrapper {
                padding-left: 10px;
                padding-right: 10px;
            }
        }
    </style>
@endif