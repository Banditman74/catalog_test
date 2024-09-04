<?php

namespace Database\Factories;

use App\Models\ProductProperty;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPropertyFactory extends Factory
{
    protected $model = ProductProperty::class;

    public function definition(): array
    {
        $propertyNames = [
            'Цвет плафона' => ['бронза', 'золото', 'серебро', 'белый', 'черный'],
            'Материал плафона' => ['органза', 'стекло', 'хрусталь', 'пластик', 'ткань'],
            'Цвет арматуры' => ['бронза', 'золото', 'серебро', 'белый', 'черный'],
            'Материал арматуры' => ['металл', 'дерево', 'пластик', 'стекло', 'алюминий']
        ];

        $propertyName = array_rand($propertyNames);
        $propertyValue = $this->faker->randomElement($propertyNames[$propertyName]);

        return [
            'name' => $propertyName,
            'value' => $propertyValue,
        ];
    }
}
