<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QuestionHeader;
use App\Question;
use App\QuestionAnswer;

class QuestionController extends Controller
{
    //

    public function index(){

        return view('questions.index');
    }

    public function create(){
        return view('questions.create');
    }

    public function store(){
        dd(request()->all());

        $getAnswers = request()->answer;
        $getQuestions = request()->question;
        $getCorretAnswer = request()->correctanswer;

        $header = new QuestionHeader;
        $header->title = request()->title;
        $header->description = request()->description;
        $header->save();
        $headerID = $header->id;

        $mergs = array_merge(['question'=>$getQuestions],['answer'=>$getAnswers],['correct_anwser'=>$getCorretAnswer]);

        foreach(array_combine($mergs['question'], $mergs['answer']) as $question => $answer ){

            $objQuestion = new Question;
            $objQuestion->question_header_id = $headerID;
            $objQuestion->body = $question;
            $objQuestion->save();
            $questionID = $objQuestion->id;

            for($n=1;$n<=5;$n++){
                $objAnswer = new QuestionAnswer;
                $objAnswer->question_id = $questionID;
                $objAnswer->body = $answer[$n];
                
                $objAnswer->correct = 0;


                $objAnswer->save();
            }
            
        }
            
        return true;
    }
}
