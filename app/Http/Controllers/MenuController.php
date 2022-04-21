<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $menus = Menu::all();
        $params = $this->validate($request, [
            'label' => 'nullable',
            'parent_id' => 'nullable',
            'lang' => 'nullable',
            'status' => 'nullable',
        ]);

        $query = MenuItem::orderByDesc('id');
        $params['label'] = trim( $params['label'] ?? '' );
        $params['parent_id'] = $params['parent_id'] ?? '';
        $params['lang'] = $params['lang'] ?? '';
        $params['status'] = $params['status'] ?? '';

        if( !empty( $params['label'] ) ){
            $query->where(function( $query ) use ($params) {
                /** @var Builder $query */
                $query->where('label', 'like', '%' . $params['label'] . '%' );
            });
        }

        if( !empty( $params['parent_id'] ) ){
            $query->where('parent_id', $params['parent_id']);
        }

        if( !empty( $params['lang'] ) ){
            $query->where('lang', $params['lang']);
        }

        if( !empty( $params['status'] ) ){
            $query->where('status', $params['status']);
        }

        $items = $query->paginate();
        $menu_links = MenuItem::query()->where('parent_id', NULL)->get();
        return view('admin.menu.index')->with([
            'menus' => $menus,
            'items' => $items,
            'params' => $params
        ]);
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
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255']
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
                $menu = new Menu($data);
                $menu->save();
                return back()->with('status',"Menu created successfully");

            }
            catch(Exception $e){  
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
        $menu->delete();
        return back()->with('status',"Menu Group Deleted successfully");
    }
}
