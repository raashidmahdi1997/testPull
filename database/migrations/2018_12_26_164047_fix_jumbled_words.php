<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixJumbledWords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fix_jumbled_sentences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sentence_task_id')->unsigned();
            $table->foreign('sentence_task_id')->references('id')->on('sentence_tasks');
            $table->integer('english_sentence_id')->unsigned();
            $table->foreign('english_sentence_id')->references('id')->on('english_sentences');
            $table->string('explanation');
            $table->softDeletes();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('FIX_JUMBLED_SENTENCE');
    }
}
