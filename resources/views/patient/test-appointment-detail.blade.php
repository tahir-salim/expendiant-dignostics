@extends('layouts.patient_master_layout')
@section('content')
    <div class="patientAppointDetails">
        <div class="mn-hd">
            <h4>Patient Appointment Details</h4>
        </div>
        <div class="p-detailAppnt">
            <div class="mn-hd">
                <h5><span>Patient ID: P - {{ $appointment->user->id }} </span></h5>
            </div>
            <div class="TestpersonalDetail">
                <div class="per-detail">
                    <div class="mn-hd">
                        <h5>Personal Details</h5>
                    </div>
                    <ul>
                        <li>
                            <p>Name:</p><span>{{ $appointment->user->name }}</span>
                        </li>
                        <li>
                            <p>Age:</p><span>{{ $appointment->user->age }}</span>
                        </li>
                        <li>
                            <p>Gender:</p><span>{{ $appointment->user->gender }}</span>
                        </li>
                        <li>
                            <p>Email:</p><span>{{ $appointment->user->email }}</span>
                        </li>
                        <li>
                            <p>Phone:</p><span>{{ $appointment->user->phone }}</span>
                        </li>
                        <li>
                            <p>Address:</p><span>{{ $appointment->user->address }}</span>
                        </li>
                    </ul>
                </div>
                <div class="per-appointDate">
                    <div class="mn-hd">
                        <h5>Appointment Date</h5>
                    </div>
                    <div class="apnt_date_time">
                        <p><span>Date:</span></p>
                        <p class="app-date">{{ date('Y-m-d', strtotime($appointment->date)) }}</p>
                        <p><span>Time:</span></p>
                        <p class="app-time">{{ date('H:i a', strtotime($appointment->time)) }}</p>
                    </div>
                    <div class="mn-hd">
                        <h5>Payment Details</h5>
                    </div>
                    <div class="apnt_date_time apnt_date_time1">
                        <p><span>Amount:</span>{{ currency() . $appointment->grand_total }}</p>
                        <p><span>Status:</span> {{ $appointment->payment_status }}</p>
                    </div>
                </div>
                <div class="per-test">
                    <div class="mn-hd">
                        <h5>Tests</h5>
                    </div>
                    <ul>
                        @foreach ($appointment->appointmentTestReports as $appointmentTestReport)
                            <li>
                                <p>{{ $appointmentTestReport->tests->name }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="btn-dflt text-center">
                <a href="{{ url('/patient/appointmentgenratepdf/' . $appointment->id) }}">Generate PDF</a>
            </div>
        </div>
    </div>
@endsection
