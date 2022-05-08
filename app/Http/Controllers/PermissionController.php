<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    //
    public function index()
    {
        //
        $permissions = Permission::paginate(15);
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

    public function showRole(Request $request){

        $permissions = Permission::query()->get();
        $roles = Role::query()->get();

        $params = $this->validate($request, [
            'role_id' => 'nullable',
        ]);
        $params['role_id'] = trim( $params['role_id'] ?? '' );

        if( !empty( $params['role_id'] ) ){
            $permissions_roles = \DB::table('permission_role')->where('role_id', $params['role_id'])->get();

            // dd($permissions_roles);
            
        }else{
            $permissions_roles = \DB::table('permission_role')->get();
        }

        $role_permissions = [];
        foreach($permissions_roles as $item){
            $permission = Permission::query()->where('id', $item->permission_id)->first();
            $role = Role::query()->where('id', $item->role_id)->first();
            array_push($role_permissions, [
                'permission'=> $permission->display_name,
                'description' => $permission-> description,
                'role' => $role->display_name
            ]);
        }


        

        return view('admin.role.attach', compact('role_permissions', 'permissions', 'roles', 'params'));
        
    }

    public function attachRole(Request $request){

        $rules = [
            'permission_id' => 'required',
            'role_id' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect(route('permission.showRole'))
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");
        }
        else{
            $data = $request->input();
            try{
                \DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [$data['permission_id'], $data['role_id']]);
                return redirect(route('permission.showRole'))->with('status',"Permission added successfully");

            }
            catch(Exception $e){  
                return redirect(route('permission.showRole'))->with('failed',"Operation failed");
            }
        }
    }


    public function deattachRole(){
        
    }
}
