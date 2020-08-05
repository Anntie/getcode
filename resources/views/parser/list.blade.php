<!DOCTYPE html>
<html lang="en">
<head>
    <title>Products list</title>
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
        }

        .card-container .card {
            border: solid 1px #f2f2f2;
            margin: 5px;
            width: 300px;
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
@include('menu')

<div class="card-container">
    @empty($products)
        There is no products to show.
    @endempty
    @each('parser.inc.product', $products, 'product')
</div>

{{ $products->links() }}
</body>
</html>
