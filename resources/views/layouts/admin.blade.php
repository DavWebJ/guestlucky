
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DashBoard</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <!-- Theme style -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css'/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" />
    <!-- Page JS Plugins CSS -->
    @yield('css_message')
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{ mix('css/dashmix.css') }}">
    @livewireStyles
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
    <style>
        #toast-container > div {
            position: relative;
            overflow: hidden;
            margin: 0 0 6px;
            padding: 15px 15px 15px 50px;
            width: 350px;
            -moz-border-radius: 3px 3px 3px 3px;
            -webkit-border-radius: 3px 3px 3px 3px;
            border-radius: 3px 3px 3px 3px;
            background-position: 15px center;
            background-repeat: no-repeat;
            -moz-box-shadow: 0 0 12px #999999;
            -webkit-box-shadow: 0 0 12px #999999;
            box-shadow: 0 0 12px #999999;
            color: #ffffff;
            opacity: 1;
            -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
            filter: alpha(opacity=100);
    }
        .toast {
        background-color: #b57fe7 !important;
        }
        .toast-success {
        background-color: #51a351 !important;
        }
        .toast-error {
        background-color: #bd362f !important;
        }
        .toast-info {
        background-color: #2f96b4 !important;
        }
        .toast-warning {
        background-color: #f89406 !important;
        }
    </style>
            <!-- Scripts -->
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
</head>
    <body>
    <div id="page-container"  class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow">
        
