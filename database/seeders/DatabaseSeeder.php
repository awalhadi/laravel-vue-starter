<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Artisan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      try {
        // Artisan::call('passport:install');
      } catch (\Throwable $t) {
          // do nothing
      }
        // User::factory(10)->create();

        $this->call([
          PermissionSeeder::class,
          RoleSeeder::class,
          UserSeeder::class,
        ]);
    }
}
