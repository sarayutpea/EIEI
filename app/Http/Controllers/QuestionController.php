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
                $objAnswer->body = $answer[$n];

                if($getCorrect[$numCheckCorrert] == $n){ //ถ้าข้อไหนถูกเลือกว่าถูกจะให้เป็น 1 $n คือหมายเลขข้อ และ $getCorrect จะเป็นหมายเลขข้อทีู่กต้อง สำหรับ คำถามนั้นๆ
                    $objAnswer->correct = 1; 
                }

                $objAnswer->save();
            }
        }
            
        return $numCheckCorrert;
    }
}
