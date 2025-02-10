@include('../includes/compatibility')
<title>Xpediant Diagnostics Dashboard</title>
<meta name="description" content="">
@include('../includes/style')
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="main-dashboard">
        <ul class="dashboardSeprator">
            @include('../includes/left-side-hospital')
            <li class="main-panel">
                @include('../includes/main-panel-head-hospital')
                @yield('content')
            </li>
            @include('../includes/right-side-hospital')
        </ul>
        @include('../alerts.sweetalert')
    </div>
    @include('../includes/scripts')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    @stack('custom-scripts')
</body>

</html>

 