<?php
namespace Database\Seeders;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
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
