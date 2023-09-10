
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ $title . (' - ') . $submenu }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('main') }}/src/assets/img/favicon.ico"/>
    <!-- ENABLE LOADERS -->
    <link href="{{ asset('main') }}/layouts/vertical-dark-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main') }}/layouts/vertical-dark-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="{{ asset('main') }}/layouts/vertical-dark-menu/loader.js"></script>
    <!-- /ENABLE LOADERS -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('main') }}/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main') }}/layouts/vertical-dark-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main') }}/layouts/vertical-dark-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/assets/css/light/elements/alert.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/assets/css/dark/elements/alert.css">
    <link rel="stylesheet" href="{{ asset('main') }}/vendor/fas/css/all.min.css">

    @php

        use App\Models\Menu;
        
        $menus = Menu::whereNull('parent_id')->with('children')->get();

    @endphp

    @yield('custom-css')
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    
    <style>
        body.dark .layout-px-spacing, .layout-px-spacing {
            min-height: calc(100vh - 155px) !important;
        }
    </style>
    
</head>
<body class="layout-boxed" page="starter-pack">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container container-xxl">
        <header class="header navbar navbar-expand-sm expand-header">

            <a href="javascript:void(0);" class="nav-link theme-toggle p-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon dark-mode"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun light-mode"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
            </a>
            
            <a href="javascript:void(0);" class="sidebarCollapse">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </a>

            <ul class="navbar-item flex-row ms-lg-auto ms-0">

                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-container">
                            <div class="avatar avatar-sm avatar-indicators avatar-online">
                                @auth

                                <img alt="avatar" src="{{ asset('storage/images/user/'.Auth::user()->photo) }}" class="rounded-circle">
                                @endauth
                                @guest
                                <img alt="avatar" src="{{ asset('storage/images/user/default.png') }}" class="rounded-circle">

                                @endguest
                            </div>
                        </div>
                    </a>

                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="user-profile-section">
                            <div class="media mx-auto">
                                @auth
                                <img src="{{ asset('storage/images/user/'.Auth::user()->photo) }}" class="img-fluid me-2" alt="avatar">
                                <div class="media-body">
                                    <h5>{{ Auth::user()->name }}</h5>
                                    <p>Project Leader</p>
                                </div>
                                @endauth
                                @guest
                                <img src="{{ asset('storage/images/user/default.png') }}" class="img-fluid me-2" alt="avatar">
                                <div class="media-body">
                                    <h5>John Doe</h5>
                                    <p>Project Leader</p>
                                </div>
                                @endguest
                            </div>
                        </div>
                        <div class="dropdown-item">
                            <a href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span>Profile</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> <span>Inbox</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> <span>Lock Screen</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Log Out</span>
                            </a>
                        </div>
                    </div>
                    
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">
            
            <nav id="sidebar">

                <div class="navbar-nav theme-brand flex-row  text-center">
                    <div class="nav-logo">
                        <div class="nav-item theme-logo">
                            <a href="index.html">
                                <img src="{{ asset('main') }}/src/assets/img/logo.svg" alt="logo">
                            </a>
                        </div>
                        <div class="nav-item theme-text">
                            <a href="index.html" class="nav-link"> CORK </a>
                        </div>
                    </div>
                    <div class="nav-item sidebar-toggle">
                        <div class="btn-toggle sidebarCollapse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                        </div>
                    </div>
                </div>

                <ul class="list-unstyled menu-categories" id="accordionExample">

                    @guest

                    @foreach($menus as $item)
                    @if($item->locate === 0)
                    @if($item->children->isEmpty())
                        <!-- Jika menu tidak memiliki sub-menu -->
                        <li class="menu {{ Str::is($item->url.'*', request()->path()) ? 'active' : '' }}">
                            <a href="{{ url('/'.$item->url) }}" aria-expanded="false" class="dropdown-toggle">
                                <div class="d-flex align-items-center justify-content-between">
                                    <i class="{{ $item->icon }}" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></i>
                                    <span>{{ $item->name }}</span>
                                </div>
                            </a>
                        </li>
                    @else
                        <!-- Jika menu memiliki sub-menu -->
                        <li class="menu">
                            <a href="#{{ $item->code }}" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <div class="d-flex align-items-center justify-content-between">
                                    <i class="{{ $item->icon }}" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></i>
                                    <span>{{ $item->name }}</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                            </a>
                            <ul class="collapse submenu list-unstyled" id="{{ $item->code }}" data-bs-parent="#accordionExample">
                                @foreach($item->children as $child)
                                    <li class="menu {{ Str::is($child->url.'*', request()->path()) ? 'active' : '' }}">
                                        <a href="{{ url('/'.$child->url) }}"> {{ $child->name }} </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                    @endif
                    @endforeach
                    @endguest
                    
                    @auth
                    @foreach($menus as $item)
                    @if($item->locate === 1)
                    @if($item->children->isEmpty())
                        <!-- Jika menu tidak memiliki sub-menu -->
                        <li class="menu {{ Str::is($item->url.'*', request()->path()) ? 'active' : '' }}">
                            <a href="{{ url('/'.$item->url) }}" aria-expanded="false" class="dropdown-toggle">
                                <div class="d-flex align-items-center justify-content-between">
                                    <i class="{{ $item->icon }}" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></i>
                                    <span>{{ $item->name }}</span>
                                </div>
                            </a>
                        </li>
                    @else
                        <!-- Jika menu memiliki sub-menu -->
                        <li class="menu">
                            <a href="#{{ $item->code }}" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <div class="d-flex align-items-center justify-content-between">
                                    <i class="{{ $item->icon }}" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></i>
                                    <span>{{ $item->name }}</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                            </a>
                            <ul class="collapse submenu list-unstyled" id="{{ $item->code }}" data-bs-parent="#accordionExample">
                                @foreach($item->children as $child)
                                    <li class="menu {{ Str::is($child->url.'*', request()->path()) ? 'active' : '' }}">
                                        <a href="{{ url('/'.$child->url) }}"> {{ $child->name }} </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                    @endif
                    @endforeach
                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>ADMIN SETTING</span></div>
                    </li>      
                    <li class="menu {{ Str::is('admin/menu*', request()->path()) ? 'active' : '' }}">
                        <a href="{{ url('/admin/menu') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="d-flex align-items-center justify-content-between">
                                <i class="fa-solid fa-circle-chevron-down" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ></i>
                                <span>Menu Management</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="#kelolaPengguna" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="d-flex align-items-center justify-content-between">
                                <i class="fa-solid fa-users" style="font-size: 20px; margin-right: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></i>
                                <span>Kelola Pengguna</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="kelolaPengguna" data-bs-parent="#accordionExample">
                            <li class="menu {{ Str::is('/admin/usermanage/staff*', request()->path()) ? 'active' : '' }}">
                                <a href="{{ url('/admin/usermanage/staff') }}"> Kelola Staff </a>
                            </li>
                            <li class="menu {{ Str::is('/admin/usermanage/guru*', request()->path()) ? 'active' : '' }}">
                                <a href="{{ url('/admin/usermanage/guru') }}"> Kelola Guru </a>
                            </li>
                            <li class="menu {{ Str::is('/admin/usermanage/siswa*', request()->path()) ? 'active' : '' }}">
                                <a href="{{ url('/admin/usermanage/siswa') }}"> Kelola Siswa </a>
                            </li>
                            <li class="menu {{ Str::is('/admin/usermanage/position*', request()->path()) ? 'active' : '' }}">
                                <a href="{{ url('/admin/usermanage/position') }}"> Kelola Jabatan </a>
                            </li>
                        </ul>
                    </li>
                    @endauth
                </ul>
                
            </nav>

        </div>
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ $menu }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $submenu }}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->    
    
                    <!-- CONTENT AREA -->
                    <div class="layout-top-spacing">
                        @include('cms.cms-alert')
                    </div>
                    @yield('content')
                    <!-- CONTENT AREA -->

                </div>

            </div>

            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © <span class="dynamic-year"><?php echo date('Y')?></span> <a target="_blank" href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
            
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('main') }}/src/plugins/src/global/vendors.min.js"></script>
    <script src="{{ asset('main') }}/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('main') }}/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('main') }}/layouts/vertical-dark-menu/app.js"></script>
    
    <script src="{{ asset('main') }}/src/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    @yield('custom-js')

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>