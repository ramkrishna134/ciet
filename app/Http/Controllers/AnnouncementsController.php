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
            'sub_category' => ['required', 'string', 'max:255'],
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
                $announcement->user_id = $user->id;
                $announcement->save();
               // return back()->with('status',"New infrastructure created successfully");
                return redirect(route('announcements.index'))->with('status',"New infrastructure created successfully");

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
            'sub_category' => ['required', 'string', 'max:255'],
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
                    $announcement->user_id = $user->id;
                    $announcement->save();
                    return redirect(route('announcements.index'))->with('status',"announcement updated successfully");
    
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
}
