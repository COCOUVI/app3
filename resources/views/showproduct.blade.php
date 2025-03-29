@extends('./../layouts/app');
@section('page-content')
  <div class="card mt-2">
        <div class="card-header">
           Product details
        </div>
        <div class="card-body">
            <h5 class="card-title">Name:{{$product->name}}</h5>
            <p class="card-text"><b>Description:</b>{{$product->description}}</p>
            <p class="card-text"><b>Price:</b>{{$product->price}}</p>
        </div>
        @auth
         @if(Auth::id()===$product->iduser)
            <div class="card-footer">
                <a href="{{route('edit',$product->id)}}" class="btn btn-primary">Update</a>
              <form action="{{route('RemoveP',$product->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-primary mt-2">delete</button>
              </form> 
            </div>
          @endif
        @endauth
   </div>
@endsection