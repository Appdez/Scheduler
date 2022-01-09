@extends('layouts.app')
@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Atendimento
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                   
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissable" role="alert">
                <div class="flex-00-auto">
                    <i class="fa fa-fw fa-check"></i>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <p class="mb-0">{{ Session::get('success') }}!</p>
            </div>
        @endif
        @if (Session::has('fail') || Session::has('error'))
            <div class="alert alert-danger alert-dismissable" role="alert">

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <p class="mb-0">{{ Session::get('fail') }}!</p>
            </div>
        @endif

<!-- Dynamic Table Full -->
<div class="block block-rounded">
    <div class="block-header">
        <h3 class="block-title"> <small>Documentos</small></h3>
    </div>
    <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="text-center" style="width: 80px;">ID</th>
                    <th>Nome</th>
                    <th>Código</th>
                    <th class="d-none d-sm-table-cell" style="width: 30%;">Atender</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedulers as $scheduler)
                    <tr>
                        <td class="text-center font-size-sm">{{ $scheduler->id }}</td>
                        <td class="font-w600 font-size-sm">
                            <a >{{ $scheduler->user->name }}</a>
                        </td>
                        <td class="font-w600 font-size-sm">
                            {{ $scheduler->key }}
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <button class="btn   btn-alt-success shadow-sm"
                                onclick="document.getElementById('Delete_{{ $scheduler->id }}').submit()">Atender</button>
                            <form action="{{ route('atendimento.close', $scheduler->id) }}" method="post"
                                id="Delete_{{ $scheduler->id }}"> @csrf
                                @method('POST')</form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- END Dynamic Table Full -->
    </div>
    @endsection