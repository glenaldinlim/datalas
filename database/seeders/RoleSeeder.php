<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'community']);
        Role::create(['name' => 'bod']);
        Role::create(['name' => 'webmaster']);
        Role::create(['name' => 'admin']);
    }
}
