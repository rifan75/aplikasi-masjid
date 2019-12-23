<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_donations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('donations_id')->unsigned();
            $table->string('name')->nullable();
            $table->bigInteger('amount')->unsigned()->default(0);
            $table->date('date')->nullable();
            $table->text('note')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('donations_id')->references('id')->on('donations'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_donations');
    }
}
