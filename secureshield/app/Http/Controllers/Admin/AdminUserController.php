<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * AdminUserController
 *
 * Handles viewing users and their subscriptions in admin panel
 */
class AdminUserController extends Controller
{
    /**
     * Display a listing of users with their subscriptions.
     *
     * @return View
     */
    public function index(): View
    {
        $users = User::with(['role', 'subscriptions.plan', 'payments'])
            ->where('role_id', 2) // Only regular users, not admins
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.users.index', compact('users'));
    }
}
