<a href="{{ route('product', $product) }}">
    <div class="card">
        <img src="{{ $product->firstImage }}" alt="Random photo" class="card-img">
        <div class="card-body">
            <p>{{ $product->title }}</p>
        </div>
    </div>
</a>
