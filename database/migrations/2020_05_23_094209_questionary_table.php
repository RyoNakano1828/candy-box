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
            $table->integer('how_many');
            $table->integer('Q1');
            $table->integer('Q2');
            $table->integer('Q3');
            $table->integer('Q4');
            $table->integer('Q5');
            $table->integer('Q6');
            $table->integer('Q7');
            $table->integer('Q8');
            $table->integer('Q9');
            $table->integer('Q10');
            $table->integer('Q11');
            $table->integer('Q12');
            $table->integer('Q13');
            $table->integer('Q14');
            $table->integer('Q15');
            $table->integer('Q16');
            $table->integer('Q17');
            $table->integer('Q18');
            $table->integer('Q19');
            $table->integer('Q20');
            $table->integer('Q21');
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
