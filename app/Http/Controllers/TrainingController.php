<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Training;
use Illuminate\Support\Str;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trainings = Training::paginate();
        return view('admin.training.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.training.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTrainingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $user = auth()->user();
        $rules = [
            'title' => 'required',
            'slug' => 'nullable',
            'status' => 'required',
            'lang' => 'required',
            'content' => 'nullable',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'category' => 'required',
            'type' => 'required',
            'featured_image' => 'required',
            'icon' => 'required',
            'key_word' => 'nullable',
            
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
                $training = new Training($data);
                if( empty( $data['slug'] ) ){
                    $training->slug = Str::slug( $data['title'] );
                }
                $training->user_id = $user->id;
                if( !empty( $data['key_word'] ) ){
                    $training->key_word = json_encode($data['key_word']);
                } 
                $training->save();
                return redirect(route('training.index'))->with('status',"New Training created successfully");

            }
            catch(Exception $e){  
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        //

        return view('admin.training.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrainingRequest  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        //

        $user = auth()->user();
        $rules = [
            'title' => 'required',
            'slug' => 'nullable',
            'status' => 'required',
            'lang' => 'required',
            'content' => 'nullable',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'category' => 'required',
            'type' => 'required',
            'featured_image' => 'required',
            'icon' => 'required',
            'key_word' => 'nullable',
            
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
                $training->fill($data);
                $training->user_id = $user->id;
                if( !empty( $data['key_word'] ) ){
                    $training->key_word = json_encode($data['key_word']);
                } 
                $training->save();
                return back()->with('status',"Training updated successfully");

            }
            catch(Exception $e){  
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        //
    }
}
