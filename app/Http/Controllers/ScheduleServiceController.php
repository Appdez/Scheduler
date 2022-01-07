<?php

namespace App\Http\Controllers;

use App\Models\AvgQueue;
use App\Models\ClientScheduler;
use App\Models\ScheduleService;
use Illuminate\Http\Request;

class ScheduleServiceController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.schedule_service')->with([
            'schedule_services' => ScheduleService::all()
        ]);
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientScheduler  $clientScheduler
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.view_schedule_service')->with(
            'schedule_service',null
        );
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $schedule_service =  $request->validate([
            'name'=> 'required|unique:schedule_services,name,except,id',
            'ckeditor' => 'required'
        ]);
        try {
            ScheduleService::create([
                'name' => $schedule_service['name'],
                'requirement' => $schedule_service['ckeditor']
            ]);
            return redirect()->back()->with('success','Serviço crado com sucesso');
        } catch (\Throwable $th) {
            return redirect()->back()->with('fail','erro ao adicionar Serviço');
        }
       
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientScheduler  $clientScheduler
     * @return \Illuminate\Http\Response
     */
    public function edit(ScheduleService $schedule_service)
    {
        return view('backend.view_schedule_service')->with(
            'schedule_service',$schedule_service
        );
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScheduleService  $schedule_service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScheduleService $schedule_service)
    {
        $schedule_servicex =  $request->validate([
            'name'=> 'required',
            'ckeditor' => 'required'
        ]);
        try {
           
            $schedule_service->name = $schedule_servicex['name'];
            $schedule_service->requirement = $schedule_servicex['ckeditor'];
            $schedule_service->save();
            return redirect()->back()->with('success','Serviço actualizado com sucesso');
        } catch (\Throwable $th) {
            return redirect()->back()->with('fail','erro ao actualizar Serviço');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScheduleService  $schedule_service
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScheduleService $schedule_service)
    {
        try {
            if ( $schedule_service->avg_queues->count() > 0 ) {
                AvgQueue::where(
                    'service_id', $schedule_service->id
                )->delete();
            }
            if ( $schedule_service->client_schedulers->count() > 0 ) {
                ClientScheduler::where('service_id',$schedule_service->id)->delete();}


           $schedule_service->delete();
            return redirect()->back()->with('success','Serviço deletado com sucesso');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('fail','erro ao deletar Serviço');
        }
    }
}
