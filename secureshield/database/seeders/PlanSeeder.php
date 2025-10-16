<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * PlanSeeder
 *
 * Seeds the plans table with antivirus subscription plans
 */
class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Plan::create([
            'name' => 'Free',
            'description' => 'Basic protection for one device. Perfect for personal use.',
            'price' => 0.00,
            'devices_limit' => 1,
            'real_time_protection' => false,
            'cloud_backup' => false,
            'vpn_included' => false,
            'priority_support' => false,
            'is_active' => true,
        ]);

        Plan::create([
            'name' => 'Basic',
            'description' => 'Essential protection for up to 3 devices with real-time scanning.',
            'price' => 2999.99,
            'devices_limit' => 3,
            'real_time_protection' => true,
            'cloud_backup' => false,
            'vpn_included' => false,
            'priority_support' => false,
            'is_active' => true,
        ]);

        Plan::create([
            'name' => 'Premium',
            'description' => 'Advanced protection for 5 devices with cloud backup and VPN.',
            'price' => 4999.99,
            'devices_limit' => 5,
            'real_time_protection' => true,
            'cloud_backup' => true,
            'vpn_included' => true,
            'priority_support' => false,
            'is_active' => true,
        ]);

        Plan::create([
            'name' => 'Enterprise',
            'description' => 'Complete protection for unlimited devices with priority support and all features.',
            'price' => 9999.99,
            'devices_limit' => 999,
            'real_time_protection' => true,
            'cloud_backup' => true,
            'vpn_included' => true,
            'priority_support' => true,
            'is_active' => true,
        ]);
    }
}
