<?php

namespace App\Http\Controllers;

use App\Models\Infrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class InfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $infrastructures = Infrastructure::paginate(10);
        return view('admin.infrastructure.index', compact('infrastructures'));

    }

    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.infrastructure.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInfrastructureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = auth()->user();
        $rules = [
            'title' => ['required', 'string'],
            'icon' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string'],
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
                $infrastructure = new Infrastructure($data);
                $infrastructure->user_id = $user->id;
                $infrastructure->save();
                return redirect(route('infrastructure.index'))->with('status',"New infrastructure created successfully");

            }
            catch(Exception $e){  
                return redirect(route('infrastructure.create'))->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Infrastructure  $infrastructure
     * @return \Illuminate\Http\Response
     */
    public function show(Infrastructure $infrastructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Infrastructure  $infrastructure
     * @return \Illuminate\Http\Response
     */
    public function edit(Infrastructure $infrastructure)
    {
        //

        return view('admin.infrastructure.edit', compact('infrastructure'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInfrastructureRequest  $request
     * @param  \App\Models\Infrastructure  $infrastructure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infrastructure $infrastructure)
    {
        //
        $user = auth()->user();
        $rules = [
            'title' => ['required', 'string'],
            'icon' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string'],
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
                    $infrastructure->fill($data);
                    $infrastructure->user_id = $user->id;
                    $infrastructure->save();
                    return redirect(route('infrastructure.index'))->with('status',"infrastructure updated successfully");
    
                }
                catch(Exception $e){  
                    return redirect(route('infrastructure.create'))->with('failed',"Operation failed");
                }
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Infrastructure  $infrastructure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Infrastructure $infrastructure)
    {
        //
        $infrastructure->delete();
        return redirect(route('infrastructure.index'))->with('status',"infrastructure Deleted successfully");
    }
}
