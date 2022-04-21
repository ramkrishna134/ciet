<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('web.home');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
