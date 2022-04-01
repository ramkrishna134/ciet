<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreMenuItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $rules = [
            'label' => 'required',
            'menu_id' => 'required',
            'link' => 'required',
            'parent_id' => 'nullable',
            'class' => 'nullable',
            'depth' => 'required',
            'target' => 'nullable',
            'status' => 'required',
            'lang' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");
                dd($validator);
        }
        else{
            $data = $request->input();
            // dd($data);
            try{
                $menu = new MenuItem($data);
                $menu->save();
                return back()->with('status',"Menu Item created successfully");

            }
            catch(Exception $e){  
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function show(MenuItem $menuItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuItem $menuItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuItemRequest  $request
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuItem $menuItem)
    {
        //

        $rules = [
            'label' => 'required',
            'menu_id' => 'required',
            'link' => 'required',
            'parent_id' => 'nullable',
            'class' => 'nullable',
            'depth' => 'required',
            'target' => 'nullable',
            'status' => 'required',
            'lang' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");
                dd($validator);
        }
        else{
            $data = $request->input();
            // dd($data);
            try{
                $menuItem->fill($data);
                if( empty( $data['target'] ) ){
                    $menuItem->target = 0;
                }
                $menuItem->save();
                return back()->with('status',"Menu Item updated successfully");

            }
            catch(Exception $e){  
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuItem $menuItem)
    {
        //
        $menuItem->delete();
        return back()->with('status',"Menu Item Deleted successfully");
    }
}
