@extends('layouts.patient_master_layout')
@section('content')
    <form action="{{ route('patient.addAppointment') }}" method="POST" id="appointmentForm">
        @csrf
        <div class="patientTestAppointment">
            <div class="patientAppointWrapper">
                <div class="mn-hd">
                    <h4>Patient Test Appointment</h4>
                </div>
                <div class="setappoint">
                    <div class="p-detail">
                        <h5>Patient Details</h5>
                        <div class="field">
                            <input type="text" placeholder="Full Name" name="fullname" required
                                value="{{ $user->name }}" readonly />
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Phone" name="phone" required value="{{ $user->phone }}"
                                readonly />
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Email" name="email" required value="{{ $user->email }}"
                                readonly />
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Address Line 1" name="address1" required
                                value="{{ $user->address }}" />
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Address Line 2" name="address2" required
                                value="{{ $user->address2 }}" />
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Age" name="age" required value="{{ $user->age }}"
                                required />
                        </div>
                        <div class="field">
                            <select name="gender" id="gender" required>
                                <option value="">Gender</option>
                                <option value="male" @if ($user->gender == 'male') selected @endif>Male</option>
                                <option value="female" @if ($user->gender == 'female') selected @endif>Female</option>
                                <option value="others" @if ($user->gender == 'others') selected @endif>Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="p-calendar">
                        <h5>Appointment Dates</h5>
                        <div id="patient-calendar"></div>
                        <div class="dateTime">
                            <p>Date: <span class="app-date">Sep, 7 2022</span></p>
                            <p>Time: <span class="app-time">11:00 PM</span></p>
                            <input type="hidden" name="app_date" value="{{ date('Y-m-d') }}" />
                            <input type="hidden" name="app_time" value="{{ date('H:i') }}" />
                        </div>
                    </div>
                    <div class="p-test">
                        <h5>Selected Tests</h5>
                        @php
                            $total = 0;

                        @endphp
                        @foreach ($data as $key => $patientTests)
                            @php

                                $categoryData = App\Models\Category::where('id', $key)->first();
                                // $total = $total += $patientTest->amount;
                            @endphp
                            <ul class="SelectedTest">
                                @foreach ($patientTests as $patientTest)
                                    @php

                                        $TestData = App\Models\Test::where('id', $patientTest)->first();
                                        $total = $total += $TestData->amount;
                                    @endphp
                                    <li>
                                        <p>{{ $TestData->name }} ({{ $categoryData->name }})</p>
                                        <span>{{ currency() . $TestData->amount }}</span>
                                        <input type="hidden" name="test_id[]" value="{{ $TestData->id }}" />
                                        <input type="hidden" name="test_amount[]" value="{{ $TestData->amount }}" />
                                    </li>
                                @endforeach

                            </ul>
                        @endforeach
                        <div class="totalAmount">
                            <p>Total Amount: <span>{{ currency() . $total }}</span></p>
                            <input type="hidden" name="test_total_amount" value="{{ $total }}" />
                        </div>
                        <h5>Payment Details</h5>
                        <div class="payopts">
                            <p>
                                <input type="radio" id="p-online" name="payment_opt" value="1" checked />
                                <label for="p-online">Pay Online</label>
                            </p>
                            <p>
                                <input type="radio" id="pay-location" value="2" name="payment_opt" />
                                <label for="pay-location">Pay at Location</label>
                            </p>
                        </div>
                        <div class="cardDetail">
                            <h6>Card Details</h6>
                            <input type="text" placeholder="Card Number" name="card_number" class="card_number"
                                id="card_number" />
                            <div id="error-card_number"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" placeholder="Expiry Month" name="expiry_month"
                                        class="expiry_month" id="expiry_month" />
                                    <div id="error-expiry_month"></div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Expiry Year" name="expiry_year" class="expiry_year"
                                        id="expiry_year" />
                                    <div id="error-expiry_year"></div>
                                </div>
                            </div>

                            <input type="text" placeholder="CVV" name="cvv" class="cvv" id="cvv" />
                            <div id="error-cvv"></div>
                            <input type="hidden" name="stripeToken" />
                        </div>
                        <div class="btns">
                            <button type="button" class="pay-now submit">Pay Now</button>
                            <button type="button" class="show-bill" style="display:none">Generate PDF</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="patientAppointDetails" style="display: none;">
                <div class="mn-hd">
                    <h4>Patient Appointment Details</h4>
                </div>
                <div class="p-detailAppnt">
                    <div class="mn-hd">
                        <h5><span>Patient ID: JW52737</span></h5>
                    </div>
                    <div class="TestpersonalDetail">
                        <div class="per-detail">
                            <div class="mn-hd">
                                <h5>Personal Details</h5>
                            </div>
                            <ul>
                                <li>
                                    <p>Name:</p><span>James White</span>
                                </li>
                                <li>
                                    <p>Age:</p><span>31</span>
                                </li>
                                <li>
                                    <p>Gender:</p><span>Male</span>
                                </li>
                                <li>
                                    <p>Email:</p><span>j.white@gmail.com</span>
                                </li>
                                <li>
                                    <p>Phone:</p><span>909-596-8696</span>
                                </li>
                                <li>
                                    <p>Address:</p><span>434 Paradise Lane, La Verne, CA 91750</span>
                                </li>
                            </ul>
                        </div>
                        <div class="per-appointDate">
                            <div class="mn-hd">
                                <h5>Appointment Date</h5>
                            </div>
                            <div class="apnt_date_time">
                                <p><span>Date:</span></p>
                                <p class="app-date"></p>
                                <p><span>Time:</span></p>
                                <p class="app-time"></p>
                                {{-- <input type="hidden" name="app_date">
                                <input type="hidden" name="app-time"> --}}
                            </div>
                            <div class="mn-hd">
                                <h5>Payment Details</h5>
                            </div>
                            <div class="apnt_date_time apnt_date_time1">
                                <p><span>Amount:</span> $1090</p>
                                <p><span>Status:</span> Paid</p>
                            </div>
                        </div>
                        <div class="per-test">
                            <div class="mn-hd">
                                <h5>Tests</h5>
                            </div>
                            <ul>
                                <li>
                                    <p>Cardiac</p>
                                </li>
                                <li>
                                    <p>Cholesterol</p>
                                </li>
                                <li>
                                    <p>Direct HDL</p>
                                </li>
                                <li>
                                    <p>AFP</p>
                                </li>
                                <li>
                                    <p>CA 125 IITM</p>
                                </li>
                                <li>
                                    <p>CEA</p>
                                </li>
                                <li>
                                    <p>IgM</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="btn-dflt text-center">
                        <a href="#" class="go-back">Go Back</a>
                        <a href="#">Generate PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function() {

            $('#patient-calendar').datepicker({
                inline: true,
                firstDay: 1,
                showOtherMonths: true,
                minDate: new Date(),
                dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                onSelect: function(dateText, inst) {
                    $.ajax({
                        url: "{{ route('patient.checkTimeAvailability') }}",
                        type: 'post',
                        data: {
                            date: dateText,
                            _token: "<?php echo csrf_token(); ?>"
                        },
                        success: function(response) {
                            let data = JSON.parse(response);
                            $('.app-date').text(data.readableDate);
                            $('input[name="app_date"]').val(data.occupiedDate);
                            $('.app-time').text(data.readableTime);
                            $('input[name="app_time"]').val(data.occupiedTiming);
                        }
                    });
                    console.log(dateText + " " + inst)
                },
                dateFormat: "yy-mm-dd"
            });
            checkAvailablity();

        });
        $('#p-online').on('click', function() {
            $('.cardDetail').show();
            // $('.cardDetail').find('input').attr('required', true);
            $('.pay-now').addClass('submit');
            $('.pay-now').show();
            $('.show-bill').removeClass('submit');
            $('.show-bill').hide();
        });
        $('#pay-location').on('click', function() {
            // $('.cardDetail').find('input').attr('required', false);
            $('.cardDetail').hide();
            $('.show-bill').addClass('submit');
            $('.show-bill').show();
            $('.pay-now').removeClass('submit');
            $('.pay-now').hide();
        });

        function checkAvailablity() {
            var occupiedDate = $('input[name="app_date"]').val();
            if (occupiedDate != '') {
                $.ajax({
                    url: "{{ route('patient.checkTimeAvailability') }}",
                    type: 'post',
                    data: {
                        date: occupiedDate,
                        _token: "<?php echo csrf_token(); ?>"
                    },
                    success: function(response) {
                        let data = JSON.parse(response);
                        $('.app-date').text(data.readableDate);
                        $('input[name="app_date"]').val(data.occupiedDate);
                        $('.app-time').text(data.readableTime);
                        $('input[name="app_time"]').val(data.occupiedTiming);
                    }
                });
            }
        }

        window.setInterval(function() {
            checkAvailablity();
        }, 30000);

        $('#appointmentForm').on('click', '.submit', function(e) {
            var payment_opt = $('input[name="payment_opt"]:checked ').val();
            if (payment_opt == 1) {
                $('#appointmentForm').validate({ // initialize the plugin

                    rules: {

                        card_number: {



                            required: true,
                            digits: true,
                            minlength: 16,
                            minlength: 16,



                        },

                        expiry_month: {



                            required: true,



                        },

                        expiry_year: {



                            required: true,



                        },

                        cvc: {



                            required: true,
                            digits: true,
                            minlength: 3,
                            minlength: 3,


                        },
                    },

                    errorPlacement: function(error, element) {



                        var name = $(element).attr("name");



                        error.appendTo($("#error-" + name));



                    },
                });
                if ($("#appointmentForm").valid()) {
                    Stripe.setPublishableKey(
                        'pk_test_51KJksyIqrFLrMDhXBjudes6UKNM5UuE02hdvJBwgs1Rqzn9RFjZGsRzAJKV48eNJzF1RyqKHqmNuf75z6ND7Rbmx00P7PrPd3X'
                    );
                    Stripe.createToken({
                        number: $('.card_number').val(),
                        cvc: $('.cvv').val(),
                        exp_month: $('.expiry_month').val(),
                        exp_year: $('.expiry_year').val()
                    }, stripeResponseHandler);

                    function stripeResponseHandler(status, response) {
                        if (response.error) {
                            alert(response.error.message);
                            return false;
                        } else {
                            /* token contains id, last4, and card type */
                            var token = response['id'];
                            $('#appointmentForm').find("input[name='stripeToken']").val(token);
                            $('#appointmentForm').submit();
                        }
                    }
                }

            } else {
                //submitForm($('#appointmentForm'))
                //alert('in else');
                $('#appointmentForm').submit();
            }

        });

        function submitForm(element) {
            var form = element;
            var actionUrl = element.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: element.serialize(), // serializes the form's elements.
                success: function(data) {
                    alert(data); // show response from the php script.
                }
            });
        }
    </script>
@endpush
