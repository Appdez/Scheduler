<?php

namespace App\Http\Controllers;

use App\Models\ClientScheduler;
use Illuminate\Http\Request;

class CloseSchedulerController extends Controller
{
    public function index()
    {
        return view('backend.close_scheduler')->with([
            'schedulers' => ClientScheduler::whereDay('scheduled_for','>=',now()->day)
            ->whereMonth('scheduled_for','>=',now()->month)
            ->whereYear('scheduled_for','>=',now()->year)
            ->whereNull('scheduled_ended_at')->get()
        ]);
    }

    public function close(ClientScheduler $client_scheduler)
    {
        try {
            $client_scheduler->scheduled_ended_at = now();
            $client_scheduler->save();
            return redirect()->back()->with('success','Atendimento feito com sucesso.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('fail','Erro ao salvar atendimento.');
     
        }
    }
}
