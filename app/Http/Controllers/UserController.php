<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function index()
    {
        //
        $users = User::query()->get();
        return view('admin.user.index', compact('users'));
    }

    public function edit()
    {
        //
        $roles = \DB::table('roles')->get();
        return view('admin.user.edit', compact('roles'));
    }


    public function store(Request $request)
    {
        //

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => 'required|same:password',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect(route('user.create'))
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");
                dd($validator);
        }
        else{
            $data = $request->input();
            // dd($data);
            try{
                $score = new User([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                ]);
                $score->save();
                return redirect(route('user.index'))->with('status',"New user created successfully");

            }
            catch(Exception $e){  
                return redirect(route('user.create'))->with('failed',"Operation failed");
            }
        }
    }

    public function show(User $user)
    {
        //
        $roles = \DB::table('roles')->get();
        return view('admin.user.edit', compact('user','roles'));
    }


    public function update(Request $request, User $user){


        $data = $this->validate( $request, [
            'name' => 'required',
        ]);

        // dd($user);

        $user->fill( $data );
        if( $request->password ){
            $user->password = Hash::make( $request->password );
        }

        $user->saveOrFail();

        return back()->with('status'," Your Details has Updated successfully");


    }

    public function assignRole(Request $request, User $user){

        $user_id = $user->id;

        $data = $this->validate( $request, [
            'role_id' => 'required',
        ]);

        
        $role = \DB::table('role_user')->where('user_id', $user_id)->first();
        // dd($role);

        if(empty($role)){
            \DB::insert('insert into role_user (role_id, user_id, user_type) values (?, ?, ?)', [$data['role_id'], $user_id, 'App\Models\User']);
        }else{
            \DB::update('update role_user set role_id = ? where user_id = ?', [$data['role_id'], $user_id]);
        }

        $role = \DB::table('roles')->where('id', $data['role_id'])->first();

        $user->fill([
            'role' => $role->display_name,
        ]);

        $user->saveOrFail();
        // dd($role);
        

        return back()->with('status'," User Role added successfully");

    }

    public function destroy(User $user){
        $user->delete();
        return back()->with('status',"User Deleted successfully");
    }

}
