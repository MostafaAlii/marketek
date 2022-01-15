<?php
namespace Database\Factories;
use App\Models\Section;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
class SectionFactory extends Factory
{
    protected $model = Section::class;
    public function definition()
    {
        return [
            'name'                      =>      $this->faker->name,
            'created_by'                =>      Admin::all()->random()->name,
        ];
    }
}
