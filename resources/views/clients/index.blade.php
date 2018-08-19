@extends('layouts.app')

@section('title')
Clients
@endsection

@section('content')

<div class="card bg-primary-accent">
    <div class="card-header">@lang('client.clients')</div> 

    <div class="card-body">

        <table class="table">
        {{--
            <thead >
              <tr>
                <th scope="col">#</th>
              <th scope="col">@lang('common.name')</th>
              <th scope="col">@lang('common.address')</th>
                <th scope="col">@lang('common.actions')</th>
    
              </tr>
            </thead>
            --}}
            <tbody>

              @foreach($clients as $index => $client)
              <tr>
              <th scope="row">{{ $index + 1 }}</th>
              <td>{{ $client->name }}</td>
              <td>{{ $client->getFullAddress() }}</td>

                <td>
                  <div class="btn-group">
                    {{-- <a class="btn btn-outline-other" href="#">@lang('common.view')</a> --}}
                  <a class="btn btn-outline-primary" href="{{ route('invoices.index') }}?client={{ $client->id }}"><i class="fas fa-file-invoice"></i> @lang('invoice.invoices')</a>
                  <a class="btn btn-outline-danger" href="{{ route('clients.destroy', $client->id) }}"><i class="fas fa-trash-alt"></i> @lang('common.remove')</a>
                  </div>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>



      {{ $clients->links() }}

            <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          <i class="fas fa-user-plus"></i> @lang('client.add_client')
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">@lang('client.add_client')</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('clients.store') }}">
              @csrf
                <div class="form-group">
                    <label>@lang('client.name')</label>
                    <input class="form-control" name="name" type="text" placeholder="@lang('client.name')" minlength="3" required>
                </div>

                <div class="form-group">
                    <label>@lang('client.address')</label>
                    <input class="form-control" name="address" type="text" placeholder="@lang('client.address')" minlength="3" required>
                </div>

                <div class="form-group">
                    <label>@lang('client.city')</label>
                    <input class="form-control" name="address_city" type="text" placeholder="@lang('client.city')" minlength="3" required>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>@lang('client.state')</label>
                            <input class="form-control" name="address_state" type="text" placeholder="@lang('client.state')" minlength="3" required>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>@lang('client.country')</label>
                            <input class="form-control" name="address_country" type="text" placeholder="@lang('client.country')" minlength="3" required>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>@lang('client.zipcode')</label>
                            <input class="form-control" name="address_zipcode" type="text" placeholder="@lang('client.zipcode')" minlength="3" required>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> @lang('common.add')</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
            
    </div>
</div>


@endsection