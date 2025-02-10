<li class="left-side">
    <a href="{{route('hospital.dashboard')}}" class="logo">
        <img src="{{ asset('assets/images/logo.png') }}" alt="">
    </a>
    <ul class="menu">
        <li class="{{ request()->is('hospital/dashboard') ? 'active' : '' }}">
            <a href="{{route('hospital.dashboard')}}"><img src="{{ asset('assets/images/menu.png') }}"alt=""> <span>Test Menu</span></a>
        </li>
        <li class="{{ request()->is('hospital/all-test-appointments') ? 'active' : '' }}">
            <a href="{{route('hospital.all_test_appointments')}}"><img src="{{ asset('assets/images/appointment.png') }}"alt=""> <span>Test Appointments</span></a>
        </li>
        {{-- <li class="{{ request()->is('hospital/test-report') ? 'active' : '' }}"><a href="{{route('hospital.test_report')}}"><img src="{{ asset('assets/images/reports.png') }}" alt="">
                <span>Test Reports</span></a></li> --}}
        <li class="{{ request()->is('hospital/help-center') ? 'active' : '' }}"><a href="{{{route('hospital.help_center')}}}"><img src="{{ asset('assets/images/help-circle.png') }}" alt=""><span>Help Center</span></a></li>
    </ul>
    <div class="signout">
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                class="fal fa-lock"></i> Signout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>
