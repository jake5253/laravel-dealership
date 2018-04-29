@extends('layouts.app')

@section('content')
    <div class="container product-page">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-uppercase">{{ $product->name }}</h3>
                <div class='border-top margin-top'>
                    <div class="col-md-12 product-img">
                        <section id="pictures">
                            <div class="row">
                                <div style="margin-top:20px; width:100%;" class="panel panel-info">
                                    <div class="panel-body listing_images" style="padding: 5px;">

                                        <div id="carousel" class="carousel slide" data-ride="carousel"
                                             style="width: 100%; height: 100%">
                                            <ol class="carousel-indicators">
                                                @foreach( $product->productImages as $photo )
                                                    <li data-target="#carousel"
                                                        data-slide-to="{{ $loop->index }}"
                                                        class="{{ $loop->first ? 'active' : '' }}">
                                                    </li>
                                                @endforeach
                                            </ol>
                                            <div class="carousel-inner" role="listbox"
                                                 style="background-color: #1d2124">
                                                @foreach( $product->productImages as $photo )
                                                    <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
                                                        <img class="d-block mh-100"
                                                             src="{{ asset($photo->image) }}" alt="noImg"
                                                             style="height:auto; width: 100%; margin: auto;">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <a class="carousel-control-prev" href="#carousel" role="button"
                                               data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carousel" role="button"
                                               data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div style="margin-top:20px;" class="panel panel-info">
                    <div align="center" class="panel-heading">
                        <strong>Details</strong>
                    </div>
                    <div style="margin:7px">

                        <h4>Price: ${{ number_format($product->price) }} USD</h4>
                        <strong>Type: </strong>{{ $product->make->type->name }} <br/>
                        <strong>Make: </strong>{{ $product->make->name }} <br/>
                        <strong>Mileage: </strong> {{ $product->mileage }}<br/>
                        <strong>Color: </strong> {{ $product->color }}<br/>
                        <strong>Year: </strong> {{ $product->year }}<br/>
                        <strong>Transmission: </strong> {{ $product->transmission }}<br/>
                        <strong>Fuel: </strong> {{ $product->fuel_type }}<br/>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div style="margin-top:20px; width:100%;" class="panel panel-info">
                    <div class="panel-heading">
                        Description
                    </div>
                    <div style="margin:20px">
                        <p>{!! nl2br(e($product->description)) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='border-top margin-top'>
        <h3>SIMILAR PRODUCTS</h3>
        <div class="row">
            @foreach ($product->make->products(['limit' => 4, 'newest' => 1, 'similar' => $product->id]) as $product)
                <a href={{ route('productsDetail', ['id' => $product->id]) }}>
                    <div class="col-md-3">
                        @include('partials.products.product')
                    </div>
                </a>
            @endforeach
        </div>
    </div>

@endsection
