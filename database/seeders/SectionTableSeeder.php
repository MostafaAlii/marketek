<?php
namespace Database\Seeders;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
class SectionTableSeeder extends Seeder
{
    public function run() {
        DB::table('sections')->delete();
        Section::factory()->count(250)->create();
    }
}
