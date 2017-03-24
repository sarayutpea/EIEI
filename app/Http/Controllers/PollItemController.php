<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Poll;
use App\PollItem;

class PollItemController extends Controller
{
    //
    public function addPoint(){
        $id = request()->id;
        $pollItem = PollItem::find($id);
        $pollItem->point = (int)$pollItem->point + 1  ;
        $pollItem->save();
        return $id;
    }
    
}
