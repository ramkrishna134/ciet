<?php

namespace App\Http\Controllers;

use App\Models\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $application = App::paginate(10);
        return view('admin.app.index', compact('application'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.app.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAppRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = auth()->user();
        $rules = [
            'title' => ['required', 'string'],
            'icon' => ['required', 'string', 'max:255'],
            // 'url' => ['required', 'string'],
            'android' => ['required', 'string'],
            'ios' => ['nullable', 'string'],
            'window' => ['nullable', 'string'],
            'lang' => ['required', 'string', 'max:255'],
            'status' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect(route('app.create'))
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");
                // dd($validator);
        }else{
            $data = $request->input();
            // dd($data);
            try{
                $application = new App($data);
                $application->user_id = $user->id;
                $application->save();
                return redirect(route('app.index'))->with('status',"New app created successfully");

            }
            catch(Exception $e){  
                return redirect(route('app.create'))->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\App  $app
     * @return \Illuminate\Http\Response
     */
    public function show(App $app)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\App  $app
     * @return \Illuminate\Http\Response
     */
    public function edit(App $application)
    {
        //
        return view('admin.app.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppRequest  $request
     * @param  \App\Models\App  $app
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, App $application)
    {
        //
        $user = auth()->user();
        $rules = [
            'title' => ['required', 'string'],
            'icon' => ['required', 'string', 'max:255'],
            // 'url' => ['required', 'string'],
            'android' => ['required', 'string'],
            'ios' => ['nullable', 'string'],
            'window' => ['nullable', 'string'],
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
                    $application->fill($data);
                    $application->user_id = $user->id;
                    $application->save();
                    return redirect(route('app.index'))->with('status',"app updated successfully");
    
                }
                catch(Exception $e){  
                    return redirect(route('app.create'))->with('failed',"Operation failed");
                }
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\App  $app
     * @return \Illuminate\Http\Response
     */
    public function destroy(App $application)
    {
        //
        $application->delete();
        return redirect(route('app.index'))->with('status',"Mobile Application Deleted successfully");
    }
}
