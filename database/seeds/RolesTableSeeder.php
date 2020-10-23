<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        $admin = Role::create([
            'name'=>'admin'
        ]);

        $user = Role::create([
            'name'=>'user'
        ]);
    }
}
