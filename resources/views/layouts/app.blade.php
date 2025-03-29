<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('CSS/bootstrap.css')}}">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create') }}">Creer un produit</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('registering') }}">Creer un Compte</a>
                    </li>
                    @auth
                      <li class="nav-item d-inline-flex">
                          <button type="button" class="btn btn-danger btn-sm">
                              <a href="{{route('breakconnect')}}">Deconnexion</a>
                          </button>
                      </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="">Mon compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Se connecter</a>
                    </li>
                </ul>
            </div>
        </nav>
        @yield('page-content')
    </div>
</body>
</html>