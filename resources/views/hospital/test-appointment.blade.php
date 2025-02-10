@extends('layouts.hospital_master_layout')
@section('content')


    <div class="patientTestAppointment">
        <div class="patientStatistics">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="ps">
                        <h4>Patient Statistics</h4>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="donld">
                        <a href="#">
                            <i class="fal fa-download"></i>
                        </a>
                        <a href="#">
                            <i class="far fa-ellipsis-v"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="reportTable">
                <div class="table-responsive">
                    <table>
                        <tr class="tr-th">
                            <th>Name</th>
                            <th>Patient ID</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Details</th>
                        </tr>
                        @if ($all_test_appointment->count() > 0)
                            @foreach ($all_test_appointment as $item)
                                <tr class="@if ($item->status == 'completed') repr_ready @endif">
                                    <td>
                                        <p>
                                            {{-- <img src="assets/images/oval.png" alt=""> --}}
                                            <span>{{ $item->patient_fullname }}</span>
                                        </p>
                                    </td>
                                    <td>
                                        <p>{{ $item->patient_id }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $item->created_at->format('d.m.Y') }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $item->created_at->format('h:ia') }}</p>
                                    </td>

                                    <td>
                                        @if ($item->status == 'pending')
                                            <span class="badge badge-danger">Report Pending</span>
                                        @elseif($item->status == 'in_process')
                                            <span class="badge badge-warning">Report Awaited</span>
                                        @else
                                            <span class="badge badge-success">Report Generated</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('hospital.test_report', ['id' => $item->id]) }}">
                                            <i class="fal fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>No data found.</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
