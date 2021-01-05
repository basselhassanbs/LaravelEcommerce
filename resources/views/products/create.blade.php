@extends('layouts.app')

@section('style')
    <title>Add Product</title>
@endsection

@section('content')
    <div class="container">
        <form method="POST" action="/products" enctype="multipart/form-data">
            @csrf
            {{-- <div class="row justify-content-center"> --}}
                <div class="row justify-content-center mb-3">
                    <div class="col-10">
                        <div class="card text-white bg-dark">

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="type" class="col-sm-2 col-form-label">Product Type</label>
                                    <div class="col-sm-8">
                                        <input @error('type') style="border-color: red" @enderror type="text"
                                            class="form-control bg-light" id="type" name="type" placeholder="Ex:Laptop"
                                            value="{{ old('type') }}">
                                        @error('type')
                                            <p class="text-danger">{{ $errors->first('type') }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                                    <div class="col-sm-8">
                                        <input @error('name') style="border-color: red" @enderror type="text"
                                            class="form-control bg-light" id="name" name="name" placeholder="Product name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <p class="text-danger">{{ $errors->first('name') }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-8">
                                        <textarea @error('description') style="border-color: red" @enderror
                                            class="form-control bg-light" id="description" name="description"
                                            rows="3">{{ old('description') }}</textarea>
                                        @error('description')
                                            <p class="text-danger">{{ $errors->first('description') }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-3">
                                        <input @error('price') style="border-color: red" @enderror type="number"
                                            class="form-control bg-light" id="price" name="price" placeholder="price"
                                            value="{{ old('price') }}">
                                        @error('price')
                                            <p class="text-danger">{{ $errors->first('price') }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="card text-white bg-dark">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="product_image">ِAdd Image</label>
                                    {{-- <input type="file" class="form-control-file"
                                        name="product_image" id="product_image"> --}}
                                    <input @error('product_image') style="border-color: red" @enderror type="file"
                                        class="form-control-file rounded bg-light text-secondary" name="product_image"
                                        id="product_image" value="{{ old('product_image') }}">
                                    @error('price')
                                        <p class="text-danger">{{ $errors->first('price') }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center mt-3">
                    <button type="submit" class="btn btn-outline-danger">Add the product</button>
                </div>
                {{--
            </div> --}}
        </form>
    </div>

@endsection
