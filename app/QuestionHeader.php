<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\Question;

class QuestionHeader extends Model
{
    //
    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function addQuestion($body){
        $this->questions()->create(compact('body'));
        // return $this->questions()->id;

    }

}
