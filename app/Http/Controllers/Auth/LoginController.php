<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     * Dynamically set in the authenticated method.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the post-authentication redirect path.
     */
    protected function redirectTo()
    {
        Log::info('User Roles: ' . Auth::user()->getRoleNames()); // Log roles to debug
    
        if (Auth::user()->hasRole('Admin')) {
            return '/admin-dashboard';
        } elseif (Auth::user()->hasRole('Scheduler')) {
            return '/scheduler-dashboard';
        } elseif (Auth::user()->hasRole('Cleaner')) {
            return '/cleaner-dashboard';
        } elseif (Auth::user()->hasRole('Client')) {
            return '/client-dashboard';
        } else {
            return '/home';
        }
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(\Illuminate\Http\Request $request, $user)
    {
        // You can include additional actions here if necessary
    }
}
