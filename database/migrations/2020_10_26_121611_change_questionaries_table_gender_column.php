<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeQuestionariesTableGenderColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionaries', function (Blueprint $table) {
            $table->enum('gender',[1,2])->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *  
     * @return void
     */
    public function down()
    {
        Schema::table('questionaries', function (Blueprint $table) {
            $table->enum('gender',[1,2])->nullable(false)->change();
        });
    }
}
