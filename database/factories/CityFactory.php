<?php
namespace Database\Factories;
use App\Models\City;
use App\Models\Provience;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    protected $model = City::class;
    public function definition() {
        return [
            'provience_id'              =>      Provience::all()->random()->id,
            'name'                      =>      $this->faker->city,
            'created_by'                =>      'MostafaAli',
            'updated_by'                =>      'MostafaAli',
        ];
    }
}
