<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\PseudoTypes\True_;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('events', function (Blueprint $tb) {
            $tb->increments('id');
            $tb->string('title', 100);
            $tb->longText('description');
            $tb->date('date_event');
            $tb->integer('user_id')->unsigned();
            $tb->foreign('user_id')->references('id')->on('users');
            $tb->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('events');
    }
}
