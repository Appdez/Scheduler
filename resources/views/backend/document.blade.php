@extends('layouts.app')
@section('content')
   
    <div class="content">
        
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
                                            <a href="{{ route('document.edit',$document->id) }}" class="btn  btn-rounded btn-alt-warning shadow-sm">Editar</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <button class="btn  btn-rounded btn-alt-danger shadow-sm" onclick="document.getElementById('Delete_{{ $document->id}}').submit()">Deletar</button>
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