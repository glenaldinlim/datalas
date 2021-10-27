<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bod = User::create([
            'first_name'    => 'Chief of Technology',
            'last_name'     => 'CTO',
            'email'         => 'cto@datalas.test',
            'gender'        => 'M',
            'phone'         => '6281200112233',
            'password'      => bcrypt('password'),
        ]);
        $bod->assignRole('bod');

        $webmaster = User::create([
            'first_name'    => 'WebMaster',
            'last_name'     => 'WebMaster',
            'email'         => 'webmaster@datalas.test',
            'gender'        => 'M',
            'phone'         => '6281200112233',
            'password'      => bcrypt('password'),
        ]);
        $webmaster->assignRole('webmaster');

        $admin = User::create([
            'first_name'    => 'Administrator',
            'last_name'     => 'Administrator',
            'email'         => 'admin@datalas.test',
            'gender'        => 'M',
            'phone'         => '6281200112233',
            'password'      => bcrypt('password'),
        ]);
        $admin->assignRole('webmaster');

        $community = User::create([
            'first_name'    => 'John',
            'last_name'    => 'Doe',
            'email'         => 'johndoe@datalas.test',
            'gender'        => 'M',
            'phone'         => '6281200112233',
            'password'      => bcrypt('password'),
        ]);
        $community->assignRole('community');
    }
}
