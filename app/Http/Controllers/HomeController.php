<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * This middleware ensures that all methods in this controller are
     * only accessible to authenticated users.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * This method fetches all users and passes them to the home view.
     * You might want to adjust this depending on what you want to show
     * on the home dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = User::all();  
        return view('home', compact('data'));
    }

    /**
     * Display the admin dashboard.
     *
     * This method returns the view for the admin dashboard. Ensure that
     * the view 'admin.dashboard' exists in your resources/views/admin directory.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminDashboard()
    {
        $data = User::all(); 
        return view('admin.dashboard', compact('data'));  
    }

    /**
 * Display the scheduler admin dashboard.
 *
 * This method returns the view for the scheduler admin dashboard. Ensure that
 * the view 'admin.scheduler' exists in your resources/views/admin directory.
 *
 * @return \Illuminate\Contracts\Support\Renderable
 */
public function adminScheduler()
{
    $data = User::all(); 
    return view('admin.scheduler', compact('data'));
}

public function adminCleaner()
{
    $data = User::all(); 
    return view('admin.cleaner', compact('data'));  
}

public function adminClient()
{
    
    $data = [];  
    return view('admin.client', compact('data'));  
}



}
