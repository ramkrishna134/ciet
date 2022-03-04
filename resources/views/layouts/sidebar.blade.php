<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - CIET</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

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
        <section class="sidebar">
            <div class="logo">
                <img class="img-fluid" src="/images/CIET-logo.png" alt="">
                {{-- <h5 class="text-light mb-0">Central Institute of</h5> --}}
                <h6 class="text-black"><strong>CIET</strong></h6>
            </div>

            {{-- <hr> --}}

            <ul class="menu">
                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/media')) ? 'active' : '' }}" href="{{ route('media') }}"><i class="fas fa-photo-video"></i> Media Manager</a>
                </li>

                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/infrastructures')) ? 'active' : '' }}" href="{{ route('infrastructure.index') }}"><i class="fas fa-photo-video"></i> Infrastructures</a>
                </li>

                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/announcements')) ? 'active' : '' }}" href="{{ route('announcements.index') }}"><i class="fas fa-photo-video"></i> Announcements</a>
                </li>

                <li class="menu-item">
                    <a class="menu-link {{ (request()->is('admin/pages')) ? 'active' : '' }}" href="{{ route('page.index') }}"><i class="fas fa-file-alt"></i> Pages</a>
                </li>

                <li class="menu-item dropdown">
                    <a class="menu-link dropdown-toggle {{ (request()->is('admin/permissions')) ? 'show' : '' }} {{ (request()->is('admin/roles')) ? 'show' : '' }} {{ (request()->is('admin/permission-role')) ? 'show' : '' }}" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-lock"></i> Permission Manager
                    </a>
                    <ul class="dropdown-menu {{ (request()->is('admin/permissions')) ? 'show' : '' }} {{ (request()->is('admin/roles')) ? 'show' : '' }} {{ (request()->is('admin/permission-role')) ? 'show' : '' }}" aria-labelledby="dropdownMenuButton1">
                        
                      <li><a class="dropdown-item {{ (request()->is('admin/roles')) ? 'active' : '' }}" href="{{ route('role.index') }}">User Roles</a></li>
                      <li><a class="dropdown-item {{ (request()->is('admin/permissions')) ? 'active' : '' }}" href="{{ route('permission.index') }}">Permissions</a></li>
                      <li><a class="dropdown-item {{ (request()->is('admin/permission-role')) ? 'active' : '' }}" href="{{ route('permission.showRole') }}">Permissions to Role</a></li>
                    </ul>
                </li>


                <li class="menu-item dropdown">
                    <a class="menu-link dropdown-toggle {{ (request()->is('admin/users')) ? 'show' : '' }} {{ (request()->is('admin/user/create')) ? 'show' : '' }}" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-friends"></i> Users
                    </a>
                    <ul class="dropdown-menu {{ (request()->is('admin/users')) ? 'show' : '' }} {{ (request()->is('admin/user/create')) ? 'show' : '' }}" aria-labelledby="dropdownMenuButton2">
                      <li><a class="dropdown-item {{ (request()->is('admin/users')) ? 'active' : '' }}" href="{{ route('user.index') }}">All Users</a></li>
                      <li><a class="dropdown-item {{ (request()->is('admin/user/create')) ? 'active' : '' }}" href="{{ route('user.create') }}">Add User</a></li>
                    </ul>
                </li>
                
            </ul>
        </section>
        <main class="main">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <h4 class="mb-0">@yield('title')</h4>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
    
                        </ul>
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
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
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="badge bg-primary">{{ Auth::user()->role }}</span>
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
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
</body>
</html>
