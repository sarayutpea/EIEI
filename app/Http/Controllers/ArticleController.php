<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index(){
        return view('articles.index');
    }

    public function create(){
        return view('articles.create');
    }

    public function store(Article $article){
        // dd(request()->all());
        Article::create(request()->all());
        return redirect('/artcles');
    }
}
