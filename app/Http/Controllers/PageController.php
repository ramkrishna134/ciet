<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Page;
use Illuminate\Support\Str;

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

        $pages = Page::paginate(15);
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
            'content' => 'nullable',
            'description' => 'nullable',
            'lang' => 'required',
            'featured_icon' => 'nullable',
            'status' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect(route('page.create'))
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
                $page->save();
                return redirect(route('page.index'))->with('status',"Page created successfully");

            }
            catch(Exception $e){  
                return redirect(route('role.index'))->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page, $slug)
    {
        //
        // dd('hello');
        $page = Page::where('slug', $slug)->first();
        // dd($page);
        return view('web.single', compact('page'));
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
            'content' => 'nullable',
            'description' => 'nullable',
            'lang' => 'required',
            'featured_icon' => 'nullable',
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
                $page->fill($data);
                if( empty( $data['slug'] ) ){
                    $page->slug = Str::slug( $data['title'] );
                }
                $page->user_id = $user->id;
                $page->save();
                return redirect(route('page.index'))->with('status',"Page updated successfully");

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
    }
}
