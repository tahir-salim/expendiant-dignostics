@extends('layouts.lab_master_layout')
@include('sweetalert::alert')
@section('content')
    <div class="patientTestAppointment">
        <div class="mn-hd">
            <h4>Still Have Questions</h4>
        </div>
        @if (session()->has('message'))
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <strong>{{ session()->get('message') }}</strong>
            </div>
        @endif

        <div class="accordWrp">

            <ul class="accordion-list">
                @foreach ($faqs as $faq)
                    <li>
                        <h3>{{ $faq->question }}</h3>
                        <div class="answer">
                            <p>{{ $faq->answer }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
