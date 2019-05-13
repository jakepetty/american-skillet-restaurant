<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', "Welcome | " . config('app.name'))</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Jake Petty">
    <meta name="description" content="">
    <meta name="copyright" content="{{ config('app.name') }}">
    <meta name="keywords" content="restaurant, cedar, rapids, mid-western, breakfast, lunch">

    <meta property="og:type" content="restaurant.restaurant" />
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:description"
        content="{{ config('app.name') }} restaurant located in Cedar Rapids, serving midwestern style breakfast and lunch since 1994" />
    <meta property="og:image" content="https://american-skillet.vexcon.net /img/social-img.jpg" />
    <meta property="og:url" content="https://american-skillet.vexcon.net /" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />

    <meta name="twitter:title" content="{{ config('app.name') }}">
    <meta name="twitter:description"
        content="{{ config('app.name') }} restaurant located in Cedar Rapids, serving midwestern style breakfast and lunch since 1994">
    <meta name="twitter:image" content="https://american-skillet.vexcon.net /img/social-img.jpg">

    <link rel="shortcut icon" href="/img/icon.png" type="image/x-icon">
    <link rel="manifest" href="/manifest.json">
    <link rel="stylesheet" href="{{ mix('css/frontend.css') }}">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="150">
    <nav class="navbar navbar-expand-lg bg-transparent fixed-top text-center" id="main-menu">
        <div class="mx-auto">
            <div class="wrapper">
                <a class="navbar-brand" href="/"><span>A</span>merican <span>S</span>killet</a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="float-left">
                        <span class="icon-bar top-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </span>
                    <span class="float-left ml-2">Menu</span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="/">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="{{ route('about') }}">About</a>
                    <a class="nav-item nav-link" href="{{ route('menu') }}">Menu</a>
                    <a class="nav-item nav-link" href="/#specials">Specials</a>
                    <a class="nav-item nav-link" href="{{ route('gallery') }}">Gallery</a>
                    <a class="nav-item nav-link" href="{{ route('contact') }} ">Contact Us</a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')

    @component('components.footer')

    @endcomponent
    @if(\Session::has('title'))
    <div id="notification" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ \Session::get('title') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ \Session::get('message') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    <script src="{{ mix('js/frontend.js') }}"></script>
</body>

</html>
