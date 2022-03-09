<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class WebinarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $webinars = Webinar::paginate(10);
        return view('admin.webinar.index', compact('webinars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.webinar.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWebinarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = auth()->user();
        $rules = [
            'title' => ['required', 'string'],
            'res_person' => ['required', 'string'],
            'ppt' => ['required', 'string'],
            'video' => ['required', 'string'],
            'web_date' => ['required', 'date'],
            'lang' => ['required', 'string', 'max:255'],
            'status' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect(route('infrastructure.create'))
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");
                // dd($validator);
        }else{
            $data = $request->input();
            // dd($data);
            try{
                $webinar = new Webinar($data);
                $webinar->user_id = $user->id;
                $webinar->save();
                return redirect(route('webinar.index'))->with('status',"New Webinar created successfully");

            }
            catch(Exception $e){  
                return redirect(route('webinar.create'))->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function show(Webinar $webinar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function edit(Webinar $webinar)
    {
        //
        return view('admin.webinar.edit', compact('webinar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWebinarRequest  $request
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Webinar $webinar)
    {
        //

        $user = auth()->user();
        $rules = [
            'title' => ['required', 'string'],
            'res_person' => ['required', 'string'],
            'ppt' => ['required', 'string'],
            'video' => ['required', 'string'],
            'web_date' => ['required', 'date'],
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
                    $webinar->fill($data);
                    $webinar->user_id = $user->id;
                    $webinar->save();
                    return redirect(route('webinar.index'))->with('status',"infrastructure updated successfully");
    
                }
                catch(Exception $e){  
                    return redirect(route('webinar.create'))->with('failed',"Operation failed");
                }
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Webinar $webinar)
    {
        //
        $webinar->delete();
        return redirect(route('webinar.index'))->with('status',"webinar Deleted successfully");
    }
}
