<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            // User is authenticated, proceed with logic
            $userType = Auth::user()->userType;
            $user = Auth::user();
            if ($userType == 'user') {
                return redirect()->route('home');
            } elseif ($userType == 'admin') {
                $user = User::all();
                return view('tables', ['DB' => $user]);
            } else {
                // Handle unknown user type (optional)
                abort(403, 'Unauthorized action.');
            }
        }
    }
    public function destroy($id)
    {
        if (Auth::check()) {
            // User is authenticated, proceed with logic
            $userType = Auth::user()->userType;
            $user = Auth::user();
            if ($userType == 'user') {
                return redirect()->route('home');
            } elseif ($userType == 'admin') {
                $user = User::findOrFail($id);
                $user->delete();
                return redirect()->route('userData');
            } else {
                // Handle unknown user type (optional)
                abort(403, 'Unauthorized action.');
            }
        }
    }
    public function update($id)
    {
        if (Auth::check()) {
            // User is authenticated, proceed with logic
            $userType = Auth::user()->userType;
            $user = Auth::user();
            if ($userType == 'user') {
                return redirect()->route('home');
            } elseif ($userType == 'admin') {
                // Find the user by ID
                $user = User::findOrFail($id);

                //user or admin
                if ($user['userType'] == "user")
                    $user->usertype = 'admin';
                else
                    $user->usertype = 'user';

                // Update the user's usertype to "admin"
                $user->save();
                return redirect()->route('userData');
            } else {
                // Handle unknown user type (optional)
                abort(403, 'Unauthorized action.');
            }
        }
    }
}
