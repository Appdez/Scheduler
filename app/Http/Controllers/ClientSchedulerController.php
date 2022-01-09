<?php

namespace App\Http\Controllers;

use App\Models\ClientDocument;
use App\Models\ClientScheduler;
use App\Models\Document;
use App\Models\ScheduleService;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

    public function create()
    {
        return view('backend.view_client_scheduler')->with([
            'services' => ScheduleService::all(),
            'documents' => Document::all()
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
        $validated =  $request->validate([
            "email" => "required|email",
            "contact" => "required|alpha_num",
            "service_id" => "required|numeric",
            "document_id" => "required|alpha_num",
            "value" => 'required',
            "scheduled_for" => 'required',
        ]);

        if (ClientScheduler::whereDate('scheduled_for',
         Carbon::createFromFormat('Y-m-d', $validated["scheduled_for"]))->count() >= 25
         ) {
            return redirect()->back()->with('fail','Infelizmente não pode arcar para este dia selecionado tente no dia seguinte.');
        }elseif(ClientScheduler::where('service_id', $validated["service_id"])->where('client_id',auth()->user()->id)->whereNull('scheduled_ended_at')->count() >= 1){
            return redirect()->back()->with('fail','Desculpe mas não pode pre marcar o mesmo serviço antes de ser atendido primeiro.');
       } 
        else{
            try {
                    $schedule = ClientScheduler::create([
                        "email" => $validated["email"],
                        "contact" => $validated["contact"],
                        "service_id" => $validated["service_id"],
                        "scheduled_for" => Carbon::createFromFormat('Y-m-d', $validated["scheduled_for"]),
                        'client_id' => Auth::user()->id,
                        'scheduled_at' => now(),
                        'key' => (new Factory())->create()->uuid(),
                        'scheduled_end_at' => Carbon::createFromFormat('Y-m-d', $validated["scheduled_for"])->addDays(1)
                    ]);

                    ClientDocument::create([
                        'document_id' =>  $validated["document_id"],
                        'value ' =>  $validated["value"],
                        'client_schedule_id' => $schedule->id
                    ]);
                    return redirect()->back()->with('success','Serviço pre marcado com sucesso');
            } catch (\Throwable $th) {
                return redirect()->back()->with('fail','Erro ao pre marcar serviço');
       
            }       
        }

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
            'client_scheduler',
            $client_scheduler
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
        try {
            if ( $client_scheduler->client_documents->count() > 0 ) {
                ClientDocument::where(
                    'client_schedule_id', $client_scheduler->id
                )->delete();
            }
           

           $client_scheduler->delete();
            return redirect()->back()->with('success','Pre marcação deletada com sucesso');
        } catch (\Throwable $th) {
           
            return redirect()->back()->with('fail','erro ao deletar pre marcação');
        }
    }
}
