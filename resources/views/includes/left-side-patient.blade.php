<li class="left-side">
    <a href="./" class="logo"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a>
    <ul class="menu">
        <li class="{{ request()->is('patient/dashboard') ? 'active' : '' }}"><a
                href="{{ route('patient.dashboard') }}"><img src="{{ asset('assets/images/menu.png') }}" alt="">
                <span>Test Menu</span></a></li>
        <li class="{{ request()->is('patient/appointmentList') ? 'active' : '' }}"><a
                href="{{ route('patient.appointmentList') }}"><img src="{{ asset('assets/images/appointment.png') }}"
                    alt=""> <span>Test Appointments</span></a></li>
        <li class="{{ request()->is('patient/test-report') ? 'active' : '' }}"><a
                href="{{ route('patient.test.report') }}"><img src="{{ asset('assets/images/reports.png') }}"
                    alt="">
                <span>Test Reports</span></a></li>
        <li class="{{ request()->is('patient/help-center') ? 'active' : '' }}"><a
                href="{{ route('patient.help.center') }}"><img src="{{ asset('assets/images/help-circle.png') }}"
                    alt="">
                <span>Help Center</span></a></li>
    </ul>
    <div class="signout">
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
					document.getElementById('logout-form').submit();"><i
                class="fal fa-lock"></i> Signout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>
