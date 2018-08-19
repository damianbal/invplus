@extends('layouts.app')

@section('content')
    <div class="card p-3">
    
        @guest 
<h3 class="card-title">@lang('common.welcome')</h3>

<p>@lang('common.welcome_message')</p>
        @endguest

        @auth 
        <h3 class="card-title">@lang('common.dashboard')</h3>
            <div>@lang('invoice.invoices'): {{ auth()->user()->invoices->count() }}</div>
            <div>@lang('client.clients'): {{ auth()->user()->clients->count() }}</div>
        @endauth
    </div>
@endsection