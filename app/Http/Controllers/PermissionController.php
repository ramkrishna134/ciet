<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    //
    public function index()
    {
        //
        $permissions = Permission::query()->get();
        return view('admin.permission.index', compact('permissions'));
    }


    public function edit(Permission $permission)
    {
        //
        $permissions = Permission::query()->get();
        return view('admin.permission.index',compact('permissions','permission'));
    }



    public function store(Request $request)
    {
        //

        $rules = [
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect(route('permission.index'))
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");
        }
        else{
            $data = $request->input();
            try{
                $score = new Permission($data);
                $score->save();
                return redirect(route('permission.index'))->with('status',"Permission added successfully");

            }
            catch(Exception $e){  
                return redirect(route('permission.index'))->with('failed',"Operation failed");
            }
        }
    }
}
