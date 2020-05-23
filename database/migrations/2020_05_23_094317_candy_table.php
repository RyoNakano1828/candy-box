<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CandyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->integer('weight')->nullable();
            $table->integer('category_id')->unsigned();
            // $table->foreign('category_id')->references('id')->on('categories');
            $table->string('score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
