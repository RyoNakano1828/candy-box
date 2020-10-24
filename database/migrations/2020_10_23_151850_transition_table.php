<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransitionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transitions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questionary_id')->unsigned();
            $table->foreign('questionary_id')->references('id')->on('questionaries')->onDelete('cascade');
            $table->string('page_name')->nullable();
            $table->string('stay_time')->nullable();
            $table->integer('transition_num')->nullable();
            $table->string('next_action')->nullable();
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
