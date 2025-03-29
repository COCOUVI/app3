@extends('.././layouts/app')
@section('page-content')
<div class="row mt-2">
    <div class="col-md-4"></div>
    <div class="col-md-4">
           <div class="card mt-3">
               <div class="card-body">
                     <h4>Editer un article</h4>
                     @session('success')
                        <div class="alert alert-success  mt-2" role="alert">
                            {{$value}}
                        </div>
                    @endsession
                   <form action="{{route('edit',$product->id)}}" method="POST">
                       @csrf
                       @method('put')
                        <input type="text"  name="name" value="{{$product->name}}" class="form-control">
                        <textarea name="description" class="form-control mt-2">
                            {{$product->description}}
                        </textarea>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" value="{{$product->price}}" >
                            @error('price')
                                    <div class="text text-danger">
                                    {{$message}}
                                    </div>
                            @enderror
                        </div>
                            <button class="btn btn-success mt-1" type="submit">Actualiser</button>
                        
                   </form>
               </div>

           </div>

    </div>
    <div class="col-md-4"></div>
</div>
@endsection