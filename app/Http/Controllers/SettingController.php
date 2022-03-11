<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Setting;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $settings = Setting::query()->get();
        return view('admin.setting.edit');
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
     * @param  \App\Http\Requests\StoreSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $rules = [
        //     'setting*' => 'nullable',
            
        // ];

        // $validator = Validator::make($request->all(),$rules);
        // if ($validator->fails()) {
        //     dd($validator);
        //     return back()
        //         ->withInput()
        //         ->withErrors($validator)->with('error',"Please check the field below *");
                
        // }
        // else{
        //     $data = $request->input();

        //     // dd($data);
        //     try{

        //         $settings = $data['setting'];
                
        //         foreach($settings as $key => $value){

        //             $item = new Setting;
        //             $item->key = $key;
        //             $item->value = $value;
        //             $item->save();
                     
        //         }
               
        //         return redirect(route('setting.index'))->with('status',"Setting Updated successfully");

        //     }
        //     catch(Exception $e){  
        //         return back()->with('failed',"Operation failed");
        //     }
        // }

        $setting = $request->input('setting');
        \setting( $setting );
        return  back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSettingRequest  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
        $rules = [
            'setting*' => 'nullable',
            
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

            // dd($data);
            try{

                $settings = $data['setting'];
                
                foreach($settings as $key => $value){

                    $item = new Setting;
                    $item->key = $key;
                    $item->value = $value;
                    $item->save();
                     
                }
               
                return redirect(route('setting.index'))->with('status',"Setting Updated successfully");

            }
            catch(Exception $e){  
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
