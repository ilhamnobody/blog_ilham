<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $totalArticles = Article::count();
        $totalCategories = Category::count();
        $publishedArticles = Article::whereNotNull('published_at')->count();
        $recentArticles = Article::with('category')->latest()->limit(5)->get();

        return view('admin.dashboard', compact(
            'totalArticles',
            'totalCategories',
            'publishedArticles',
            'recentArticles'
        ));
    }
}