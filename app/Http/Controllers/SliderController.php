<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sliders = Slider::paginate(15);
        return view('admin.slider.index', compact('sliders'));
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
     * @param  \App\Http\Requests\StoreSliderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $user = auth()->user();
        $rules = [
            'title' => ['required', 'string'],
            'alt' => ['required', 'string'],
            'image' => ['required'], 
            'url' => ['required'],
            'lang' => ['required'],
            'order' => ['nullable'],
            'default' => ['required'],
            'status' => ['required'],           
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
                $slide = new Slider($data);
                $slide->user_id = $user->id;
                $image = $data['image'];
                $slide->image = parse_url($image, PHP_URL_PATH);
                $slide->save();
                return back()->with('status',"Slider Added successfully");

            }
            catch(Exception $e){  
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSliderRequest  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        //


        $rules = [
            'title' => ['required', 'string'],
            'alt' => ['required', 'string'],
            'image' => ['required'], 
            'url' => ['required'],
            'lang' => ['required'],
            'order' => ['nullable'],
            'default' => ['required'],
            'status' => ['required'],           
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
                $slider->fill($data);
                $image = $data['image'];
                $slider->image = parse_url($image, PHP_URL_PATH);
                $slider->save();
                return back()->with('status',"Slider Updateed successfully");

            }
            catch(Exception $e){
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
        $slider->delete();
        return back()->with('status',"Slide Deleted successfully");
    }
}
