@extends('layouts.hospital_master_layout')
@section('content')
    <div class="patientTestappointment_details">
        <div class="patientAppointDetails">
            <div class="mn-hd">
                <h4>Patient Appointment Details</h4>
            </div>
            <div class="p-detailAppnt p-detailAppnt1">
                <div class="TestpersonalDetail">
                    <div class="per-detail">
                        <div class="mn-hd">
                            <h5>Personal Details</h5>
                        </div>
                        <ul>
                            <li>
                                <p>Patient ID:</p> <span>{{ $appointment_details->patient_id }}</span>
                            </li>
                            <li>
                                <p>Name:</p><span>{{ $appointment_details->patient_fullname }}</span>
                            </li>
                            <li>
                                <p>Age:</p><span>{{ $appointment_details->patient_age }}</span>
                            </li>
                            <li>
                                <p>Gender:</p><span>{{ $appointment_details->patient_gender }}</span>
                            </li>
                            <li>
                                <p>Phone:</p><span>{{ $appointment_details->patient_phone }}</span>
                            </li>
                            <li>
                                <p>Email:</p><span>{{ $appointment_details->patient_email }}</span>
                            </li>
                            <li>
                                <p>Address 1:</p><span>{{ $appointment_details->address_1 }}</span>
                            </li>
                            <li>
                                <p>Address 2:</p><span>{{ $appointment_details->address_2 }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="per-appointDate">
                        <div class="mn-hd">
                            <h5>Date</h5>
                        </div>
                        <div class="apnt_date_time">
                            <p><span>Date:</span> {{ $appointment_details->created_at->format('d/m/Y') }} </p>
                            <p><span>Time:</span> {{ $appointment_details->created_at->format('h:ia') }}</p>
                        </div>
                        <div class="mn-hd">
                            <h5>Payment Details</h5>
                        </div>
                        <div class="apnt_date_time apnt_date_time1">
                            <p><span>Amount:</span> ${{ $appointment_details->grand_total }}</p>
                            <p><span>Status:</span>
                                @if ($appointment_details->payment_status == 0)
                                    Unpaid
                                @else
                                    Paid
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-hd">
            <h4>Test Reports</h4>
        </div>
        <div class="testReportsWrp">
            <div class="table-responsive">
                <table>
                    <tr>
                        <th>Tests</th>
                        <th>Date</th>
                        <th>Download/View</th>
                    </tr>
                    @foreach ($appointment_details->hospitalTestDetails as $test_list)
                        @php
                            $check_rport = App\Models\Report::where('appointment_id', $test_list->id)->first();
                        @endphp
                        @if($test_list != null)
                        <tr>
                            <td>
                                <h5>{{ $test_list->test->name ?? 'NA'}}</h5>
                            </td>
                            <td><span>{{ $appointment_details->created_at->format('d/m/Y') }}</span></td>
                            <td>
                                @if ($check_rport != null)
                                    <a href="{{ asset('/assets/report_files') }}/{{ $check_rport->report_file }}"
                                        class="viewReport">View Report</a>
                                    <a href="{{ asset('/assets/report_files') }}/{{ $check_rport->report_file }}" download
                                        class="donwloadReport"><i class="fal fa-arrow-to-bottom"></i></a>
                                @else
                                    <div class="badge badge-danger">Report Awaited</div>
                                @endif
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
