<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use App\Question;

class QuestionAnswer extends Model
{
    //
    public function question(){
        return $this->belongsTo(Question::class,'question_id');
    }

}
