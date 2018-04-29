
<div class="thumbnail">
    <a href="{{ route('productsDetail', ['id' => $product->id]) }}">@foreach ($product->productimages->where('default', 1) as $image)
            <img src="{{ asset($image->thumbnail) }}" alt="NoImage"
                 style="width: 100%;"></a>@endforeach

    <div class="panel-content caption">
        <a href="{{ route('productsDetail', ['id' => $product->id]) }}"><h4>{{ $product->name }}</h4></a>
        <p>Price: {{ number_format($product->price) }} USD</p>
    </div>
</div>
