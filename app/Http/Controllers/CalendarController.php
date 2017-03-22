<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;

class CalendarController extends Controller
{
    //
    public function index(){
        return view('calendars.index');
    }
    public function create(){
        return view('calendars.create');
    }

    public function show(){
        $calendar = Calendar::latest()->get();
        return response()->json($calendar);
    }
    public function store(){
        $calendar = new Calendar;
        $calendar->title = request()->title;
        $calendar->start = request()->start;
        $calendar->end = request()->end;
        $calendar->allDay = request()->allDay;
        $calendar->color = request()->color;
        $calendar->textColor = request()->textColor;


        $calendar->save();

        return redirect('/calendars');


    }
    
}
