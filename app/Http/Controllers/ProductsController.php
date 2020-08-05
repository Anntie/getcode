<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductsController
{
    public function showList()
    {
        $products = Product::paginate(10);

        return view('parser.list')
            ->with(compact('products'));
    }

    public function showProduct(Product $product)
    {
        return view('parser.product')
            ->with(compact('product'));
    }
}
