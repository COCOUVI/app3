@extends('.././layouts/app')
@section('page-content')
          @session('success')
            <div class="alert alert-success  mt-2" role="alert">
                {{$value}}
            </div>
          @endsession
            <form zaction="{{route('form')}}" method="POST">
                @method('post')
                @csrf 
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Products Name</label>
                    <input type="text" class="form-control"  placeholder="rice" name="name">
                                @error('name')
                                    <div class="text text-danger">
                                    {{$message}}
                                    </div>
                                @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" >
                    @error('price')
                            <div class="text text-danger">
                            {{$message}}
                            </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="description"></textarea>
                    @error('description')
                            <div class="text text-danger">
                            {{$message}}
                            </div>
                    @enderror
                </div>
                <button  class="btn btn-primary" type="submit">Envoyer</button>
            </form>  
            
@endsection