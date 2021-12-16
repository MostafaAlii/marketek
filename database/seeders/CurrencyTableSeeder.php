<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Currency;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class CurrencyTableSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('currencies')->truncate();
        Currency::factory()->count(3)->create();
        Schema::enableForeignKeyConstraints();
    }
}
