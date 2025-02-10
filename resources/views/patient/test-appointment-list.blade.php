@extends('layouts.patient_master_layout')
@section('content')
    <div class="patientTestAppointment">
        <div class="patientStatistics">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="ps">
                        <h4>Test Appointments</h4>
                    </div>
                </div>
            </div>
            <div class="reportTable hospTable">
                <div class="table-responsive">
                    <table>
                        <tr class="tr-th">
                            <th>Appointment Id</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Payment Type</th>
                            <th>Grand Total</th>
                            <th>Payment Status</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                        @foreach ($appointmentLists as $appointmentList)
                            <tr>
                                <td>
                                    <p><span>A-{{ $appointmentList->id }}</span></p>
                                </td>
                                <td>
                                    <p>{{ date('Y-m-d', strtotime($appointmentList->date)) }}</p>
                                </td>
                                <td>
                                    <p>{{ date('H:i a', strtotime($appointmentList->time)) }}</p>
                                </td>
                                <td>
                                    <p>{{ $appointmentList->paymentType->name }}</p>
                                </td>
                                <td>
                                    <p>{{ currency() . $appointmentList->grand_total }}</p>
                                </td>
                                <td>
                                    <p>{{ ucfirst($appointmentList->payment_status) }}</p>
                                </td>
                                <td>
                                    <p>{{ ucfirst($appointmentList->status) }}</p>
                                </td>
                                <td>
                                    <a href="{{ url('/patient/appointmentdetails/' . $appointmentList->id) }}"
                                        class="vwdtl">View Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
