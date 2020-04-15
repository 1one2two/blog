<!doctype html>
<html ⚡>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="white">
    <meta name="description" content="A simple blog make by laravel.">

    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <!-- Include stylesheet -->
    <!-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> -->
    <!-- Include the Quill library -->
    <!-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> -->


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>toolman xyz</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//picsum.photos">
    <link rel="dns-prefetch" href="//blog.toolman.xyz">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Ads -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" async></script>

    <!-- Styles -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet" async> -->
    <link href="http://www.bootstrapicons.com/files/css/bootstrap.min.css" rel="stylesheet" async>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" async>
    <style amp-custom type="text/css">
        .p1 {
            -webkit-line-clamp: 1;
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            white-space: normal;
        }

        .new-line {
            word-break: break-all;
            word-wrap: break-word;
            table-layout: fixed;
            white-space: pre-line;
        }

        a:link {
            color: #000;
            text-decoration: none;
        }

        a:visited {
            color: #000;
        }

        a:hover {
            color: #000;
        }

        a:active {
            color: #000;
        }
    </style>

    <link rel="apple-touch-icon" href="/download.png" async>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <form action="/" method="GET" style="height: 39px;">
                                @csrf
                                <div class="mt-1 rounded-lg mr-1" style="border:2px solid #c3ccd5; display:inline-block;">
                                    <input type="text" class="" style="padding: 0rem; border: 0px;" aria-label="Something..." name="v">
                                    <button type="submit" style="border: none; background: none; color: rgba(0,0,0,0.5); font-family: nunito,sans-serif; font-size: 0.9rem; padding: 0.5rem, 0px, 0px, 0px">Search</button>
                                    <!-- <button class="urls" style="padding: 0px, 0.5rem; border: none; background: none; color: rgba(0,0,0,.5); font-family: nunito,sans-serif; font-size: .9rem;" type="submit">Search</button> -->
                                </div>
                            </form>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ action('HomeController@index')  }}" onclick="event.preventDefault();
                                                     document.getElementById('homes').submit();">
                                    Home
                                </a>

                                <a class="dropdown-item" href="{{ action('messagecontroller@post')  }}" onclick="event.preventDefault();
                                                     document.getElementById('post').submit();">
                                    Post article
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                <form id="homes" action="{{ action('HomeController@index') }}" method="GET" style="display: none;">
                                    @csrf
                                </form>

                                <form id="post" action="{{ action('messagecontroller@post') }}" method="GET" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="background-color: #f8f9fc">
            @yield('content')
        </main>
    </div>
</body>

</html>