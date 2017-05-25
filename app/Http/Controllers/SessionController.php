<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class SessionController extends Controller
{
    //
    public function index(){
    	request()->session()->put('name', 'sarayut jansoda');

    	return session()->all();
        // return session('name');
    }

}
