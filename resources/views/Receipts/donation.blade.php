<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">

<title>Donation Receipt</title>

<style>

body{
    font-family: DejaVu Sans, sans-serif;
    font-size:13px;
    color:#222;
}

.header{
    text-align:center;
    border-bottom:2px solid #E67E22;
    padding-bottom:10px;
    margin-bottom:20px;
}

.logo{
    height:80px;
}

.trust-name{
    font-size:24px;
    font-weight:bold;
    color:#5D4037;
}

.trust-name-kn{
    font-size:18px;
    font-weight:bold;
}

.subtitle{
    font-size:12px;
}

.receipt-title{

    margin-top:20px;

    text-align:center;

    font-size:20px;

    font-weight:bold;

    color:#E67E22;

}

table{

    width:100%;

    border-collapse:collapse;

    margin-top:20px;

}

td{

    padding:8px;

    vertical-align:top;

}

.label{

    width:220px;

    font-weight:bold;

}

.amount{

    font-size:18px;

    font-weight:bold;

    color:#5D4037;

}

.footer{

    margin-top:50px;

}

.signature{

    text-align:right;

}

.note{

    margin-top:30px;

    text-align:center;

    font-size:11px;

    color:#777;

}

hr{

    border:none;

    border-top:1px solid #ddd;

}

</style>

</head>

<body>

<div class="header">

@if(isset($setting) && $setting->logo)

<img src="{{ public_path('storage/'.$setting->logo) }}"
     class="logo">

@endif

<div class="trust-name-kn">

{{ optional($setting)->trust_name_kn }}

</div>

<div class="trust-name">

{{ optional($setting)->trust_name }}

</div>

<div class="subtitle">

{{ optional($setting)->address }}

</div>

<div class="subtitle">

{{ optional($setting)->phone }}

@if($setting->email)

|

{{ optional($setting)->email }}

@endif

</div>

</div>

<div class="receipt-title">

DONATION RECEIPT

</div>

<table>

<tr>

<td class="label">

Receipt No

</td>

<td>

{{ $donation->receipt_no }}

</td>

<td class="label">

Date

</td>

<td>

{{ optional($donation->receipt_date)->format('d-M-Y') }}

</td>

</tr>

<tr>

<td class="label">

Donor

</td>

<td colspan="3">

{{ $donation->donor->name ?? '' }}

</td>

</tr>

<tr>

<td class="label">

Purpose

</td>

<td colspan="3">

{{ $donation->seva->seva_name ?? 'General Donation' }}

</td>

</tr>

<tr>

<td class="label">

Payment Mode

</td>

<td>

{{ $donation->payment_mode }}

</td>

<td class="label">

Reference

</td>

<td>

{{ $donation->reference_no }}

</td>

</tr>

<tr>

<td class="label">

Amount

</td>

<td colspan="3" class="amount">

₹ {{ number_format($donation->amount,2) }}

</td>

</tr>

<tr>

<td class="label">

Amount in Words

</td>

<td colspan="3">

{{ $amountInWords ?? '' }}

</td>

</tr>

</table>

<hr>

<div class="footer">

<table>

<tr>

<td width="30%">

@if(isset($qrCode))

{!! $qrCode !!}

@endif

</td>

<td width="40%">

{!! nl2br(e($setting->blessing_message ?? 'May Lord Sri Rama Bless You')) !!}

</td>

<td class="signature">

@if(isset($setting) && $setting->signature)

<img src="{{ public_path('storage/'.$setting->signature) }}"
     height="60">

@endif

<br>

<b>Authorized Signatory</b>

</td>

</tr>

</table>

</div>

<div class="note">

This is a computer-generated receipt.

</div>

</body>

</html>