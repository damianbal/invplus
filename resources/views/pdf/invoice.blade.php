@inject('invoiceService', 'App\Services\InvoiceService')
<!doctype>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">

    <style>
        body {
            color: rgb(70, 70, 70);
            -webkit-font-smoothing: antialiased;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        h4 {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

        }

        .muted {
            color: rgb(120, 120, 120);
        }

        .bg {
            background: #8495A2;
            padding: 7px;
            height: 150px;
            color: #fff;
            border-radius: 4px;
        }

        .clearfix {
            clear: both;
        }

        .row {}

        .col1 {
            width: 8%;
            float: left;
        }

        .col2 {
            width: 16%;
            float: left;
        }

        .col3 {
            width: 24%;
            float: left;
        }

        .col4 {
            width: 32%;
            float: left;
        }

        .col5 {
            width: 40%;
            float: left;
        }

        .col6 {
            width: 48%;
            float: left;
        }

        .col7 {
            width: 56%;
            float: left;
        }

        .col8 {
            width: 64%;
            float: left;
        }

        .col9 {
            width: 72%;
            float: left;
        }

        .col10 {
            width: 80%;
            float: left;
        }

        .col11 {
            width: 88%;
            float: left;
        }

        .col12 {
            width: 96%;
            float: left;
        }

        .text-center {
            text-align: center;
        }

        .small {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="bg">
        <div style="float: left; width: 35%;">
            <h4>
                @if(!isset($user->company_name)) {{ $user->name }} @else {{ $user->company_name }} @endif
            </h4>
        </div>
        <div style="float: left; width: 30%;">
            <div>
                {{ $user->tel_number }} {{ $user->company_email }} {{ $user->website_url }}
            </div>
        </div>
        <div style="float: left; width: 30%;">
            <div>{{ $user->address }}</div>
            <div>{{ $user->address_city}}, {{ $user->address_state }}, {{ $user->address_country }}</div>
            <div>{{ $user->address_zipcode }}</div>
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

    <div class="clearfix"></div>

    <br> <br>

    <!-- items -->
    <div style="padding: 10px;">
        <div class="row">
            <div class="col3">
                Name
            </div>
            <div class="col3 text-center">
                Quantity
            </div>
            <div class="col3 text-center">
                Cost
            </div>
            <div class="col3 text-center">
                Total
            </div>
        </div>
        <div class="clearfix"></div>
        @foreach($items as $item)
        <div style="padding: 4px;">
            <div class="row muted">
                <div class="col3">
                    <div>
                        {{ $item->name }}
                    </div>
                    <div class="small">
                        {{$item->description }}
                    </div>
                </div>
                <div class="col3 text-center">
                    {{ $item->quantity }}
                </div>
                <div class="col3 text-center">
                    {{ $item->cost }}
                </div>
                <div class="col3 text-center">
                    {{ $item->cost * $item->quantity }}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        @endforeach

        <div class="row">
            <div class="col3">

            </div>
            <div class="col3 text-center">

            </div>
            <div class="col3 text-center">
                Total
            </div>
            <div class="col3 text-center">
                @php $invoiceService->setInvoice($invoice) @endphp {{ $invoiceService->getTotal() }}
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</body>

</html>