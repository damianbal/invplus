<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>InvPlus - @yield('title', '')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-invplus mb-3">
        <a class="navbar-brand" href="#"><i class="fas fa-file-invoice"></i> InvPlus</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
            aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="#"><i class="fas fa-home"></i> Home</a>

                @auth
            <a class="nav-item nav-link" href="{{route('clients.index')}}"><i class="fas fa-users"></i> Clients</a>
            <a class="nav-item nav-link" href="{{ route('invoices.index') }}"><i class="fas fa-file-invoice"></i> Invoices</a>
                <a class="nav-item nav-link" href="{{route('sign_out')}}"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
                @endauth

                @guest 
                <a href="{{route('sign_in.show')}}"><i class="fas fa-sign-in-alt"></i> Sign In</a>
                <a href="{{route('sign_up.show')}}">Sign Up</a>

                @endguest
            </div>
        </div>
    </nav>



    <div class="container">
        @include('partials.messages')
        @include('partials.errors')

        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>

    <footer class="container mt-3">
        <div class="row">
            <div class="col-sm-6 small text-muted">
                InvPlus (&copy;) 2018
            </div>
            <div class="col-sm-6 small text-muted text-sm-right">
                Made by DAMIANBAL
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>