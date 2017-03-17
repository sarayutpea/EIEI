<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles') );
    }

    public function create(){
        return view('articles.create');
    }

    public function show($id){
        $article = Article::find($id);
        return view('articles.show', compact('article'));
    }

    public function store(Article $article){
        // dd(request()->all());
        // Validate
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        Article::create(request(['title', 'body']));
        return redirect('/articles');
    }

    
}
