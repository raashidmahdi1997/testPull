<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SentenceMatching extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentence_matching', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sentence_task_id')->unsigned();
            $table->foreign('sentence_task_id')->references('id')->on('sentence_tasks');
            $table->integer('translation_id')->unsigned();
            $table->foreign('translation_id')->references('id')->on('translations');
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
        Schema::dropIfExists('sentence_matching');
    }
}
