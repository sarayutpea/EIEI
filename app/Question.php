<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use App\QuestionHeader;
use App\QuestionAnswer;

class Question extends Model
{
    //

    public function questionHeader(){
        return $this->belongsTo(QuestionHeader::class);
    }

    public function answers(){
        return $this->hasMany(QuestionAnswer::class);
    }

    public function addAnswer($body,$correct){
        $correct = 0; //simulate default
        $this->answers()->create(compact('body','correct'));
    }
}
