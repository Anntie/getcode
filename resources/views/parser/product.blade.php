<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product</title>
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
        }

        .card-container .card {
            border: solid 1px #f2f2f2;
            width: 800px;
            margin: 0 auto;
        }

        .card-container .card .card-body {
            padding: 10px;
        }

        .card-container .card img.card-img {
            height: 300px;
            width: 300px;
            object-fit: cover;
        }

        .pagination {
            text-align: center;
        }

        .page-item {
            display: inline-block;
            margin-right: 30px;
            font-size: 38px;
        }
    </style>
</head>
<body>
<div class="card-container">
    <div class="card">
        @foreach($product->images as $image)
            <img src="{{ $image }}" alt="Img" class="card-img">
        @endforeach
        <div class="card-body">
            <p>{{ $product->title }}</p>
            <p>{{ $product->categoriesList }}</p>
            <p>Price: {{ $product->price }}</p>
            <p>{{ $product->sku }}</p>
            <p><a href="{{ $product->url }}">Find out more ></a></p>
        </div>
    </div>
</div>
</body>
</html>
