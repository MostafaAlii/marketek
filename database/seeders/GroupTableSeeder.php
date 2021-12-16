<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Group;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('groups')->truncate();
        Group::factory()->count(3)->create();
        Schema::enableForeignKeyConstraints();
    }
}
