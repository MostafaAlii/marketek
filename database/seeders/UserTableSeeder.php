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
        DB::table('users')->delete();
        $user = User::create([
            'first_name'          =>  'Mostafa',
            'last_name'          =>  'Ali',
            'email'         =>  'user_supplier@app.com',
            //'group_id'          =>      1,
            //'currency_id '      =>      1,
            'status'            =>      1,
            'password'      =>  bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);
    }
}
