<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    private array $categories = [
        ['name' => 'Овечки', 'code' => 'ovechki', 'description' => 'Категория Овечки'],
        ['name' => 'Единороги', 'code' => 'edinorogi', 'description' => 'Категория Единороги'],
        ['name' => 'Лесные жители', 'code' => 'lesnie-zhiteli', 'description' => 'Категория лесные жители'],
        ['name' => 'Дикие обитатели', 'code' => 'dikie-obitateli', 'description' => 'Категория дикие обитатели'],
        ['name' => 'Веселая ферма', 'code' => 'veselai-ferma', 'description' => 'Категория веселая ферма'],
    ];

    public function run(): void
    {
        foreach ($this->categories as $category)
        {
            DB::table('categories')->insert($category);
        }
    }
}
