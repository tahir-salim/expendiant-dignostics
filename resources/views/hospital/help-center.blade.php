@extends('layouts.hospital_master_layout')
@section('content')
    <div class="patientTestAppointment">
        <div class="mn-hd">
            <h4>Still Have Questions</h4>
        </div>
        <div class="accordWrp">
            <ul class="accordion-list">
                @foreach($faq as $faqs)
                <li>
                    <h3>{{$faqs->question}}</h3>
                    <div class="answer">
                        <p>{{$faqs->answer}}</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
