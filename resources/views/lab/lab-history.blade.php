@extends('layouts.lab_master_layout')
@include('sweetalert::alert')
@section('content')
    <div class="patientTestAppointment">
        <div class="patientStatistics">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="ps">
                        <h4>History</h4>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="donld">
                        <p>Sort By: <select name="" id="">
                                <option value="">Weekly</option>
                                <option value="">Monthly</option>
                                <option value="">Year</option>
                            </select></p>

                        {{-- {{dd('sss')}} --}}
                        {{-- <a href="#"><i class="fal fa-download"></i></a> --}}
                        <a href="{{ URL::to('/lab/lab-history-pdf') }}"><i class="fal fa-download"></i></a>
                        <a href="#"><i class="far fa-ellipsis-v"></i></a>
                    </div>
                </div>
            </div>
            <div class="reportTable hs_pt_table">
                <div class="table-responsive">
                    <table>
                        <tr class="tr-th">
                            <th>Name</th>
                            <th>Patient ID</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                        @foreach ($hospitalHistories as $hospitalHistory)
                            @foreach ($hospitalHistory->hospitalTests as $item)
                                <tr>
                                    <td>
                                        <p><img src="{{ asset('assets/images/oval.png') }}" alt="">
                                            <span>{{ $item->patient_fullname }}</span>
                                        </p>
                                    </td>
                                    <td>
                                        <p># {{ $item->patient_id }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $hospitalHistory->date->format('d.m.Y') }}</p>
                                    </td>

                                    <td>
                                        <p>{{ $hospitalHistory->master_time->format('g:i A') }}</p>
                                    </td>
                                    <td>
                                        <span class="status_rep">{{ $item->status }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
