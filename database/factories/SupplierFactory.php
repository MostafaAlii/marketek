<?php
namespace Database\Factories;
use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use App\Models\Group;
use App\Models\Provience;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    protected $model = Supplier::class;
    public function definition()
    {
        return [
            'email'                     =>      $this->faker->unique()->safeEmail(),
            'email_verified_at'         =>      now(),
            'password'                  =>      $this->faker->password(),
            'phone'                     =>      $this->faker->phoneNumber(),
            'discount'                  =>      $this->faker->randomElement([10,20,30]),
            'first_name'                =>      $this->faker->name,
            'last_name'                 =>      $this->faker->name,
            'company_name'              =>      $this->faker->name,
            'description'               =>      $this->faker->paragraph,
            'address_primary'           =>      $this->faker->address(),
            'address_secondry'          =>      $this->faker->address(),

            'group_id'                  =>       Group::all()->random()->id,
            'country_id'                =>       Country::all()->random()->id,
            'provience_id'              =>       Provience::all()->random()->id,
            'city_id'                   =>       City::all()->random()->id,
            'area_id'                   =>       Area::all()->random()->id,
            //'currency_id '              =>       Currency::all()->random()->id,

            'created_by'                =>      'MostafaAli',
            'updated_by'                =>      'MostafaAli',

        ];
    }
}
