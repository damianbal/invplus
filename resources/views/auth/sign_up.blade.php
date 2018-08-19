@extends('layouts.app') 
@section('title') @lang('auth.sign_up')
@endsection
 
@section('content')

<div class="card bg-primary-accent">
    <div class="card-header">@lang('auth.sign_up')</div>

    <div class="card-body">
        <form method="POST" action="{{ route('sign_up.submit') }}">
            @csrf

            <div class="form-group">
                            <label>Name:</label>
                            <input class="form-control" type="text" name="name" placeholder="Name" minlength="4" required>
                        </div>

            <div class="form-group">
                <label>Email:</label>
                <input class="form-control" type="email" name="email" placeholder="Email address" minlength="4" required>
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input class="form-control" type="password" name="password" placeholder="Your password" minlength="4" required>
            </div>

            <div class="text-center">
                <button class="btn btn-primary">@lang('auth.sign_up')</button>
            </div>
        </form>
    </div>
</div>
@endsection