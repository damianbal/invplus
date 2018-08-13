@extends('layouts.app') 
@section('title') @lang('user.profile')
@endsection
 
@section('content')

<div class="card bg-primary-accent">
    <div class="card-header">@lang('user.profile')</div>

    <div class="card-body">
        <form method="POST" action="{{ route('users.update_profile') }}">
            @csrf

            <div class="form-group">
                <label>@lang('common.name')</label>
                <input class="form-control" type="text" placeholder="@lang('common.name')" name="name" value="{{ $user->name }}" required minlength="3">
            </div>

            <div class="form-group">
                <label>@lang('user.company_name')</label>
                <input class="form-control" type="text" placeholder="@lang('user.company_name')" name="company_name" value="{{ $user->company_name }}"
                    minlength="3">
            </div>

            <div class="form-group">
                <label>@lang('client.address')</label>
                <input class="form-control" type="text" placeholder="Addresss" name="address" value="{{ $user->address }}" minlength="3">
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>@lang('client.city')</label>
                        <input class="form-control" type="text" placeholder="@lang('client.city')" name="address_city" value="{{ $user->address_city }}" minlength="3">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>@lang('client.states')</label>
                        <input class="form-control" type="text" placeholder="@lang('client.state')" name="address_state" value="{{ $user->address_state }}" minlength="3">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>@lang('client.country')</label>
                        <input class="form-control" type="text" placeholder="@lang('client.country')" name="address_country" value="{{ $user->address_country }}"
                            minlength="3">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>@lang('client.zipcode')</label>
                        <input class="form-control" type="text" placeholder="@lang('client.zipcode')" name="address_zipcode" value="{{ $user->address_zipcode }}"
                            minlength="3">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Website</label>
                        <input class="form-control" type="text" placeholder="ZIP CODE" name="website_url" value="{{ $user->website_url }}" minlength="3">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Tel No.</label>
                        <input class="form-control" type="text" placeholder="ZIP CODE" name="tel_number" value="{{ $user->tel_number }}" minlength="3">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Company Email</label>
                        <input class="form-control" type="text" placeholder="ZIP CODE" name="company_email" value="{{ $user->company_email }}" minlength="3">
                    </div>
                </div>
            </div>

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">@lang('common.update')</button>
            </div>
        </form>
    </div>
</div>
@endsection