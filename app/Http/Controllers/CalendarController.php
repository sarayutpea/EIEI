<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //
    public function index(){
        return view('calendars.index');
    }
    public function create(){
        return view('calendars.create');
    }
    public function store(){
        

        
    }
    
}
