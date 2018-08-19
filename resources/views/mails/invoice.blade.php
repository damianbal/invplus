<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div>
        <h3>Invoice</h3>
    
        <div>
        Invoice number: 
        {{ $invoice->client->invoices->count() }} 
        </div>

        <div> 
        Invoice from: 
        {{ $invoice->user->company_name ?? $invoice->user->name }}
        </div>
    </div>
</body>
</html>