@extends('.././layouts/app')
@section('page-content')
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('handleUser')}}" method="POST" class="form-product">
                                @method('POST')
                                @csrf
                                <h4>Inscription</h4>
                                <div class="form-group ">
                                    <label for="name">Nom et Prenom</label>
                                    <input type="text" name="name" class="form-control mt-1" placeholder="Votre nom et prenom" value={{old('nom')}}>
                                    @error('nom')
                                            <div class="text text-danger">
                                                {{$message}}
                                            </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" name="email" class="form-control mt-1" placeholder="Votre email" value={{old('email')}}>
                                    @error('email')
                                        <div class="text text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control mt-1" placeholder="mot de passe">
                                    @error('password')
                                        <div class="text text-danger mt-1">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success btn-sm mt-2">Insription</button>
                            </form>
                             <p>Deja un compte? <a href="{{route('login')}}">connectez vous</a></p> 
                        </div>
                    </div>
            </div>
            <div class="col-md-4"></div>
        </div>
@endsection