@extends('layouts.patient_master_layout')
@section('content')
    <div class="patientAllTest">
        <div class="container-fluid">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-2">
                        <div class="testsCater" data-id="{{ $category->id }}">
                            {{-- <form action={{ url('patient/test-appointment') }} method="POST" enctype="multipart/form-data">
                                @csrf --}}
                            <div class="tsthead accordion">
                                <img src="{{ asset($category->icon) }}" alt="">
                                <h6>{{ $category->name }}</h6>
                            </div>

                            <div class="testlist">
                                @foreach ($category->tests as $test)
                                    <p>
                                        <input type="checkbox" id="id-{{ $test->id }}" name="p-test[]"
                                            value="{{ $test->id }}">
                                        <label for="id-{{ $test->id }}">{{ $test->name }}</label>
                                    </p>
                                @endforeach
                            </div>

                            {{-- </form> --}}
                            <a href="#" class="VewTest" id="VewTest">View Tests</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="bookAppoint">
            <a href="#" id="book-appointment">Book Appointment</a>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script>
        function getTests() {
            var buttons = $('.next');
            var categoriesArray = [];
            var testsArray = [];
            buttons.each(function(index, element) {
                var testsArray = [];
                // get button click parent
                let parent = $(this).parents('.testsCater');
                // getting the category of tests
                let category = parent.attr('data-id');

                // getting all checked tests
                let inputs = parent.find('.testlist').find(
                    'input[name="p-test[]"]:checked');
                if (inputs.length > 0) {
                    // pushing into category array
                    //categoriesArray.push(category);
                    // foreach for all tests
                    inputs.each(function(index, input) {
                        var inputValues = $(this).val();
                        testsArray.push(inputValues);
                    });
                    categoriesArray.push({
                        category: category,
                        tests: JSON.stringify(testsArray)
                    });
                }

            });
            // check if the testArray and CategoriesArray length is not  0
            if (categoriesArray.length != 0) {
                var formHtml = `<form id="testSelectForm" action="{{ route('patient.select.tests') }}" method="POST">
                        @csrf
                    <input name="categoriesTests" value='${JSON.stringify(categoriesArray)}'>
                    </form>`;
                $('body').remove('#testSelectForm');
                $('body').append(formHtml);
                $('body').find('#testSelectForm').submit();
            }

            console.log(testsArray);
            console.log(categoriesArray);
        }
        $('.VewTest').on('click', function() {
            if ($(this).hasClass("next")) {
                getTests();
            }
        });
        $('#book-appointment').on('click', function() {
            if ($(this).hasClass("next")) {
                getTests();
            }
        });
    </script>
@endpush
