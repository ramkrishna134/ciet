<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Meta;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $departments = Department::paginate(10);
        return view('admin.department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.department.edit');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $rules = [
            'title' => 'required',
            'slug' => 'nullable',
            'description' => 'required',
            'lang' => 'required',
            'icon' => 'nullable',
            'featured_image' => 'nullable',
            'gallery' => 'nullable',
            'head_image' => 'required',
            'head_message' => 'required',
            'status' => 'required',
            'key_word' => 'required',
            'meta.*' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");
        }
        else{
            $data = $request->input();
            
            try{
                $department = new Department($data);

                if(!empty($data['gallery'])){
                    $gallery = explode(',', $data['gallery']);                
                    $department->gallery = $gallery;
                }
                if( empty( $data['slug'] ) ){
                    $department->slug = Str::slug( $data['title'] );
                }else{
                    $department->slug = $data['slug'];
                }
                $department->user_id = $user->id;              
                $department->save();


                // Save custom fields in meta table

                if(!empty($data['meta'])){
                    $metas = $data['meta'];
                    foreach($metas as $key => $value){
                    $new_meta = new Meta;
                    $new_meta->key = $key;
                    $new_meta->value = $value;
                    $new_meta->model_type = 'App\Models\Department';
                    $new_meta->model_id = $department->id;
                    $new_meta->lang = $department->lang;
                    $new_meta->save();
                    }
                }
                return redirect(route('department.index'))->with('status',"Department created successfully");

            }
            catch(Exception $e){  
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
        $metas = Meta::query()->where('model_id', $department->id)->get();
        return view('admin.department.edit', compact('department','metas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepartmentRequest  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        //
        $user = auth()->user();
        $rules = [
            'title' => 'required',
            'slug' => 'nullable',
            'description' => 'required',
            'lang' => 'required',
            'icon' => 'nullable',
            'featured_image' => 'nullable',
            'gallery' => 'nullable',
            'head_image' => 'required',
            'head_message' => 'required',
            'status' => 'required',
            'key_word' => 'required',
            'meta.*' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");
        }
        else{
            $data = $request->input();
            try{
                $department->fill($data);
                if(!empty($data['gallery'])){
                    $gallery = explode(',', $data['gallery']);                
                    $department->gallery = $gallery;
                }
                $department->user_id = $user->id;              
                $department->save();


                // Save custom fields in meta table

                $metas = $data['meta'];
                $fields = \DB::table('metas')->get();

                // dd($metas);
                // dd($metas->count());
                // dd($metas[1]);

                // for($i=0; $i<=count($metas); $i++){
                //     dd($metas[$i]);
                // }
                
                foreach($metas as $key => $value){
                    
                    if(\DB::table('metas')->where('model_id', $department->id)->where('key', $key)->first()){
                        \DB::table('metas')->where('model_id', $department->id)->where('key', $key)->update(['value' => $value]);
                    }else{
                        $new_meta = new Meta;
                        $new_meta->key = $key;
                        $new_meta->value = $value;
                        $new_meta->model_type = 'App\Models\Department';
                        $new_meta->model_id = $department->id;
                        $new_meta->lang = $department->lang;
                        $new_meta->save();
                    }

                    
                }
                return back()->with('status',"Department updated successfully");

            }
            catch(Exception $e){  
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }
}
