<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Sock'],
            ['name' => 'Shirt'],
            ['name' => 'T-shirt'],
        ];
        foreach ($data as $category) {
            category::create($category);
        }
    }
}
