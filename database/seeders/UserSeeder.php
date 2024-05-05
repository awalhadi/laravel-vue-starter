<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $faker = User::factory(10)->create();
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('users')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      $supperAdmin = User::updateOrCreate([
        'first_name'            => 'John',
        'last_name'             => 'Doe',
        'email'                 => 'admin@app.com',
        'phone'                 => '1234567890',
        'email_verified_at'     => now(),
        'password'              => \Illuminate\Support\Facades\Hash::make('12345678'),
        'status'                => User::STATUS_ACTIVE,
        'type'                  => User::TYPE_ADMIN,
        'remember_token'        => Str::random(10),
    ]);

    $supperAdmin->assignRole('Super Admin');

        User::factory()->count(80)->create()->each(function ($user) {
            if($user->type == User::TYPE_ADMIN) {
                $user->assignRole('Admin');
            } else {
                $user->assignRole('Staff');
            }
        });
    }
}
