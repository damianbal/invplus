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
                          <a href="{{ route('invoices.show', $invoice) }}" class="btn btn-outline-primary">@lang('common.view')</a>
                          <a href="{{ route('invoices.destroy', $invoice) }}" class="btn btn-outline-danger">@lang('common.remove')</a>
                          <a href="{{ route('invoices.show_pdf', $invoice) }}" class="btn btn-outline-info">@lang('common.pdf')</a>
                          </div>
                      </td>

                  </tr>
                  @endforeach

                </tbody>
              </table>


                       <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          <i class="fas fa-plus"></i> @lang('invoice.create')
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">@lang('invoice.create_invoice')</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('invoices.store') }}">
              @csrf
                <div class="form-group">
                    <label>@lang('common.name')</label>
                    <input class="form-control" name="name" type="text" placeholder="@lang('client.name')" minlength="3" required>
                </div>

                <div class="form-group">
                  <label>Client:</label>
                <select name="client_id" class="custom-select" required>
                    <option selected>Select client</option>
                  
                    @foreach(Auth::user()->clients as $client)
                      <option value="{{$client->id}}">{{$client->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> @lang('invoice.create')</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


@endsection