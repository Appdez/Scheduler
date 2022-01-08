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


                        <li><a class="breadcrumb-item active btn btn-rounded btn-light" href="{{ route('document.create') }}">
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

            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h3 class="block-title">Serviço <small>Data</small></h3>
                        <div class="block-options">
                            <div class="block-options-item">
                                <span class="badge badge-warning badge-pill">status</span>
                            </div>
                            <div class="block-options-item">
                                <span class="badge badge-primary badge-pill">Posição: 45</span>
                            </div>
                            <button type="button" class="btn-block-option">
                                <i class="far fa-fw fa-trash-alt" alt></i>
                            </button>
                            <div class="dropdown">
                                <button type="button" class="btn-block-option dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Opções </button>
                                <div class="dropdown-menu dropdown-menu-right font-size-sm">
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="far fa-fw fa-bell mr-1"></i> News
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="far fa-fw fa-envelope mr-1"></i> Messages
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-calendar-alt mr-1"></i> Remarcar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna
                            accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie
                            vulputate bibendum tempus ante justo arcu erat accumsan..</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection