<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * UserSeeder
 *
 * Seeds the users table with admin and sample users
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Admin SecureShield',
            'email' => 'admin@secureshield.com',
            'password' => Hash::make('admin123'),
            'role_id' => 1, // admin role
            'email_verified_at' => now(),
        ]);

        // Regular users
        User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'password' => Hash::make('password123'),
            'role_id' => 2, // user role
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'María González',
            'email' => 'maria@example.com',
            'password' => Hash::make('password123'),
            'role_id' => 2, // user role
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Carlos Rodríguez',
            'email' => 'carlos@example.com',
            'password' => Hash::make('password123'),
            'role_id' => 2, // user role
            'email_verified_at' => now(),
        ]);
    }
}
