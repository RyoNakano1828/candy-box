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
            $table->integer('family');
            $table->integer('money');
            $table->integer('margin');
            $table->integer('it');
            $table->integer('plan');
            $table->integer('impulse');
            $table->integer('cheap');
            $table->integer('repeat');
            $table->integer('sale');
            $table->integer('sweet');
            $table->integer('spicy');
            $table->integer('sour');
            $table->integer('salty');
            $table->integer('stress');
            $table->integer('sake');
            $table->integer('work');
            $table->integer('guilty');
            $table->integer('new_item');
            $table->integer('ec_frequency');
            $table->integer('eat_frequency');
            $table->integer('sweets_time');
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
