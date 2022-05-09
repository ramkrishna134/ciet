<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Initiative;

class InitiativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $initiatives = Initiative::paginate(10);
        return view('admin.initiative.index', compact('initiatives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.initiative.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $rules = [
            'name' => ['required', 'string'],
            'icon' => ['required', 'string', 'max:255'],
            'web_link' => ['required', 'string'],
            'play_store' => ['nullable', 'string'],
            'apple_store' => ['nullable', 'string'],
            'window_store' => ['nullable', 'string'],
            'lang' => ['required', 'string', 'max:255'],
            'status' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            // dd($validator);
            return back()
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");
                
        }else{
            $data = $request->input();

            try{
                $initiative = new initiative($data);
                $imageurl = $data ['icon'];
                $initiative->icon = parse_url($imageurl, PHP_URL_PATH);
                $initiative->user_id = $user->id;
                $initiative->save();
                return redirect(route('initiative.index'))->with('status',"New initiative created successfully");

            }
            catch(Exception $e){  
                return redirect(route('initiative.create'))->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Initiative  $initiative
     * @return \Illuminate\Http\Response
     */
    public function show(Initiative $initiative)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Initiative  $initiative
     * @return \Illuminate\Http\Response
     */
    public function edit(Initiative $initiative)
    {
        //
        return view('admin.initiative.edit', compact('initiative'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Initiative  $initiative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Initiative $initiative)
    {
        //

        $user = auth()->user();
        $rules = [
            'name' => ['required', 'string'],
            'icon' => ['required', 'string', 'max:255'],
            'web_link' => ['required', 'string'],
            'play_store' => ['nullable', 'string'],
            'apple_store' => ['nullable', 'string'],
            'window_store' => ['nullable', 'string'],
            'lang' => ['required', 'string', 'max:255'],
            'status' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            // dd($validator);
            return back()
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");
                
        }else{
            $data = $request->input();

            try{
                $initiative->fill($data);
                $imageurl = $data ['icon'];
                $initiative->icon = parse_url($imageurl, PHP_URL_PATH);
                $initiative->user_id = $user->id;
                $initiative->save();
                return back()->with('status',"Initiative updated successfully");

            }
            catch(Exception $e){  
                return redirect(route('initiative.create'))->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Initiative  $initiative
     * @return \Illuminate\Http\Response
     */
    public function destroy(Initiative $initiative)
    {
        //
        $initiative->delete();
        return back()->with('status',"Initiative Deleted successfully");
    }

    public function initiatives(){

        $lang = $_GET['lang'] ?? null;
        if(!empty($lang)){
            if($lang == 'en' OR $lang == 'hi'){

                $initiatives = Initiative::orderBy('created_at', 'DESC')
                ->where('lang', $lang)
                ->where('status', 1)->paginate(10);
                
                
            }else{
                abort(404);
            }
        }else{

                $initiatives = Initiative::orderBy('created_at', 'ASC')
                ->where('lang', 'en')
                ->where('status', 1)->paginate(10);
                
        }
        return view('web.initiative', compact('initiatives'));

    }
}
