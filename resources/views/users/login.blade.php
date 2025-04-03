@extends('.././layouts/app')

@section('page-content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @session('errors')
                <div class="alert alert-danger mt-2" role="alert">
                    {{ $value }} </div>
            @endsession
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('handleLogin') }}">
                        @csrf
                        {{-- @method('post') --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Se souvenir de moi</label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Se connecter</button>

                            <a class="btn btn-link" href="{{route('Emailpage')}}">
                                Mot de passe oublié ?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection