<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Post;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

/**
 * AdminDashboardController
 *
 * Handles the admin dashboard with statistics
 */
class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard with statistics.
     *
     * @return View
     */
    public function index(): View
    {
        // Total counts
        $totalUsers = User::where('role_id', 2)->count(); // Only regular users
        $totalSubscriptions = Subscription::where('status', 'active')->count();
        $totalPosts = Post::count();
        $publishedPosts = Post::where('is_published', true)->count();

        // Most popular plan
        $mostPopularPlan = Plan::select('plans.*', DB::raw('COUNT(subscriptions.id) as subscriptions_count'))
            ->leftJoin('subscriptions', 'plans.id', '=', 'subscriptions.plan_id')
            ->where('subscriptions.status', 'active')
            ->groupBy('plans.id', 'plans.name', 'plans.description', 'plans.price', 'plans.devices_limit',
                     'plans.real_time_protection', 'plans.cloud_backup', 'plans.vpn_included',
                     'plans.priority_support', 'plans.is_active', 'plans.created_at', 'plans.updated_at')
            ->orderBy('subscriptions_count', 'desc')
            ->first();

        // Recent subscriptions
        $recentSubscriptions = Subscription::with(['user', 'plan'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Subscription status distribution
        $subscriptionsByStatus = Subscription::select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get();

        // Plan distribution
        $planDistribution = Plan::select('plans.name', DB::raw('COUNT(subscriptions.id) as count'))
            ->leftJoin('subscriptions', function($join) {
                $join->on('plans.id', '=', 'subscriptions.plan_id')
                     ->where('subscriptions.status', '=', 'active');
            })
            ->groupBy('plans.id', 'plans.name', 'plans.description', 'plans.price', 'plans.devices_limit',
                     'plans.real_time_protection', 'plans.cloud_backup', 'plans.vpn_included',
                     'plans.priority_support', 'plans.is_active', 'plans.created_at', 'plans.updated_at')
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalSubscriptions',
            'totalPosts',
            'publishedPosts',
            'mostPopularPlan',
            'recentSubscriptions',
            'subscriptionsByStatus',
            'planDistribution'
        ));
    }
}
