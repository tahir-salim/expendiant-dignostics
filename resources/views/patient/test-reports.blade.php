@extends('layouts.patient_master_layout')
@section('content')
    <div class="patientTestAppointment">
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

                    @foreach ($reports as $report)
                        <tr>
                            <td>
                                <h5>{{ $report->test_name }}</h5>
                            </td>
                            <td><span>{{ date('Y-m-d', strtotime($report->date)) }}</span></td>
                            <td><a href="{{ asset('assets/report_files') . '/' . $report->report_file }}"
                                    class="viewReport">View
                                    Report</a><a href="{{ asset('assets/report_files') . '/' . $report->report_file }}"
                                    download class="donwloadReport"><i class="fal fa-arrow-to-bottom"></i></a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
