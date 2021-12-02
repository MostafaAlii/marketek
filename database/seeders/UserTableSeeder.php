<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $user = User::create([
            'name'          =>  'Mostafa',
            'email'         =>  'user@app.com',
            'password'      =>  bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);
    }
}
