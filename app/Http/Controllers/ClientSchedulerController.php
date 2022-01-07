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
        
        return view('backend.schedule_service')->with([
            'client_schedulers' => ClientScheduler::all()
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
     * @param  \App\Models\ClientScheduler  $clientScheduler
     * @return \Illuminate\Http\Response
     */
    public function show(ClientScheduler $clientScheduler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientScheduler  $clientScheduler
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientScheduler $clientScheduler)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientScheduler  $clientScheduler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientScheduler $clientScheduler)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientScheduler  $clientScheduler
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientScheduler $clientScheduler)
    {
        
    }
}
