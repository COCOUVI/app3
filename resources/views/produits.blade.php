@extends('./../layouts/app')

@section('page-content')
    <div class="container mt-4">
        <h2>Nos Produits</h2>
        <div class="row">
            @forelse ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <a href="{{ route('show', $product->id) }}" class="text-decoration-none">
                                <h5 class="card-title mb-3">{{ $product->name }}</h5>
                            </a>
                            <p class="card-text text-muted text-justify flex-grow-1" style="-webkit-line-clamp: 3; -webkit-box-orient: vertical; display: -webkit-box; overflow: hidden; text-overflow: ellipsis;">
                                <span class="fw-bold text-info">DESCRIPTION:</span> {{ $product->description }}
                            </p>
                            <p class="card-text fw-bold">
                                Prix: {{ $product->price }} FCFA
                            </p>
                            <div class="mt-3">
                                <a href="{{ route('show', $product->id) }}" class="btn btn-primary btn-sm">Voir les détails</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-info">Aucun produit disponible pour le moment.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection