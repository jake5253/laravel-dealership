@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($types as $type)
                    <div class="panel panel-default" style="margin-bottom: 50px">
                        <div class="panel-heading">
                            <a href="{{ route('showProductByType', ['id' => $type->id] ) }}"><h3><strong>{{ $type->name }}</strong></h3>
                            </a>
                        </div>

                        <div class="panel-group">
                            @foreach ($type->makes(['limit' => 2]) as $make)
                                <div class="panel panel-info" style="margin-top: 5px; margin-left: 25px; margin-bottom: 0px">
                                    <div class="panel-heading">
                                        <a href="{{ route('showProductByMake', ['id' => $make->id] ) }}">
                                            <h4>{{ $make->name }}</h4></a>
                                    </div>
                                    <div class="panel-body" style="margin: 1px">
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
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
