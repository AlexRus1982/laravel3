<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller {

    public function index() {
        // $post = Post::approved()->orderBy('updated_at', 'desc')->first();
        // $category = Category::approvedPosts()->orderBy('updated_at', 'desc')->first();
        // $tag = Tag::approvedPosts()->orderBy('updated_at', 'desc')->first();
    
        return response()->view('sitemap.index', [
            'category' => [],
        ])->header('Content-Type', 'text/xml');
    }
 
    // public function posts()
    // {
    //     $posts = Post::approved()->orderBy('updated_at', 'desc')->get();
    //     return response()->view('sitemap.posts', [
    //         'posts' => $posts,
    //     ])->header('Content-Type', 'text/xml');
    // }
 
    // public function categories()
    // {
    //     $categories = Category::approvedPosts()->orderBy('updated_at', 'desc')->get();
    //     return response()->view('sitemap.categories', [
    //         'categories' => $categories,
    //     ])->header('Content-Type', 'text/xml');
    // }

    // public function tags()
    // {
    //     $tags = Tag::approvedPosts()->orderBy('updated_at', 'desc')->get();
    //     return response()->view('sitemap.tags', [
    //         'tags' => $tags,
    //     ])->header('Content-Type', 'text/xml');
    // }
}
