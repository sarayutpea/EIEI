<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;

class CalendarController extends Controller
{
    //
    public function index(){
        $calendars = Calendar::latest()->get();

        return view('calendars.index', compact('calendars'));
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

    public function edit($id){
        $calendar = Calendar::find($id);
        if(is_null($calendar->allDay)){
            $calendar->time = "selected";
            $calendar->day = "";
        }else{
            $calendar->time = "";
            $calendar->day = "selected";
        }


        return view('calendars.edit', compact('calendar'));
    }

    public function update($id){
        $calendar = Calendar::find($id);
        $calendar->title = request()->title;
        $calendar->start = request()->start;
        $calendar->end = request()->end;
        $calendar->allDay = request()->allDay;
        $calendar->color = request()->color;
        $calendar->textColor = request()->textColor;


        $calendar->save();

        return Back();
    }
    
}
