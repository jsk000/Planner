<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::firstOrCreate([
            'name' => 'Parent'
        ]);

        $permission_names = ['manage_members', 'manage_tasks'];
        foreach($permission_names as $permission_name){
            Permission::firstOrCreate([ 'name' => $permission_name ]);
        }

        $role->syncPermissions($permission_names);
    }
}
