<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    //

    public function index()
    {
        //
        $roles = Role::query()->get();
        return view('admin.role.index', compact('roles'));
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
            return redirect(route('role.index'))
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");
        }
        else{
            $data = $request->input();
            try{
                $score = new Role($data);
                $score->save();
                return redirect(route('role.index'))->with('status',"Permission added successfully");

            }
            catch(Exception $e){  
                return redirect(route('role.index'))->with('failed',"Operation failed");
            }
        }
    }
}