<!-- Side Overlay-->
            <aside id="side-overlay">
                <!-- Side Header -->
                <div class="bg-image" style="background-image: url('{{ asset('media/various/bg_side_overlay_header.jpg') }}');">
                    <div class="bg-primary-op">
                        <div class="content-header">
                            <!-- User Avatar -->
                            <a class="img-link mr-1" href="javascript:void(0)">
                                <img class="img-avatar img-avatar48" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
                            </a>
                            <!-- END User Avatar -->

                            <!-- User Info -->
                            <div class="ml-2">
                                <a class="text-white font-w600" href="javascript:void(0)">{{auth()->user()->name}}
                                    
                                </a>
                                <div class="text-white-75 font-size-sm">{{auth()->user()->role->role}}</div>
                            </div>
                            <!-- END User Info -->

                            <!-- Close Side Overlay -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="ml-auto text-white" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                                <i class="fa fa-times-circle"></i>
                            </a>
                            <!-- END Close Side Overlay -->
                        </div>
                    </div>
                </div>
               <!-- Side Content -->
                <div class="content-side">
                    <div class="block pull-x mb-0">
                        <!-- Color Themes -->
                        <!-- Toggle Themes functionality initialized in Template._uiHandleTheme() -->
                        <div class="block-content block-content-sm block-content-full bg-body">
                            <span class="text-uppercase font-size-sm font-w700">Color Themes</span>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row gutters-tiny text-center">
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white font-size-sm font-w600 bg-default" data-toggle="theme" data-theme="default" href="#">
                                        Default
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white font-size-sm font-w600 bg-xwork" data-toggle="theme" data-theme="{{ mix('css/themes/xwork.css') }}" href="#">
                                        xWork
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white font-size-sm font-w600 bg-xmodern" data-toggle="theme" data-theme="{{ mix('css/themes/xmodern.css') }}" href="#">
                                        xModern
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white font-size-sm font-w600 bg-xeco" data-toggle="theme" data-theme="{{ mix('css/themes/xeco.css') }}" href="#">
                                        xEco
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white font-size-sm font-w600 bg-xsmooth" data-toggle="theme" data-theme="{{ mix('css/themes/xsmooth.css') }}" href="#">
                                        xSmooth
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white font-size-sm font-w600 bg-xinspire" data-toggle="theme" data-theme="{{ mix('css/themes/xinspire.css') }}" href="#">
                                        xInspire
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white font-size-sm font-w600 bg-xdream" data-toggle="theme" data-theme="{{ mix('css/themes/xdream.css') }}" href="#">
                                        xDream
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white font-size-sm font-w600 bg-xpro" data-toggle="theme" data-theme="{{ mix('css/themes/xpro.css') }}" href="#">
                                        xPro
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="d-block py-3 text-white font-size-sm font-w600 bg-xplay" data-toggle="theme" data-theme="{{ mix('css/themes/xplay.css') }}" href="#">
                                        xPlay
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END Color Themes -->

                        <!-- Sidebar -->
                        <div class="block-content block-content-sm block-content-full bg-body">
                            <span class="text-uppercase font-size-sm font-w700">Sidebar</span>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row gutters-tiny text-center">
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="sidebar_style_dark" href="javascript:void(0)">Dark</a>
                                </div>
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="sidebar_style_light" href="javascript:void(0)">Light</a>
                                </div>
                            </div>
                        </div>
                        <!-- END Sidebar -->
                        <!-- Header -->
                        <div class="block-content block-content-sm block-content-full bg-body">
                            <span class="text-uppercase font-size-sm font-w700">Header</span>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row gutters-tiny text-center mb-2">
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="header_style_dark" href="javascript:void(0)">Dark</a>
                                </div>
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="header_style_light" href="javascript:void(0)">Light</a>
                                </div>
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="header_mode_fixed" href="javascript:void(0)">Fixed</a>
                                </div>
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="header_mode_static" href="javascript:void(0)">Static</a>
                                </div>
                            </div>
                        </div>
                        <!-- END Header -->

                        <!-- Content -->
                        <div class="block-content block-content-sm block-content-full bg-body">
                            <span class="text-uppercase font-size-sm font-w700">Content</span>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row gutters-tiny text-center">
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="content_layout_boxed" href="javascript:void(0)">Boxed</a>
                                </div>
                                <div class="col-6 mb-1">
                                    <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="content_layout_narrow" href="javascript:void(0)">Narrow</a>
                                </div>
                                <div class="col-12 mb-1">
                                    <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="content_layout_full_width" href="javascript:void(0)">Full Width</a>
                                </div>
                            </div>
                        </div>
                        <!-- END Content -->
                    </div>
                    <div class="block pull-x mb-0">
                        <!-- Content -->
                        <div class="block-content block-content-sm block-content-full bg-body">
                            <span class="text-uppercase font-size-sm font-w700">Heading</span>
                        </div>
                        <div class="block-content">
                            <p>
                                Content..
                            </p>
                        </div>
                        <!-- END Content -->
                    </div>
                </div>
                <!-- END Side Content -->
            </aside>
            <!-- END Side Overlay -->
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="bg-header-dark">
                    <div class="content-header bg-white-10">
                        <!-- Logo -->
                        <a class="font-w600 text-white tracking-wide" href="/">
                            <span class="smini-visible">
                                G<span class="opacity-75">Y</span>
                            </span>
                            <span class="smini-hidden">
                                Guest<span class="opacity-75">Lucky</span>
                            </span>
                        </a>
                        <!-- END Logo -->

                        <!-- Options -->
                        <div>
                            <!-- Toggle Sidebar Style -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                            
                            <a class="js-class-toggle text-white-75" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');" href="javascript:void(0)">
                                <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                            </a>
                            <!-- END Toggle Sidebar Style -->

                            <!-- Close Sidebar, Visible only on mobile screens -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                                <i class="fa fa-times-circle"></i>
                            </a>
                            <!-- END Close Sidebar -->
                        </div>
                        <!-- END Options -->
                    </div>
                </div>
                <!-- END Side Header -->

                <!-- Sidebar Scrolling -->
                <div class="js-sidebar-scroll">
                    @auth
                        @if(auth()->user()->role_id == 1)
                            <!-- Side Navigation -->
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{route('admin.dashboard')}}">
                                    <i class="nav-main-link-icon fa fa-user"></i>
                                    <span class="nav-main-link-name">Admin Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-main-heading">Admin Stats</li>
                            <li class="nav-main-item{{ request()->is('pages/*') ? ' open' : '' }}">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon fa fa-list"></i>
                                    <span class="nav-main-link-name">List</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link{{ request()->is('pages/datatables') ? ' active' : '' }}" href="{{route('admin.list')}}">
                                            <span class="nav-main-link-name">Admin List</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link{{ request()->is('pages/slick') ? ' active' : '' }}" href="{{route('staf.list')}}">
                                            <span class="nav-main-link-name">Staf List</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link{{ request()->is('pages/blank') ? ' active' : '' }}" href="{{route('customer.list')}}">
                                            <span class="nav-main-link-name">Customer List</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link{{ request()->is('pages/blank') ? ' active' : '' }}" href="{{route('properties.list')}}">
                                            <span class="nav-main-link-name">Properties List</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-main-heading">Feature Actions...</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{route('properties.create.propkey')}}">
                                    <i class="nav-main-link-icon fa fa-key"></i>
                                    <span class="nav-main-link-name">Create prop key</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END Side Navigation -->
                        @elseif(auth()->user()->role_id == 2)
                            <!-- Side Navigation -->
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{route('staf.dashboard')}}">
                                    <i class="nav-main-link-icon fa fa-location-arrow"></i>
                                    <span class="nav-main-link-name">Staf Dashboard</span>
                                    <span class="nav-main-link-badge badge badge-pill badge-success">5</span>
                                </a>
                            </li>
                            <li class="nav-main-heading">Actions</li>
                            
                            <li class="nav-main-heading">Feature Actions...</li>
                            <!-- <li class="nav-main-item">
                                <a class="nav-main-link" href="/">
                                    <i class="nav-main-link-icon fa fa-globe"></i>
                                    <span class="nav-main-link-name">Landing</span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                    <!-- END Side Navigation -->
                        @else
                        <!-- Side Navigation -->
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{route('admin.dashboard')}}">
                                    <i class="nav-main-link-icon fa fa-location-arrow"></i>
                                    <span class="nav-main-link-name">Customer Dashboard</span>
                                    <span class="nav-main-link-badge badge badge-pill badge-success">5</span>
                                </a>
                            </li>
                            <li class="nav-main-heading">Actions</li>

                            <li class="nav-main-heading">Feature Actions...</li>
                            <!-- <li class="nav-main-item">
                                <a class="nav-main-link" href="/">
                                    <i class="nav-main-link-icon fa fa-globe"></i>
                                    <span class="nav-main-link-name">Landing</span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                    <!-- END Side Navigation -->
                        @endif
                    @endauth
                </div>
                <!-- END Sidebar Scrolling -->
            </nav>
            <!-- END Sidebar -->
            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div>
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-dual" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <!-- END Toggle Sidebar -->

                        <!-- Open Search Section -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-dual" data-toggle="layout" data-action="header_search_on">
                            <i class="fa fa-fw fa-search"></i> <span class="ml-1 d-none d-sm-inline-block">Search</span>
                        </button>
                        <!-- END Open Search Section -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div>
                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-fw fa-user d-sm-none"></i>
                                <span class="d-none d-sm-inline-block">{{auth()->user()->name}}</span>
                                <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                                <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                                   Menu
                                </div>
                                @if (auth()->user()->role_id == 1)
                                <div class="p-2">
                                    <a class="dropdown-item" href="{{route('admin.show')}}">
                                        <i class="far fa-fw fa-user mr-1"></i> Profile
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{route('messages.index')}}">
                                        <span><i class="far fa-fw fa-envelope mr-1"></i> Inbox</span>
                                        <!-- <span class="badge badge-primary">@yield('message.count')</span> -->
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="far fa-fw fa-file-alt mr-1"></i> Invoices
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>

                                    <!-- Toggle Side Overlay -->
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <a class="dropdown-item" href="{{route('token.show')}}">
                                        <i class="fas fa-fw fa-key mr-1"></i> Manage API key/token
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                        <i class="fas fa-fw fa-gear mr-1"></i> Settings
                                    </a>
                                    <!-- END Side Overlay -->

                                    <div role="separator" class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            <i class="nav-icon fas fa-sign-out-alt px-2"></i>{{ __('Logout') }}
                                        </a>
                                        </form>
                                </div>
                                @elseif (auth()->user()->role_id == 2)
                                <div class="p-2">
                                    <a class="dropdown-item" href="{{route('staf.show')}}">
                                        <i class="far fa-fw fa-user mr-1"></i> Profile
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                        <span><i class="far fa-fw fa-envelope mr-1"></i> Inbox</span>
                                        <span class="badge badge-primary">3</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="far fa-fw fa-file-alt mr-1"></i> Invoices
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>

                                    <!-- Toggle Side Overlay -->
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                        <i class="fas fa-fw fa-gear mr-1"></i> Settings
                                    </a>
                                    <!-- END Side Overlay -->

                                    <div role="separator" class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            <i class="nav-icon fas fa-sign-out-alt px-2"></i>{{ __('Logout') }}
                                        </a>
                                        </form>
                                </div>
                                @else
                                <div class="p-2">
                                    <a class="dropdown-item" href="{{route('customer.show')}}">
                                        <i class="far fa-fw fa-user mr-1"></i> Profile
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                        <span><i class="far fa-fw fa-envelope mr-1"></i> Inbox</span>
                                        <span class="badge badge-primary">3</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="far fa-fw fa-file-alt mr-1"></i> Invoices
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>

                                    <!-- Toggle Side Overlay -->
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                        <i class="fas fa-fw fa-gear mr-1"></i> Settings
                                    </a>
                                    <!-- END Side Overlay -->

                                    <div role="separator" class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            <i class="nav-icon fas fa-sign-out-alt px-2"></i>{{ __('Logout') }}
                                        </a>
                                        </form>
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- END User Dropdown -->

                        <!-- Notifications Dropdown -->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-fw fa-bell text-primary"></i>
                                <!-- <span class="badge badge-success badge-pill">@yield('unread')</span> -->
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
                                <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                                   Messages
                                </div>
                                <!-- <ul class="nav-items my-2">
                                    @if ($messages ?? '')
                                        @foreach ($messages as $message)
                                        <li>
                                            <a class="text-dark media py-2" href="{{ route('messages.show', ['message'=> $message]) }}">
                                                <div class="mx-3">
                                                    @if ($message->read == 1)
                                                         <i class="fa fa-fw fa-envelope-open text-muted"></i>
                                                    @else
                                                         <i class="fa fa-fw fa-envelope text-muted"></i>
                                                    @endif
                                                   
                                                </div>
                                                <div class="media-body font-size-sm pr-2">
                                                    <div class="font-w600">{{ Str::limit($message->message,$limit = 65, $end = '...')}}</div>
                                                    <div class="text-muted font-italic">{{ \Carbon\Carbon::parse($message->time)->diffForHumans() }}</div>
                                                </div>
                                            </a>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul> -->
                                <div class="p-2 border-top">
                                    <a class="btn btn-light btn-block text-center" href="{{route('messages.index')}}">
                                        <i class="fa fa-fw fa-eye mr-1"></i> View All
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END Notifications Dropdown -->

                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <!-- <button type="button" class="btn btn-dual" data-toggle="layout" data-action="side_overlay_toggle">
                            <i class="fa fa-fw fa-wrench"></i>
                        </button> -->
                        <!-- END Toggle Side Overlay -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header bg-primary">
                    <div class="content-header">
                        <form class="w-100" action="/dashboard" method="POST">
                            @csrf
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-fw fa-times-circle"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control border-0" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                            </div>
                        </form>
                   </div>
                </div>
                <!-- END Header Search -->

                <!-- Header Loader -->
                <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-primary-darker">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

                <!-- Main Container -->


            <!-- Main Container -->
            <main id="main-container">
            {{ $slot ?? '' }}
            @yield('admin.dashboard')
            @yield('admin.adminlist')
            @yield('admin.staflist')
            @yield('admin.customerlist')
            @yield('admin.create')
            @yield('admin.propkey')
            @yield('token')
            @yield('message')
            @yield('messages')
            @yield('booking')
            </main>
            <!-- END Main Container -->
        </div>
        <!-- Dashmix Core JS -->

        <script src="{{ mix('/js/dashmix.app.js') }}"></script>
        <script src="{{ asset('js/laravel.app.js') }}"></script> 
        <!-- <script src="{{ mix('/js/laravel.app.js') }}"></script> -->
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
<!-- REQUIRED SCRIPTS -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-maxlength/1.9.1/bootstrap-maxlength.min.js' ></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.7.1/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@yield('js_message')
@stack('modals')

    @livewireScripts
    @if(Session::has('success'))
            <script>
               
                toastr.success("{{ Session::get('success') }}");
            </script>
            @endif
            @if(Session::has('error'))
            <script>
              
               toastr.error("{{ Session::get('error') }}");
            </script>
    @endif
    <script>     
        $(function () {
            $('.js-maxlength').maxlength({
                alwaysShow: true,
                warningClass: "badge badge-warning",
                limitReachedClass: "badge badge-danger",
                placement: 'bottom',
            });
            toastr.options.progressBar = true;
            Dashmix.helpers('sparkline');
            $('.js-example-basic-single').select2();
            window.scrollTo(0, 0);
            tinymce.init({
                selector : ".tiny",
                plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
                toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            
            
    });
    </script>
</body>
</html>