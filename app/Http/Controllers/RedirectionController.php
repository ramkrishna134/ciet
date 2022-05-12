<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Redirection;
use Illuminate\Support\Facades\Validator;

class RedirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $redirections = Redirection::paginate(15);
        return view('admin.redirection.index', compact('redirections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRedirectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'from_url' => 'required',
            'to_url' => 'required',
            'is_enabled' => 'nullable|boolean',
            'method' => 'nullable|in:301,302',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            dd($validator);
            return back()
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");
                
        }else{
            $data = $request->input();

            try{
                $redirection = new Redirection($data);
                $redirection->save();
                return back()->with('status',"New Rule added successfully");

            }
            catch(Exception $e){  
                return redirect(route('redirection'))->with('failed',"Operation failed");
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Redirection  $redirection
     * @return \Illuminate\Http\Response
     */
    public function show(Redirection $redirection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Redirection  $redirection
     * @return \Illuminate\Http\Response
     */
    public function edit(Redirection $redirection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRedirectionRequest  $request
     * @param  \App\Models\Redirection  $redirection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Redirection $redirection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Redirection  $redirection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Redirection $redirection)
    {
        //
    }
}
