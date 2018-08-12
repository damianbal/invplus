@inject('invoiceService', 'App\Services\InvoiceService')

@extends('layouts.app')

@section('title')
@lang('invocie.invoices')
@endsection

@section('content')

<div class="card bg-primary-accent">
    <div class="card-header">@lang('invoice.invoices')</div> 

    <div class="card-body">
        <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('common.name')</th>
                    <th scope="col">@lang('client.client')</th>
                    <th scope="col">@lang('common.date')</th>
                    <th scope="col" class="d-none d-sm-block">@lang('common.total')</th>
                    <th scope="col">@lang('common.actions')</th>
                   
                  </tr>
                </thead>
                <tbody>


                  @foreach($invoices as $index => $invoice)
                  @php $invoiceService->setInvoice($invoice) @endphp
                  <tr> 
                      <td>{{ $index + 1 }}</td> 
                      <td>{{ $invoice->name }}</td> 
                      <td>{{ $invoice->client->name }}</td> 
                      <td>{{ $invoice->created_at->diffForHumans() }}</td>
                      <td class="d-none d-sm-block">{{ $invoiceService->getTotal() }}</td>
                      <td>
                          <div class="btn-group">
                          <a href="#" class="btn btn-outline-primary">@lang('common.view')</a>
                          <a href="#" class="btn btn-outline-danger">@lang('common.remove')</a>
                          <a href="{{ route('invoices.show_pdf', $invoice) }}" class="btn btn-outline-info">@lang('common.pdf')</a>
                          </div>
                      </td>

                  </tr>
                  @endforeach

                </tbody>
              </table>
    </div>
</div>


@endsection