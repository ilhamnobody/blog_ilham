<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Teknologi', 'color' => '#3B82F6'],
            ['name' => 'Programming', 'color' => '#8B5CF6'],
            ['name' => 'Tutorial', 'color' => '#10B981'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'color' => $category['color'],
            ]);
        }
    }
}