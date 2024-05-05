<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Permission;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    DB::table('roles')->truncate();
    DB::table('role_has_permissions')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    $role = Role::updateOrCreate([
      'name'       => 'Super Admin',
      'guard_name' => 'web',
    ]);
    $admin_role = Role::updateOrCreate([
      'name'       => 'Admin',
      'guard_name' => 'web',
    ]);
    $staff_role = Role::updateOrCreate([
      'name'       => 'Staff',
      'guard_name' => 'web',
    ]);

    $permissions = Permission::pluck('name')->toArray();

    $role->givePermissionTo($permissions);
    $admin_role->givePermissionTo($permissions);
  }
}
