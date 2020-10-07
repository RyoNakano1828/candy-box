<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectedCandiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selected_candies', function (Blueprint $table) {
            $table->id();
            $table->integer('questionary_id')->unsigned();
            $table->foreign('questionary_id')->references('id')->on('questionaries')->onDelete('cascade');
            $table->integer('candy_id')->unsigned();
            $table->foreign('candy_id')->references('id')->on('candies')->onDelete('cascade');
            $table->integer('category_id')->unsigned();
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
        Schema::dropIfExists('selected_candies');
    }
}
