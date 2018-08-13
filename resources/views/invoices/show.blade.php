@inject('invoiceService', 'App\Services\InvoiceService')

@extends('layouts.app')

@section('title')
@lang('invoice.invoice')
@endsection

@section('content')

<div class="card bg-primary-accent">
    <div class="card-header">@lang('invoice.invoice')</div> 

    <div class="card-body">
        <div class="row mb-3">
            <div class="col-6">
                <h3><i class="fas fa-user"></i> @lang('client.client')</h3>
            <div>{{ $client->name }}</div>
            <div>{{ $client->getFullAddress() }}</div>
 
            </div>

            <div class="col-6">
                <h3><i class="fas fa-file-invoice"></i> @lang('invoice.invoice')</h3>
            <div>Name: {{ $invoice->name }}</div>
            <div>Created: {{ $invoice->created_at }}</div>
            <div>
                    @php $invoiceService->setInvoice($invoice) @endphp
                    Total: {{ $invoiceService->getTotal() }}
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <h3>Items</h3>

                @foreach($items as $item) 
                <div class="row border-top p-3">
                    <div class="col-sm-3">
                        {{ $item->name }}
                    </div>
                    <div class="col-sm-3">
                            {{ $item->description }}
                        </div>
                    <div class="col-sm-1">
                        {{ $item->cost }}
                    </div>
                    <div class="col-sm-1">
                            {{ $item->quantity }}
                        </div>
                    <div class="col-sm-4">
                        <a class="btn btn-danger" href="#">Remove</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection