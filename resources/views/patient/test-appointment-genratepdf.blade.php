{{-- <!DOCTYPE html>
<html>

<head>
    <title>Xpediant-dignotics</title>
    <style>
        body {
            width: 210mm;
            height: 297mm;
            font-family: 'Arial';
        }

        @page {
            width: 210mm;
            height: 297mm;
            font-family: 'Arial';
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
                margin: 0;
                font-family: 'Arial';
            }
        }

        .p-detailAppnt {
            border-radius: 15px;
            border: solid 1px #e9f1ff;
            background-color: #f6faff;
            padding: 15px 30px 70px;
        }

        .TestpersonalDetail {}

        .per-detail {}

        .per-detail ul {}

        .per-detail ul>li {
            gap: 0;
            display: block;
            border-bottom: 1px solid rgb(162 192 212 / 40%);
        }

        .per-detail ul>li p {
            font-size: 16px;
            font-weight: 500;
            line-height: 2.44;
            color: #414d55;
            letter-spacing: 0.1px;
            width: 85px;
            display: inline-block;
            vertical-align: middle;
        }

        .per-detail ul>li span {
            font-size: 16px;
            font-weight: 600;
            line-height: 2.44;
            letter-spacing: 0.1px;
            color: #414d55;
            display: inline-block;
            vertical-align: middle;
        }

        .per-detail ul>li.last {
            border: 0;
        }

        .per-appointDate {}

        .apnt_date_time {
            margin-bottom: 40px;
        }

        .apnt_date_time p {
            font-size: 16px;
            font-weight: 700;
            line-height: 1.43;
            letter-spacing: 0.42px;
            color: #2662f0;
        }

        .apnt_date_time p span {
            font-size: 14px;
            font-weight: 500;
            line-height: 1.43;
            letter-spacing: 0.1px;
            text-align: left;
            color: #414d55;
            width: 60px;
            margin-right: 15px;
        }

        .apnt_date_time p:last-child {
            border-top: 1px solid rgb(162 192 212 / 40%);
            padding-top: 8px;
            margin-top: 8px;
        }

        .apnt_date_time.apnt_date_time1 p {
            color: #414d55;
        }

        .per-test {}

        .per-test ul>li p {
            font-size: 14px;
            font-weight: 500;
            font-stretch: normal;
            font-style: normal;
            line-height: 2.21;
            letter-spacing: 0.1px;
            text-align: left;
            color: #414d55;
        }

        table {
            width: 100% !important;
        }

        table.mainTable {}

        table.mainTable>tr {}

        table.mainTable>tr>td {}

        table.mainTable tr {}

        table.mainTable tr>td {
            padding: 0 10px;
            border-left: 1px solid rgb(162 192 212 / 40%);
            border-right: 1px solid rgb(162 192 212 / 40%);
        }

        table.mainTable tr>td table {
            padding: 0 !important;
            height: 100%;
            border: 0 !important;
        }

        table.mainTable tr>td table tr td {
            border: 0;
        }
    </style>
</head>

<body>
    <div class="main-panel">
        <div class="patientAppointDetails">
            <div class="p-detailAppnt">
                <div class="mn-hd">
                    <h5><span>Patient ID: P - {{ $appointment->user->id }} </span></h5>
</div>
<div class="TestpersonalDetail">
    <div class="per-detail">
        <div class="mn-hd">
            <h5>Personal Details</h5>
        </div>
        <ul>
            <li>
                <p>Name:</p><span>{{ $appointment->user->name }}</span>
            </li>
            <li>
                <p>Age:</p><span>{{ $appointment->user->age }}</span>
            </li>
            <li>
                <p>Gender:</p><span>{{ $appointment->user->gender }}</span>
            </li>
            <li>
                <p>Email:</p><span>{{ $appointment->user->email }}</span>
            </li>
            <li>
                <p>Phone:</p><span>{{ $appointment->user->phone }}</span>
            </li>
            <li>
                <p>Address:</p><span>{{ $appointment->user->address }}</span>
            </li>
        </ul>
    </div>
    <div class="per-appointDate">
        <div class="mn-hd">
            <h5>Appointment Date</h5>
        </div>
        <div class="apnt_date_time">
            <p><span>Date:</span></p>
            <p class="app-date">{{ date('Y-m-d', strtotime($appointment->date)) }}</p>
            <p><span>Time:</span></p>
            <p class="app-time">{{ date('H:i a', strtotime($appointment->time)) }}</p>
        </div>
        <div class="mn-hd">
            <h5>Payment Details</h5>
        </div>
        <div class="apnt_date_time apnt_date_time1">
            <p><span>Amount:</span>{{ currency() . $appointment->grand_total }}</p>
            <p><span>Status:</span> {{ $appointment->payment_status }}</p>
        </div>
    </div>
    <div class="per-test">
        <div class="mn-hd">
            <h5>Tests</h5>
        </div>
        <ul>
            @foreach ($appointment->appointmentTestReports as $appointmentTestReport)
            <li>
                <p>{{ $appointmentTestReport->tests->name }}</p>
            </li>
            @endforeach
        </ul>
    </div>
</div>
</div>
</div>
</div>

</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <title>Xpediant Diagnostics Dashboard</title>
    <meta name="description" content="">

    <style>
        body {
            width: 100%;
            height: 297mm;
            font-family: 'Arial';
        }

        ul.dashboardSeprator>li {
            position: relative;
            min-height: 100vh;
        }

        html,
        body,
        div,
        span,
        applet,
        object,
        iframe,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        blockquote,
        pre,
        a,
        abbr,
        acronym,
        address,
        big,
        cite,
        code,
        del,
        dfn,
        em,
        img,
        ins,
        kbd,
        q,
        s,
        samp,
        small,
        strike,
        strong,
        sub,
        sup,
        tt,
        var,
        b,
        u,
        i,
        center,
        dl,
        dt,
        dd,
        ol,
        ul,
        li,
        fieldset,
        form,
        label,
        legend,
        table,
        caption,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td,
        article,
        aside,
        canvas,
        details,
        embed,
        figure,
        figcaption,
        footer,
        header,
        hgroup,
        menu,
        nav,
        output,
        ruby,
        section,
        summary,
        time,
        mark,
        audio,
        video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }

        .mn-hd h4 {
            font-size: 24px;
            font-weight: 600;
            color: #141414;
            padding-bottom: 28px;
            border-bottom: 2px dotted #a2c0d4;
            margin-bottom: 33px;
        }

        .patientTestAppointment {
            border-radius: 15px;
            box-shadow: 0 10px 50px 4px rgb(138 161 203 / 23%);
            border: solid 1px #e9f1ff;
            background: #fff;
            padding: 48px 33px;
        }

        .p-detailAppnt {
            border-radius: 15px;
            border: solid 1px #e9f1ff;
            background-color: #f6faff;
            padding: 15px 30px 70px;
        }

        .mn-hd h5 {
            font-size: 24px;
            font-weight: 600;
            color: #141414;
            margin-bottom: 20px;
        }

        .mn-hd h5 span {
            color: #005fff;
        }

        .TestpersonalDetail {}

        .per-detail {}

        .per-detail ul {}

        .per-detail ul>li {
            gap: 0;
            display: block;
            border-bottom: 1px solid rgb(162 192 212 / 40%);
        }

        .per-detail ul>li p {
            font-size: 16px;
            font-weight: 500;
            line-height: 2.44;
            color: #414d55;
            letter-spacing: 0.1px;
            width: 85px;
            display: inline-block;
            vertical-align: middle;
        }

        .per-detail ul>li span {
            font-size: 16px;
            font-weight: 600;
            line-height: 2.44;
            letter-spacing: 0.1px;
            color: #414d55;
            display: inline-block;
            vertical-align: middle;
        }

        .per-detail ul>li.last {
            border: 0;
        }

        .per-appointDate {}

        .apnt_date_time {
            margin-bottom: 40px;
        }

        .apnt_date_time p {
            font-size: 16px;
            font-weight: 700;
            line-height: 1.43;
            letter-spacing: 0.42px;
            color: #2662f0;
        }

        .apnt_date_time p span {
            font-size: 14px;
            font-weight: 500;
            line-height: 1.43;
            letter-spacing: 0.1px;
            text-align: left;
            color: #414d55;
            width: 60px;
            margin-right: 15px;
        }

        .apnt_date_time p:last-child {
            border-top: 1px solid rgb(162 192 212 / 40%);
            padding-top: 8px;
            margin-top: 8px;
        }

        .apnt_date_time.apnt_date_time1 p {
            color: #414d55;
        }

        .per-test {}

        .per-test ul>li p {
            font-size: 14px;
            font-weight: 500;
            font-stretch: normal;
            font-style: normal;
            line-height: 2.21;
            letter-spacing: 0.1px;
            text-align: left;
            color: #414d55;
        }

        table {
            width: 100% !important;
        }

        table.mainTable {}

        table.mainTable>tr {}

        table.mainTable>tr>td {}

        table.mainTable tr {}

        table.mainTable tr>td {
            padding: 0 10px;
            border-left: 1px solid rgb(162 192 212 / 40%);
            border-right: 1px solid rgb(162 192 212 / 40%);
        }

        table.mainTable tr>td table {
            padding: 0 !important;
            border: 0 !important;
        }

        table.mainTable tr>td table tr td {
            border: 0;
        }
    </style>
