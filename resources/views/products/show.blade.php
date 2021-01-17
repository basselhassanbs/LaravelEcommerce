@extends('layouts.app')

@section('style')
    <title>Description</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mb-3">
                <div class="card bg-dark">

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="embed-responsive embed-responsive-21by9">
                                    <img class="d-block w-100 embed-responsive-item" src="{{ asset('images/1610249432.jpg') }}"
                                        alt="First slide">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="embed-responsive embed-responsive-21by9">
                                    <img class="d-block w-100 embed-responsive-item" src="{{ asset('images/1610249432.jpg') }}"
                                        alt="First slide">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="embed-responsive embed-responsive-21by9">
                                    <img class="d-block w-100 embed-responsive-item" src="{{ asset('images/1610249432.jpg') }}"
                                        alt="First slide">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="embed-responsive embed-responsive-21by9">
                                    <img class="d-block w-100 embed-responsive-item" src="{{ asset('images/1610249432.jpg') }}"
                                        alt="First slide">
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link btn-dark mr-2 active" data-toggle="tab" href="#home">Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-dark mr-2" data-toggle="tab" href="#menu1">About seller</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-dark mr-2" data-toggle="tab" href="#menu2">More</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="home" class="container tab-pane active"><br>
                        <h3>{{ $product->type }}</h3>
                        <h4>{{ $product->name }}</h4>
                        <p>{{ $product->description }}</p>
                    </div>
                    <div id="menu1" class="container tab-pane fade"><br>
                        <h3>No thing here.</h3>
                    </div>
                    <div id="menu2" class="container tab-pane fade"><br>
                        <h3>No thing here.</h3>
                    </div>
                </div>
            </div>
        </div>
        @can('update', $product)
            <div class="row justify-content-center">
                <a href="/products/{{ $product->id }}/edit" class="btn btn-outline-success">Edit the product</a>
            </div>
        @endcan
    </div>
@endsection
