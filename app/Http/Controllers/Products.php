<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Illuminate\Support\Paginator;


class Products extends Controller
{
    const cookieUuidLifeTime = 60 /* $minutes = 60 * 24 * 365 * 10; // 10 years */;

    function paginateCollection($collection, $perPage, $pageName = 'page', $fragment = null) {
        $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage($pageName);
        $currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage);
        parse_str(request()->getQueryString(), $query);
        unset($query[$pageName]);
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $currentPageItems,
            $collection->count(),
            $perPage,
            $currentPage,
            [
                'pageName' => $pageName,
                'path' => \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPath(),
                'query' => $query,
                'fragment' => $fragment
            ]
        );
    
        return $paginator;
    }

    function checkCookieUuid() {
        $cookieUuid = Cookie::get('cookie-uuid');
        $uuid = ($cookieUuid != '') ? $cookieUuid : (string) Str::uuid();
        Config::set('cookie-uuid', $uuid);
    }

    public function showMain(){
        $this->checkCookieUuid();

        return response()
        ->view('main')
        ->cookie('cookie-uuid', Config::get('cookie-uuid'), Products::cookieUuidLifeTime);
    }
   
    public function showProjects($category_url, $url){
        $this->checkCookieUuid();
        // $category = DB::table('categories')
        // ->where('category_url', $category_url)
        // ->first();

        // $item = DB::table('catalog')
        // ->where('URL адрес', $url)
        // ->first();

        $item = DB::table('hierarchy_products')
        ->join('categories', 'categories.category_id', '=', 'hierarchy_products.parent_id')
        ->join('catalog', 'catalog.id', '=', 'hierarchy_products.product_id')
        ->where('categories.category_url', $category_url)
        ->where('catalog.URL адрес', $url)
        ->first();

        if ($item){
            return response()
            ->view('projects', ['product' => (array)$item])
            ->cookie('cookie-uuid', Config::get('cookie-uuid'), Products::cookieUuidLifeTime);
        }
        else {
            return view('errors.404');
        }
    }

    public function ProjectsshowAll(Request $request){
        $this->checkCookieUuid();

        // Log::debug(json_encode($request->cookie()));

        $id = 1;
        $items = DB::table('catalog')
        ->join('hierarchy_products', 'catalog.id', '=', 'hierarchy_products.product_id')
        ->where('hierarchy_products.parent_id', $id)
        ->orderBy('order_place')
        ->paginate(3);

        // $table = DB::table('catalog')->paginate(32);
        // $table = DB::table('catalog')->take(20)->get();
        return response()
        ->view('projects', ['products' => $items, 'id' => $id])
        ->cookie('cookie-uuid', Config::get('cookie-uuid'), Products::cookieUuidLifeTime);
    }


    public function showAll(Request $request){
        $this->checkCookieUuid();

        // Log::debug(json_encode($request->cookie()));

        $id = 0;
        $items = DB::table('catalog')
        ->join('hierarchy_products', 'catalog.id', '=', 'hierarchy_products.product_id')
        ->where('hierarchy_products.parent_id', $id)
        ->orderBy('order_place')
        ->paginate(40);

        // $table = DB::table('catalog')->paginate(32);
        // $table = DB::table('catalog')->take(20)->get();
        return response()
        ->view('products', ['products' => $items, 'id' => $id])
        ->cookie('cookie-uuid', Config::get('cookie-uuid'), Products::cookieUuidLifeTime);
    }

    public function show($category_url, $url){
        $this->checkCookieUuid();
        // $category = DB::table('categories')
        // ->where('category_url', $category_url)
        // ->first();

        // $item = DB::table('catalog')
        // ->where('URL адрес', $url)
        // ->first();

        $item = DB::table('hierarchy_products')
        ->join('categories', 'categories.category_id', '=', 'hierarchy_products.parent_id')
        ->join('catalog', 'catalog.id', '=', 'hierarchy_products.product_id')
        ->where('categories.category_url', $category_url)
        ->where('catalog.URL адрес', $url)
        ->first();

        if ($item){
            return response()
            ->view('product', ['product' => (array)$item])
            ->cookie('cookie-uuid', Config::get('cookie-uuid'), Products::cookieUuidLifeTime);
        }
        else {
            return view('errors.404');
        }
    }

    public function visited(Request $request){
        $item = DB::table('visited_list')
        ->where('product_id', $request->product_id)
        ->where('cookie_uuid', $request->cookie_uuid)
        ->get();

        if (count($item)){
            return response()->json([ 'server-answer' => "visit already exists." ]);
        }
        else {
            DB::table('visited_list')
            ->insert([
                'product_id' => $request->product_id,
                'cookie_uuid' => $request->cookie_uuid,
                'parent_id' => $request->parent_id,
            ]);
            return response()->json([ 'server-answer' => "visit added." ]);
        }
    }

    public function wished(Request $request){
        $item = DB::table('wish_list')
        ->where('product_id', $request->product_id)
        ->where('cookie_uuid', $request->cookie_uuid)
        ->get();

        if (count($item)){
            return response()->json([ 'server-answer' => "wished product already exists." ]);
        }
        else {
            DB::table('wish_list')
            ->insert([
                'category'    => $request->category,
                'product_id'  => $request->product_id,
                'cookie_uuid' => $request->cookie_uuid,
            ]);
            return response()->json([ 'server-answer' => "wished product added." ]);
        }
    }

    public function wishedDelete(Request $request){
        DB::table('wish_list')
        ->where('product_id', $request->product_id)
        ->where('cookie_uuid', $request->cookie_uuid)
        ->delete();
        return response()->json([ 'server-answer' => "wished deleted." ]);
    }

    public function wishedList() {
        $cookieUuid = Cookie::get('cookie-uuid');
        $list = DB::table('wish_list')
        ->join('catalog', 'catalog.id', '=', 'wish_list.product_id')
        ->where('wish_list.cookie_uuid', $cookieUuid)
        ->get();

        return response()->json([ 'wishedList' => $list ]);
    }

    public function showCategory($url){
        $this->checkCookieUuid();

        $category = DB::table('categories')
        ->where('category_url', $url)
        ->first();

        if ($category) {
            $id = $category->category_id;
        }
        else {
            $id = -1;
        }

        $items = DB::table('hierarchy_products')
        ->join('categories', 'categories.category_id', '=', 'hierarchy_products.parent_id')
        ->join('catalog', 'catalog.id', '=', 'hierarchy_products.product_id')
        ->where('hierarchy_products.parent_id', $id)
        ->orderBy('order_place')
        ->paginate(40);

        // Log::debug($id);

        // $table = DB::table('catalog')->paginate(32);
        // $table = DB::table('catalog')->take(20)->get();
        return response()
        ->view('products', ['category' => $category, 'products' => $items, 'id' => $id])
        ->cookie('cookie-uuid', Config::get('cookie-uuid'), Products::cookieUuidLifeTime);
    }

    public function showTags($url){
        $this->checkCookieUuid();

        $tag = DB::table('tags')
        ->where('property_url', $url)
        ->get()[0];

        $products = DB::table('hierarchy_products')
        ->join('categories', 'categories.category_id', '=', 'hierarchy_products.parent_id')
        ->join('catalog', 'catalog.id', '=', 'hierarchy_products.product_id')
        ->where($tag->property_name, 'like', "%{$tag->property_value}%")
        ->get();

        foreach($products as $key => $product) {
            $splitValues = explode(';', $product->{"{$tag->property_name}"});
            if (!in_array($tag->property_value, $splitValues)) {
                $products->forget($key);
            }
        }

        $products = $this->paginateCollection($products, 16);

        return response()
        ->view('tags', ['tag' => $tag, 'products' =>  $products ])
        ->cookie('cookie-uuid', Config::get('cookie-uuid'), Products::cookieUuidLifeTime);
    }
}
