<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
class SupplierTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Supplier::factory()->count(200)->create();
    }
}
