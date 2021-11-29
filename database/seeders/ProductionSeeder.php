<?php

namespace Database\Seeders;

use App\Models\Production;
use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            Production::create([
                'commodity_id'      => mt_rand(1, 6),
                'community_id'      => 1,
                'year_production'   => 2021,
                'quartal'           => 'Q1',
                'stock'             => mt_rand(30, 100)
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            Production::create([
                'commodity_id'      => mt_rand(1, 6),
                'community_id'      => 1,
                'year_production'   => 2021,
                'quartal'           => 'Q2',
                'stock'             => mt_rand(30, 100)
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            Production::create([
                'commodity_id'      => mt_rand(1, 6),
                'community_id'      => 1,
                'year_production'   => 2021,
                'quartal'           => 'Q3',
                'stock'             => mt_rand(30, 100)
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            Production::create([
                'commodity_id'      => mt_rand(1, 6),
                'community_id'      => 1,
                'year_production'   => 2021,
                'quartal'           => 'Q4',
                'stock'             => mt_rand(30, 100)
            ]);
        }
    }
}
