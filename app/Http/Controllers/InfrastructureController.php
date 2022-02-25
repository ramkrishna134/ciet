<?php

namespace App\Http\Controllers;

use App\Models\Infrastructure;
use App\Http\Requests\StoreInfrastructureRequest;
use App\Http\Requests\UpdateInfrastructureRequest;

class InfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreInfrastructureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInfrastructureRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Infrastructure  $infrastructure
     * @return \Illuminate\Http\Response
     */
    public function show(Infrastructure $infrastructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Infrastructure  $infrastructure
     * @return \Illuminate\Http\Response
     */
    public function edit(Infrastructure $infrastructure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInfrastructureRequest  $request
     * @param  \App\Models\Infrastructure  $infrastructure
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInfrastructureRequest $request, Infrastructure $infrastructure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Infrastructure  $infrastructure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Infrastructure $infrastructure)
    {
        //
    }
}
