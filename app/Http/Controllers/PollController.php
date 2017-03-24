<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poll;

class PollController extends Controller
{
    //
    public function index(){
        $polls = Poll::all();

        return view('polls.index',compact('polls'));
    }
    public function create(){
        return view('polls.create');
    }

    public function show($id){
        $poll = Poll::find($id);
        $poll->items = $poll->pollItems()->get();

        return view('polls.show', compact('poll'));
    }

    public function store(){
        $this->validate(request(),[
            'title' => 'required',
            'description' => 'required'
        ]);

        $poll = new Poll;
        $poll->title = request()->title;
        $poll->description = request()->description;
        $poll->save();

        
        foreach(request()->pollItem as $pollItem){
            $pollColor = rand(100,9999999);
            $pollColor = base_convert($pollColor, 10, 16 ); //10 to 16
            $poll->addPollItem($poll->id, $pollItem, '#'.$pollColor);
        }
        
        return redirect('/polls');
    }


    public function edit($id){
        $poll = Poll::find($id);
        $pollItems = $poll->pollItems()->get();
        return view('polls.edit',compact('poll','pollItems'));
    }
    
    public function update($id){
        // dd(request()->all());
        $poll = Poll::find($id);
        $poll->title = request()->title;
        $poll->description = request()->description;
        $poll->save();

        $poll->pollItems()->delete();
        foreach(array_combine(request()->pollItem, request()->pollItemPoint) as $pollItem => $pollItemPoint){
            $pollColor = rand(100,9999999);
            $pollColor = base_convert($pollColor, 10, 16 ); //10 to 16
            $poll->updatePollItem($poll->id, $pollItem, '#'.$pollColor, $pollItemPoint);
        }
        return BAck();
    }




    public function destroy($id){
        $poll = Poll::find($id);
        $poll->pollItems()->delete();
        $poll->delete();

        return "delete: ".$id;
    }



    public function chartjs(){
        $id =  request()->id;
        $poll = Poll::find($id);
        $pollItemAll =  $poll->pollItems()->get();

        $pollItemArray = [];
        $i = 0; //push data to array
        foreach ($pollItemAll as $pollItem) {
            $pollItemBody[$i] = $pollItem->body;
            $pollItemColor[$i] = $pollItem->color; 
            $pollItemPoint[$i] = $pollItem->point;
            $i++;
        }


        // simple Data
        // $data = [
        //     'labels' => [
        //         "Red",
        //         "Blue",
        //         "Yellow"
        //     ],
        //     'datasets' => [
        //         [
        //             'data' => [300, 50, 100],
        //             'backgroundColor' => [
        //                 "#FF6384",
        //                 "#36A2EB",
        //                 "#FFCE56"
        //             ],
        //             'hoverBackgroundColor' => [
        //                 "#FF6384",
        //                 "#36A2EB",
        //                 "#FFCE56"
        //             ]
        //         ]
        //     ]
        // ];

        $data = [
            'labels' => $pollItemBody,
            'datasets' => [
                [
                    'data' => $pollItemPoint,
                    'backgroundColor' => $pollItemColor,
                    'hoverBackgroundColor' => $pollItemColor
                ]
            ]
        ];

        return response()->json($data);        
    }
}
