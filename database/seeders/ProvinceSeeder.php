<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES ('11', 'Aceh', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('12', 'Sumatera Utara', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('13', 'Sumatera Barat', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('14', 'Riau', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('15', 'Jambi', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('16', 'Sumatera Selatan', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('17', 'Bengkulu', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('18', 'Lampung', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('19', 'Kepulauan Bangka Belitung', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('21', 'Kepulauan Riau', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('31', 'Dki Jakarta', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('32', 'Jawa Barat', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('33', 'Jawa Tengah', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('34', 'DI Yogyakarta', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('35', 'Jawa Timur', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('36', 'Banten', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('51', 'Bali', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('52', 'Nusa Tenggara Barat', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('53', 'Nusa Tenggara Timur', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('61', 'Kalimantan Barat', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('62', 'Kalimantan Tengah', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('63', 'Kalimantan Selatan', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('64', 'Kalimantan Timur', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('65', 'Kalimantan Utara', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('71', 'Sulawesi Utara', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('72', 'Sulawesi Tengah', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('73', 'Sulawesi Selatan', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('74', 'Sulawesi Tenggara', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('75', 'Gorontalo', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('76', 'Sulawesi Barat', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('81', 'Maluku', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('82', 'Maluku Utara', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('91', 'Papua Barat', '2021-04-26 11:00:00', '2021-04-26 11:00:00'),
            ('94', 'Papua', '2021-04-26 11:00:00', '2021-04-26 11:00:00');
        ");
    }
}
