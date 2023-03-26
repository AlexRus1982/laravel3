<div class="tags-list mb-4 d-flex flex-nowrap" style="font-size: 14px; overflow-x: scroll;" draggable="false">
    {{--
    <a href="/tags/all" class="tags-list-item tags-list-item-mobile active mb-2 px-3 py-1 rounded-0" style="white-space:nowrap;">
        Все
    </a>
    --}}
    <?php
        $tags = DB::table('tags')
        ->orderBy('property_order')
        ->get();

        foreach ($tags as $tag) {
            $name = str_replace('Свойство: ', '', $tag->property_name);
            $value = ($tag->tag_alias != '') ? $tag->tag_alias : $tag->property_value;
            ?>
                <a href="/tags/{{$tag->property_url}}" class="tags-list-item mb-2 px-3 py-1 rounded-0" style="white-space:nowrap;">
                    {{--$name--}}{{$value}}
                </a>
            <?
        }
    ?>

    {{--<div class="filter-list-icon-button ms-auto px-3 py-1 rounded-0">Фильтр</div>--}}

</div>

<style>
    .tags-list::-webkit-scrollbar { /* chrome based */
        width: 0;  /* ширина scrollbar'a */
        height: 0;
        background: transparent;  /* опционально */
    }

    .tags-list {
        width: 1400px;
        display: flex;
        justify-content: flex-start;
        margin-left: auto;
        margin-right: auto;
        -ms-overflow-style: none;  /* IE 10+ */
        scrollbar-width: none; /* Firefox */
    }

    .tags-list .tags-list-item {
        height: 40px;
        display: flex;
        align-items: center;
        text-decoration: none;
        background: #FFF;
        color: #000;
        border: 1px solid #939598;
        border-right: none;
        transition: 0.3s;
    }

    .tags-list .tags-list-item:first-child {
        border-top-left-radius: 5px !important;
        border-bottom-left-radius: 5px !important;
    }

    .tags-list .tags-list-item:last-child {
        border-top-right-radius: 5px !important;
        border-bottom-right-radius: 5px !important;
    }

    .tags-list .tags-list-item.active{
        background: #000;
        color: #FFF;
    }

    .tags-list .tags-list-item:hover.active{
        background: #000;
        color: #FFF;
    }

    .tags-list .tags-list-item:nth-last-child(1) {
        border-right: 1px solid #939598;
    }

    .tags-list .tags-list-item:hover {
        background: #CCC;
    }

    .tags-list-item.tags-list-item-mobile {
        display: none;
    }

    @media (min-width: 0px) and (max-width: 939px) {
        .tags-list {
            margin-left: 10px;
            margin-right: 10px;
        }
    }

</style>