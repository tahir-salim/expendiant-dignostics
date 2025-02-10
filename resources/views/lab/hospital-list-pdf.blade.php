<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hospital Statistics</title>
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
    <h1 style="text-align: center">Hospital Statistics</h1>
    <br>
    <table style="text-align:center; width:100%;">
        <tr class="tr-th">
            <th>Name</th>
            <th>Delivery Type</th>
            <th>Date</th>
        </tr>
        @foreach ($hospitalLists as $hospitalList)
            <tr>
                <td>
                    <span>{{ $hospitalList->hospital->name ?? null}}</span>
                    </p>
                </td>
                <td>
                    <p>{{ ucwords($hospitalList->sample_delivery_type) ?? null}}</p>
                </td>
                <td>
                    <p>{{ $hospitalList->date->format('d.m.Y') }}</p>
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
