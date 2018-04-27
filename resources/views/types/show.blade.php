@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ $type->name }}</h3>
                <div class="panel-group">
                    @foreach ($type->makes as $make)
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <a href="{{ route('showProductByMake', ['id' => $make->id] ) }}">
                                    <h4>{{ $make->name }}</h4></a>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    @foreach ($make->products(['limit' => 4, 'newest' => 1]) as $product)
                                        <a href={{ route('productsDetail', ['id' => $product->id]) }}>
                                            <div class="col-md-3">
                                                @include('partials.products.product')
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('showProductByMake', ['id' => $make->id] ) }}">
                                        <button class="btn btn-xs btn-primary ">View All</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
