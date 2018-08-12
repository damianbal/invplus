<!doctype>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
        body {
            color: rgb(70,70,70);
            -webkit-font-smoothing: antialiased;
        }
        .muted {
            color: rgb(120,120,120);
        }
        .bg {
            background: #8495A2;
            padding: 7px;
            height: 150px;
            color:#fff;
            border-radius: 4px;
        }
        .clearfix {
            clear: both;
        }
    </style>
</head>
  <body>
        <div class="bg">
            <div style="float: left; width: 49%;">
                @if(!isset($user->company_name))
                    {{ $user->name }} 
                @else 
                    {{ $user->company_name }}
                @endif
            </div>
            <div style="float: left; width: 24%;">
adres itp 
            </div>
            <div style="float: left; width: 24%;">
                inne info 
            </div>
        </div>

        <div class="clearfix"></div>
        <br> <br>

        <div>
            <div style="float: left;width: 49%;">
                <div class="muted">Billed To</div> 
                <div>{{ $client->name }}</div> 
                <div>{{ $client->address }}</div> 
                <div>{{ $client->address_city}}, {{ $client->address_state }}, {{ $client->address_country }}</div>
                <div>{{ $client->address_zipcode }}</div>
            </div>
            <div style="float: left; width: 49%; text-align: right;">
                <div class="muted">Invoice Number</div>
                <div>{{ $invoice->invoice_number }}</div>
                <br>
                <div class="muted">Date Of Issue</div> 
                <div>{{ now() }}</div>
            </div>
        </div>

    
  </body>
</html>