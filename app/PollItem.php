<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\Poll;
class PollItem extends Model
{
    //
    public function poll(){
        return $this->belongsTo(Poll::class);
    }
}
