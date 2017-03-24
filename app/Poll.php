<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\PollItem;
class Poll extends Model
{
    //
    public function pollItems(){
        return $this->hasMany(PollItem::class);
    }
    public function addPollItem($poll_id, $body, $color){
        $this->pollItems()->create(compact('poll_id', 'body', 'color'));
    }

    public function updatePollItem($poll_id, $body, $color, $point){
        $this->pollItems()->create(compact('poll_id', 'body','color', 'point'));
    }


}
