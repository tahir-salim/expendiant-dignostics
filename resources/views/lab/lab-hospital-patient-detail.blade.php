@extends('layouts.lab_master_layout')
@include('sweetalert::alert')
@section('content')
    <div class="patientTestAppointment">
        <div class="patientAppointDetails lapP-detail">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="mn-hd">
                        <h4>Hospital’s Patient Details</h4>
                        <h4 class="prgrsStatus">{{ ucwords($hospitalPatientDetail->status) }}</h4>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="p_re_status">
                        <p>Status <select name="" id="">
                                <option value="">{{ ucwords($hospitalPatientDetail->status) }}</option>
                            </select>
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-detailAppnt">
                <div class="mn-hd">
                    <h5><span>Patient ID : {{ $hospitalPatientDetail->patient_id }}</span></h5>
                </div>
                <div class="TestpersonalDetail">
                    <div class="per-detail">
                        <div class="mn-hd">
                            <h5>Personal Details</h5>
                        </div>
                        <ul>
                            <li>
                                <p>Name:</p><span>{{ $hospitalPatientDetail->patient_fullname }}</span>
                            </li>
                            <li>
                                <p>Age:</p><span>{{ $hospitalPatientDetail->patient_age }}</span>
                            </li>
                            <li>
                                <p>Gender:</p><span>{{ $hospitalPatientDetail->patient_gender }}</span>
                            </li>
                            <li>
                                <p>Email:</p><span>{{ $hospitalPatientDetail->patient_email }}</span>
                            </li>
                            <li>
                                <p>Phone:</p><span>{{ $hospitalPatientDetail->patient_phone }}</span>
                            </li>
                            <li>
                                <p>Address:</p>
                                <span>{{ $hospitalPatientDetail->address_1 . ' , ' . $hospitalPatientDetail->address_2 }}</span>
                            </li>
                        </ul>
                    </div>
                    {{-- {{ dd($hospitalPatientDetail->hospitalTestDetails) }} --}}

                    <div class="per-appointDate">

                        <div class="mn-hd">
                            <h5>Appointment Date</h5>
                        </div>
                        <div class="apnt_date_time">
                            <p><span>Date:</span>{{ $hospitalPatientDetail->created_at->format('M, d Y') }}</p>
                            <p><span>Time:</span>{{ $hospitalPatientDetail->created_at->format('g:i A') }}</p>
                            @foreach ($hospitalPatientDetail->hospitalTestMaster as $item)
                                {{-- {{dd($item)}} --}}
                                <p><span>Status:</span>{{ ucwords($item->sample_delivery_type) ?? null }}</p>
                            @endforeach

                        </div>
                    </div>
                    <div class="per-test">
                        <div class="mn-hd">
                            <h5>Payment Details</h5>
                        </div>
                        <div class="apnt_date_time apnt_date_time1">
                            <p><span>Amount:</span> ${{ $hospitalPatientDetail->grand_total }}</p>
                            <p><span>Status:</span> {{ $hospitalPatientDetail->payment->status ?? '' }}</p>
                        </div>
                    </div>
                </div>

                <div class="lab_p_test_reports">
                    <div class="mn-hd">
                        <h5>Test Reports</h5>
                    </div>
                    <table>
                        <tr>
                            <th>Tests</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        {{-- {{dd($hospitalPatientDetail->hospitalTestDetails)}} --}}
                        @foreach ($hospitalPatientDetail->hospitalTestDetails as $hospitalTestDetail)
                            <tr>
                                <td>
                                    <h6>{{ $hospitalTestDetail->test->name ?? 'N/A' }}</h6>
                                </td>

                                <td>{{ $hospitalTestDetail->created_at->format('M, d Y') ?? 'n/a' }}</td>
                                <td>{{ $hospitalTestDetail->created_at->format('g:i A') ?? 'N/A' }}</td>
                                @if (!empty($hospitalTestDetail->report))
                                    <td>
                                        <p>Report Generated</p>
                                    </td>
                                    @if ($hospitalTestDetail->report->report_status == 'Report Generated')
                                        <td><a href="{{ asset('/assets/report_files') }}/{{ $hospitalTestDetail->report->report_file }}"
                                                class="viewReport">View Report</a></td>
                                    @endif
                                @else
                                    <td>
                                        <p>Report Awaited</p>
                                    </td>
                                    <td></td>
                                @endif

                                {{-- <td></td> --}}
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
