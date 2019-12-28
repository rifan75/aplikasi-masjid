<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_cost', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cost_id')->unsigned();
            $table->string('name');
            $table->date('date');
            $table->bigInteger('amount')->unsigned()->default(0);
            $table->string('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cost_id')->references('id')->on('cost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_cost');
    }
}
