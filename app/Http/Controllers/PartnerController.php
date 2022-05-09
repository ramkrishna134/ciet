<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Partner;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $partners = Partner::paginate(15);
        return view('admin.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.partner.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePartnerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $user = auth()->user();
        $rules = [
            'name' =>'required',
            'logo' =>'required',
            'link' =>'nullable',
            'lang' =>'required',
            'status' =>'required',     
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
                $partner = new Partner($data);
                $partner->user_id = $user->id; 
                $logo = $data['logo'];
                $partner->logo = parse_url($logo, PHP_URL_PATH);
                $partner->save();
                return redirect(route('partner.index'))->with('status',"Partner added successfully");

            }
            catch(Exception $e){  
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
        return view('admin.partner.edit', compact('partner'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePartnerRequest  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        //

        $user = auth()->user();
        $rules = [
            'name' =>'required',
            'logo' =>'required',
            'link' =>'nullable',
            'lang' =>'required',
            'status' =>'required',    
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
                $partner->fill($data);
                $logo = $data['logo'];
                $partner->logo = parse_url($logo, PHP_URL_PATH);
                $partner->user_id = $user->id; 
                $partner->save();
                return back()->with('status',"Partner data updated successfully");

            }
            catch(Exception $e){
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        //

        $partner->delete();
        return back()->with('status',"Partner Deleted successfully");
    }
}
