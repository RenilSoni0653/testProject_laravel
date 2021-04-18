<?php

namespace App\Http\Controllers;

use App\Requested;
use Illuminate\Http\Request;

class RequestedController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->input('name'));

        $requested = new Requested;
        $requested->req_from_id = $request->input('req_from_id');
        $requested->req_to_id = $request->input('req_to_id');;
        $requested->name = $request->input('name');
        $requested->status = $request->input('status');
        $requested->save();

        return redirect('/comtact/create')->with('msg','Request Send Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requested  $requested
     * @return \Illuminate\Http\Response
     */
    public function show(Requested $requested)
    {
        
        $requesteds = $requested->all();
        
        return view('requests.show')->with(compact('requesteds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requested  $requested
     * @return \Illuminate\Http\Response
     */
    public function edit(Requested $requested)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requested  $requested
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requested $requested)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requested  $requested
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requested $requested)
    {
        //
    }
}
