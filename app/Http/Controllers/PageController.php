<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Page;
use Illuminate\Support\Str;
use DB;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $pages = Page::paginate(10);
        return view('admin.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.page.edit');
    }

    public function general()
    {
        //
        return view('admin.page.general');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $user = auth()->user();
        $rules = [
            'title' => 'required',
            'slug' => 'nullable',
            'type' => 'required',
            'content' => 'nullable',
            'description' => 'required',
            'lang' => 'required',
            'filepath' => 'nullable',
            'key_word' => 'nullable',
            'status' => 'required',
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
                $page = new Page($data);
                if( empty( $data['slug'] ) ){
                    $page->slug = Str::slug( $data['title'] );
                }
                $page->user_id = $user->id;
                $page->featured_icon = $data['filepath'];
                $page->save();
                return redirect(route('page.index'))->with('status',"Page created successfully");

            }
            catch(Exception $e){  
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page, $slug, $local = null)
    {
        if(!empty($local)){
            $page = Page::where('slug', $slug)->where('lang', $local)->where('status', 1)->first();
        }else{
            $page = Page::where('slug', $slug)->where('lang', 'en')->where('status', 1)->first();
        };
        
        if(empty($page)){
            return abort(404);
        }else{
            return view('web.single', compact('page'));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
        return view('admin.page.edit', compact('page'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePageRequest  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //

        $user = auth()->user();
        $rules = [
            'title' => 'required',
            'slug' => 'nullable',
            'type' => 'required',
            'content' => 'nullable',
            'description' => 'required',
            'lang' => 'required',
            'filepath' => 'nullable',
            'key_word' => 'nullable',
            'status' => 'required',
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
                // dd($data);
                $page->fill($data);
                if( empty( $data['slug'] ) ){
                    $page->slug = Str::slug( $data['title'] );
                }
                $page->description = $data['description'];
                $page->featured_icon = $data['filepath'];
                $page->user_id = $user->id;
                $page->save();
                return back()->with('status',"Page updated successfully");

            }
            catch(Exception $e){  
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
        $page->delete();
        return back()->with('status',"Page Deleted successfully");
    }

    public function media(){
        return view('admin.media');
    }

    public function css(){
        return view('admin.css');
    }


    public function search(Request $request) {

        if($request->get('query')){
            $query = $request->get('query');
            
            // $data[] = \DB::table('pages')->where("key_word", "LIKE", '%' . $query . '%')->get();

            $departments[] = \DB::table('departments')->where("key_word", "LIKE", '%' . $query . '%')->get();
            $pages[] = \DB::table('pages')->where("key_word", "LIKE", '%' . $query . '%')->get();
            $events[] = \DB::table('events')->where("key_word", "LIKE", '%' . $query . '%')->get();
            $trainings[] = \DB::table('trainings')->where("key_word", "LIKE", '%' . $query . '%')->get();

            $datas = array_merge($departments, $pages, $events, $trainings);

            return response()->json($datas);
        }
        
        // $text = $request->input('text');
    
        // $patients = DB::table('pages')->where('key_word', 'Like', "$text")->get();
    
        // return response()->json($patients);
    }
}
