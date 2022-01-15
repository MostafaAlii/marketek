<?php
namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class ProductTableSeeder extends Seeder {
    public function run() {
        Schema::disableForeignKeyConstraints();
        DB::table('products')->delete();
        Product::factory()->count(250)->create();
        Schema::enableForeignKeyConstraints();
    }
}
