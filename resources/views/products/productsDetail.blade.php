@extends('layouts.app')

@section('content')
    <div class="container product-page">
        <div class="row">
            <div class="col-md-20">
                <h3 class="text-uppercase">{{ $product->name }}</h3>
                <div class='border-top margin-top'>
                    <div class="col-md-12 product-img">
                        <section id="pictures">
                            <div class="row">
                                <div class="col-md-8">
                                    <div style="margin-top:20px; width:100%;" class="panel panel-info">
                                        <div class="panel-body listing_images" style="padding: 5px;">
                                            <div id="carousel-example-generic" class="carousel slide"
                                                 data-ride="carousel">
                                                <!-- Indicators -->
                                                <ol class="carousel-indicators">
                                                    @foreach( $product->productImages as $photo )
                                                        <li data-target="#carousel-example-generic"
                                                            data-slide-to="{{ $loop->index }}"
                                                            class="{{ $loop->first ? 'active' : '' }}"></li>
                                                    @endforeach
                                                </ol>

                                                <!-- Wrapper for slides -->
                                                <div class="carousel-inner" role="listbox"
                                                     style=" width:100%; !important;">
                                                    @foreach( $product->productImages as $photo )
                                                        <div class="item {{ $loop->first ? ' active' : '' }}">
                                                            <img src="{{ asset($photo->image) }}" alt="noImg"
                                                                 style="margin: auto;">
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <!-- Controls -->
                                                <a class="left carousel-control" href="#carousel-example-generic"
                                                   role="button" data-slide="prev">
                                                    <span class="glyphicon glyphicon-chevron-left"
                                                          aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="right carousel-control" href="#carousel-example-generic"
                                                   role="button" data-slide="next">
                                                    <span class="glyphicon glyphicon-chevron-right"
                                                          aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div style="margin-top:20px; width:100%;" class="panel panel-info">
                                        <div align="center" class="panel-heading clearfix">
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
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="margin-top:20px; width:100%;" class="panel panel-info">
                                        <div class="panel-heading clearfix">
                                            Description
                                        </div>
                                        <div style="margin:20px">
                                            <p>{!! nl2br(e($product->description)) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
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
    </div>

@endsection
