<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('locale')->index();

            $table->unsignedBigInteger('section_id');
            $table->unique(['section_id', 'locale']);

            $table->string('name');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('section_translations');
    }
}
