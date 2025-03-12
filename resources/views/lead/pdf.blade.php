<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Leads Export ({{date('d-m-Y')}})</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Mobile</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leads as $index => $lead)
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$lead->full_name ?? 'N/A'}}</td>
                <td>{{$lead->mobile_no ?? 'N/A'}}</td>
                <td>{{$lead->message ?? 'N/A'}}</td>
                <td>{{ date("d-m-Y h:i a", strtotime($lead->created_at))}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>