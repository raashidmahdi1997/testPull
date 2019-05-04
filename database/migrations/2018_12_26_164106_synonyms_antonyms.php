<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SynonymsAntonyms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('synonyms_antonyms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('word_task_id')->unsigned();
            $table->foreign('word_task_id')->references('id')->on('word_tasks');
            $table->integer('english_word_id')->unsigned();
            $table->foreign('english_word_id')->references('id')->on('dictionary');
            $table->integer('synonym_word_id')->unsigned();
            $table->foreign('synonym_word_id')->references('id')->on('dictionary');
            $table->integer('antonym_word_id')->unsigned();
            $table->foreign('antonym_word_id')->references('id')->on('dictionary');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('synonyms_antonyms');
    }
}
