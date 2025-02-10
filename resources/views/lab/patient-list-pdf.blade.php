<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient Statistics</title>
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
    <h1 style="text-align: center">Patient Statistics</h1>
    <br>
    <table>
        <tr class="tr-th">
            <th>Name</th>
            <th>Patient ID</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
        @foreach ($patientLists as $patientList)
            <tr>
                <td>
                    <p>
                        <span>{{ $patientList->user->name ?? null }}</span>
                    </p>
                </td>
                <td>
                    <p>#{{ $patientList->user_id ?? null }}</p>
                </td>
                <td>
                    <p>{{ $patientList->date->format('d.m.Y') }}</p>
                </td>
                <td>
                    <p>{{ $patientList->time->format('g:i A') }}</p>
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
