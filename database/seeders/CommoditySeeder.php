<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommoditySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Commodity::create([
            'category_id'   => 1,
            'name'          => 'Karet',
            'slug'          => 'karet',
        ]);

        Commodity::create([
            'category_id'   => 2,
            'name'          => 'Padi',
            'slug'          => 'padi',
        ]);

        Commodity::create([
            'category_id'   => 3,
            'name'          => 'Perikanan Budidaya Tambak',
            'slug'          => 'perikanan-budidaya-tambak',
        ]);

        Commodity::create([
            'category_id'   => 4,
            'name'          => 'Daging Sapi',
            'slug'          => 'daging-sapi',
        ]);

        Commodity::create([
            'category_id'   => 5,
            'name'          => 'Bawang Daun',
            'slug'          => 'bawang-daun',
        ]);

        Commodity::create([
            'category_id'   => 6,
            'name'          => 'Kayu Bulat',
            'slug'          => 'kayu-bulat',
        ]);
    }
}
