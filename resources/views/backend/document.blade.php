@extends('layouts.app')
@section('content')
   
    <div class="content">
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissable" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <p class="mb-0">{{Session::get('success')}}!</p>
        </div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger alert-dismissable" role="alert">
            
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <p class="mb-0">{{Session::get('fail')}}!</p>
        </div>
    @endif
    <div class="bg-white p-3 push">
        <!-- Toggle Navigation -->
        <div class="d-lg-none">
            <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
            <button type="button" class="btn btn-block btn-light d-flex justify-content-between align-items-center" data-toggle="class-toggle" data-target="#horizontal-navigation-hover-normal" data-class="d-none">
                Menu 
                <i class="fa fa-bars"></i>
            </button>
        </div>
    <div id="horizontal-navigation-hover-normal" class="d-none d-lg-block mt-2 mt-lg-0">
        <ul class="nav-main nav-main-horizontal nav-main-hover">
            <li class="nav-main-item">
                <a class="nav-main-link active" href="{{ route('document.create') }}">
                    <i class="nav-main-link-icon fa fa-plus"></i>
                    <span class="nav-main-link-name">Novo Documento  </span>
                </a>
            </li>
        </ul>
    </div>
    </div>
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
                                        <th class="d-none d-sm-table-cell" style="width: 30%;">Editar</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Deletar</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documents as $document)
                                    <tr>
                                        <td class="text-center font-size-sm">{{ $document->id}}</td>
                                        <td class="font-w600 font-size-sm">
                                            <a href="be_pages_generic_blank.html">{{ $document->name}}</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell font-size-sm">
                                            <a href="{{ route('document.edit',$document->id) }}" class="btn btn-alt-warning shadow-sm">Editar</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <button class="btn   btn-alt-danger shadow-sm" onclick="document.getElementById('Delete_{{ $document->id}}').submit()">Deletar</button>
                                            <form action="{{ route('document.destroy',$document->id) }}" method="post" id="Delete_{{ $document->id}}"> @csrf
                                            @method('DELETE')</form>
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