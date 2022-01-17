<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); // Require
            $table->string('phone')->nullable();
            $table->string('email')->unique()->nullable();
            $table->decimal('discount',8,2)->nullable();
            $table->string('code')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('image')->default('default_avatar.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('status')->default(1);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->double('location')->nullable();
            $table->rememberToken();
            $table->timestamps();

            // Group Relations
            $table->foreignId('group_id')->nullable()->references('id')->on('groups')->onDelete('cascade');
            // Categories Relations
            $table->integer('subCategory_id')->unsigned()->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            // Country Relationship
            $table->integer('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            // Proviences Relationship
            $table->integer('provience_id')->unsigned()->nullable();
            $table->foreign('provience_id')->references('id')->on('proviences')->onDelete('cascade');
            // City Still Waiting
            $table->integer('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('city')->onDelete('cascade');
            // Area Relationship
            $table->integer('area_id')->unsigned()->nullable();
            $table->foreign('area_id')->references('id')->on('area')->onDelete('cascade');
            // Currency Relationship
            //$table->integer('currency_id')->unsigned();
            $table->foreignId('currency_id')->nullable()->references('id')->on('currencies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
