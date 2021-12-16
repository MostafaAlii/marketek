<?php
namespace Database\Seeders;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
class ImageTableSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('images')->truncate();
        Image::factory()->count(200)->create();
        Schema::enableForeignKeyConstraints();
    }
}
