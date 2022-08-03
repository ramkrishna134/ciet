<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Department;
use App\Models\Partner;
use App\Models\Initiative;
use App\Models\Infrastructure;
use App\Models\Event;
use App\Models\Announcements;

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
        $today = date('Y-m-d');
        $lang = $_GET['lang'] ?? null;
        if(!empty($lang)){
            if($lang == 'en' OR $lang == 'hi'){
                $sliders = Slider::orderBy('order', 'desc')->where('lang', $lang)->where('status', 1)->get();
                $departments = Department::query()->where('lang', $lang)->where('status', 1)->get();
                $partners = Partner::query()->where('lang', $lang)->where('status', 1)->get();
                $initiatives = Initiative::orderBy('created_at', 'DESC')
                ->where('lang', $lang)
                ->where('status', 1)->get();

                $infrastrcutures = Infrastructure::query()->where('lang', $lang)->where('status', 1)->get()->toArray();
                $events = Event::query()->where('category', 'ongoing')->where('lang', $lang)->where('status', 1)->get();

                $allNotices = Announcements::orderBy('created_at', 'DESC')
                ->whereDate('expiry_date', '>=', $today)
                ->where('lang', 'en')
                ->where('status', 1)->get();

                $vacancies = Announcements::orderBy('created_at', 'DESC')
                ->where('category', 'vacancy')
                ->whereDate('expiry_date', '>', $today)
                ->where('lang', $lang)
                ->where('status', 1)->get();

                $notices = Announcements::orderBy('created_at', 'DESC')
                ->where('category', 'notice')
                ->whereDate('expiry_date', '>', $today)
                ->where('lang', $lang)
                ->where('status', 1)->get();

                $mislens = Announcements::orderBy('created_at', 'DESC')
                ->where('category', 'mislen')
                ->whereDate('expiry_date', '>', $today)
                ->where('lang', $lang)
                ->where('status', 1)->get();

            }else{
                abort(404);
            }
        }else{
            $sliders = Slider::orderBy('order', 'desc')->where('lang', 'en')->where('status', 1)->get();
            $departments = Department::query()->where('lang', 'en')->where('status', 1)->get();
            $partners = Partner::query()->where('lang', 'en')->where('status', 1)->get();
            $initiatives = Initiative::orderBy('created_at', 'ASC')
                ->where('lang', 'en')
                ->where('status', 1)->get();
            $infrastrcutures = Infrastructure::query()->where('lang', 'en')->where('status', 1)->get()->toArray();
            $events = Event::query()->where('category', 'ongoing')->where('lang', 'en')->where('status', 1)->get();
            
                $allNotices = Announcements::orderBy('created_at', 'DESC')
                ->whereDate('expiry_date', '>=', $today)
                ->where('lang', 'en')
                ->where('status', 1)->get();
                $vacancies = Announcements::orderBy('created_at', 'DESC')
                ->where('category', 'vacancy')
                ->whereDate('expiry_date', '>=', $today)
                ->where('lang', 'en')
                ->where('status', 1)->get();

                $notices = Announcements::orderBy('created_at', 'DESC')
                ->where('category', 'notice')
                ->whereDate('expiry_date', '>=', $today)
                ->where('lang', 'en')
                ->where('status', 1)->get();

                $mislens = Announcements::orderBy('created_at', 'DESC')
                ->where('category', 'mislen')
                ->whereDate('expiry_date', '>=', $today)
                ->where('lang', 'en')
                ->where('status', 1)->get();
        }
        return view('web.home', compact('sliders', 'departments', 'partners', 'initiatives', 'infrastrcutures', 'events', 'vacancies', 'notices', 'mislens', 'allNotices'));
    }


    // Admin dashboard page ==================

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
