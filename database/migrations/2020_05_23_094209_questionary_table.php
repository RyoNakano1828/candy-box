<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuestionaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionaries', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('gender',[1,2]);
            $table->integer('age');
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('emotion_info');
            $table->string('personality_info');
            $table->string('hobby_info');
            $table->string('eat_info');
            $table->string('music_info');
            $table->string('work_info');
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
