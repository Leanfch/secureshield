<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * PlanController
 *
 * Handles displaying antivirus subscription plans
 */
class PlanController extends Controller
{
    /**
     * Display all available plans.
     *
     * @return View
     */
    public function index(): View
    {
        $plans = Plan::where('is_active', true)->get();

        return view('plans.index', compact('plans'));
    }
}
