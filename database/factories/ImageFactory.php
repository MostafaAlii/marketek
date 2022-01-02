<?php
namespace Database\Factories;
use App\Models\Image;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;
    public function definition()
    {
        return [
            'filename'              =>          $this->faker->randomElement(['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg']),
            'imageable_id'          =>          Supplier::all()->random()->id,
            'imageable_type'        => 'App\Models\Supplier',
        ];
    }
}
