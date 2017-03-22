<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PollController extends Controller
{
    //
    public function index(){
        return view('polls.index');
    }
    public function create(){
        return view('polls.create');
    }
}
