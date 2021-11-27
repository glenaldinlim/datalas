<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Perkebunan',
            'slug' => 'perkebunan',
        ]);

        Category::create([
            'name' => 'Tanaman Pangan',
            'slug' => 'tanaman-pangan',
        ]);

        Category::create([
            'name' => 'Perikanan',
            'slug' => 'perikanan',
        ]);

        Category::create([
            'name' => 'Peternakan',
            'slug' => 'peternakan',
        ]);

        Category::create([
            'name' => 'Hortikultura',
            'slug' => 'hortikultura',
        ]);

        Category::create([
            'name' => 'Kehutanan',
            'slug' => 'kehutanan',
        ]);

        Category::create([
            'name' => 'Jasa Pertanian & Perkebunan',
            'slug' => 'jasa-pertanian-perkebunan',
        ]);
    }
}
