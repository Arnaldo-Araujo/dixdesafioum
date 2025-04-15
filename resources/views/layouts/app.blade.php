@php
    $corSidebar = auth()->check() ? auth()->user()->cor_sidebar : null;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'White Dashboard') }}</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('white') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('white') }}/img/favicon.png">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="{{ asset('white') }}/css/nucleo-icons.css" rel="stylesheet" />

    <!-- White Dashboard CSS -->
    <link href="{{ asset('white') }}/css/white-dashboard.css?v=1.0.0" rel="stylesheet" />
    <link href="{{ asset('white') }}/css/theme.css" rel="stylesheet" />
    <style>
        .sidebar.bg-primary,
        .sidebar[data-color="primary"] {
            background-color: #007bff !important;
        }

        .sidebar.bg-blue,
        .sidebar[data-color="blue"] {
            background-color: #17a2b8 !important;
        }

        .sidebar.bg-green,
        .sidebar[data-color="green"] {
            background-color: #28a745 !important;
        }
        .sidebar-primary {
    background-color: #007bff;
}
.sidebar-blue {
    background-color: #17a2b8;
}
.sidebar-green {
    background-color: #28a745;
}
.sidebar-pink-purple {
    background: linear-gradient(to bottom, #ec4899, #8b5cf6); /* rosa -> roxo */
}
/* Cores sólidas */
.sidebar-wrapper.sidebar-primary {
    background-color: #007bff;
}
.sidebar-wrapper.sidebar-blue {
    background-color: #17a2b8;
}
.sidebar-wrapper.sidebar-green {
    background-color: #28a745;
}

/* Degradê rosa-roxo (padrão que você quer manter) */
.sidebar-wrapper.sidebar-pink-purple {
    background: linear-gradient(to bottom, #ec4899, #8b5cf6);
}

/* Outras ideias de degradê (opcional) */
.sidebar-wrapper.sidebar-indigo-orange {
    background: linear-gradient(to bottom, #6366f1, #f97316);
}
.sidebar-wrapper.sidebar-cyan-lime {
    background: linear-gradient(to bottom, #06b6d4, #84cc16);
}

    </style>

</head>

<body class="white-content {{ $class ?? '' }}">
    @auth
        <div class="wrapper">
            @include('layouts.navbars.sidebar', ['corSidebar' => $corSidebar])
            <div class="main-panel">
                @include('layouts.navbars.navbar')
                <div class="content">
                    @yield('content')
                </div>
                @include('layouts.footer')
            </div>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @else
        @include('layouts.navbars.navbar')
        <div class="wrapper wrapper-full-page">
            <div class="full-page {{ $contentClass ?? '' }}">
                <div class="content">
                    <div class="container">
                        @yield('content')
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    @endauth

    <!-- Core JS Files -->
    <script src="{{ asset('white') }}/js/core/jquery.min.js"></script>
    <script src="{{ asset('white') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('white') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('white') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{ asset('white') }}/js/plugins/bootstrap-notify.js"></script>
    <script src="{{ asset('white') }}/js/white-dashboard.min.js?v=1.0.0"></script>
    <script src="{{ asset('white') }}/js/theme.js"></script>

    @stack('js')
</body>
</html>
