<div class="subcategories-list mb-4 d-flex flex-column" style="font-size: 14px;">
    <?php
        $categories = DB::table('categories')
        ->join('hierarchy_category', 'categories.category_id', '=', 'hierarchy_category.category_id')
        ->where('parent_id', $categoryInfo->category_id)
        ->orderBy('order_place')
        ->get();
        foreach($categories as $category){
            ?>
                <div><a class="" href="/categories/{{$category->category_url}}">{{$category->category_name}}</a></div>
            <?
        }
    ?>
</div>