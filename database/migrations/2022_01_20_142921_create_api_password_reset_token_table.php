<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiPasswordResetTokenTable extends Migration
{
    public function up()
    {
        Schema::create('api_password_reset_token', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('token_signature');
            $table->integer('token_type')->default(10);
            $table->integer('used_token')->nullable();
            $table->timestamp('expired_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('api_password_reset_token');
    }
}
