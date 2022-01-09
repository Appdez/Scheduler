@extends('layouts.app')
@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Nova agenda
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">


                        <li><a class="breadcrumb-item active btn btn-rounded btn-light"
                                href="{{ route('client_scheduler.index') }}">
                                <i class="nav-main-link-icon fa fa-arrow-left"></i>
                                <span class="nav-main-link-name">Voltar </span>
                            </a></li>
                    </ol>
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
        <div class="block">
            <div class="block-header"></div>
            <div class="block-body">
                <div class="container push p-3 col-md-11">
                    <form action="{{ route('client_scheduler.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control form-control-alt"
                                placeholder="Digite o email para receber notificação" required>
                        </div>
                        <div class="form-group">
                            <label for="">Contacto</label>
                            <input type="text" name="contact" class="form-control form-control-alt"
                                placeholder="Digite o contacto para receber notificação" required>
                        </div>
                        <div class="form-group">
                            <label for="">Serviço</label>
                            <select class="form-control form-control-alt" name="service_id" required>
                               @foreach ($services as $service)
                                   <option value="{{$service->id}}">{{$service->name}}</option>
                               @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Documento de identificação</label>
                            <select class="form-control form-control-alt" name="document_id" required>
                                @foreach ($documents as $document)
                                    <option value="{{$document->id}}">{{$document->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Número do documento</label>
                            <input type="text" name="value" class="form-control form-control-alt"
                                placeholder="Número do documento" required>

                        </div>
                        <div class="form-group">
                            <label for="">Dia a marcar</label>
                            <input placeholder="Mês dia, ano" data-alt-input="true" data-date-format="Y-m-d"
                                data-alt-format="F j, Y" type="date" name="scheduled_for" id="example-flatpickr-friendly"
                                class="form-control js-flatpickr" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js_after')
    <script src="{{ asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/plugins/flatpickr/flatpickr.min.js') }}"></script>
    <script>
        jQuery(function() {
            One.helpers(['flatpickr', 'datepicker']);
        });
    </script>
@endpush
@push('css_after')
    <link rel="stylesheet" href="{{ asset('/js/plugins/flatpickr/flatpickr.min.css') }}">
@endpush
