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
    public function addPollItem($poll_id, $body){
        $this->pollItems()->create(compact('poll_id', 'body'));
    }
    // public function removePollItem(){
    //     $this->pollItems()->delete();
    // }
}
