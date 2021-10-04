<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['role_name'=>'Super Admin']);
        Role::create(['role_name'=>'Legal']);
        Role::create(['role_name'=>'IT']);
        Role::create(['role_name'=>'Admin']);
    }
}
