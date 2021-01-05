@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user_name }} products</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                    @foreach ($products as $product)
                        <a href="{{ route('products.show',$product) }}"><h1>{{ $product->name }}</h1></a>
                        {{-- <p>{{ $product->description }}</p> --}}
                        <img src="{{ asset($product->image_path) }}" width="150px" height="150px" alt="{{ $product->name }}">
                        <br>
                        <label for="">published at {{ $product->created_at }} </label>  
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
