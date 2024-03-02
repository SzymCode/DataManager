<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'id' => 1,
            'name' => 'Szymon Radomski',
            'email' => 's.radomski19@gmail.com',
            'role' => 'super_admin',
            'password' => env('SUPER_ADMIN_PASSWORD'),
        ]);

        User::factory()->create([
            'id' => 2,
            'name' => 'Admin',
            'email' => 'admin@contactbook.com',
            'role' => 'admin',
            'password' => env('ADMIN_PASSWORD'),
        ]);

        User::factory()->create([
            'id' => 3,
            'name' => 'Test Admin',
            'email' => 'test_admin@contactbook.com',
            'role' => 'test_admin',
            'password' => Hash::make('test_admin123'),
        ]);

        User::factory()->create([
            'id' => 4,
            'name' => 'Test Admin 2',
            'email' => 'test_admin2@contactbook.com',
            'role' => 'test_admin',
            'password' => Hash::make('test_admin2123'),
        ]);

        User::factory()->create([
            'id' => 5,
            'name' => 'Test Tech',
            'email' => 'test_tech@contactbook.com',
            'role' => 'tech',
            'password' => Hash::make('test_tech123'),
        ]);

        User::factory()->create([
            'id' => 6,
            'name' => 'Test User',
            'email' => 'test_user@contactbook.com',
            'role' => 'user',
            'password' => Hash::make('test_user123'),
        ]);

        if (env('APP_ENV') === 'production' || 'dev') {
            User::factory(200)->create();
        }
    }
}
