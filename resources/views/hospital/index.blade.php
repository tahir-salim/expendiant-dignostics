@extends('layouts.hospital_master_layout')
@section('content')
    <style type="text/css">
        .panel-title {
            display: inline;
            font-weight: bold;
        }

        .display-table {
            display: table;
        }

        .display-tr {
            display: table-row;
        }

        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }

        .hide {
            display: none;
        }
    </style>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <div class="patientTestAppointment">
        <div class="patientAppointWrapper">
            <div class="mn-hd">
                <h4>Hospital Test Appointment</h4>
            </div>
            <form method="post" role="form" action="{{ route('hospital.post_test_details') }}" class="require-validation"
                data-cc-on-file="false"
                data-stripe-publishable-key="pk_test_51KJksyIqrFLrMDhXBjudes6UKNM5UuE02hdvJBwgs1Rqzn9RFjZGsRzAJKV48eNJzF1RyqKHqmNuf75z6ND7Rbmx00P7PrPd3X"
                id="payment-form">
                <div class="setappoint hosSetAppoint">

                    @csrf
                    <div class="p-detail">
                        <h5>Patient Details</h5>
                        <div class="field">
                            <input type="text" name="patient_id" required placeholder="Patient ID">
                        </div>
                        <div class="field">
                            <input type="text" name="full_name" required placeholder="Full Name">
                        </div>
                        <div class="field">
                            <input type="text" name="phone" required placeholder="Phone">
                        </div>
                        <div class="field">
                            <input type="text" name="patient_email" required placeholder="Email">
                        </div>
                        <div class="field">
                            <input type="text" name="address_1" required placeholder="Address Line 1">
                        </div>
                        <div class="field">
                            <input type="text" name="address_2" required placeholder="Address Line 2">
                        </div>
                        <div class="field">
                            <input type="number" name="age" required placeholder="Age" id="">
                        </div>
                        <div class="field">
                            <select name="gender" id="" required>
                                <option value="">Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <br><br>
                        <h5>Sample Delivery</h5>
                        <div class="payopts">
                            <p>
                                <input type="radio" name="sample_delivery" required value="pick_up" id="p-online"
                                    name="payment-opt" checked>
                                <label for="p-online">Pick Up</label>
                            </p>
                            <p>
                                <input type="radio" name="sample_delivery" required value="Deliver" id="pay-location"
                                    name="payment-opt">
                                <label for="pay-location">Deliver</label>
                            </p>
                        </div>
                        <h5>Payment Details</h5>
                        <div class="cardDetail">
                            <h6>Card Details</h6>
                            <input type="text" id="card_number" value="4242424242424242" name="card_number" class="card required" required
                                placeholder="Card Number">
                            <input type="text" id="exp_month" value="02" name="exp_month" class="expiration required" required
                                placeholder="Expiry Month">
                            <input type="text" id="exp_year" value="2029" name="exp_year" class="expiration required" required
                                placeholder="Expiry Year">
                            <input type="text" id='cvc' value="333" name="cvv" class="cvc required" required
                                placeholder="CVV">
                        </div>
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
                        <div class="btns">
                            <button id="validate">Pay Now</button>
                            <a href="#" class="show-bill">Generate PDF</a>
                        </div>
                    </div>

                    <div class="hosTestSample">
                        <h5>Test For Samples</h5>
                        <div class="row">
                            @foreach ($categories as $category)
                                <div class="col-md-4">
                                    <div class="testsCater testsCater_hos" id="accordionExample{{ $category->id }}">
                                        <div class="">
                                            <div class="tsthead">
                                                <img src="{{ asset($category->icon) }}" alt="">
                                                <h6>{{ $category->name }}</h6>
                                                <a href="#" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{ $category->id }}" aria-expanded="true"
                                                    aria-controls="collapseOne"><i class="fal fa-angle-right"></i></a>
                                            </div>
                                            <hr>
                                            <div id="collapse{{ $category->id }}" class="accordion-collapse collapse"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample{{ $category->id }}">
                                                <div class="accordion-body">
                                                    <div class="hostestlist">
                                                        @foreach ($category->tests as $test)
                                                            <p>
                                                                <input type="checkbox" id="{{ $test->id }}"
                                                                    name="test[]" value="{{ $test->id }}">
                                                                <label
                                                                    for="{{ $test->id }}">{{ $test->name }}</label>
                                                            </p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
            </form>
        </div>
    </div>
    </div>
@endsection

@push('custom-scripts')
    <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('#card_number').val(),
                        cvc: $('#cvc').val(),
                        exp_month: $('#exp_month').val(),
                        exp_year: $('#exp_year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>
@endpush
