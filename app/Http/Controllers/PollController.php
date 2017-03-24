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

        // return $poll;
        return view('polls.show', compact('poll'));
    }

    public function store(){
        $poll = new Poll;
        $poll->title = request()->title;
        $poll->description = request()->description;
        $poll->save();

        $i = 0;
        foreach(request()->pollItem as $pollItem ){
            $poll->addPollItem($poll->id, $pollItem);
            $i++;
        }
        
        return redirect('/polls');
    }
    public function destroy($id){
        $poll = Poll::find($id);
        $poll->pollItems()->delete();
        $poll->delete();

        return "delete: ".$id;
    }






    public function chartjs(){
        // simple Data
        $data = [
            'labels' => [
                "Red",
                "Blue",
                "Yellow"
            ],
            'datasets' => [
                [
                    'data' => [300, 50, 100],
                    'backgroundColor' => [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56"
                    ],
                    'hoverBackgroundColor' => ["#FF6384",
                        "#36A2EB",
                        "#FFCE56"
                    ]
                ]
            ]
        ];

        return response()->json($data);        
    }
}
