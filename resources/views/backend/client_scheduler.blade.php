@extends('layouts.app')
@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Agendar Serviços
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">


                        <li><a class="breadcrumb-item active btn btn-rounded btn-light"
                                href="{{ route('client_scheduler.create') }}">
                                <i class="nav-main-link-icon fa fa-plus"></i>
                                <span class="nav-main-link-name">Nova agenda </span>
                            </a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            @foreach ($client_schedulers as $schedule)

                @if ($schedule->scheduled_for > now() && $schedule->scheduled_ended_at == null)

                    <div class="col-md-6">
                        <div class="block block-rounded ">
                            <div class="block-header">
                                <h3 class="block-title">{{ $schedule->schedule_service->name }} <small> </small></h3>
                                <div class="block-options">
                                    <div class="block-options-item">

                                        <span class="badge badge-warning badge-pill"> Em espera </span>
                                    </div>
                                    <div class="block-options-item">
                                        <span class="badge badge-primary badge-pill">Na fila:
                                            {{ $schedule->countService(Auth::user()->id) }} </span>
                                    </div>
                                    <button type="button" class="btn-block-option"
                                        onclick="document.getElementById('schedule_{{ $schedule->id }}').submit()">
                                        <i class="far fa-fw fa-trash-alt" alt></i>
                                    </button>
                                    <form action="{{ route('client_scheduler.destroy', $schedule->id) }}" method="post"
                                        id="schedule_{{ $schedule->id }}">@csrf @method('DELETE')</form>
                                </div>
                            </div>
                            <div class="block-content">
                                <small>Requisitos</small>
                                <p>
                                    {!! $schedule->schedule_service->requirement !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @elseif ($schedule->scheduled_for < now() && $schedule->scheduled_ended_at == null)

                    <div class="col-md-6">
                        <div class="block block-rounded bg-danger-light">
                            <div class="block-header">
                                <h3 class="block-title">{{ $schedule->schedule_service->name }} <small> </small></h3>
                                <div class="block-options">
                                    <div class="block-options-item">
                                        <span class="badge badge-danger badge-pill"> Atrasado </span>
                                    </div>
                                    <button type="button" class="btn-block-option"
                                        onclick="document.getElementById('schedule_{{ $schedule->id }}').submit()">
                                        <i class="far fa-fw fa-trash-alt" alt></i>
                                    </button>
                                    <form action="{{ route('client_scheduler.destroy', $schedule->id) }}" method="post"
                                        id="schedule_{{ $schedule->id }}">@csrf @method('DELETE')</form>



                                </div>
                            </div>
                            <div class="block-content">
                                <small>Requisitos</small>
                                <p>
                                    {!! $schedule->schedule_service->requirement !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @elseif (($schedule->scheduled_for < now() || $schedule->scheduled_for > now()) && $schedule->scheduled_ended_at != null)


                    <div class="col-md-6">
                        <div class="block block-rounded bg-success-light">
                            <div class="block-header">
                                <h3 class="block-title">{{ $schedule->schedule_service->name }} <small> </small></h3>
                                <div class="block-options">
                                    <div class="block-options-item">

                                        <span class="badge badge-light badge-pill"> Concuído </span>
                                    </div>

                                    <button type="button" class="btn-block-option"
                                        onclick="document.getElementById('schedule_{{ $schedule->id }}').submit()">
                                        <i class="far fa-fw fa-trash-alt" alt></i>
                                    </button>
                                    <form action="{{ route('client_scheduler.destroy', $schedule->id) }}" method="post"
                                        id="schedule_{{ $schedule->id }}">@csrf @method('DELETE')</form>

                                </div>
                            </div>
                            <div class="block-content">
                                <small>Requisitos</small>
                                <p>
                                    {!! $schedule->schedule_service->requirement !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif


            @endforeach
        </div>
    </div>
@endsection
