<?php
namespace Database\Seeders;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();
        $admin = Admin::create([
            'name'          =>  'Mostafa Alii',
            'email'         =>  'admin@app.com',
            'password'      =>  bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);
    }
}
