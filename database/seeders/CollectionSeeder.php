<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollectionSeeder extends Seeder
{
    private array $collections = [
        ['name' => 'Jolli man', 'code' => 'jolli-man', 'description' => 'Коллекция jolli man',
            'title_description' => ' Это Коллекция jolli man'],
    ];

    public function run(): void
    {
        foreach ($this->collections as $collection)
        {
            DB::table('collections')->insert($collection);
        }
    }
}
