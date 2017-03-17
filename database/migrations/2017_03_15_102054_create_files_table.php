<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->default(0);
            $table->string('title');
            $table->text('description');
            $table->string('path');
            $table->string('hash_name');
            $table->string('original_name');
            $table->string('type');
            $table->string('size');
            $table->integer('download')->default(0);
            $table->integer('publish')->default(0);

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
        Schema::dropIfExists('files');
    }
}
