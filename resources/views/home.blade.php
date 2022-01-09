@extends('layouts.app')

@section('content')
   <!-- Hero -->
   <div class="bg-image overflow-hidden" style="background-image: url('{{asset('media/photos/photo3@2x.jpg')}}');">
    <div class="bg-primary-dark-op">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                <div class="flex-sm-fill">
                    <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Dashboard</h1>
                    <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Bem vindo <strong> {{auth()->user()->name}} </strong></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->
<div class="content">
    <div class="row">
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Serviços</div>
                    <div class="font-size-h2 font-w400 text-dark">{{$services->count()}}</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Usuários</div>
                    <div class="font-size-h2 font-w400 text-dark">{{$users}}</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">pre - marcações</div>
                    <div class="font-size-h2 font-w400 text-dark">{{$schedules->count()}}</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Permissões</div>
                    <div class="font-size-h2 font-w400 text-dark">3</div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <!-- Lines Chart -->
            <div class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title">Gráfico de atendimento</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full text-center">
                    <div class="py-3" id="chart">
                        <!-- Lines Chart Container -->
                       
                    </div>
                </div>
            </div>
            <!-- END Lines Chart -->
        </div>
    </div>
</div>
@endsection

@push('chart')
<script src="{{ asset('js/chart.js') }}"></script>
    <script>
      
      
      var options = {
          series: [{
          name: 'Atendidos',
          data: [31, 40, 28, 51, 42, 109, 100]
        }, {
          name: 'Em espera',
          data: [11, 32, 45, 32, 34, 52, 41]
        },
        {
          name: 'Atrasados',
          data: [12, 42, 5, 32, 24, 22, 41]
        }],
          chart: {
          height: 350,
          type: 'area'
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'datetime',
          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
      
    </script>
@endpush