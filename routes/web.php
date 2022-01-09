<?php

use App\Http\Controllers\ClientSchedulerController;
use App\Http\Controllers\CloseSchedulerController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ScheduleServiceController;
use App\Models\ClientScheduler;
use App\Models\ScheduleService;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome')->with('services',ScheduleService::all());
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/schedule_service',ScheduleServiceController::class);
Route::resource('/document',DocumentController::class);
Route::resource('client_scheduler', ClientSchedulerController::class);
Route::get('/atendimento',[CloseSchedulerController::class,'index'])->name('atendimento');
Route::post('/atendimento/{client_scheduler}',[CloseSchedulerController::class,'close'])->name('atendimento.close');