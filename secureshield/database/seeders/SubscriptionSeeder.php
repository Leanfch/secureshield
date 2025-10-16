<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

/**
 * SubscriptionSeeder
 *
 * Seeds the subscriptions table with sample subscriptions for users
 */
class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Juan Pérez - Premium Plan (Active)
        Subscription::create([
            'user_id' => 2,
            'plan_id' => 3, // Premium
            'start_date' => Carbon::now()->subMonths(3),
            'end_date' => Carbon::now()->addMonths(9),
            'status' => 'active',
        ]);

        // María González - Basic Plan (Active)
        Subscription::create([
            'user_id' => 3,
            'plan_id' => 2, // Basic
            'start_date' => Carbon::now()->subMonth(),
            'end_date' => Carbon::now()->addMonths(11),
            'status' => 'active',
        ]);

        // Carlos Rodríguez - Enterprise Plan (Active)
        Subscription::create([
            'user_id' => 4,
            'plan_id' => 4, // Enterprise
            'start_date' => Carbon::now()->subMonths(6),
            'end_date' => Carbon::now()->addMonths(6),
            'status' => 'active',
        ]);
    }
}
