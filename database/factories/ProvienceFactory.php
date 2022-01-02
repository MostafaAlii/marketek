<?php
namespace Database\Factories;
use App\Models\Country;
use App\Models\Provience;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProvienceFactory extends Factory
{
    protected $model = Provience::class;
    public function definition()
    {
        return [
            'country_id'                =>      Country::all()->random()->id,
            'name'                      =>      $this->faker->city,
            'created_by'                =>      'MostafaAli',
            'updated_by'                =>      'MostafaAli',
        ];
    }
}
