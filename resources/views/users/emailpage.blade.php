@extends('.././layouts/app')

@section('page-content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                      @session('status')
                        <div class="alert alert-success" role="alert">
                            {{$value}}
                        </div>
                      @endauth
                    <div class="card-header">Réinitialisation du mot de passe</div>
                    <div class="card-body">
                        <p>Veuillez entrer votre adresse e-mail pour recevoir un lien de réinitialisation de mot de passe.</p>

                        <form method="POST" action="{{route('password.email')}}">
                            @csrf
                            @method('post')
                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse e-mail</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Envoyer le lien de réinitialisation</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection