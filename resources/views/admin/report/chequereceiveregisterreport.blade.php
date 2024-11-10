<!DOCTYPE html>
<html>
<head>
    <title>Cheque Receive Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 100px;
            height: auto;
        }
        .header h1 {
            margin: 0;
        }
        .header p {
            margin: 5px 0;
            font-size: 12px;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 12px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Company Name</h2>
        <p>Company Address</p>
        <p>Phone: (123) 456-7890 | Website: www.companywebsite.com</p>
    </div>

    <h4 style="margin-left:10px;">Cheque Receive Report</h4>
    <table>
        <thead>
            <tr>
                <th>SL</th>
                <th>Issue Date</th>
                <th>Bank Name</th>
                <th>Client Name</th>
                <th>Cheque Amount</th>
                <th>Clearing Date</th>
                <th>Type Of Cheque</th>
                <th>Cheque Status</th>
                <th>Over Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chequereceives as $key => $chequereceive)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $chequereceive->cheque_date }}</td>
                <td>{{ $chequereceive->bank->bank_name }}</td>
                <td>{{ $chequereceive->client->client_name }}</td>
                <td>{{ $chequereceive->amount }}</td>
                <td>{{ $chequereceive->cheque_clearing_date ?? 'N/A' }}</td>
                <td>{{ $chequereceive->receivetype }}</td>
                <td>{{ $chequereceive->cheque_status }}</td>
                <td>
                    @php
                        $clearingDate = \Carbon\Carbon::parse($chequereceive->cheque_clearing_date);
                        $today = \Carbon\Carbon::today();
                    @endphp
                    {{ $clearingDate->isPast() ? 'Over' : $today->diffInDays($clearingDate) . ' days left.' }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
