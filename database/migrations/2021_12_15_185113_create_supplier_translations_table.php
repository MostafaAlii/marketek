<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id')->unsigned();
            $table->string('locale');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name')->unique();
            $table->longtext('address_primary')->nullable();
            $table->longtext('address_secondry')->nullable();
            $table->longtext('description')->nullable();
            $table->unique(['supplier_id', 'locale']);
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_translations');
    }
}
