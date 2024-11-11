<!DOCTYPE html>
<html>
<head>
    <title>Cheque Pay Report</title>
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

    <h4 style="margin-left:10px;">Cheque Pay Report</h4>
    <table>
        <thead>
            <tr>
                <th>SL</th>
                <th>Issue Date</th>
                <th>Bank Name</th>
                <th>Vendor Name</th>
                <th>Cheque Amount</th>
                <th>Clearing Date</th>
                <th>Cheque Type</th>
                <th>Cheque Status</th>
                <th>Over Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chequepays as $key => $chequepay)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $chequepay->cheque_date }}</td>
                <td>{{ $chequepay->bank->bank_name }}</td>
                <td>{{ $chequepay->payee->vendor_name }}</td>
                <td>{{ $chequepay->amount }}</td>
                <td>{{ $chequepay->cheque_clearing_date ?? 'N/A' }}</td>
                <td>{{ $chequepay->paytype }}</td>
                <td>{{ $chequepay->cheque_status }}</td>
                <td>
                    @php
                        $clearingDate = \Carbon\Carbon::parse($chequepay->cheque_clearing_date);
                        $today = \Carbon\Carbon::today();
                    @endphp
                    @if ($clearingDate->isPast())
                        {{ $today->diffInDays($clearingDate) . ' days over' }}
                    @else
                        {{ $today->diffInDays($clearingDate) . ' days left.' }}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
