<?php

namespace Database\Factories;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    protected $model = Group::class;
    public function definition()
    {
        return [
            'name'                      =>      $this->faker->randomElement(['ا','ب','ج']),
            'created_by'                =>      'MostafaAli',
            'updated_by'                =>      'MostafaAli',
        ];
    }
}
