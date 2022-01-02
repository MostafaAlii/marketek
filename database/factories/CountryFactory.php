<?php
namespace Database\Factories;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    protected $model = Country::class;
    public function definition()
    {
        return [
            'name'                      =>      $this->faker->country,
            'created_by'                =>      'MostafaAli',
            'updated_by'                =>      'MostafaAli',
        ];
    }
}
