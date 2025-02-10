<div class="mainPanelHead">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h4>Patient Dashboard</h4>
        </div>
        <div class="col-md-6 text-right">
            <form action="{{ route('patient.search') }}" method="POST">
                @csrf
                <div class="searhcform">
                    {{-- <button type="submit"><i class="fal fa-search"></i></button>
                    <input name="search" type="text" placeholder="Search Here"> --}}
                </div>
            </form>
        </div>
    </div>
</div>
