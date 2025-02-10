<li class="left-side">
    <a href="./" class="logo"><img src="assets/images/logo.png" alt=""></a>
    <ul class="menu">
        <li class="{{ request()->is('lab/schedule') ? 'active' : '' }}"><a href="{{ route('lab.schedule') }}"><img src="assets/images/calendar.png" alt="">
                <span>Schedule</span></a></li>
        <li class="{{ request()->is('lab/patient-list') ? 'active' : '' }}"><a href="{{ route('lab.patient.list') }}"><img src="assets/images/appointment.png" alt="">
                <span>Patient
                    List</span></a></li>
        <li class="{{ request()->is('lab/hospital-list') ? 'active' : '' }}"><a href="{{ route('lab.hospital.list') }}"><img src="assets/images/hospital-list.png" alt="">
                <span>Hospital
                    List</span></a></li>
        <li class="{{ request()->is('lab/lab-history') ? 'active' : '' }}"><a href="{{ route('lab.lab.history') }}"><img src="assets/images/reports.png" alt="">
                <span>History</span></a>
        </li>
        <li class="{{ request()->is('lab/lab-test-menu') ? 'active' : '' }}"><a href="{{ route('lab.test.menu') }}"><img src="assets/images/menu.png" alt=""> <span>Test
                    Menu</span></a>
        </li>
        <li class="{{ request()->is('lab/help-center') ? 'active' : '' }}"><a href="{{ route('lab.help.center') }}"><img src="assets/images/help-circle.png" alt=""> <span>Help
                    Center</span></a></li>
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
