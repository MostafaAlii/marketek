<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateAvatarsTable extends Migration
{
    public function up()
    {
        Schema::create('avatars', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->integer('avatarable_id');
            $table->string('avatarable_type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('avatars');
    }
}
