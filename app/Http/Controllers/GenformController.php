<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenformController extends Controller
{
    //
    public function index(){
        return view('genforms.index');
    }

    public function create(){
        return view('genforms.create');
    }
    
    public function store(){
        dd(request()->all());
        return view('genforms.index');
    }
}
