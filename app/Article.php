<?php

namespace App;

use App\Comment;
// use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public function comments(){
        return $this->hasMany(Comment::class); // สร้างการเชื่มต่อของ Class one to many
    }

    public function addComment($body){

        // dd($this->id);

        $this->comments()->create(compact('body'));
        // Comment::create([
        //     'body'=> $body,
        //     'article_id' => $this->id
        // ]);

        // $this->comments()->create(compact('body')); // เมื่อสร้างการเชื่อมต่อแล้ว สามารถสร้างด้วย compact ได้เลย

    }
}
