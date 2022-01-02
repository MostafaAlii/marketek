<?php
namespace Database\Seeders;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SupplierTableSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('suppliers')->truncate();
        Supplier::factory()->count(2000)->create();
        Schema::enableForeignKeyConstraints();
    }
}
