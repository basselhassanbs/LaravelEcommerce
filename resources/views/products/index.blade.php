@extends('layouts.app')
@section('style')
    <title>Home</title>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @forelse ($products as $product)
                <div class="col-md-4 col-lg-3">
                    <div class="card bg-dark text-white mb-3">
                        <div class="embed-responsive embed-responsive-4by3">
                            <img class="card-img-top embed-responsive-item"
                                src="{{ asset('storage/webinar/' . $product->image_path) }}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->type }}</h5>
                            {{-- <p class="card-text">{{ $product->name }}</p>
                            --}}
                            <h6>{{ $product->price }} $</h6>
                            <a href="/products/{{ $product->id }}" class="btn btn-outline-primary mb-3 mt-2">View
                                description</a>
                            <h6 class="text-secondary">Added by {{ $product->user->name }}</h6>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-8 pt-4 pb-4 mx-auto border-top border-bottom border-dark text-dark font-weight-bold">
                    <h1>Nothing here yet.</h1>
                    <a href="/products/create" class="btn btn-outline-dark mt-2">Add Product</a>
                </div>
            @endforelse

        </div>
    </div>
@endsection
