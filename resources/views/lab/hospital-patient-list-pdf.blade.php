<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hospital Patient Statistics</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #cce6ff;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center">Hospital Patient List</h1>
    <br>
    <table style="text-align:center; width:100%;">
        <tr class="tr-th">
            <th>Name</th>
            <th>Patient ID</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
        @foreach ($hospitalPatientLists as $hospitalPatientList)
            <tr>
                <td>
                    <p>
                        <span>{{ $hospitalPatientList->patient_fullname }}</span>
                    </p>
                </td>
                <td>
                    <p>#{{ $hospitalPatientList->patient_id }}</p>
                </td>
                @foreach ($hospitalPatientList->hospitalTestMaster as $hospitalMaster)
                    <td>
                        <p>{{ $hospitalMaster->date->format('d.m.Y') }}</p>
                    </td>
                    <td>
                        <p>{{ $hospitalMaster->master_time->format('g:i A') }}</p>
                    </td>
                @endforeach
            </tr>
        @endforeach
    </table>
</body>

</html>
