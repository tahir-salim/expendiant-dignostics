<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>History</title>
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
    <h1 style="text-align: center">History</h1>
    <br>
    <table style="text-align:center; width:100%;">
        <tr class="tr-th">
            <th>Name</th>
            <th>Patient ID</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
        </tr>
        @foreach ($hospitalHistories as $hospitalHistory)
            @foreach ($hospitalHistory->hospitalTests as $item)
                <tr>
                    <td>
                        <span>{{ $item->patient_fullname ?? null}}</span>
                        </p>
                    </td>
                    <td>
                        <p>#{{ $item->patient_id ?? null}}</p>
                    </td>
                    <td>
                        <p>{{ $hospitalHistory->date->format('d.m.Y') }}</p>
                    </td>

                    <td>
                        <p>{{ $hospitalHistory->master_time->format('g:i A') }}</p>
                    </td>
                    <td>
                        <span class="status_rep">{{ ucwords($item->status) ?? null}}</span>
                    </td>
                </tr>
            @endforeach
        @endforeach
    </table>
</body>

</html>
