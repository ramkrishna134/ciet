<?php

namespace App\Http\Controllers;

use App\Models\Artical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articals = Artical::paginate();
        return view('admin.artical.index', compact('articals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.artical.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = auth()->user();
        $rules = [
            'title' =>'required',
            'category' =>'required',
            'icon' =>'required',
            'url' =>'required',
            'date' =>'required',
            'month' => 'required',
            'year' => 'required',
            'lang' =>'required',
            'status' =>'required',
            'latest' => 'nullable',     
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
                $artical = new Artical($data);
                $icon = $data['icon'];
                $artical->icon = parse_url($icon, PHP_URL_PATH);
                $artical->user_id = $user->id; 
                $artical->save();
                return redirect(route('artical.index'))->with('status',"Artical added successfully");

            }
            catch(Exception $e){  
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artical  $artical
     * @return \Illuminate\Http\Response
     */
    public function show(Artical $artical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artical  $artical
     * @return \Illuminate\Http\Response
     */
    public function edit(Artical $artical)
    {
        //
        return view('admin.artical.edit', compact('artical'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticalRequest  $request
     * @param  \App\Models\Artical  $artical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artical $artical)
    {
        //
        $user = auth()->user();
        $rules = [
            'title' =>'required',
            'category' =>'required',
            'icon' =>'required',
            'url' =>'required',
            'date' =>'required',
            'month' => 'required',
            'year' => 'required',
            'lang' =>'required',
            'status' =>'required',
            'latest' => 'nullable',    
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
                $artical->fill($data);
                $icon = $data['icon'];
                $artical->icon = parse_url($icon, PHP_URL_PATH);
                $artical->user_id = $user->id; 
                $artical->save();
                return back()->with('status',"Artical updated successfully");

            }
            catch(Exception $e){
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artical  $artical
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artical $artical)
    {
        //
        $artical->delete();
        return back()->with('status',"Artical Deleted successfully");
    }

    public function newsletter(){
        $lang = $_GET['lang'] ?? null;
        if(!empty($lang)){
            if($lang == 'en' OR $lang == 'hi'){
                $articals = Artical::orderBy('date', 'DESC')->where('lang', $lang)->where('status', 1)->paginate(12);
                
            }else{
                abort(404);
            }
        }else{
            $articals = Artical::orderBy('date', 'DESC')->where('lang', 'en')->where('status', 1)->paginate(12);
        }
        
        return view('web.newsletter', compact('articals'));
    }
}
