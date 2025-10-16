<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * RoleSeeder
 *
 * Seeds the roles table with admin and user roles
 */
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
            'description' => 'Administrator with full access',
        ]);

        Role::create([
            'name' => 'user',
            'description' => 'Regular user with limited access',
        ]);
    }
}
