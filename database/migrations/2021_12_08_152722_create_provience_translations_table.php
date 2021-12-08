<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvienceTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provience_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provience_id')->unsigned()->nullable();
            $table->string('locale');
            $table->string('name');
            $table->unique(['provience_id', 'locale']);
            $table->foreign('provience_id')->references('id')->on('proviences')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provience_translations');
    }
}
