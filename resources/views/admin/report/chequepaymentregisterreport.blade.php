<!DOCTYPE html>
<html>
<head>
    <title>Cheque Pay Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Cheque Pay Report</h2>
    <table>
        <thead>
            <tr>
                <th>SL</th>
                <th>Issue Date</th>
                <th>Bank Name</th>
                <th>Vendor Name</th>
                <th>Cheque Amount</th>
                <th>Clearing Date</th>
                <th>Type Of Cheque</th>
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
                    {{ $clearingDate->isPast() ? 'Over' : $today->diffInDays($clearingDate) . ' days left.' }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
