<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cheque Template</title>
    <style>
        /* Set the entire page to A4 size with no margin or padding */
        @page {
            size: 7.2in; /* Set the page width to 7.5 inches and height to 3.5 inches */
            margin: 0;
            padding: 0;
        }
        body, html {
            width: 7.5in; /* Set width to 7.5 inches */
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #000;
        }
        .cheque {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
            position: relative;
        }
        .ac-payee {
            font-size: 14px;
            color: #000;
            position: absolute;
            transform: rotate(-40deg);
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
            padding-left: 30px;
            padding-right: 30px;
            top: 60px;
            left: -25px;
        }
        .date {
            font-size: 14px;
            position: absolute;
            top: 16mm;
            right: 13mm;
            letter-spacing: 6px;
        }
        .pay-to {
            position: absolute;
            top: 30mm;
            left: 20mm;
            font-size: 14px;
        }
        .amount-in-words {
            position: absolute;
            top: 37mm;
            left: 6mm;
            font-size: 14px;
            width: 445px;
            line-height: 2;
        }
        .amount-box {
            position: absolute;
            top: 41mm;
            right: 25mm;
            font-size: 14px;
        }
        .check{
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            height: auto;
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="check">
        <img src="{{base_path('public/admin/img/citybank.jpg')}}" alt="No cheque" style="width: 100%">
    </div>
    <div class="cheque">
        <div class="ac-payee">A/C PAYEE ONLY</div>

        <div class="date">{{ implode(' ', str_split(\Carbon\Carbon::parse($chequePay->cheque_date)->format('dmY'))) }} </div>

        <div class="pay-to">
            ** {{$chequePay->payee->vendor_name}} **
        </div>

        <div class="amount-in-words">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;** {{ \App\Helpers\NumberHelper::convertToWords($chequePay->amount) }} **
        </div>

        <div class="amount-box">
            ** {{ number_format($chequePay->amount, 2) }} **
        </div>
    </div>
</body>
</html>
