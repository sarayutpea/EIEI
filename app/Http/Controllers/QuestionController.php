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
        $questions = QuestionHeader::all();
        return view('questions.index',compact('questions'));
    }

    public function create(){
        return view('questions.create');
    }

    public function store(){
        // dd(request()->all());
        $getAnswers = request()->answer;
        $getQuestions = request()->question;
        $getCorrect = request()->correctanswer;

        $header = new QuestionHeader;
        $header->title = request()->title;
        $header->description = request()->description;
        $header->save();
        $headerID = $header->id;

        $mergs = array_merge(['question'=>$getQuestions],['answer'=>$getAnswers]); // เอามา merg กันเพื่อให้ใส่ใน foreach ได้

        foreach(array_combine($mergs['question'], $mergs['answer']) as $question => $answer ){ // Foreach By key จากตัว merg

            $numCheckCorrert = array_search($question ,$getQuestions); // ค้นหา Key ของคำถาม จากการหาคำ ปัจจุบัน จะได้เป็น ตัวเลข

            $objQuestion = new Question; 
            $objQuestion->question_header_id = $headerID;
            $objQuestion->body = $question;
            $objQuestion->save();
            $questionID = $objQuestion->id;

            for($n=1;$n<=5;$n++){ // For สำหรับการบันทึกคำตอบ 5 ข้อ
                $objAnswer = new QuestionAnswer;
                $objAnswer->question_id = $questionID;
                $objAnswer->choice = $n;
                $objAnswer->body = $answer[$n];

                if($getCorrect[$numCheckCorrert] == $n){ //ถ้าข้อไหนถูกเลือกว่าถูกจะให้เป็น 1 $n คือหมายเลขข้อ และ $getCorrect จะเป็นหมายเลขข้อทีู่กต้อง สำหรับ คำถามนั้นๆ
                    $objAnswer->correct = 1; 
                }

                $objAnswer->save();
            }
        }
            
        return redirect('/questions');
    }


    public function show($id){
        $questionHeader = QuestionHeader::find($id);
        $questions = Question::where('question_header_id',$questionHeader->id)->get();
        
        $i=0;        
        foreach($questions as $question){
            
            $answers[$i] = QuestionAnswer::where('question_id',$questions[$i]->id)->get();
            $i++;
        }

        // return $questions;
        // return $answers[0];

        return view('questions.show',compact('questionHeader','questions','answers'));
    }

    public function checkpoint(){
        $questionHeaderID = request()->question_header_id;
        $questionID = request()->question_id;
        $selectedAnswers = request()->correctanswer;
        $correctAnswers = QuestionAnswer::where('correct', 1)->get()->toArray();
        
        $point = 0;
        $fail = 0;

        for($i=0;$i<=count($correctAnswers)-1;$i++){
            if($selectedAnswers[$i] == $correctAnswers[$i]['choice']){
                $point++;
            }else{
                $fail ++;
            }
        }

        // foreach(array_combine($selectedAnswers, $correctAnswers) as $selectedAnswer => $correctAnswer){
        //     $thisSelected = $selectedAnswer;
        //     $thisCorrect = $correctAnswer['choice'];

        //     if($thisSelected == $thisCorrect){
        //         $point++;
        //     }else{
        //         $fail ++;
        //     }
        // }
        

        // return count($selectedAnswers).'And'.count($correctAnswers);
        return 'ได้คะแนน'.$point.'ผิด'.$fail;
        // dd($selectedAnswers);
        // dd($correctAnswers);
        // dd($fail);
    }

}
