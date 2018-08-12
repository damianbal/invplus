@extends('layouts.app')

@section('title')
@lang('auth.sign_in')
@endsection

@section('content')

<div class="card bg-primary-accent">
    <div class="card-header">@lang('auth.sign_in')</div> 

    <div class="card-body">  
        <form method="POST" action="{{ route('sign_in.submit') }}">
            @csrf

            <div class="form-group">
                <label>Email:</label> 
                <input class="form-control" type="email" name="email" placeholder="Email address" minlength="4" required>
            </div>

            <div class="form-group">
                    <label>Password:</label> 
                    <input class="form-control" type="password" name="password" placeholder="Your password" minlength="4" required>
            </div>

            <div class="text-center">
                <button class="btn btn-primary">@lang('auth.sign_in')</button>
            </div>
        </form>
    </div>
</div>


@endsection