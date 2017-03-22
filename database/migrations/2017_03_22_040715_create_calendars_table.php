<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('allDay')->nullable(); //true is "T", false is ""
            $table->string('start'); // 2017-03-21T04:08:54+00:00
            $table->string('end'); // 2017-03-21T04:08:54+00:00
            // $table->string('url'); // URL
            // $table->string('className'); // CSS Class
            // $table->string('editable'); //true false
            // $table->string('startEditable'); //true false
            // $table->string('durationEditable'); //true false
            // $table->string('resourceEditable'); //true false
            $table->string('rendering')->default('invers-background');
            // $table->string('overlap'); //true false
            // $table->string('constraint'); // businessHours
            // $table->string('source');
            $table->string('color')->default('#673ab7');
            // $table->string('backgroundColor')->default('#673ab7');
            // $table->string('borderColor')->default('#673ab7');
            $table->string('textColor')->default('#ffffff');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendars');
    }
}
