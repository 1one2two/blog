<!doctype html>
<html ⚡>

<head>
    <meta charset="utf-8">
    <meta name="keywords" http-equiv="keywords" content="toolman xyz" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="white">
    <meta name="description" content="此網站版面極為簡潔且不包含任何廣告，內容包含不好笑又尷尬的文章、覺得之後可能會看所以先保存但事後很少會看的新聞等。">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="toolman xyz">
    <meta itemprop="description" content="此網站版面極為簡潔且不包含任何廣告，內容包含不好笑又尷尬的文章、覺得之後可能會看所以先保存但事後很少會看的新聞等。">
    <meta itemprop="image" content="https://picsum.photos/340/210?random=3">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://toolman.xyz">
    <meta property="og:type" content="website">
    <meta property="og:title" content="toolman xyz">
    <meta property="og:description" content="此網站版面極為簡潔且不包含任何廣告，內容包含不好笑又尷尬的文章、覺得之後可能會看所以先保存但事後很少會看的新聞等。">
    <meta property="og:image" content="https://picsum.photos/340/210?random=4">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="toolman xyz">
    <meta name="twitter:description" content="此網站版面極為簡潔且不包含任何廣告，內容包含不好笑又尷尬的文章、覺得之後可能會看所以先保存但事後很少會看的新聞等。">
    <meta name="twitter:image" content="https://picsum.photos/340/210?random=5">

    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <!-- Include stylesheet -->
    <!-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> -->
    <!-- Include the Quill library -->
    <!-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> -->


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>toolman xyz @yield('title')</title>

    <!-- DNS -->
    <link rel="dns-prefetch" href="//picsum.photos">
    <link rel="dns-prefetch" href="//blog.toolman.xyz">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Ads -->
    <!-- <script data-ad-client="ca-pub-1041011272242969" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" async></script>

    <!-- Styles -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet" async> -->
    <!-- <link href="http://www.bootstrapicons.com/files/css/bootstrap.min.css" rel="stylesheet" async> -->
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
            color: #464646;
            text-decoration: none;
        }

        a:hover,
        a:active,
        a:visited {
            color: #464646;
        }

        .new-line {
            color: #424242;
        }

        .new-line a {
            color: #424242;
            /* text-decoration: underline #ff9595; */
            border-bottom: 1px solid #ffca80;
        }

        .new-line a:hover {
            border-bottom: 2px solid #f08c00;
            /* background-image: linear-gradient(180deg,transparent 60%,#ffca80 0); */
        }

        .new-line p {
            line-height: 1.85em;
            margin-bottom: 1.25em;
            font-size: 17px;
        }

        .new-line .ct {
            text-align: center;
            margin-bottom: 1.25em;
        }

        .new-line img {
            width: 100%;
            max-width: 450px;
            height: auto;
            display: block;
            margin: 0px auto;
        }

        #myBtn {
            display: none;
            position: fixed;
            bottom: 15px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: #bbbbbb96;
            color: #00000096;
            cursor: pointer;
            padding: .8rem;
            border-radius: 30px;
        }

        #myBtn :hover {
            background-color: #f8f9fc;
        }

        .pic img {
            transform: scale(1, 1);
            transition: all 0.3s ease-out;
        }

        .pic img:hover {
            transform: scale(1.1, 1.1);
        }


        .resp-sharing-button__link,
        .resp-sharing-button__icon {
            display: inline-block
        }

        .resp-sharing-button__link {
            text-decoration: none;
            color: #fff;
            margin: 0.5em
        }

        .resp-sharing-button {
            border-radius: 5px;
            transition: 25ms ease-out;
            padding: 0.5em 0.75em;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif
        }

        .resp-sharing-button__icon svg {
            width: 1em;
            height: 1em;
            margin-right: 0.4em;
            vertical-align: top
        }

        .resp-sharing-button--small svg {
            margin: 0;
            vertical-align: middle
        }

        /* Non solid icons get a stroke */
        .resp-sharing-button__icon {
            stroke: #fff;
            fill: none
        }

        /* Solid icons get a fill */
        .resp-sharing-button__icon--solid,
        .resp-sharing-button__icon--solidcircle {
            fill: #fff;
            stroke: none
        }

        .resp-sharing-button--facebook {
            background-color: #3b5998;
            border-color: #3b5998;
        }

        .resp-sharing-button--facebook:hover,
        .resp-sharing-button--facebook:active {
            background-color: #2d4373;
            border-color: #2d4373;
        }

        .resp-sharing-button--twitter {
            background-color: #55acee;
            border-color: #55acee;
        }

        .resp-sharing-button--twitter:hover,
        .resp-sharing-button--twitter:active {
            background-color: #2795e9;
            border-color: #2795e9;
        }

        .resp-sharing-button--email {
            background-color: #777777;
            border-color: #777777;
        }

        .resp-sharing-button--email:hover,
        .resp-sharing-button--email:active {
            background-color: #5e5e5e;
            border-color: #5e5e5e;
        }

        .resp-sharing-button--telegram {
            background-color: #54A9EB;
        }

        .resp-sharing-button--telegram:hover {
            background-color: #4B97D1;
        }

        .resp-sharing-button--line {
            background-color: #4CD400;
        }

        .resp-sharing-button--line:hover {
            background-color: #389C00;
        }

        .col-lg-10 {
            visibility: visible;
        }

        .col-2 {
            visibility: hidden;
        }
    </style>

    <link rel="apple-touch-icon" href="/download.png" async>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    toolman xyz
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <form action="/" method="GET" style="height: 39px; padding-top: 3px;">
                                @csrf
                                <div class="mt-1 rounded-lg mr-1" style="border: solid #c3ccd5; border-width: 0px 0px 1px 0px; display:inline-block; border-radius:10px;">
                                    <input type="text" class="pl-2 pr-2" style="padding: 0rem; border: 0px none; max-width: 170px;" placeholder="Search on toolman xyz" aria-label="Something..." name="v">
                                    <!-- <button type="submit" style="border: none; background: none; color: rgba(0,0,0,0.5); font-family: nunito,sans-serif; font-size: 0.9rem; padding: 0.5rem, 0px, 0px, 0px">Search</button> -->
                                    <!-- <button class="urls" style="padding: 0px, 0.5rem; border: none; background: none; color: rgba(0,0,0,.5); font-family: nunito,sans-serif; font-size: .9rem;" type="submit">Search</button> -->
                                </div>
                            </form>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register_'))
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
                                <a class="dropdown-item" href="{{ action('HomeController@index')  }}" onclick="event.preventDefault(); document.getElementById('homes').submit();">
                                    Home
                                </a>

                                <a class="dropdown-item" href="{{ action('messagecontroller@post')  }}" onclick="event.preventDefault(); document.getElementById('post').submit();">
                                    Post article
                                </a>

                                <a class="dropdown-item" href="{{ action('messagecontroller@dashboard')  }}" onclick="event.preventDefault(); document.getElementById('dashboard').submit();">
                                    Dashboard
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

                                <form id="dashboard" action="{{ action('messagecontroller@dashboard') }}" method="GET" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- <div style="background-color: #ebebeb">
            <div class="col-2 col-md-10" style="height: 30px; background-color: #fff"></div>
        </div> -->
        <main class="py-4" style="background-color: #EBEBEB">
            @yield('content')
        </main>

        <div style="max-height: 90px">
            @include('layouts.footer')
        </div>
    </div>

    <script>
        var hd = false;
        var mybutton = document.getElementById("myBtn");

        window.onscroll = function() {
            scrollFunction()
        };

        function hides() {
            $('#myBtn').fadeOut();
            hd = false;
        }

        function scrollFunction() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                mybutton.style.display = "block";
                $('#myBtn').fadeIn();
                if (hd == false) {
                    setTimeout(hides, 8000);
                    hd = true;
                }
            } else {
                // mybutton.style.display = "none";
                $('#myBtn').fadeOut();
            }
        }

        function topFunction() {
            $('html,body').animate({
                scrollTop: 0
            }, 'slow');
            return false;
        }

        $(document).ready(function() {
            var a = document.getElementsByClassName('new-line')[0].getElementsByTagName('a');
            for (var i = 0; i < a.length; i++) {
                a.item(i).target = "_blank";
            }
        });
    </script>
</body>

</html>