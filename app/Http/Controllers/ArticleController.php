<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
     public function index()
    {
        $articles = Article::latest()->get();
        return view('articlePage', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);

        $relatedArticles = Article::where('id', '!=', $id)
            ->latest()
            ->take(5)
            ->get();

        return view('detailArticle', compact('article', 'relatedArticles'));
    }
}
