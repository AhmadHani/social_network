
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="{{\App\Setting::first()->description or 'description'}}">
  <meta name="keywords" content="{{\App\Setting::first()->keys or 'humans,social'}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

        <link rel="stylesheet" href="{{mix('css/app.css')}}">

    <link rel="stylesheet" href="{{mix('css/style.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{mix('lib/noty.css')}}" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,700,300'>
</head>
<body>
@if(\App\Setting::first()->status == 1)

@include("lock")
@else
    <div id="app">
    @if(Auth::check()) <init></init> @endif 

        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{\App\Setting::first()->name}}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
                        <li  class="active"><a href="{{route('home')}}">Home</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())

                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <unread></unread>
                        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                      <li>

                        <a href="{{route('profile.show',['username'=>Auth::user()->username])}}">Profile</a>
                      </li>
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
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
        @if(Auth::check())
        <notification :id="{{Auth::id()}}"></notification>
    @endif

    <audio id="noty_audio">
        <source src="{{asset('audio/notify.mp3')}}">
            <source src="{{asset('audio/notify.ogg')}}">
            <source src="{{asset('audio/notify.wav')}}">
    </audio>
    </div>
@endif
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
<script src="{{asset('lib/noty.js')}}" type="text/javascript"></script>
    <script>
  
    @if(Session::has("success"))
    new Noty({
    
    text: '{{Session::get("success")}}',
    layout:"bottomLeft",
    type:'success'
    
    }).show();
    @endif
    @if(Session::has("error"))
        new Noty({
                'text':'{{Session::get("error")}}',
                'type':'error',
                'layout':"bottomLeft"
            }).show()

    @endif
    </script>
</body>
</html>
