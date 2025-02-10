@extends('layouts.lab_master_layout')
@include('sweetalert::alert')

@section('content')
    <div class="patientTestAppointment">
        <div class="patientStatistics">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="ps">
                        <h4>Schedule your Visit</h4>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="donld">
                        <p>Sort By: <select name="" id="sort_by">
                                <option value="Weekly" selected>Weekly</option>
                                <option value="Monthly">Monthly</option>
                                {{-- <option value="">Year</option> --}}
                            </select></p>
                        <a href="#"><i class="fal fa-download"></i></a>
                        <a href="#"><i class="far fa-ellipsis-v"></i></a>
                    </div>
                </div>
                <div id='appointment_calendar'></div>

            </div>
        </div>
    </div>
    {{-- {{dd($appointmentLists)}} --}}
@endsection
@push('calander-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('appointment_calendar');
            var color = '';
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                allDaySlot: false,
                //initialDate: '2022-09-01',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek'
                },
                slotMinTime: "{{ openingTiming() }}",
                slotMaxTime: "{{ closeTiming() }}",
                slotDuration: "00:{{ timingGap() }}:01",
                slotEventOverlap: false,
                
                events: [
                    @foreach ($appointmentLists as $appointmentList)

                        {
                            id: '{{ $appointmentList->id }}',
                            title: '<b>Date: {{ date('Y-m-d', strtotime($appointmentList->date)) }} Time:{{ date('H:i:s', strtotime($appointmentList->time)) }}</b> <br> <b class="patient_title">Patient ID:</b> <b class="patient_id">P-{{ $appointmentList->user->id }}</b><br> <b class="patient_name_title">Patient Name:</b> <b class="patient_name">{{ $appointmentList->user->name }}</b>',
                            start: '{{ date('Y-m-d', strtotime($appointmentList->date)) }}T{{ date('H:i:s', strtotime($appointmentList->time)) }}',
                            end: '{{ date('Y-m-d', strtotime($appointmentList->date)) }}T{{ date('H:i:s', strtotime('+1minutes', strtotime($appointmentList->time))) }}',
                            @if ($appointmentList->status == 'booked')
                                backgroundColor: '#4F95FE',
                                borderColor: '#4F95FE',
                            @elseif ($appointmentList->status == 'pending')
                                backgroundColor: '#FEC34F',
                                    borderColor: '#FEC34F',
                            @elseif ($appointmentList->status == 'completed')
                                backgroundColor: '#42D763',
                                    borderColor: '#42D763',
                            @elseif ($appointmentList->status == 'cancelled')
                                backgroundColor: '#FE644F',
                                    borderColor: '#FE644F',
                            @endif

                        },
                    @endforeach

                ],
                eventContent: function(info) {
                    return {
                        html: info.event.title
                    };
                }
            });

            calendar.render();
        });
    </script>
@endpush
@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('.fc-timeGridWeek-button').hide();
            $('.fc-dayGridMonth-button').hide();
            $('#sort_by').on('change', function() {
                var value = $(this).val();
                if (value == "Weekly") {
                    $('.fc-timeGridWeek-button').click();
                } else {
                    $('.fc-dayGridMonth-button').click();
                }
            });
        });
    </script>
@endpush
