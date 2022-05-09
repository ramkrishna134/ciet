<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Department;
use App\Models\Partner;
use App\Models\Initiative;

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
        $lang = $_GET['lang'] ?? null;
        if(!empty($lang)){
            if($lang == 'en' OR $lang == 'hi'){
                $sliders = Slider::query()->where('lang', $lang)->where('status', 1)->get();
                $departments = Department::query()->where('lang', $lang)->where('status', 1)->get();
                $partners = Partner::query()->where('lang', $lang)->where('status', 1)->get();
                $initiatives = Initiative::orderBy('created_at', 'DESC')
                ->where('lang', $lang)
                ->where('status', 1)->get();
            }else{
                abort(404);
            }
        }else{
            $sliders = Slider::query()->where('lang', 'en')->where('status', 1)->get();
            $departments = Department::query()->where('lang', 'en')->where('status', 1)->get();
            $partners = Partner::query()->where('lang', 'en')->where('status', 1)->get();
            $initiatives = Initiative::orderBy('created_at', 'ASC')
                ->where('lang', 'en')
                ->where('status', 1)->get();
        }
        return view('web.home', compact('sliders', 'departments', 'partners', 'initiatives'));
    }


    // Admin dashboard page ==================

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
