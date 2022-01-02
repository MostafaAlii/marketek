<?php

namespace Database\Seeders;
use App\Models\Provience;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProvienceTableSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('proviences')->truncate();
        Provience::factory()->count(3)->create();
        Schema::enableForeignKeyConstraints();
    }
}
