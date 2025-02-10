@extends('layouts.lab_master_layout')
@include('sweetalert::alert')
@section('content')
    <div class="patientTestAppointment">
        <div class="patientStatistics">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="ps">
                        <h4>Hospital Statistics</h4>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="donld">
                        <p>Sort By:
                            <select name="sort_by" id="sort_by" onchange="sort_by()">
                                <option value="Weekly">Weekly</option>
                                <option value="Monthly">Monthly</option>
                                <option value="Year">Year</option>
                            </select>
                        </p>
                        <a href="{{ URL::to('/lab/hospital-list-pdf') }}"><i class="fal fa-download"></i></a>
                        <a href="#"><i class="far fa-ellipsis-v"></i></a>
                    </div>
                </div>
            </div>
            <div class="reportTable hospTable">
                <div class="table-responsive">
                    @if (session()->has('message'))
                        <div class="alert" style="margin-right: 4px;">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <strong>{{ session()->get('message') }}</strong>
                        </div>
                    @endif
                    <table>
                        <tr class="tr-th">
                            <th>Name</th>
                            <th>Delivery Type</th>
                            <th>Date</th>
                            <th>Detail</th>
                        </tr>
                        <tbody id="sortting">
                            {{-- {{dd($hospitalLists)}} --}}
                            @foreach ($hospitalLists as $hospitalList)
                                <tr>
                                    <td>
                                        <p><span>{{ $hospitalList->hospital->name ?? null }}</span></p>
                                    </td>
                                    <td>
                                        <p>{{ ucwords($hospitalList->sample_delivery_type ?? null) }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $hospitalList->date->format('d.m.Y') }}</p>
                                    </td>
                                    <td>
                                        <a href="{{ url('/lab/hospital-detail/' . encrypt($hospitalList->id)) }}"
                                            class="vwdtl">View Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        function sort_by() {
            var sort_by = document.getElementById('sort_by').value;
             
            $.ajax({
                url: "{{ route('lab.sorting', ['sort_by' => '+sort_by+']) }}",
                type: "POST",
                data: {
                    _token: '<?php echo csrf_token(); ?>',
                    sort_by: sort_by
                },
                success: function(response) {
       
                    // var parent = document.getElementById('sortting');
                    // parent.insertAdjacentHTML('beforeend',response)
                    $('#sortting').empty();
                        $('#sortting').append(response);
                }
            });
        }
    </script> --}}
@endsection

{{-- class="repr_ready" --}}
