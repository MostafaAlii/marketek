<?php
namespace Database\Factories;
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
            //'description'               =>      $this->faker->paragraph,
            //'address_primary'           =>      $this->faker->address(),
            //'address_secondry'          =>      $this->faker->address(),
            'created_by'                =>      'MostafaAli',
            'updated_by'                =>      'MostafaAli',

        ];
    }
}
