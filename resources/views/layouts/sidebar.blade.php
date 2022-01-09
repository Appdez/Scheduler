
@auth
<nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="content-header bg-white-5">
                    <!-- Logo -->
                    <a class="font-w600 text-dual" href="/">
                        <span class="smini-visible">
                            <i class="fa fa-circle-notch text-primary"></i>
                        </span>
                        <span class="smini-hide font-size-h5 tracking-wider">
                            <span class="font-w400">{{config('app.name')}}</span>
                        </span>
                    </a>
                    <!-- END Logo -->

                    <!-- Extra -->
                    <div>

                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="d-lg-none btn btn-sm btn-dual ml-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                            <i class="fa fa-fw fa-times"></i>
                        </a>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Extra -->
                </div>
                <!-- END Side Header -->

                <!-- Sidebar Scrolling -->
                <div class="js-sidebar-scroll">
                    <!-- Side Navigation -->
                    <div class="content-side">
                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('home') ? ' active' : '' }}" href="/home">
                                    <i class="nav-main-link-icon si si-cursor"></i>
                                    <span class="nav-main-link-name">Dashboard</span>
                                </a>
                               
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('atendimento*') ? ' active' : '' }}" href="/atendimento">
                                    <i class="nav-main-link-icon si si-pin"></i>
                                    <span class="nav-main-link-name">Atendimento</span>
                                </a>
                                
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('client_scheduler*') ? ' active' : '' }}" href="{{ route('client_scheduler.index') }}">
                                    <i class="nav-main-link-icon si si-calendar"></i>
                                    <span class="nav-main-link-name">Agendar</span>
                                </a>
                                
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('schedule_service*') ? ' active' : '' }}" href="{{ route('schedule_service.index') }}">
                                    <i class="nav-main-link-icon si si-anchor"></i>
                                    <span class="nav-main-link-name">Criar serviços</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('document*') ? ' active' : '' }}" href="{{ route('document.index') }}">
                                    <i class="nav-main-link-icon si si-doc"></i>
                                    <span class="nav-main-link-name">Registar documentos</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END Side Navigation -->
                </div>
                <!-- END Sidebar Scrolling -->
            </nav>
            @endauth