<?php
namespace Database\Seeders;
use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AreaTableSeeder extends Seeder
{
    public function run() {
        Schema::disableForeignKeyConstraints();
        DB::table('area')->truncate();
        Area::factory()->count(3)->create();
        Schema::enableForeignKeyConstraints();
    }
}
