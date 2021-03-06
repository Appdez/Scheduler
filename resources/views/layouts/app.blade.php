<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>{{config('app.name')}}</title>

        <meta name="description" content="">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

        <!-- Fonts and Styles -->
        @yield('css_before')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{ mix('/css/oneui.css') }}">
         <!-- Page JS Plugins CSS -->
         <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
         <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
  

        <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="{{ mix('/css/themes/amethyst.css') }}"> -->
        @stack('css_after')

            <style>
                .block{
                    border-radius: 1.2rem !important;
                }
            </style>
        <!-- Scripts -->
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
    </head>
    <body>
        <div id="page-container" class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow">
          

            <!-- Sidebar -->
           
            @include('layouts.sidebar')
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="d-flex align-items-center">
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <!-- END Toggle Sidebar -->
                    </div>
                    <!-- END Left Section -->
                    <!-- Right Section -->
                    <div class="d-flex align-items-center">
                        <!-- User Dropdown -->
                        @guest()
                        
                        @if (request()->is('register'))
                        <a href="{{ route('login') }}" class="btn btn-sm btn-dual d-flex align-items-center" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-lock    "></i>
                            <span class="d-none d-sm-inline-block ml-2">Login</span>
                        </a>
                        @elseif (request()->is('login'))
                            <a href="{{ route('register') }}" class="btn btn-sm btn-dual d-flex align-items-center"aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-file    "></i>
                            <span class="d-none d-sm-inline-block ml-2">registar - se</span>
                        </a>
                        @endif

                        <a href="{{ url('/') }}" class="ml-4 btn btn-sm btn-dual d-flex align-items-center"  aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-home    "></i>
                            <span class="d-none d-sm-inline-block ml-2">??nicio</span>
                        </a>
                        @endguest
                        @auth
                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn btn-sm btn-dual d-flex align-items-center" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="Header Avatar" style="width: 21px;">
                                <span class="d-none d-sm-inline-block ml-2">{{ Str::ucfirst(Auth::user()->name) }}</span>
                                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ml-1 mt-1"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 border-0" aria-labelledby="page-header-user-dropdown">
                            
                                
                                <div class="p-3 text-center bg-primary-dark rounded-top">
                                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
                                    <p class="mt-2 mb-0 text-white font-w500">{{ Str::ucfirst(Auth::user()->name) }}</p>
                                    <p class="mb-0 text-white-50 font-size-sm">
                                        @role('admin')
                                         Admin   
                                        @endrole
                                        
                                    </p>
                                </div>
                                <div class="p-2">
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)" onclick="document.getElementById('logout').submit()">
                                        <span class="font-size-sm font-w500">Log Out</span>
                                    </a>
                                    <form action="{{ route('logout') }}" method="post" id="logout"> @csrf</form>
                                </div>
                           
                            </div>
                        </div>
                        @endauth
                        <!-- END User Dropdown -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->


               
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                
                @yield('content')
            </main>
            <!-- END Main Container -->

        </div>
        <!-- END Page Container -->

        <!-- OneUI Core JS -->
        <script src="{{ mix('js/oneui.app.js') }}"></script>

        <!-- Laravel Scaffolding JS -->
        <!-- <script src="{{ mix('/js/laravel.app.js') }}"></script> -->

        @stack('chart')
    
   
        <!-- Page JS Plugins -->
        <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>
    
        <!-- Page JS Code -->
        <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
        @stack('js_after')
   
    
    </body>
</html>
