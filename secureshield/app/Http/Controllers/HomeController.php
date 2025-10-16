<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * HomeController
 *
 * Handles the main home page of the public site
 */
class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return View
     */
    public function index(): View
    {
        return view('home');
    }
}
