<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::with('category', 'images')
            ->published()
            ->featured()
            ->latest('published_at')
            ->take(3)
            ->get();

        $latestArticles = Article::with('category', 'tags')
            ->published()
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('home', compact('featuredProducts', 'latestArticles'));
    }
}

