<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with(['category', 'user'])
            ->whereNotNull('published_at')
            ->latest('published_at');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        $articles = $query->paginate(6);
        $categories = Category::withCount('articles')->get();

        return view('home.index', compact('articles', 'categories'));
    }

    public function show($slug)
    {
        $article = Article::with(['category', 'user'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedArticles = Article::where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->whereNotNull('published_at')
            ->limit(3)
            ->get();

        return view('home.show', compact('article', 'relatedArticles'));
    }
}