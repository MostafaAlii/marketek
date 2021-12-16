<?php

namespace Database\Factories;
use App\Models\City;
use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\Factory;
class AreaFactory extends Factory
{
    protected $model = Area::class;
    public function definition() {
        return [
            'city_id'                   =>      City::all()->random()->id,
            'name'                      =>      $this->faker->city,
            'created_by'                =>      'MostafaAli',
            'updated_by'                =>      'MostafaAli',
        ];
    }
}
