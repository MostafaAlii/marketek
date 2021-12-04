<?php
namespace Database\Factories;
use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
class CategoryFactory extends Factory
{
    protected $model = Category::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
        ];
    }
}