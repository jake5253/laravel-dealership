<div class="thumbnail">
    <a href="{{ route('productsDetail', ['id' => $product->id]) }}">@foreach ($product->productimages->where('default', 1) as $image)
            <img class="" src="{{ asset($image->thumbnail) }}" alt="NoImage"
                 style="width: 300px;"></a>@endforeach

    <div class="caption">
        <a href="{{ route('productsDetail', ['id' => $product->id]) }}"><h4>{{ $product->name }}</h4></a>
        <p>Price: {{ number_format($product->price) }} USD</p>
    </div>
</div>