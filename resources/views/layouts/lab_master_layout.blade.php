@include('../includes/compatibility')
<title>Xpediant Diagnostics Dashboard</title>
<meta name="description" content="">
@include('../includes/style')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

<meta charset='utf-8' />
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css' rel='stylesheet' />
{{-- <script src='fullcalendar/main.js'></script> --}}


{{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css' rel='stylesheet' /> --}}

</head>

<body>
    <div class="main-dashboard">
        <ul class="dashboardSeprator">
            @include('../includes/left-side-lab')
            <li class="main-panel">
                @include('../includes/main-panel-head-lab')
                @yield('content')
            </li>
            @include('../includes/right-side-lab')
            @include('../alerts.sweetalert')
            @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
        </ul>
    </div>
    @include('../includes/scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('calander-scripts')
    @stack('custom-scripts')

</body>

</html>
