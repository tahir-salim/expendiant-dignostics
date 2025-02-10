@include('../includes/compatibility')
<title>Xpediant Diagnostics Dashboard</title>
<meta name="description" content="">
@include('../includes/style')
</head>
<body>
    <div class="main-dashboard">
        <ul class="dashboardSeprator">
            @include('../includes/left-side-patient')
            <li class="main-panel">
                @include('../includes/main-panel-head-patient')
                @yield('content')
            </li>
            @include('../includes/right-side-patient')
        </ul>
    </div>
    @include('../includes/scripts')
    @stack('custom-scripts')
</body>

</html>
