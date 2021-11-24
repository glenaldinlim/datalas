<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Setting::create([
           'about'          => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae labore omnis eaque molestias, aliquid soluta corrupti repellendus, ipsa eos nesciunt, saepe aut obcaecati consequuntur voluptatum doloribus quaerat ex harum assumenda! Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae labore omnis eaque molestias, aliquid soluta corrupti repellendus, ipsa eos nesciunt, saepe aut obcaecati consequuntur voluptatum doloribus quaerat ex harum assumenda! Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae labore omnis eaque molestias, aliquid soluta corrupti repellendus, ipsa eos nesciunt, saepe aut obcaecati consequuntur voluptatum doloribus quaerat ex harum assumenda!</p> <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae labore omnis eaque molestias, aliquid soluta corrupti repellendus, ipsa eos nesciunt, saepe aut obcaecati consequuntur voluptatum doloribus quaerat ex harum assumenda!</p>',
           'address'        => 'Jl. Kumbang No.14, RT.02/RW.06, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16128',
           'telphone'       => '(0251) 8329101',
           'phone'          => '+6282211223344',
           'instagram_url'  => 'https://www.instagram.com/',
           'facebook_url'   => 'https://www.facebook.com/',
           'twitter_url'    => 'https://www.twitter.com/',
           'maps_url'       => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.4638567941006!2d106.80366241477104!3d-6.5891213952348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5d2e602b501%3A0x25a12f0f97fac4ee!2sSekolah%20Vokasi%20Institut%20Pertanian%20Bogor!5e0!3m2!1sid!2sid!4v1637751025462!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>', 
        ]);
    }
}