</head>

<body>
    <div class="main-dashboard">
        <ul class="dashboardSeprator">
            <li class="">
                <div class="patientTestAppointment">
                    <div class="patientAppointDetails">
                        <div class="mn-hd">
                            <img src="{{ public_path('assets/images/logo.png') }}" alt="">
                            <h4>Patient Appointment Details</h4>
                        </div>
                        <div class="p-detailAppnt">
                            <div class="mn-hd">
                                <h5><span>Patient ID: P - {{ $appointment->user->id }} </span></h5>
                            </div>
                            <table class="mainTable">
                                <tr>
                                    <td>
                                        <table class="per-detail">
                                            <tr>
                                                <th>
                                                    <div class="mn-hd">
                                                        <h5>Personal Details</h5>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <p>Name:</p><span>{{ $appointment->user->name }}</span>
                                                        </li>
                                                        <li>
                                                            <p>Age:</p><span>{{ $appointment->user->age }}</span>
                                                        </li>
                                                        <li>
                                                            <p>Gender:</p><span>{{ $appointment->user->gender }}</span>
                                                        </li>
                                                        <li>
                                                            <p>Email:</p><span>{{ $appointment->user->email }}</span>
                                                        </li>
                                                        <li>
                                                            <p>Phone:</p><span>{{ $appointment->user->phone }}</span>
                                                        </li>
                                                        <li>
                                                            <p>Address:</p>
                                                            <span>{{ $appointment->user->address }}</span>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="per-appointDate">
                                            <tr>
                                                <th>
                                                    <div class="mn-hd">
                                                        <h5>Appointment Date</h5>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="apnt_date_time">
                                                        <p><span>Date:</span>{{ date('Y-m-d', strtotime($appointment->date)) }}
                                                        </p>
                                                        <p><span>Time:</span>
                                                            {{ date('H:i a', strtotime($appointment->time)) }}</p>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <div class="mn-hd">
                                                        <h5>Payment Details</h5>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="apnt_date_time">
                                                        <p><span>Amount:</span>{{ currency() . $appointment->grand_total }}
                                                        </p>
                                                        <p><span>Status:</span> {{ $appointment->payment_status }}</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="per-test">
                                            <tr>
                                                <th>
                                                    <div class="mn-hd">
                                                        <h5>Tests</h5>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <ul>
                                                        @foreach ($appointment->appointmentTestReports as $appointmentTestReport)
                                                            <li>
                                                                <p>{{ $appointmentTestReport->tests->name }}</p>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</body>

</html>
