@extends('layouts.lab_master_layout')
@include('sweetalert::alert')
@section('content')
    <div class="patientTestAppointment">
        <div class="patientAppointDetails lapP-detail">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="mn-hd">
                        <h4>Patient Details</h4>
                        <h4 class="prgrsStatus">In Progress</h4>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="p_re_status">
                        <p>Status <select name="" id="">
                                <option value="">In Progress</option>
                            </select></p>
                    </div>
                </div>
            </div>

            <div class="p-detailAppnt">
                <div class="mn-hd">
                    <h5><span>Patient ID: #P-{{ $appointment_details->user->id }}</span></h5>
                </div>
                <div class="TestpersonalDetail">
                    <div class="per-detail">
                        <div class="mn-hd">
                            <h5>Personal Details</h5>
                        </div>
                        <ul>
                            <li>
                                <p>Name:</p><span>{{ $appointment_details->user->name }}</span>
                            </li>
                            <li>
                                <p>Age:</p><span>{{ $appointment_details->user->age }}</span>
                            </li>
                            <li>
                                <p>Gender:</p><span>{{ $appointment_details->user->gender }}</span>
                            </li>
                            <li>
                                <p>Phone:</p><span>{{ $appointment_details->user->phone }}</span>
                            </li>
                            <li>
                                <p>Address Line 1:</p><span>{{ $appointment_details->user->address }}</span>
                            </li>
                            <li>
                                <p>Address Line 2:</p><span>{{ $appointment_details->user->address2 }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="per-appointDate">
                        <div class="mn-hd">
                            <h5>Appointment Date</h5>
                        </div>
                        <div class="apnt_date_time">
                            <p><span>Date:</span> {{ $appointment_details->date->format('d/m/Y') }} </p>
                            <p><span>Time:</span> {{ $appointment_details->time->format('h:ia') }}</p>
                        </div>
                    </div>
                    <div class="per-test">
                        <div class="mn-hd">
                            <h5>Payment Details</h5>
                        </div>
                        <div class="apnt_date_time apnt_date_time1">
                            <p><span>Amount:</span> ${{ $appointment_details->grand_total }}</p>
                            <p><span>Status:</span>
                                @if ($appointment_details->payment_status == "unpaid")
                                    Unpaid
                                @else
                                    Paid
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="lab_p_test_reports">
                    <div class="mn-hd">
                        <h5>Test Reports</h5>
                    </div>
                    <table>
                        <tr>
                            <th>Tests</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                                                   
                            @foreach ($appointment_details->appointmentTestReports as $check_rport)
                            @php
                                $check_rports = App\Models\Report::where('appointment_test_report_id', $check_rport->id)->first();
                            
                             @endphp
                            <tr>
                                <td>
                                    <h5>{{ $check_rport->tests->name }}</h5>
                                </td>
                                <td><span>{{ $appointment_details->created_at->format('d/m/Y') }}</span></td>
                                <td>
                                    @if ($check_rports != null)
                                        <p>Report Generated</p>
                                        {{-- <div class="badge badge-danger">Report Generated</div> --}}
                                    @else
                                        <p>Report Awaited</p> 
                                        {{-- <div class="badge badge-danger">Report Awaited</div> --}}
                                    @endif
                                </td>
                                <td>
                                    @if ($check_rports != null)
                                        <a href="{{ asset('/assets/report_files') }}/{{ $check_rports->report_file }}"
                                            class="viewReport">View Report</a>
                                        {{-- <a href="{{ asset('/assets/report_files') }}/{{ $check_rport->report_file }}"
                                            download class="donwloadReport"><i class="fal fa-arrow-to-bottom"></i></a> --}}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                      
                    </table>
                </div>
            </div>


        </div>
    </div>
@endsection
