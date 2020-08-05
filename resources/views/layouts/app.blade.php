<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- icon -->
    <script src="https://kit.fontawesome.com/792c501a3f.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'pmanager') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                       
                      
                        @else
                        <li><a href="{{ route('companies.index') }}"><i class="fas fa-building"></i> My Companies</a></li>
                        <li><a href="{{ route('projects.index') }}"><i class="fas fa-project-diagram"></i> Projects</a></li>
                        <li><a href="{{ route('tasks.index') }}"><i class="fas fa-tasks"></i> Tasks</a></li>
                        @if(Auth::user()->roll_id ==1)
                       <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                <i class="far fa-user"></i> Admin <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                <li><a href="{{ route('companies.index') }}"><i class="fas fa-building"></i> All Companies</a></li>
                                <li><a href="{{ route('users.index') }}"><i class="far fa-user"></i> All users</a></li>
                                <li><a href="{{ route('tasks.index') }}"><i class="fas fa-tasks"></i> All tasks</a></li>
                                <li><a href="{{ route('projects.index') }}"><i class="fas fa-project-diagram"></i> All projects</a></li>
                                <li><a href="{{ route('roles.index') }}"><i class="fab fa-critical-role"></i> All roles</a></li>
                                </ul>
                            </li>
                       @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                <i class="far fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
        @include('partials.errors')
        @include('partials.success')
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
