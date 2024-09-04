<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductProperty;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Product::factory(500)->create()->each(fn($product) => $product->properties()->createMany([
            ProductProperty::factory()->state(['name' => 'Цвет плафона'])->make()->toArray(),
            ProductProperty::factory()->state(['name' => 'Материал плафона'])->make()->toArray(),
            ProductProperty::factory()->state(['name' => 'Цвет арматуры'])->make()->toArray(),
            ProductProperty::factory()->state(['name' => 'Материал арматуры'])->make()->toArray(),
        ]));

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
