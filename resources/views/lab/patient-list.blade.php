@extends('layouts.lab_master_layout')
@include('sweetalert::alert')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
                        <p>Sort By: <select name="" id="">
                                <option value="">Weekly</option>
                                <option value="">Monthly</option>
                                <option value="">Year</option>
                            </select></p>
                        <a href="{{ URL::to('/lab/patient-list-pdf') }}"><i class="fal fa-download"></i></a>
                        <a href="#"><i class="far fa-ellipsis-v"></i></a>
                    </div>
                </div>
            </div>
            @if (session()->has('message'))
                <div class="alert" style="margin-right: 4px;">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>{{ session()->get('message') }}</strong>
                </div>
            @endif
            <div class="reportTable">
                <div class="table-responsive">
                    <table>
                        <tr class="tr-th">
                            <th>Name</th>
                            {{-- <th>Patient ID</th> --}}
                            <th>Date</th>
                            <th>Time</th>
                            <th>Detail</th>
                            <th></th>
                        </tr>

                        {{-- {{dd($patientLists)}} --}}
                        @foreach ($patientLists as $patientList)
                            <tr>
                                <td>
                                    <p><img src="assets/images/images.png" alt="">
                                        <span>{{ $patientList->user->name ?? null }}</span>
                                    </p>
                                </td>

                                <td>
                                    <p>{{ $patientList->date->format('d.m.Y') }}</p>
                                </td>
                                <td>
                                    <p>{{ $patientList->time->format('g:i A') }}</p>
                                </td>
                                <td>
                                    <a href="{{ route('lab.patient_detials', ['id' => $patientList->id]) }}"
                                        class="vwdtl">View Details</a>
                                </td>
                                <td>
                                    <span class="editPt_{{ $patientList->id }}"><i class="fal fa-edit"></i></span>
                                </td>
                            </tr>
                            <div class="overlay"></div>
                            <div class="popupMain edit_p_test" id="edit_p_test_{{ $patientList->id }}">
                                <div class="popInner">
                                    <h4>Edit Details</h4>
                                    <form method="post" action="{{ url('/lab/update_patient_details') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="appointment_id" value="{{ $patientList->id }}"> 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="field">
                                                    <label for="">Full Name</label>
                                                    <input type="text"name="patient_fullname" readonly
                                                        value="{{ $patientList->user->name ?? null }}"
                                                        placeholder="Christopher Joe">
                                                </div>
                                                <div class="field">
                                                    <label for="">Phone</label>
                                                    <input type="text" name="patient_phone" readonly
                                                        value="{{ $patientList->user->phone ?? null }}"
                                                        placeholder="909-654-9876">
                                                </div>
                                                <div class="field">
                                                    <label for="">Email</label>
                                                    <input type="text" name="patient_email" readonly
                                                        value="{{ $patientList->user->email ?? null }}"
                                                        placeholder="cj34@gmail.com">
                                                </div>
                                                <div class="field">
                                                    <label for="">Date</label>
                                                    <input type="date" name="date" id="date" 
                                                        value="{{ $patientList->date }}">
                                                </div>
                                                <div class="field">
                                                    <label for="">Time</label>
                                                    <input type="time" name="time" id="time"
                                                        value="{{ $patientList->time }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <h6>Test List</h6>
                                                <div class="labTestList lab_p_testList">
                                                    @foreach ($patientList->appointmentTestReports as $test_list)
                                                        @php
                                                            $test = App\Models\Test::find($test_list->test_id);
                                                        @endphp
                                                        <p id="element_id_{{ $test_list->id }}">
                                                            <a href="#"onclick="delete_test('{{ $test_list->id }}')">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>
                                                            {{ $test->name ?? null }}
                                                        </p>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @php
                                                $Category = App\Models\Category::all();
                                            @endphp
                                            <div class="col-md-3">
                                                <h6>Add Test</h6>
                                                <div class="moretestAdd">
                                                    <ul>
                                                        @foreach ($Category as $categories)
                                                            @php
                                                                $test = App\Models\Test::where('category_id', $categories->id)->get();
                                                            @endphp

                                                            <li>
                                                                <label for="">{{ $categories->name }}</label>
                                                                @foreach ($test as $item)
                                                                    <p>
                                                                        <input type="checkbox" id="test_{{ $item->id }}" value="{{ $item->id }}" name="test[]">
                                                                        <label for="test_{{ $item->id }}">{{ $item->name }}</label>
                                                                    </p>
                                                                @endforeach
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <button type="submit">Save</button>
                                                <a href="#" class="dlt_appoint">Delete Appointment</a>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <script>
                                $('.editPt_{{ $patientList->id }}').click(function() {
                                    $('#edit_p_test_{{ $patientList->id }}').fadeIn();
                                    $('.overlay').fadeIn();
                                })
                            </script>
                        @endforeach

                    </table>
                </div>
                {{ $patientLists->links() }}
            </div>

        </div>
    </div>

    <script>
        function delete_test(id) {
            console.log(id);
            $('#element_id_' + id).remove();
            $.ajax({
                url: "{{ route('lab.dltTestofPatient') }}",
                type: "POST",
                data: {
                    _token: '<?php echo csrf_token(); ?>',
                    testId: id,
                },
            });
        }
    </script>
@endsection
