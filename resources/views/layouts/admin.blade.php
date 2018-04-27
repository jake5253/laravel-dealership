<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Market') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ route('home') }}">
                    {{ config('app.name', 'Market') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{route('admin')}}">Admin</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Listings <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('adminTypes') }}">Types</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('adminCategories') }}">Makes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('adminProducts') }}">Products</a></li>
                        </ul>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="{{ route('adminAboutEdit') }}">Business Info</a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="{{ route('adminServicesEdit') }}">Services</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li>
                                    <a href="{{route('adminUsers')}}">Manage Users</a>
                                </li>

                            </ul>
                        </li>

                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @if(session()->has('msg'))
        <div class="alert alert-success">
            <li>{{ session()->get('msg') }}</li>
        </div>
    @endif
    @if(auth()->user()->email == 'admin@test.com')
        <div class="alert alert-danger">
            You are logged in using the test account!<br/>
            This is a <strong>security risk!</strong><br/>
            You need to update your email address and password immediately!<br/>
            <a href="{{route('adminUsersEdit', auth()->id())}}">Click Here</a> to edit your account.
        </div>
    @endif
</div>

@yield('content')

<footer>
    <hr>
    <div class="container">
        &copy;2018 Copyright {{config('app.name')}}. All Rights Reserved. Web design
        by {{Html::mailto('jake.admin@gmail.com', 'Jason Miller')}}, Ulster, PA
    </div>
    <br/>
</footer>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
