<?php

namespace App\Http\Controllers;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $schedule_service =  $request->validate([
            'name'=> 'required|unique:schedule_services,name,except,id',
            'requirement' => 'required'
        ]);
        try {
            ScheduleService::create($schedule_service);
            return redirect()->back()->with('success','Serviço crado com sucesso');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','erro ao adicionar Serviço');
        }
       
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScheduleService  $schedule_Service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScheduleService $schedule_Service)
    {
        $schedule_Services =  $request->validate([
            'name'=> 'required|unique:schedule_services,name,except,id',
            'requirement' => 'required'
        ]);
        try {
           
            $schedule_Service->name = $schedule_Services['name'];
            $schedule_Service->requirement = $schedule_Services['requirement'];
            $schedule_Service->save();
            return redirect()->back()->with('success','Serviço actualizado com sucesso');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','erro ao actualizar Serviço');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScheduleService  $schedule_Service
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScheduleService $schedule_Service)
    {
        try {
            $schedule_Service->avg_queues()->sync([]);
            $schedule_Service->client_schedulers()->sync([]);
            $schedule_Service->delete();
            return redirect()->back()->with('success','Serviço deletado com sucesso');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','erro ao deletar Serviço');
        }
    }
}
