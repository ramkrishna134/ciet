<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Faculty;
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
            'meta.*' => 'nullable'
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");
        }
        else{
            $data = $request->input();
            // dd($data);
            
            try{
                $department = new Department($data);

                if(empty( $data['slug'] ) ){
                    $department->slug = Str::slug( $data['title'] );
                }

                if(!empty($data['gallery'])){
                    
                    $gallery = explode(',', $data['gallery']);        
                    $department->gallery = json_encode($gallery);
                }

                $featured_image = $data ['featured_image'];
                $icon = $data ['icon'];
                $head_image = $data ['head_image'];
                $department->featured_image = parse_url($featured_image, PHP_URL_PATH);
                $department->icon = parse_url($icon, PHP_URL_PATH);
                $department->head_image = parse_url($head_image, PHP_URL_PATH);
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
    public function show(Department $department, $slug)
    {
        //
        // dd('hello');
        $lang = $_GET['lang'] ?? null;
        if(!empty($lang)){
            if($lang == 'en' OR $lang == 'hi'){
                $department = Department::where('slug', $slug)->where('lang', $lang)->where('status', 1)->first();
                $faculties = Faculty::orderBy('id', 'DESC')->where('department_id', $department->id)->where('lang', $lang)->where('status', 1)->get();
                $metas = Meta::where('model_id', $department->id)->where('lang', $lang)->get();
                
            }else{
                abort(404);
            }
        }else{
            $department = Department::where('slug', $slug)->where('lang', 'en')->where('status', 1)->first();
            $faculties = Faculty::orderBy('id', 'DESC')->where('department_id', $department->id)->where('lang', 'en')->where('status', 1)->get();
            $metas = Meta::where('model_id', $department->id)->where('lang', 'en')->get();
        }
        
        if(empty($department)){
            return abort(404);
        }else{
            return view('web.department', compact('department', 'faculties', 'metas'));
        }
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
                    $department->gallery = json_encode($gallery);
                }
                $featured_image = $data ['featured_image'];
                $icon = $data ['icon'];
                $head_image = $data ['head_image'];
                $department->featured_image = parse_url($featured_image, PHP_URL_PATH);
                $department->icon = parse_url($icon, PHP_URL_PATH);
                $department->head_image = parse_url($head_image, PHP_URL_PATH);
                $department->user_id = $user->id;              
                $department->save();


                if(!empty($data['meta'])){
                // Save custom fields in meta table

                $metas = $data['meta'];
                $fields = \DB::table('metas')->get();

                
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
        $department->delete();
        return back()->with('status',"Department Deleted successfully");
    }
}
