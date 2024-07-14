<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    static $user;
    public function index()
    {
        // Check if user is authenticated
        if (Auth::check()) {
            // User is authenticated, proceed with logic
            $userType = Auth::user()->userType;
            $user = Auth::user();
            if ($userType == 'user') {
                $item = Item::all();
                return view('userDashboard', ['DB' => $item]);
            } elseif ($userType == 'admin') {
                return view('adminDashboard');
            } else {
                // Handle unknown user type (optional)
                abort(403, 'Unauthorized action.');
            }
        } else {
            // User is not authenticated, redirect to login

            return redirect()->route('login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }
}
