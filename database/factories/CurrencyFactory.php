<?php
namespace Database\Factories;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class CurrencyFactory extends Factory
{
    public function definition()
    {
        return [
            'name'                      =>      $this->faker->currencyCode,
            'currency_symbol'           =>      $this->faker->currencyCode,
            'supplier_id'               =>      Supplier::all()->random()->id,
            'created_by'                =>      'MostafaAli',
            'updated_by'                =>      'MostafaAli',
        ];
    }
}
