<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumeAgreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume_agree', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('resume_id')->unsigned();
            $table->foreign('resume_id')->references('id')->on('content_lecture'); 
            $table->bigInteger('user_id')->unsigned();
            $table->boolean('agree');
            $table->dateTime('date');
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
        Schema::dropIfExists('resume_agree');
    }
}
