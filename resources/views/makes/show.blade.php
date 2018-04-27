@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ $make->name }}</h3>
                <div class="panel-group">
                    @foreach ($make->products(['newest' => true]) as $product)
                        <div class="col-md-3">
                            @include('partials.products.product')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection