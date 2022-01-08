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
        @if(Session::has('fail') || Session::has('error'))
        <div class="alert alert-danger alert-dismissable" role="alert">
            
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <p class="mb-0">{{Session::get('fail')}}!</p>
        </div>
    @endif
<div class="bg-white p-3 push block">
    <!-- Toggle Navigation -->
    <div class="d-lg-none">
        <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
        <button type="button" class="btn btn-block btn-light d-flex justify-content-between align-items-center" data-toggle="class-toggle" data-target="#horizontal-navigation-hover-normal" data-class="d-none">
            Menu 
            <i class="fa fa-bars"></i>
        </button>
    </div>
    <!-- END Toggle Navigation -->

    <!-- Navigation -->
    <div id="horizontal-navigation-hover-normal" class="d-none d-lg-block mt-2 mt-lg-0">
        <ul class="nav-main nav-main-horizontal nav-main-hover">
            <li class="nav-main-item">
                <a class="nav-main-link active" href="{{ route('document.index') }}">
                    <i class="nav-main-link-icon fa fa-home"></i>
                    <span class="nav-main-link-name">Voltar</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END Navigation -->
</div>
<div class="block block-rounded">
    <div class="block-header">
        <h3 class="block-title"> <small>Documentos</small></h3>
    </div>
    <div class="block-content block-content-full">
       <form
       @if ($document != null)
       action="{{ route('document.update',$document->id) }}"
       @else
       action="{{ route('document.store') }}"
       @endif
        method="post">
            <div class="form-group">
                <label for="name">Nome do documento</label>
                <input  class="form-control" id="name"  name="name" @if ($document != null)
               value= "{{$document->name}}"
                @endif placeholder="Nome do documento">
            </div>
            <input type="submit" class="btn btn-primary align-right" value="Enviar">
            @csrf
            @if ($document != null)
            @method('PUT')
            @endif
     </form>
    </div>
</div>
</div>
@endsection