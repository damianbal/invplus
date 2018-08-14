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
                    <div class="col-sm-2">
                    <a href="{{ route('invoices.items.decrease', $item) }}" class="btn btn-sm btn-light"><i class="fas fa-minus-square"></i></a> &nbsp;
                            <b>{{ $item->quantity }}</b>        &nbsp;         <a href="{{ route('invoices.items.increase', $item) }}" class="btn btn-sm btn-light"><i class="fas fa-plus-square"></i></a> 
                  
                        </div>
                    <div class="col-sm-3">
                        <a class="btn btn-danger" href="{{ route('invoices.items.destroy', $item) }}">Remove</a>


 
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="card  p-3 row mb-3">
            <h3>Add Item</h3>
            <div class="col-sm-12">
            <form method="POST" action="{{ route('invoices.items.store', $invoice) }}">

                @csrf

                    <div class="row">
                        <div class="col-sm-6">

                    <div class="form-group">
                            <label>Name</label>
                            <input class="form-control form-control-sm" name="name" placeholder="Name" minlength="3" required>
                        </div>
                        </div>

                        <div class="col-sm-6">
                                <div class="form-group">
                                        <label>Description</label>
                                        <input class="form-control form-control-sm" name="description" placeholder="Description" minlength="3">
                                </div>
                        </div>
                    </div>


            

                    <div class="row">
                        <div class="col-sm-6">
                                <div class="form-group">
                                        <label>Cost</label>
                                        <input type="number" class="form-control form-control-sm" name="cost" placeholder="Cost" minlength="3" min="0">
                                </div>
                        </div>
                        <div class="col-sm-6">
                                <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" class="form-control form-control-sm" name="quantity" placeholder="Qunatity" minlength="3" min="0">
                                </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Add Item</button>
                    </div>
            </form>


        </div>
        </div>
    </div>
</div>


@endsection