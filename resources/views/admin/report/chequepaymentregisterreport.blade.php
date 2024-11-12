<!DOCTYPE html>
<html>
<head>
    <title>Cheque Pay Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
            border-bottom: 1px solid rgb(0, 0, 0);
        }
        .header img {
            width: 100px;
            height: auto;
        }
        .header h4 {
            font-size: 16px;
            margin: 0;
            padding: 0;
        }
        .header h5 {
            font-size: 14px;
            margin: 0;
            padding: 0;
        }
        .header p {
            margin: 5px 0;
            font-size: 12px;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
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
        .phone_email{
          padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        @php
        $websetting = DB::table('web_settings')->first();
            $logoPath = storage_path('app/public/' . $websetting->logo);
            $base64 = file_exists($logoPath) ? 'data:image/' . pathinfo($logoPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($logoPath)) : '';
        @endphp
        @if($base64)
            <img src="{{ $base64 }}" class="img-fluid" alt="Company Logo" style="width: 120px; position: absolute; top: 0; left: 0;">
        @endif
        <h4>{{$websetting->company_name}}</h4>
        <p>{{$websetting->company_address}}</p>
        <p class="phone_email">Phone: {{$websetting->contact}} | Email: {{$websetting->email}}</p>
        <h5 style="margin-left:10px;">Cheque Pay Report</h5>
    </div>
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
