<div class="tags-list w-100 d-flex flex-nowrap align-items-center ps-5" style="font-size: 14px; overflow-x: scroll;" draggable="false">
    <?php
        $categories = DB::table('categories')
        ->join('hierarchy_category', 'categories.category_id', '=', 'hierarchy_category.category_id')
        ->where('parent_id', 0)
        ->orderBy('order_place')
        ->get();

        foreach ($categories as $category) {
            ?>
                <a href="/categories/{{$category->category_url}}" class="tags-list-item px-4 me-3 rounded-5" style="white-space:nowrap;">
                    {{$category->category_name}}
                </a>
            <?
        }
    ?>
</div>

<div class="tags-images w-100 d-flex flex-column">
    <?php
        foreach ($categories as $category) {
            $categoryImage = $category->category_image != "" ? "/public/{$category->category_image}" : getImageNoPhoto();
            ?>
                <a class="category-image-wrapper w-100" href="/categories/{{$category->category_url}}" target="_blank">
                    <img src="{{$categoryImage}}" style="width: 100%; z-index: 1;">
                    <div class="category-image-text">
                        {{$category->category_name}}
                        <span class="ms-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FFF" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                            </svg>
                        </span>
                    </div>
                </a>
            <?
        }
    ?>
</div>

<style>
    .category-image-wrapper {
        border-top: 1px solid #000;
        border-bottom: 1px solid #000;
        margin-bottom: 80px;
    }

    .category-image-text {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #FFF;
        text-decoration: none;
        font-weight: 600;
        text-transform: uppercase;
        width: 100%;
        overflow-x: hidden;
        background: #0000007F;
        z-index: 2;
    }

    .category-image-text:hover {
        color: #FFF;
    }

    .category-image-text:hover span{
        animation: moveRight 1.0s linear infinite;
    }

    @keyframes moveRight {
        100% {transform: translateX(50px);}
    }

    .tags-list::-webkit-scrollbar { /* chrome based */
        width: 0;  /* ширина scrollbar'a */
        height: 0;
        background: transparent;  /* опционально */
    }

    .tags-list {
        -ms-overflow-style: none;  /* IE 10+ */
        scrollbar-width: none; /* Firefox */
        /*border-bottom: 1px solid #000;*/
        height: 60px;
    }

    .tags-list .tags-list-item {
        height: 35px;
        display: flex;
        align-items: center;
        text-decoration: none;
        background: #000;
        color: #FFF;
        border: 1px solid #000;
        transition: 0.3s;
    }

    .tags-list .tags-list-item.active{
        background: #000;
        color: #FFF;
    }

    .tags-list .tags-list-item:hover.active{
        background: #000;
        color: #FFF;
    }

    .tags-list .tags-list-item:hover {
        background: #CCC;
        border: 1px solid #CCC;
        color: #000;
    }

    .tags-list-item.tags-list-item-mobile {
        display: none;
    }

    @media (min-width: 940px) {
        .category-image-text {
            font-size: 60px;
            height: 100px;
            margin-top: -100px;
        }

        .category-image-wrapper svg {
            width: 64px;
            height: 64px;
        }
    }    

    @media (min-width: 0px) and (max-width: 939px) {
        .tags-list {
            margin-left: -40px;
        }

        .category-image-text {
            font-size: calc( (100vw - 320px)/(940 - 320) * (60 - 25) + 25px);
            height: calc( (100vw - 320px)/(940 - 320) * (100 - 50) + 50px);
            margin-top: calc((100vw - 320px)/(940 - 320) * (50 - 100) - 50px);
        }

        .category-image-wrapper svg {
            width: calc( (100vw - 320px)/(940 - 320) * (64 - 25) + 25px);
            height: calc( (100vw - 320px)/(940 - 320) * (64 - 25) + 25px);
        }
    }

</style>