@php

$currentRole = Auth::user()->role;
$role = DB::table('roles')->where('display_name', $currentRole)->first();

$permissions = [];

$rolePermissions = DB::table('permission_role')->where('role_id', $role->id)->get();

foreach ($rolePermissions as $item) {
    $permission = DB::table('permissions')->where('id', $item->permission_id)->first();
    array_push($permissions, $permission->display_name);
}
// dd($permissions);
@endphp


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @php
    header("X-XSS-Protection: 1; mode=block");
    header("x-content-type-options: nosniff"); 
    header("X-Frame-Options: SAMEORIGIN"); 
    // header("Content-Security-Policy: default-src 'self'");  
    @endphp
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - CIET</title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('vendor/laraberg/css/laraberg.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <section class="sidebar shadow">
            <div class="logo2 mb-2 text-center mt-3 d-flex align-items-center justify-content-center">
                <img class="img-fluid me-1" width="50" src="/images/CIET-logo.png" alt="CIET">
                <h5 class="text-light mb-0 mt-2 text-start">CIET <br> <small>Control Panel 2.0</small></h5>
            </div>

            <p class="text-center mb-0"><small class="text-light"><i class="fas fa-desktop me-1"></i> {{ $_SERVER['REMOTE_ADDR']; }}</small></p>

            {{-- <hr> --}}

            <ul class="menu">
                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>

                @if(in_array("Media", $permissions))
                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/media')) ? 'active' : '' }}" href="{{ route('media') }}"><i class="fas fa-photo-video"></i> Media Manager</a>
                </li>
                @endif

                @if(in_array("Departments", $permissions))
                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/departments')) ? 'active' : '' }}" href="{{ route('department.index') }}"><i class="fas fa-cubes"></i> Departments</a>
                </li>
                @endif

                @if(in_array("Events", $permissions))
                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/events')) ? 'active' : '' }}" href="{{ route('event.index') }}"><i class="fas fa-calendar-day"></i> Events</a>
                </li>
                @endif
                {{-- <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/trainings')) ? 'active' : '' }}" href="{{ route('training.index') }}"><i class="fas fa-chalkboard"></i>Trainings</a>
                </li> --}}

                @if(in_array("Faculties", $permissions))
                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/faculties')) ? 'active' : '' }}" href="{{ route('faculty.index') }}"><i class="fas fa-user-graduate"></i>Faculties</a>
                </li>
                @endif

                @if(in_array("Infrastructures", $permissions))
                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/infrastructures')) ? 'active' : '' }}" href="{{ route('infrastructure.index') }}"><i class="fas fa-photo-video"></i> Infrastructures</a>
                </li>
                @endif

                @if(in_array("Announcements", $permissions))
                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/announcement')) ? 'active' : '' }}" href="{{ route('announcements.index') }}"><i class="fas fa-bullhorn"></i>Announcements</a>
                </li>
                @endif

                @if(in_array("Initiatives", $permissions))
                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/initiatives')) ? 'active' : '' }}" href="{{ route('initiative.index') }}"><i class="fas fa-asterisk"></i>Initiatives</a>
                </li>
                @endif
                {{-- <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/app')) ? 'active' : '' }}" href="{{ route('app.index') }}"><i class="fas fa-mobile-alt"></i> Mobile Apps</a>
                </li> --}}

                @if(in_array("Webinars", $permissions))
                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/webinar')) ? 'active' : '' }}" href="{{ route('webinar.index') }}"><i class="fas fa-warehouse"></i> Webinar</a>
                </li>
                @endif

                @if(in_array("Pages", $permissions))
                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/pages')) ? 'active' : '' }}" href="{{ route('page.index') }}"><i class="fas fa-file-alt"></i> Pages</a>
                </li>
                @endif

                @if(in_array("Sliders", $permissions))
                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/slider')) ? 'active' : '' }}" href="{{ route('slider.index') }}"><i class="fas fa-images"></i> Slider</a>
                </li>
                @endif
                
                @if(in_array("Articals", $permissions))
                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/articals')) ? 'active' : '' }}" href="{{ route('artical.index') }}"><i class="fas fa-newspaper"></i> Articals</a>
                </li>
                @endif

                @if(in_array("Partners", $permissions))
                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/partners')) ? 'active' : '' }}" href="{{ route('partner.index') }}"><i class="fas fa-handshake"></i> Our Partners</a>
                </li>
                @endif

                @if(in_array("Menus", $permissions))
                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/menu')) ? 'active' : '' }}" href="{{ route('menu') }}"><i class="fas fa-list-ul"></i> Menus</a>
                </li>
                @endif


                @if(in_array("Permissions", $permissions))
                <li class="menu-item dropdown">
                    <a class="menu-link dropdown-toggle {{ (request()->is('admin/permissions')) ? 'show' : '' }} {{ (request()->is('admin/roles')) ? 'show' : '' }} {{ (request()->is('admin/permission-role')) ? 'show' : '' }}" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-lock"></i> Permission Control
                    </a>
                    <ul class="dropdown-menu {{ (request()->is('admin/permissions')) ? 'show' : '' }} {{ (request()->is('admin/roles')) ? 'show' : '' }} {{ (request()->is('admin/permission-role')) ? 'show' : '' }}" aria-labelledby="dropdownMenuButton1">
                        
                      <li><a class="dropdown-item {{ (request()->is('admin/roles')) ? 'active' : '' }}" href="{{ route('role.index') }}">User Roles</a></li>
                      <li><a class="dropdown-item {{ (request()->is('admin/permissions')) ? 'active' : '' }}" href="{{ route('permission.index') }}">Permissions</a></li>
                      <li><a class="dropdown-item {{ (request()->is('admin/permission-role')) ? 'active' : '' }}" href="{{ route('permission.showRole') }}">Permissions to Role</a></li>
                    </ul>
                </li>
                @endif

                @if(in_array("Users", $permissions))
                <li class="menu-item dropdown">
                    <a class="menu-link dropdown-toggle {{ (request()->is('admin/users')) ? 'show' : '' }} {{ (request()->is('admin/user/create')) ? 'show' : '' }}" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-friends"></i> Users
                    </a>
                    <ul class="dropdown-menu {{ (request()->is('admin/users')) ? 'show' : '' }} {{ (request()->is('admin/user/create')) ? 'show' : '' }}" aria-labelledby="dropdownMenuButton2">
                      <li><a class="dropdown-item {{ (request()->is('admin/users')) ? 'active' : '' }}" href="{{ route('user.index') }}">All Users</a></li>
                      <li><a class="dropdown-item {{ (request()->is('admin/user/create')) ? 'active' : '' }}" href="{{ route('user.create') }}">Add User</a></li>
                    </ul>
                </li>
                @endif

                @if(in_array("Feedbacks", $permissions))
                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/feedbacks')) ? 'active' : '' }}" href="{{ route('feedback.index') }}"><i class="fas fa-comment-dots"></i> Feedbacks</a>
                </li>
                @endif

                @if(in_array("Css", $permissions))
                <li class="menu-item">
                    <a class="menu-link btn btn-outline-primary text-primary {{ (request()->is('admin/custom-css')) ? 'bg-primary text-light' : '' }}" href="{{ route('css') }}"><i class="fab fa-css3"></i> Custom CSS</a>
                </li>
                @endif
            </ul>

            <p class="text-light text-center mt-3"><small>
                &#169; {{ date('Y') }} | Developed By CIET, NCERT
            </small></p>
        </section>
        <main class="main">
            <nav class="navbar navbar-expand-md navbar-light admin-nav sticky-top">
                <div class="container-fluid ps-0">
                    <div class="navbar-brand">
                        <h4 class="h5 mb-0">@yield('title')</h4>
                    </div>
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto align-items-center">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
    
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else

                                <li class="nav-item me-2">
                                    <a href="{{ url('/') }}" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-globe-africa"></i> Visit Website</a>
                                </li>
                                <li class="nav-item border rounded">
                                    <div class="nav-link text-light"><i class="fas fa-calendar-day text-primary"></i> {{ date("d-m-Y") }} <i class="fas fa-clock text-primary"></i> <span id="current-time"></span></div>
                                </li>
                                <li class="nav-item dropdown border rounded account-menu ms-2">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img width="25" class="rounded-circle" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=0D8ABC&color=fff" alt="Profile Image">
                                        {{ Auth::user()->name }} <span class="badge bg-primary">{{ Auth::user()->role }}</span>
                                    </a>

    
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                        <strong>{{ Auth::user()->name }}</strong>

                                        <small>{{ Auth::user()->email }}</small>

                                        <hr class="dropdown-divider">

                                        <a class="dropdown-item" href="{{ route('message.index') }}">
                                            <i class="fas fa-comments"></i> @if((Auth::user()->role === 'Admin')) All Request @else Your Requests @endif 
                                        </a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>

                                {{-- <li class="nav-item ms-2 border rounded">
                                    <a href="#" class="nav-link text-light" data-bs-toggle="popover" title="Notification" data-bs-content="You have no New Notification."><i class="fas fa-bell"></i></a>
                                </li> --}}
                                <li class="nav-item ms-2 border rounded">
                                    <a href="{{ route('setting.index') }}" class="nav-link text-light {{ (request()->is('admin/settings')) ? 'bg-primary text-light' : '' }}"><i class="fas fa-cog"></i></a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
           <div class="page-content">
            @yield('content')
           </div>
        </main>
    </div>

    <script>
        $(document).ready(function(){
            setInterval ("document.getElementById ('current-time').innerHTML = new Date().toLocaleTimeString()", 50)
        })
    </script>
</body>
</html>
