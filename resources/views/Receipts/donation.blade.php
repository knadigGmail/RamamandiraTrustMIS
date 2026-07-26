<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Donation Receipt</title>

    <style>

        body{
            font-family: DejaVu Sans, sans-serif;
            font-size:14px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        td{
            border:1px solid #000;
            padding:8px;
        }

        .title{
            text-align:center;
            font-size:22px;
            font-weight:bold;
        }

        .subtitle{
            text-align:center;
            margin-bottom:20px;
        }

    </style>

</head>

<body>

<table style="border:none; margin-bottom:15px;">

    <tr style="border:none;">

        <td style="border:none; width:110px;">

           {{-- <img src="{{ public_path('images/logo.png') }}" width="90"> --}}

        </td>

        <td style="border:none; text-align:center;">

            <div style="font-size:24px;font-weight:bold;">

                ರಾಮಮಂದಿರ ಟ್ರಸ್ಟ್ (ರಿ.)

            </div>

            <div style="font-size:18px;font-weight:bold;">

                Ramamandira Trust (R)

            </div>

            <div>

                Honnavalli, Turuvekere Taluk

            </div>

            <div>

                Tumakuru District – Karnataka

            </div>

        </td>

    </tr>

</table>

<hr>

<h2 style="text-align:center;">

    DONATION RECEIPT

</h2>

<table>

    <tr>
        <td width="30%">Receipt No</td>
        <td>{{ $donation->receipt_no }}</td>
    </tr>

    <tr>
        <td>Date</td>
        <td>{{ $donation->receipt_date->format('d-m-Y') }}</td>
    </tr>

    <tr>
        <td>Donor</td>
        <td>{{ $donation->donor->name }}</td>
    </tr>

    <tr>
        <td>Seva</td>
        <td>{{ $donation->seva->seva_name }}</td>
    </tr>

    <tr>
        <td>Amount</td>
        <td>₹ {{ number_format($donation->amount,2) }}</td>
    </tr>

    <tr>
        <td>Payment Mode</td>
        <td>{{ $donation->payment_mode }}</td>
    </tr>

    <tr>
        <td>Remarks</td>
        <td>{{ $donation->remarks }}</td>
    </tr>

</table>

<br><br><br>

<div style="text-align:right;">

    Authorized Signatory

</div>

</body>

</html>