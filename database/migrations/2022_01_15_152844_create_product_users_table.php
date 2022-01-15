<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateProductUsersTable extends Migration
{
    public function up()
    {
        Schema::create('product_users', function (Blueprint $table) {
            //$table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->primary(['product_id', 'user_id']);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_users');
    }
}
