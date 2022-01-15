<?php
namespace Database\Factories;
use App\Models\Product;
use App\Models\Section;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
class ProductFactory extends Factory
{
    protected $model = Product::class;
    public function definition()
    {
        return [
            'section_id'                   =>      Section::all()->random()->id,
            'name'                         =>      $this->faker->text(60),
            'description'                  =>      $this->faker->paragraph(),
            'short_description'            =>      $this->faker->text(60),
            'price'                        =>      $this->faker->numberBetween(10, 9000),
            'slug'                         =>      $this->faker->slug(),
            'sku'                          =>      $this->faker->word(),
            'is_active'                    =>      $this->faker->boolean(),
            'created_by'                   =>      Admin::all()->random()->name,
            'user_id'                      =>      User::all()->random()->id,
        ];
    }
}