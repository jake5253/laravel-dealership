<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
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
                    {{config('app.name', '')}}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">All Types<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @foreach ($types as $type)
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('showProductByType', ['id' => $type->id]) }}">{{ $type->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    @foreach ($types as $type)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">{{ $type->name }}<span
                                        class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @foreach ($type->categories as $category)
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="{{ route('showProductByCategory', ['id' => $category->id] ) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                    <li><a href="{{route('services')}}">Services</a></li>
                    <li><a href="{{route('about')}}">About Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="panel-content" style="margin: 10px">

                @if (file_exists(public_path('upload/banner.jpg')))
                    <img src="{{ asset('upload/banner.jpg') }}" style="max-width:100%; width:auto; max-height: 250px; height: auto; !important;"><br>
                @else
                    <img src="{{ asset('example/banner.jpg') }}" style="max-width:100%; width:auto; max-height: 250px; height: auto; !important;"><br>
                @endif
            </div>
        </div>
    </div>
</div>

@yield('content')

<footer>
    <hr>
    <div class="container">
        <div class="pull-right">
            <a href="{{ route('admin') }}">Admin</a>
        </div>
        &copy;2018 Copyright {{config('app.name')}}. All Rights Reserved.
        <!-- please leave the following (or comparable, public) tribute -->
        <br>Base code by {{Html::mailto('jake.admin@gmail.com', 'Jason Miller')}}, Pennsylvania, USA
    </div>
    <br/>
</footer>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
