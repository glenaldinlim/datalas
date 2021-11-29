<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Publication;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 10; $i++) { 
            Publication::create([
                'user_id'           => 3,
                'type'              => 'News',
                'title'             => $faker->sentence(),
                'slug'              => \Str::slug($faker->sentence(), '-'),
                'content'           => '',
                'cover'             => 'publications/default.png',
                'published_status'  => 'Publish',
                'published_at'      => Carbon::now(),
                'published_by'      => 3,
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            Publication::create([
                'user_id'           => 3,
                'type'              => 'Article',
                'title'             => $faker->sentence(),
                'slug'              => \Str::slug($faker->sentence(), '-'),
                'content'           => $faker->paragraphs(5, true),
                'cover'             => 'publications/default.png',
                'published_status'  => 'Publish',
                'published_at'      => Carbon::now(),
                'published_by'      => 3,
            ]);
        }
    }
}
