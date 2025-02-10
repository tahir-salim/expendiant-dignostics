@extends('layouts.lab_master_layout')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        input.tstAmnt {
            display: inline-block;
            width: 90%;
        }

        button.apnd_btn {
            display: inline-block;
            vertical-align: middle;
            width: 8%;
            background: transparent;
            height: auto;
            border-radius: 0;
            letter-spacing: normal;
            margin: 0;
        }

        button.apnd_btn i {
            position: inherit;
        }
    </style>
    @if (session()->has('message'))
        <div class="alert" style="margin-right: 15px;">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>{{ session()->get('message') }}</strong>
        </div>
    @endif
    <div class="patientAllTest">
        <div class="container-fluid">
            <div class="row">
                {{-- {{dd($categories)}} --}}
                @foreach ($categories as $category)
                    <div class="col-md-2">
                        <div class="testsCater">
                            <div class="tsthead accordion">
                                <img src="{{ asset($category->icon) }}" alt="">
                                <h6>{{ $category->name }}</h6>
                            </div>
                            <div class="accordion-content">
                                <div class="testlist labTestList">
                                    @foreach ($category->tests as $test)
                                        <p id="element_{{ $test->id }}"><a href="#" class="deleteTest" data-id="{{ $test->id }}">
                                                <i class="fas fa-trash-alt"></i></a> {{ $test->name }}</p>
                                        <p id="append_test_{{ $category->id }}"></p>
                                    @endforeach
                                    {{-- <form method="post" id="form_{{$category->id}}"> --}}
                                    <input type="hidden" name="" id="testId_{{ $category->id }}"
                                        value="{{ $category->id }}">
                                    <input type="text"class="new_test_namess" name="test_name[]" value=""
                                        id="new_test_name_{{ $category->id }}" placeholder="Enter Test Name">
                                    <input type="number"class="" value="" name="test_amount[]" id="test_amount_{{ $category->id }}"
                                        placeholder="Enter Test Amount">
                                </div>
                            </div>
                            <a href="javascript:;" class="add_test">View Tests</a>
                            {{-- </form> --}}
                        </div>
                    </div>
                    <script>
                        $('.add_test').on('click', function() {
                            // let testId = $(this).attr('data-id');
                            var testId = document.getElementById('testId_{{ $category->id }}').value;
                            var text = document.getElementById('new_test_name_{{ $category->id }}').value;
                            var test_amount = document.getElementById('test_amount_{{ $category->id }}').value;

                            // console.log(text,test_amount,testId);
                            if (text !== '') {
                                $.ajax({
                                    url: "{{ route('lab.addtest') }}",
                                    type: "POST",
                                    data: {
                                        _token: '<?php echo csrf_token(); ?>',
                                        testId: testId,
                                        new_test_name: text,
                                        test_amount: test_amount
                                    },
                                    success: function(data) {
                                        // $('#'+testId).empty();
                                        var block =
                                            '<a href="#" class="deleteTest" data-id="{{ $test->id }}"><i class="fas fa-trash-alt"></i></a>' +
                                            text + ' ';
                                        $('#append_test_{{ $category->id }}').append(block)
                                    }
                                });
                            }

                        });
                    </script>
                @endforeach
            </div>
        </div>
        <div class="bookAppoint addnewCate">
            <a href="javascript:;">Add New Test Category</a>
        </div>
    </div>

    <div class="overlay"></div>
    <div class="popupMain add_test_CatePop">
        <div class="popInner">
            <form id="category_form" enctype="multipart/form-data" method="post"
                action="{{ route('lab.create_category') }}">
                <div class="row">

                    <div class="col-md-7">

                        {{-- <input type="hidden" id="token" value="{{ csrf_token() }}"> --}}
                        @csrf
                        <h4>Add Test Category</h4>
                        <div class="field">
                            <label for="">Category Name</label>
                            <input type="text" name="name" required placeholder="Nutritional Assessment">
                        </div>
                        <div class="field">
                            <label for="">Add Icon</label>
                            <input type="file" required onchange="readURL(this);" id="image" name="icon"
                                placeholder="">
                        </div>
                        <div class="field">
                            <label for="">Add Tests</label>
                            <input type="text" required name="test_name" id="test_name" placeholder="Enter Test Name">
                        </div>
                        <div class="field">
                            <label for="">Add Test Amount</label>
                            <input class="tstAmnt" required type="number" name="test_amount" id="test_amount"
                                placeholder="Enter Test Amount">
                            <button class="apnd_btn" type="button" onclick="append_tests()"><i
                                    class="fa fa-plus"></i></button>
                        </div>
                        <div class="field">

                        </div>

                    </div>

                    <div class="col-md-5">
                        <div class="row">
                            <div class="icnThmb" id="blah">

                                <i class="far fa-image"></i>

                            </div>

                            <div class="col-md-6">
                                <div class="labTestList" id="labTestList">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit">Save</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        function append_tests() {
            var test_name = $('#test_name').val();
            var test_amount = $('#test_amount').val();
            var fresh_append_test = Math.random();
            if (test_name !== '' && test_amount !== '') {
                var block =
                    `<p id="fresh_append_test_${fresh_append_test}"><a href="javascript:;" onclick="dlt_fresh_test_append('${fresh_append_test}')"><i class="fas fa-trash-alt"></i></a>${test_name}</p> <input type="hidden" name="test_name[]" value="${test_name}"/> <input type="hidden" name="test_amount[]" value="${test_amount}"/> `;
                $('#labTestList').append(block);
            }
        }


        // $('#category_form').submit(function(e) {
        //     e.preventDefault();
        //     var form = new FormData(document.getElementById('category_form'));
        //     var token = $('#token').val();
        //     form.append('_token', token);


        //     $.ajax({
        //         url: "{{ route('lab.create_category') }}",
        //         type: 'post',
        //         data: form,
        //         cache: false,
        //         contentType: false, //must, tell jQuery not to process the data
        //         processData: false,
        //         success: function(response) {
        //             console.log({
        //                 'message': response
        //             });
        //         }
        //     });
        // });
        // function save_category() {
        //     var all_html = $('#labTestList').html();
        //     $.ajax({
        //         url: "{{ route('lab.create_category') }}",
        //         type: "POST",
        //         data: {
        //             _token: '<?php echo csrf_token(); ?>',
        //             all_element: all_html
        //         },
        //         success: function(data) {
        //             console.log(testId);
        //             $('#id_' + testId).empty();
        //         }
        //     });
        // }

        function dlt_fresh_test_append(element_id) {
            $('#fresh_append_test_' + element_id).empty();
            console.log('#fresh_append_test_' + element_id);
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah').empty();
                    $('#blah').append('<img src="' + e.target.result + '" width="150" height="150">')
                };
                var name = document.getElementById('image');
                $('#files').val(name.files.item(0).name);
                reader.readAsDataURL(input.files[0]);
            }
        }



        $('.deleteTest').on('click', function() {
            let testId = $(this).attr('data-id');
            deleteTest(testId);
        });
        // delete test functionality
        function deleteTest(testId) {
            event.preventDefault(); // prevent form submit
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: "{{ asset('/') }}lab/deletetest?id=" + testId + " ",
                        type: "POST",
                        data: {
                            _token: '<?php echo csrf_token(); ?>',
                            testId: testId
                        },
                        success: function(data) {
                            $('#element_'+testId).remove();
                            // $('#'+testId).empty();
                            // $('#id_' + testId).empty();
                        }
                    });
                    // Swal.fire(
                    //     'Deleted!',
                    //     'Your file has been deleted.',
                    //     'success'
                    // )
                }
            })
        }
    </script>
@endpush
