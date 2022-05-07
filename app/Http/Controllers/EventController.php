<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Event;
use App\Models\Department;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::paginate(10);
        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departments = Department::query()->get();
        return view('admin.event.edit', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $user = auth()->user();
        $rules = [
            'title' => 'required',
            'slug' => 'nullable',
            'status' => 'required',
            'lang' => 'required',
            'content' => 'nullable',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'category' => 'required',
            'department_id' => 'required',
            'featured_image' => 'required',
            'icon' => 'required',
            'key_word' => 'nullable',
            
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            dd($validator);
            return back()
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");
                
        }
        else{
            $data = $request->input();
            try{
                $event = new Event($data);
                if( empty( $data['slug'] ) ){
                    $event->slug = Str::slug( $data['title'] );
                }
                $event->user_id = $user->id;
                if( !empty( $data['key_word'] ) ){
                    $event->key_word = json_encode($data['key_word']);
                } 
                $event->save();
                return redirect(route('event.index'))->with('status',"Event created successfully");

            }
            catch(Exception $e){  
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event, $slug)
    {
        //
        $lang = $_GET['lang'] ?? null;
        if(!empty($lang)){
            if($lang == 'en' OR $lang == 'hi'){
                $event = Event::where('slug', $slug)->where('lang', $lang)->where('status', 1)->first();
                
            }else{
                abort(404);
            }
        }else{
            $event = Event::where('slug', $slug)->where('lang', 'en')->where('status', 1)->first();
        }
        
        if(empty($event)){
            return abort(404);
        }else{
            return view('web.event', compact('event'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
        $departments = Department::query()->get();
        return view('admin.event.edit', compact('event', 'departments'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //

        $user = auth()->user();
        $rules = [
            'title' => 'required',
            'slug' => 'nullable',
            'status' => 'required',
            'lang' => 'required',
            'content' => 'nullable',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'category' => 'required',
            'department_id' => 'required',
            'featured_image' => 'required',
            'icon' => 'required',
            'key_word' => 'nullable',
            
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            // dd($validator);
            return back()
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");                
        }
        else{
            $data = $request->input();
            try{
                $event->fill($data);
                $event->user_id = $user->id;
                if( !empty( $data['key_word'] ) ){
                    $event->key_word = json_encode($data['key_word']);
                } 
                $event->save();
                return back()->with('status',"Event updated successfully");

            }
            catch(Exception $e){  
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }


    public function calender(){

        $today = date('Y-m-d');
        // dd($today);

        $lang = $_GET['lang'] ?? null;
        if(!empty($lang)){
            if($lang == 'en' OR $lang == 'hi'){
                $ongoings = Event::query()->whereDate('start_date', '<=', $today)->whereDate('end_date', '>=', $today)->where('lang', $lang)->where('status', 1)->paginate(3);

                $upcomings = Event::query()->whereDate('start_date', '>', $today)->where('lang', $lang)->where('status', 1)->paginate(6);

                $pasts = Event::query()->whereDate('end_date', '<', $today)->where('lang', $lang)->where('status', 1)->paginate(6);
                
            }else{
                abort(404);
            }
        }else{
            $ongoings = Event::query()->whereDate('start_date', '<=', $today)->whereDate('end_date', '>=', $today)->where('lang', 'en')->where('status', 1)->paginate(3);

            $upcomings = Event::query()->whereDate('start_date', '>', $today)->where('lang', 'en')->where('status', 1)->paginate(6);

            $pasts = Event::query()->whereDate('end_date', '<', $today)->where('lang', 'en')->where('status', 1)->paginate(6);
        }

        return view('web.calender', compact('ongoings', 'upcomings', 'pasts'));

    }
}
