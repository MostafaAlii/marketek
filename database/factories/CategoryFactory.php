<?php
namespace Database\Factories;
use App\Models\Group;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
class CategoryFactory extends Factory
{
    protected $model = Category::class;
    public function definition()
    {
        return [
            'name'                      =>       $this->faker->name,
            'parent_id'                 =>       $this->faker->randomElement([0, 1]),
            'group_id'                  =>       Group::all()->random()->id,
            'created_by'                =>      'MostafaAli',
            'updated_by'                =>      'MostafaAli',
        ];
    }
}