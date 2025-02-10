@extends('layouts.lab_master_layout')
@include('sweetalert::alert')
@section('content')
    <div class="patientTestAppointment">
        <div class="patientStatistics">
            <div class="hosDetail">
                <h4>{{ $hospitalDetail->hospital->name }}</h4>
                <div class="hostDetailWrp">
                    <div class="row">
                        <div class="col-md-6">
                            {{-- {{dd($hospitalDetail)}} --}}
                            <p><span>Email:</span> {{ $hospitalDetail->hospital->users->email ?? null}}</p>
                            <p><span>Phone:</span> {{ $hospitalDetail->hospital->users->phone ?? null}}</p>
                            <p><span>Address:</span> {{ $hospitalDetail->hospital->users->address ?? null}}</p>
                            <p><span>Delivery Type:</span> {{ ucwords($hospitalDetail->sample_delivery_type) ?? null}}</p>
                        </div>
                        <div class="col-md-6">
                            <p><span>Total Number of Patients:</span> {{ $hospitalDetail->no_of_patients ?? null}}</p>
                            <p><span>Total Number of Test:</span> {{ $hospitalDetail->no_of_test ?? null}}</p>
                        </div>
                    </div>
                    <a href="#" class="editeHospital"><i class="fal fa-edit"></i></a>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="ps">
                        <h4>Patient List</h4>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="donld">
                        <p>Sort By: <select name="" id="">
                                <option value="">Weekly</option>
                                <option value="">Monthly</option>
                                <option value="">Year</option>
                            </select></p>

                        <a href="{{ URL::to('/lab/hospital-patient-list-pdf/' . encrypt($hospitalDetail->hospital_id)) }}">
                            <i class="fal fa-download"></i>
                        </a>
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
                        @foreach ($hospitalDetail->hospitalTests as $hospitalTest)
                            <tr class="repr_ready">

                                <td>
                                    <p><img src="assets/images/oval.png" alt="">
                                        <span>{{ $hospitalTest->patient_fullname }}</span>
                                    </p>
                                </td>
                                <td>
                                    <p># {{ $hospitalTest->patient_id }}</p>
                                </td>

                                <td>
                                    <p>{{ $hospitalDetail->date->format('d.m.Y') }}</p>
                                </td>
                                <td>
                                    <p>{{ $hospitalDetail->master_time->format('g:i A') }}</p>
                                </td>
                                <td>
                                    <a href="{{ url('/lab/lab-hospital-patient-detail/' . encrypt($hospitalTest->id)) }}"
                                        class="vwdtl">View Details</a>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
    <div class="popupMain edit_hospital">
        <div class="popInner">
            <h4>Edit Details</h4>
            <div class="row">

                <form action={{ url('lab/update/hospital-detail/' . encrypt($hospitalDetail->hospital_id)) }}
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="field">
                            <label for="">Hospital Name</label>
                            <input type="text" placeholder="Bellevue Hospital Center" name="name"
                                value="{{ $hospitalDetail->hospital->users->name ?? null}}">
                        </div>
                        <div class="field">
                            <label for="">Phone</label>
                            <input type="text" placeholder="909-654-9876" name="phone"
                                value="{{ $hospitalDetail->hospital->users->phone ?? null}}">
                        </div>
                        <div class="field">
                            <label for="">Time</label>
                            <input type="time" placeholder="" name="master_time"
                                value="{{ $hospitalDetail->master_time ?? null}}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="field">
                            <label for="">Email</label>
                            <input type="text" placeholder="cj34@gmail.com" name="email"
                                value="{{ $hospitalDetail->hospital->users->email ?? null}}">
                        </div>
                        <div class="field">
                            <label for="">Delivery Type</label>
                            <select name="sample_delivery_type">
                                <option value="pick_up" @selected($hospitalDetail->sample_delivery_type == 'pick_up')>Pick Up</option>
                                <option value="Deliver" @selected($hospitalDetail->sample_delivery_type == 'deliver')>Deliver</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="">Date</label>
                            <input type="date" placeholder="" name="date" value="{{ $hospitalDetail->date }}">
                            {{-- {{ dd($hospitalDetail->master_time->format('h:i A')) }} --}}
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit">Save</button>

                        <a href="{{ url('lab/delete/hospital-detail/' . encrypt($hospitalDetail->hospital_id)) }}"
                            class="dlt_appoint">Delete Appointment</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
    
@endsection
