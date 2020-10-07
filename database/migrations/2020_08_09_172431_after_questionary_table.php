<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AfterQuestionaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('after_questionaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questionary_id')->unsigned();
            $table->foreign('questionary_id')->references('id')->on('questionaries')->onDelete('cascade');
            $table->integer('indecisive')->nullable();
            $table->integer('consent')->nullable();
            $table->integer('assessment')->nullable();
            $table->string('other_candy')->nullable();
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
        //
    }
}
