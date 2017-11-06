<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrivasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('trivas', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('categories_id');
            $table->string('question');
            $table->string('answers');
            $table->string('correct');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
        Schema::table('trivas', function (Blueprint $table) {

            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trivas');
    }
}
