<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title>Payment Voucher</title>

    <style>

        body{
            font-family: DejaVu Sans, sans-serif;
            font-size:13px;
            color:#222;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th,td{
            border:1px solid #999;
            padding:8px;
        }

        .no-border td{
            border:none;
        }

        h2,h3{
            margin:0;
        }

        .text-center{
            text-align:center;
        }

        .text-right{
            text-align:right;
        }

        .signature{
            margin-top:70px;
        }

    </style>

</head>

<body>

<table class="no-border">

<tr>

<td width="90">

@php
    $logo = public_path('images/logo.png');
@endphp

@if(file_exists($logo))
   <img src="{{ asset('images/logo.png') }}"
     width="70"
     height="70"
     alt="Trust Logo">
@endif
</td>

<td class="text-center">

<h2>{{ config('app.name') }}</h2>

<h3>PAYMENT VOUCHER</h3>

</td>

</tr>

</table>

<br>

<table>

<tr>

<th width="25%">Voucher No</th>

<td>{{ $paymentVoucher->voucher_no }}</td>

<th width="20%">Date</th>

<td>{{ $paymentVoucher->voucher_date->format('d-M-Y') }}</td>

</tr>

<tr>

<th>Payee</th>

<td colspan="3">

{{ $paymentVoucher->payee_name }}

</td>

</tr>

<tr>

<th>Expense Head</th>

<td>

{{ optional($paymentVoucher->accountHead)->account_name }}

</td>

<th>Mode</th>

<td>

{{ $paymentVoucher->payment_mode }}

</td>

</tr>

<tr>

<th>Reference</th>

<td>

{{ $paymentVoucher->reference_no }}

</td>

<th>Amount</th>

<td>

₹ {{ number_format($paymentVoucher->amount,2) }}

</td>

</tr>

<tr>

<th>Narration</th>

<td colspan="3">

{{ $paymentVoucher->narration }}

</td>

</tr>

</table>

<div class="signature">

<table class="no-border">

<tr>

<td class="text-center">

_____________________

<br>

Prepared By

</td>

<td class="text-center">

_____________________

<br>

Checked By

</td>

<td class="text-center">

_____________________

<br>

Approved By

</td>

</tr>

</table>

</div>

</body>

</html>