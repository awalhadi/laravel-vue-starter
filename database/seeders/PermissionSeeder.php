<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $permissions = [
            'User' => [
                'Add User',
                'Edit User',
                'Show User',
                'List User',
                'Delete User',
                'Restore User'
            ],
            'Role' => [
                'Add Role',
                'Edit Role',
                'Show Role',
                'List Role',
                'Delete Role'
            ],
            'Settings' => [
                'Site Settings'
            ]
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($permissions as $parent => $child) {
            $parent_data = \App\Models\Permission::updateOrCreate([
                'name'          => $parent,
                'guard_name'    => 'web'
            ]);

            foreach ($child as $c) {
                \App\Models\Permission::updateOrCreate([
                    'name'          => $c,
                    'guard_name'    => 'web',
                    'parent_id'     => $parent_data->id
                ]);
            }
        }
    }
}
