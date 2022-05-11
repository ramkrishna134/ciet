<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $announcements = Announcements::paginate(10);
        return view('admin.announcements.index', compact('announcements'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.announcements.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAnnouncementsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd('hello');
        $user = auth()->user();
        $rules = [
            'title' => ['required', 'string'],
            'category' => ['required', 'string', 'max:255'],
            'sub_category' => ['nullable','string', 'max:255'],
            'url' => ['required', 'string'],
            'expiry_date' => ['required', 'date'],
            'lang' => ['required', 'string', 'max:255'],
            'status' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect(route('announcements.create'))
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");
                // dd($validator);
        }else{
            $data = $request->input();
            // dd($data);
            try{
                $announcement = new Announcements($data);
                $url = $data ['url'];
                $announcement->url = parse_url($url, PHP_URL_PATH);
                $announcement->user_id = $user->id;
                $announcement->save();
                return redirect(route('announcements.index'))->with('status',"New Announcement created successfully");

            }
            catch(Exception $e){  
                return redirect(route('announcements.create'))->with('failed',"Operation failed");
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcements  $announcements
     * @return \Illuminate\Http\Response
     */
    public function show(Announcements $announcements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcements  $announcements
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcements $announcement)
    {
        //
        return view('admin.announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnnouncementsRequest  $request
     * @param  \App\Models\Announcements  $announcements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcements $announcement)
    {
        //
        $user = auth()->user();
        $rules = [
            'title' => ['required', 'string'],
            'category' => ['required', 'string', 'max:255'],
            'sub_category' => ['nullable','string', 'max:255'],
            'url' => ['required', 'string'],
            'expiry_date' => ['required', 'date'],
            'lang' => ['required', 'string', 'max:255'],
            'status' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");
            }else{
                $data = $request->input();
                // dd($data);
                try{
                    //$infrastructure->fill($data);
                    $announcement->fill($data);
                    $url = $data ['url'];
                    $announcement->url = parse_url($url, PHP_URL_PATH);
                    $announcement->user_id = $user->id;
                    $announcement->save();
                    return redirect(route('announcements.index'))->with('status',"Announcement updated successfully");
    
                }
                catch(Exception $e){  
                    return redirect(route('announcements.create'))->with('failed',"Operation failed");
                }
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcements  $announcements
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcements $announcement)
    {
        //
        $announcement->delete();
        return redirect(route('announcements.index'))->with('status',"Announcement Deleted successfully");
    }



    public function announcement(){
        $today = date('Y-m-d');

        $lang = $_GET['lang'] ?? null;
        if(!empty($lang)){
            if($lang == 'en' OR $lang == 'hi'){

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

                // Archives ================

                $vacancyArchives = Announcements::orderBy('created_at', 'DESC')
                ->where('category', 'vacancy')
                ->whereDate('expiry_date', '<', $today)
                ->where('lang', $lang)
                ->where('status', 1)->get();

                $noticeArchices = Announcements::orderBy('created_at', 'DESC')
                ->where('category', 'notice')
                ->whereDate('expiry_date', '<', $today)
                ->where('lang', $lang)
                ->where('status', 1)->get();

                $mislenArchives = Announcements::orderBy('created_at', 'DESC')
                ->where('category', 'mislen')
                ->whereDate('expiry_date', '<', $today)
                ->where('lang', $lang)
                ->where('status', 1)->get();
                
                
            }else{
                abort(404);
            }
        }else{

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

                // Archives ===================

                $vacancyArchives = Announcements::orderBy('created_at', 'DESC')
                ->where('category', 'vacancy')
                ->whereDate('expiry_date', '<=', $today)
                ->where('lang', 'en')
                ->where('status', 1)->get();

                $noticeArchices = Announcements::orderBy('created_at', 'DESC')
                ->where('category', 'notice')
                ->whereDate('expiry_date', '<=', $today)
                ->where('lang', 'en')
                ->where('status', 1)->get();

                $mislenArchives = Announcements::orderBy('created_at', 'DESC')
                ->where('category', 'mislen')
                ->whereDate('expiry_date', '<=', $today)
                ->where('lang', 'en')
                ->where('status', 1)->get();
                
        }

        return view('web.announcement', compact('vacancies', 'notices', 'mislens', 'vacancyArchives', 'noticeArchices', 'mislenArchives'));
    }
}
