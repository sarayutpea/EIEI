<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article; //import Model
use App\Comment;

class CommentController extends Controller
{
    //
    public function store(Article $article){
        $this->validate(request(),['body' => 'required']); //validate form request

        // dd($article->id);        
        $article->addComment(request('body'));

        return Back();   
    }
}
