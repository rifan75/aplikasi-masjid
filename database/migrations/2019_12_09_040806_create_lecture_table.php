<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecture', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('scholar');
            $table->string('title')->nullable();
            $table->string('category');
            $table->boolean('status')->default(1);
            $table->boolean('type')->default(1);
            $table->date('date')->nullable();
            $table->string('day')->nullable();
            $table->time('from')->nullable();
            $table->time('untill')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('lecture');
    }
}
