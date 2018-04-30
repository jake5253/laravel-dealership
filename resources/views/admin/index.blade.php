@extends('layouts.admin')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a href="{{ route('adminProductsCreate') }}">
                        <button class="btn btn-xs btn-success ">Create new product</button>
                    </a>
                </div>
                @foreach ($types as $type)
                    <a href="{{ route('showProductByType', ['id' => $type->id] ) }}"><h3>{{ $type->name }}</h3></a>
                    <div class="panel-group">
                        @foreach ($type->makes(['limit' => 2]) as $make)
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
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
