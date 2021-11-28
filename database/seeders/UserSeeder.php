<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Community;
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
            'email'         => 'cto@datalas.tech',
            'gender'        => 'M',
            'phone'         => '6281200112233',
            'password'      => bcrypt('password'),
        ]);
        $bod->assignRole('bod');

        $webmaster = User::create([
            'first_name'    => 'WebMaster',
            'last_name'     => 'WebMaster',
            'email'         => 'webmaster@datalas.tech',
            'gender'        => 'M',
            'phone'         => '6281200112233',
            'password'      => bcrypt('password'),
        ]);
        $webmaster->assignRole('webmaster');

        $admin = User::create([
            'first_name'    => 'Administrator',
            'last_name'     => 'Administrator',
            'email'         => 'admin@datalas.tech',
            'gender'        => 'M',
            'phone'         => '6281200112233',
            'password'      => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'first_name'    => 'John',
            'last_name'     => 'Doe',
            'email'         => 'johndoe@datalas.tech',
            'gender'        => 'M',
            'phone'         => '6281200112233',
            'password'      => bcrypt('password'),
        ]);
        $user->assignRole('community');

        $community = Community::create([
            'user_id'       => $user->id,
            'name'          => 'Petani Desa Makmur',
            'slug'          => 'petani-desa-makmur',
            'province_id'   => 32,
            'origin_id'     => 3201,
            'address'       => 'Jl.in aja dulu, No 1 RT01/01, Sukajadi, Cipanas',
            'contact_name'  => 'Smith Jr',
            'contact_phone' => '6281200112233',
        ]);
    }
}
