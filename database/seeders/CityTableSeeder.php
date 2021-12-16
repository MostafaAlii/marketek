<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class CityTableSeeder extends Seeder
{
    public function run() {
        Schema::disableForeignKeyConstraints();
        DB::table('city')->truncate();
        City::factory()->count(3)->create();
        Schema::enableForeignKeyConstraints();
    }
}
