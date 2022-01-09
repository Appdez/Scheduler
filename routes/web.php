<?php

use App\Http\Controllers\ClientSchedulerController;
use App\Http\Controllers\CloseSchedulerController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ScheduleServiceController;
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

Auth::routes([
'password.confirm'=>false,
'password.reset'=>false    
]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware([
    'auth','role:admin'
]);
Route::resource('/schedule_service',ScheduleServiceController::class)->middleware([
    'auth','role:admin'
]);;
Route::resource('/document',DocumentController::class)->middleware([
    'auth','role:admin'
]);;
Route::resource('client_scheduler', ClientSchedulerController::class)->middleware([
    'auth','role:admin|atendente|cliente'
]);;
Route::get('/atendimento',[CloseSchedulerController::class,'index'])->name('atendimento')->middleware([
    'auth','role:admin|atendente'
]);;
Route::post('/atendimento/{client_scheduler}',[CloseSchedulerController::class,'close'])->name('atendimento.close')->middleware([
    'auth','role:admin|atendente'
]);;