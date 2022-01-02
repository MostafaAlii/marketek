<?php
namespace Database\Seeders;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CountryTableSeeder extends Seeder
{
    public function run() {
        Schema::disableForeignKeyConstraints();
        DB::table('countries')->truncate();
        Country::factory()->count(3)->create();
        Schema::enableForeignKeyConstraints();
    }
}
