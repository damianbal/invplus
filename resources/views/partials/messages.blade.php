@if(Session::has('message'))
<div class="alert alert-primary" role="alert">

    {{ Session::get('message') }}

</div>
@endif