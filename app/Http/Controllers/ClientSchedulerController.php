<?php

namespace App\Http\Controllers;

use App\Models\ClientScheduler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientSchedulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('backend.client_scheduler')->with([
            'client_schedulers' => Auth::user()->client_schedulers
        ]);
        
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientScheduler  $client_scheduler
     * @return \Illuminate\Http\Response
     */
    public function show(ClientScheduler $client_scheduler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientScheduler  $client_scheduler
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientScheduler $client_scheduler)
    {
        return view('backend.view_client_scheduler')->with(
            'client_scheduler',$client_scheduler
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientScheduler  $client_scheduler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientScheduler $client_scheduler)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientScheduler  $client_scheduler
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientScheduler $client_scheduler)
    {
        
    }
}
